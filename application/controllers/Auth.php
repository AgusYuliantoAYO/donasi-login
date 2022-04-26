<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

		 
	}
		public function index() 
		{
			 $server = "localhost";
				$user = "root";
				$pass = "";
				$database = "sinergisubuh";
				$data['konek']= mysqli_connect($server, $user, $pass, $database) or die (mysqli_error($konek));
		

			if ($this->session->userdata('email')){
				redirect('user');
			} 
			$this->form_validation->set_rules('email','Email','trim|required|valid_email');
			$this->form_validation->set_rules('password','Password','trim|required');
			 
			if($this->form_validation->run() == false)
			 {
				$this->session->set_flashdata('flash',' Login Dulu');
			$data['title']='Login';
		  	$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
          
		        //load Model
				$this->load->model('donasi_model','kategori');
		// .......
		$data['DonasiAkumulasi'] = $this->kategori->DonasiPending()->result();  
		$data['donasi'] = $this->donasi_model->tampilDonasiAktif()->result();
		//$data['news'] = $this->news_model->tampilNews()->result();
    $data['news'] = $this->news_model->tampilNews();
		// .......
		$this->load->view('templates/auth_header',$data); 
		$this->load->view('templates/auth_topbar',$data);
		$this->load->view('user/berdonasi',$data);
			// $this->load->view('auth/login');
			$this->load->view('templates/home_footer',$data);


			
		
			 } else {
				 //Validasinya Sukses
				 $this->_login();
			 }
		}

		private function _login()
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$user = $this->db->get_where('user',['email' => $email])->row_array();
			
			//User ada
			if($user){
				
				//user ada
				if($user['is_active'] == 1){

					//aktif
					if(password_verify($password,$user['password'])){
						$data = [
							'email' => $user['email'],
							'role_id' => $user['role_id']
						];
						$this->session->set_userdata($data);
						if ($user['role_id'] == 1)  {
							redirect('admin');
						} else {
								
							redirect('user/berdonasi');
						}
						//MASUK ADMIN / USER
					// if(password_verify($password,$user['password'])){
					// 	$data = [
					// 		'email' => $user['email'],
					// 		'role_id' => $user['role_id']
					// 	];
					// 	$this->session->set_userdata($data);
					// 	if ($user['role_id'] == 1)  {
					// 		redirect('admin');
					// 	} else {
					// 		redirect('user');
					// 	}
					// ..............
						

					}else{
						$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
						Wrong password! </div>'); redirect('auth');	
					}
			    }else{
					 $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
					 Email <b>belum Aktivasi !</> segera <b>cek email !</b> </div>'); redirect('auth');
				}
			}else {
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
				Email is not Registerd ! </div>'); 
			
				redirect('auth');
			}
		}

	

		public function reg()
		{

// =========================ALAMAT=
$this->load->model('produk_model');
$id_alamat = $this->produk_model->CreateCodeAlamat();
// =========================ALAMAT=

			if ($this->session->userdata('email')){
				redirect('user');
			}
			// rulesnya 
			// ga boleh kosong
			$this->form_validation->set_rules('name','Name', 'required|trim');
			$this->form_validation->set_rules('wa','Wa', 'required|trim');
			$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]', [
				'is_unique' => 'this email has already registered!'
			]);
			$this->form_validation->set_rules('password1','Password', 'required|trim|min_length[3]|matches[password2]',[
				'matches'=>'Password dont match !',
				'min_length'=>'Password too short !']);
			$this->form_validation->set_rules('password2','Password', 'required|trim|matches[password1]');
			$this->form_validation->set_rules('alamat','Alamat','required');
			$this->form_validation->set_rules('provinsi','Provinsi','required');
			$this->form_validation->set_rules('kota','Kota','required');
			$this->form_validation->set_rules('kode_pos','Kode Pos','required');


			

			if($this->form_validation->run() == false)
			{ 
				$data['title'] = 'Donatur Registration';
				$this->load->view('templates/auth_header',$data);
				$this->load->view('auth/reg');
				$this->load->view('templates/auth_footer');
			} else {
				$email = $this->input->post('email', true);
				$data = [
					'name' => htmlspecialchars ($this->input->post('name',true)),
					'wa' => htmlspecialchars ($this->input->post('wa',true)),
					'alamat' => $this->input->post('alamat'),
					'kota' => $this->input->post('kota'),
					'email' => htmlspecialchars ($email),
					'image'=>'default.jpg',
					'password'=> password_hash ( $this->input->post('password1'),PASSWORD_DEFAULT),
					'role_id' => 2,
					'is_active' => 0,
					'date_created'=>time() 
				];
//alamat
				$dataalamat = [ 
					'id_alamat' => $id_alamat,
					'email' => htmlspecialchars ($email),
					'alamat' => $this->input->post('alamat'),
					'provinsi' => $this->input->post('provinsi'),
					'kota' => $this->input->post('kota'),
					'kode_pos' => $this->input->post('kode_pos'),
				 ];

				//siapkan token
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];

				
				 
				$this->db->insert('user',$data);
				$this->db->insert('data_alamat', $dataalamat);
				$this->db->insert('user_token',$user_token);

				//kirim email Aktivasi
				$this->_sendEmail($token,'verify');

				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
				Selamat! Silahkan <b>cek Email</b> untuk <b>Aktifasi</b> </div>'); 
				redirect('auth');
			}
		}

	// ================================================
	public function kota($provinsi){

 
		// RAJA ONGKINR
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=".$provinsi,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"key: f1af0ddefee7ec632633c86601ed584a"
		  ),
		));
		 
		$response = curl_exec($curl);
		$err = curl_error($curl);
		
		curl_close($curl);
		 
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  $kota = json_decode($response,true);
		
		  if ($kota['rajaongkir']['status']['code']=='200'){
			echo "<option value=''>Pilih Kota</option>";
			  foreach ($kota['rajaongkir']['results'] as $kt) {
				  echo "<option value='$kt[city_id]'>$kt[city_name]</option>";
				//   echo "<option value='$kt[city_id]'>$kt[city_name]</option>";
			  }
		  }
		}
		

		// ==========

}
	// ================================================

		private function _sendEmail($token, $type)
		{
			$config = [
				'protocol' =>  'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_user' => 'donasisinergi@gmail.com',
				'smtp_pass' => 'SinergiSubuh020198',
				'smtp_port' => 465,
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'newline' => "\r\n"
			];
			$this->load->library('email',$config);
			$this->email->initialize($config);
			$this->email->from('donasisinergi@gmail.com','donasi sinergi');
			$this->email->to($this->input->post('email'));

			if($type == 'verify')
			{
				$this->email->subject('Akun Verifikasi');
				$this->email->message('Klik link ini untuk Verifikasi Akun : <a href="'.base_url().
				'auth/verify?email='. $this->input->post('email') .
				'&token=' . urlencode($token) .'">Activate</a>');
		} else if ($type == 'forgot') {
				$this->email->subject('Reset Password');
				$this->email->message('Clik this link to Reset your Password : <a href="'.base_url().
				'auth/resetpassword?email='. $this->input->post('email') .
				'&token=' . urlencode($token) .'">Reset Password</a>');
			}
			
			
			if ($this->email->send()){
				return true;
			} else {
				echo $this->email->print_debugger();
				die;	
			}

			
		}

		public function verify() 
		{
			$email = $this->input->get('email');
			$token = $this->input->get('token');

			$user = $this->db->get_where('user',['email' => $email])->row_array();

			if ($user){
				$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
					

					if($user_token){
						if (time() - $user_token['date_created'] < (86400)) {
							$this->db->set('is_active', 1);
							$this->db->where('email', $email);
							$this->db->update('user');

							$this->db->delete('user_token', ['email' => $email]);

							$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
							'.$email.' has been Activated! place Login.</div>');
							redirect('auth');
						}else {

							 $this->db->delete('user',['email' => $email]);
							 $this->db->delete('user_token',['email' => $email]);


							 $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
							 Account Activated failed! Token expired. </div>');
							 redirect('auth');
						} 
					}else {
						$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
						Token invalid! </div>');
						redirect('auth');
					}
			}else {
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
				Account activation failed! wrong email. </div>');
				redirect('auth');
			}
		}

		public function logout()
		{
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('role_id');

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
			You have been logged out ! </div>');
			redirect('auth');
		}

		 public function blocked()
		 {
	 	 $this->load->view('auth/blocked');
		 }

		public function forgotPassword()
		{
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			
			if($this->form_validation->run() == false){
				$data['title']='Forgot Password';
				$this->load->view('templates/auth_header',$data);
				$this->load->view('auth/forgot-password');
				$this->load->view('templates/auth_footer');
			} else {
				$email = $this->input->post('email');
				$user = $this->db->get_where('user', ['email'=> $email, 'is_active' =>1])->row_array();
			
				if($user) {
					$token = base64_encode(random_bytes(32));
					$user_token = [
						'email' => $email,
						'token' => $token,
						'date_created' => time()
					];

					$this->db->insert('user_token', $user_token);
					$this->_sendEmail($token,'forgot');

					$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
					Please check email for reset password </div>');
					redirect('auth/forgotpassword');
				 } else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
					Email not registerd or Activate!. </div>');
					redirect('auth/forgotpassword');
				}
				
			}
		} 
		public function resetPassword()
		{
			$email = $this->input->get('email');
			$token = $this->input->get('token');

			$user = $this->db->get_where('user', ['email' => $email])->row_array();

			if($user){
				$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

				if ($user_token) {
					$this->session->set_userdata('reset_email', $email);
					$this->changePassword();

				}else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
					Reset password failed! Wrong token. </div>');
					redirect('auth');
				}
			}else {
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
				Reset password failed! Wrong email. </div>');
				redirect('auth');
			}
		}


		public function changePassword()
		{
			if (!$this->session->userdata('reset_email')) {
				redirect('auth');
			}

			$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
			$this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');
			if($this->form_validation->run() == false){
				$data['title']='Change Password';
				$this->load->view('templates/auth_header',$data);
				$this->load->view('auth/change-password');
				$this->load->view('templates/auth_footer');			
			} else {
				$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
				$email = $this->session->userdata('reset_email');

				$this->db->set('password', $password);
				$this->db->where('email', $email);
				$this->db->update('user');

				$this->session->unset_userdata('reset_email');

				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
				Password has been changed! Plase login. </div>');
				redirect('auth');
			}
		}
}