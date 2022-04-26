<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
    public function __construct()
	{
	    parent::__construct();
        is_logged_in();
        
        $params = array('server_key' => 'SB-Mid-server-tuEMfQNriMR2vqj4mljWQwUh', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');

        $this->load->helper('time_ago');
    }

    public function index()
    {
        // $server = "localhost";
        // $user = "root";
        // $pass = "";
        // $database = "sinergisubuh";
        // $data['konek']= mysqli_connect($server, $user, $pass, $database) or die (mysqli_error($konek));
 
        
        $data['title'] = 'News';
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array();
        $data['news'] = $this->news_model->tampilNews(); 
        
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data); 
        $this->load->view('templates/topbar',$data);
        $this->load->view('user/index',$data);
        $this->load->view('templates/footer');


        
        // $data['user'] = $this->db->get_where('user',['email' => 
        // $this->session->userdata('email')])->row_array();
        // echo 'Selamat datang '.$data['user']['name'];
    }
 
    public function profil()
    {
        $data['title'] = 'Profil';
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('user/profil',$data);
        $this->load->view('templates/footer');
        // $data['user'] = $this->db->get_where('user',['email' => 
        // $this->session->userdata('email')])->row_array();
        // echo 'Selamat datang '.$data['user']['name'];
    }


    public function profil_alamat()
    {

        $this->load->model('produk_model');
        $id_alamat = $this->produk_model->CreateCodeAlamat();
           //load Model
        //    $this->load->model('produk_model','data_alamat');
                
        $data['data_alamat'] = $this->produk_model->alamat()->result();
        $data['alamat_terima'] = $this->produk_model->alamat_terima()->result(); 
        // $data['alamat_terimaok'] = $this->db->get_where('user',
        // ['email' => $this->session->userdata('email')])
        // ->row_array();
        // $data['data_alamat'] = $this->data_alamat->getDonasi($config['per_page'], $data['start'], $data['keyword']);

        $data['title'] = 'Alamat';
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array();

        $this->form_validation->set_rules('alamat','Alamat','required');
        $this->form_validation->set_rules('provinsi','Provinsi','required');
        $this->form_validation->set_rules('kota','Kota','required');
        $this->form_validation->set_rules('kode_pos','Kode Pos','required');
        
    if($this->form_validation->run() == false) {

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('user/profil_alamat',$data);
        $this->load->view('templates/footer');
        // $data['user'] = $this->db->get_where('user',['email' => 
        // $this->session->userdata('email')])->row_array();
        // echo 'Selamat datang '.$data['user']['name'];
    } else {
        $data = [
           'id_alamat' => $id_alamat,
           'email' => $this->session->userdata('email'),
           'alamat' => $this->input->post('alamat'),
           'provinsi' => $this->input->post('provinsi'),
           'kota' => $this->input->post('kota'),
           'kode_pos' => $this->input->post('kode_pos'),
        ];
           $this->db->insert('data_alamat', $data);
           $this->session->set_flashdata('flash',' Ditambahkan');
           
           redirect('user/profil_alamat');
    }
}



public function ubahAlamatUtama()
    {
        $alamat =$this->input->post('alamat');
        $kota =$this->input->post('kotaTujuan');
        $id =  $this->input->post('id');

        $data = 
        [
            'email'      => $id,
            'alamat'     => $alamat,   
            'kota'     => $kota,   
        ]; 

        $where = array(
        'email' => $id
        );
 
        $this->donasi_model->update_data($where,$data,'user');
        

        $this->session->set_flashdata('flash',' DiUpdate');
        redirect('user/profil_alamat');
        // redirect('user/profil/'.$dns);
        // $this->session->unset_flashdata('flash');
    }

public function ubahAlamatUtamaDetail()
    {
        $alamat =$this->input->post('alamat');
        // $kota =$this->input->post('kota');
        $id =  $this->input->post('id_alamat');

        $data = 
        [
            'id_alamat'      => $id,
            'alamat'     => $alamat,   
            // 'kota'     => $kota,   
        ]; 

        $where = array(
        'id_alamat' => $id
        );
 
        $this->donasi_model->update_data($where,$data,'data_alamat');
        

        $this->session->set_flashdata('flash',' DiUpdate');
        redirect('user/profil_alamat');
        // redirect('user/profil/'.$dns);
        // $this->session->unset_flashdata('flash');
    }


    public function profil_ubahPass()
    {
        $data['title'] = 'Ubah Password';
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array();
        

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('user/profil_ubahPass',$data);
        $this->load->view('templates/footer');
        // $data['user'] = $this->db->get_where('user',['email' => 
        // $this->session->userdata('email')])->row_array();
        // echo 'Selamat datang '.$data['user']['name'];
    }  

    public function profil_poto()
    {
        
        $data['title'] = 'Ubah Profil';
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array();
    
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('user/profil_poto',$data);
            $this->load->view('templates/footer');
        
    }


//  public function hapusAlamat ($id_alamat)
// {
//     $where= array('id_alamat' => $id_alamat);
//     $this->produk_model->hapus_data($where, 'data_alamat');
//     $this->session->set_flashdata('flash',' diHapus');
//     redirect('user/profil_alamat');
// }

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


    
    public function edit()
    {
        
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array(); 
        $data['alamat_terima'] = $this->produk_model->alamat_terima()->result_array(); 
        
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        // $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('wa', 'Nomor Whatsapp', 'required|trim');
        // $this->form_validation->set_rules('wa', 'Nomor Whatsapp', 'required|trim');

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('user/edit',$data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $alamat = $this->input->post('alamat');
            $wa = $this->input->post('wa');
            $email = $this->input->post('email');

            // cek jika ada gambar mo di upload
            $upload_image = $_FILES['image']['name'];

            if($upload_image)
            {
                $config['allowed_types'] = 'gif|jpg|png|JPG|jpeg|PNG';
                $config['max_size'] = '2048';
                $config['encrypt_name']	= TRUE;
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);
 
                if($this->upload->do_upload('image')){
                    $old_image = $data['user']['image'];
                    if($old_image != 'default.jpg')
                    {
                        unlink(FCPATH . 'assets/img/profile'.$old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
 
            }

            // $this->set ('name', $name);
            $this->db->set('name', $name);
            $this->db->set('alamat', $alamat);
            $this->db->set('wa', $wa);
            $this->db->where('email', $email);
            $this->db->update('user');

            // $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
			// Youre profile has been update ! </div>');
            $this->session->set_flashdata('flash',' Diubah !');
			redirect('user/profil');

        }
    }
 
    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password','Current Password','required|trim');
        $this->form_validation->set_rules('new_password1','New Password',
        'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2','Confirm New Password',
        'required|trim|min_length[3]|matches[new_password1]');

        if($this->form_validation->run() == false){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('user/changepassword',$data);
            $this->load->view('templates/footer');
        }else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify ($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                Wrong current Password </div>');
                redirect('user/changepassword');
            }else {
                if($current_password == $new_password){
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                    New Password cannot be the same as </div>');
                    redirect('user/changepassword');
                }else {
                    //password ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                        $this->db->set('password', $password_hash);
                        $this->db->where('email', $this->session->userdata('email'));
                        $this->db->update('user');
                        $this->session->set_flashdata('flash',' Diubah !');
                            redirect('user/changepassword');                   
                }
            }
        }

    }

   

    
    public function belanja()
    {
    //    ================================================================
     
            $this->load->model('produk_model','data_produk');
                
            //load library
            $this->load->library('pagination');

           
            // Search / Ambil data Keyword
                if($this->input->post('submit'))
                {
                    $data['keyword'] = $this->input->post('keyword');
 
                    $this->session->set_userdata('keyword', $data['keyword']);
                } else {
                    $data['keyword'] = $this->session->userdata('keyword');
                }

        $this->db->like('nama_produk', $data['keyword']);
        // $this->db->or_like('keterangan', $data['keyword']);
        $this->db->from('data_produk');
       $config['base_url'] = 'http://localhost/donasi-login/user/belanja'; 
       $config['num_links'] = 3;
       $config['total_rows'] = $this->db->count_all_results();
       $data['total_rows'] = $config['total_rows'];
       $config['per_page'] = 3;

       //initialize
       $this->pagination->initialize($config);

 

       $data['start'] = $this->uri->segment(3);
    //    $data['data_news'] = $this->data_news->getNews($config['per_page'], $data['start'], $data['keyword']);
       $data['produkOk'] = $this->data_produk->tampil_produkOk($config['per_page'], $data['start'])->result();

 
        
    
        $data['title'] = 'Ayo Belanja';
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array();
    
        $data['produk'] = $this->produk_model->tampil_produk()->result(); 

            $this->load->model('produk_model','kategori');
            $data['dataProduk'] = $this->kategori->getdataProduk();
            $data['kategori'] = $this->db->get('produk_kategori')->result_array();
    

        $this->load->view('templates/header',$data);
        //$this->load->view('templates/sidebar',$data);
        $this->load->view('templates/home_topbar',$data);
        $this->load->view('user/belanja',$data);
        $this->load->view('templates/home_footer',$data);
        
    } 
    

    public function batalOrderan ($id_invoice_produk)
{
    $this->load->library('session');
$where= array('id_invoice_produk' => $id_invoice_produk);
$this->produk_model->hapus_data($where, 'tb_pesanan_produk');
$this->produk_model->hapus_data($where, 'tb_invoice_produk');
// $this->session->unmark_flashdata('flash');
// $this->session->set_flashdata('flashHpsPrdk',' diHapus');
$this->session->set_flashdata('flashBatal','dibatalkan');


redirect('user/belanja_masuk');
}

public function batalDonasi ($order_id)
{
    $this->load->library('session');
$where= array('order_id' => $order_id);
// $this->produk_model->hapus_data($where, 'tb_pesanan_produk');
$this->produk_model->hapus_data($where, 'bukti_tf_dns');
// $this->session->unmark_flashdata('flash');
// $this->session->set_flashdata('flashHpsPrdk',' diHapus');
$this->session->set_flashdata('flashBatal','dibatalkan');

redirect('user/donasi_masuk');
}

    public function checkout()
    {
        $data['title'] = 'Checkout';
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array();
    
       // $data['produk'] = $this->produk_model->tampil_produk()->result();

        $this->load->view('templates/header',$data);
        //$this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('user/belanja',$data);
        $this->load->view('templates/home_footer',$data);
        
    }


    // =============== CART Awal ok =================
    public function tambah_keranjang($id)
    {  
        
        $qtyy = $this->input->post('quantity');  
        // $qtty = 1;  
        $qty = $this->input->post('qty_satu'); 
        // $qtyyy = $this->input->post('quantityy'); 
        // $qtty = 1;  
        
        //  var_dump( $qty);
        //  var_dump( $qtyy);
        $barang = $this->produk_model->find($id);

        $data = [
            'id'      => $barang->id_produk,
            'qty'     => $qty+$qtyy,  
            // 'qty'     =>  $barang->$qty, 
            // 'qty'     => $qtyy, 
            'price'   => $barang->harga_jual,
            'name'    => $barang->nama_produk,
            'berat'    => $barang->berat
            //'options' => array('Size' => 'L', 'Color' => 'Red')
            
        ]; 
        

    $this->cart->insert($data);
    $this->session->set_flashdata('flash',' Ditambahkan');
    redirect('user/belanja');
    } 


//  ==========  coba cart
    public function cart()
    {
        $cart['carts'] = $this->cart->contents();
        $cart['total_cart'] = $this->cart->total();

        $ongkir = ($cart['total_cart'] >= get_settings('min_shop_to_free_shipping_cost')) ? 0 : get_settings('shipping_cost');
        $cart['total_price'] = $cart['total_cart'] + $ongkir;

        get_header('Keranjang Belanja');
        get_template_part('user/cart', $cart);
        get_footer();
    }
// =================


    public function detail_keranjang()
    {

        // $data['produk'] = $this->produk_model->ambil_id_produk()->row_array();
        
        $data['ongkir'] ='';
        if(count($_POST)){
          $curl = curl_init();
    
            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=427&destination=".$this->input->post('kota')."&weight=".$this->input->post('berat')."&courier=".$this->input->post('ekspedisi'),
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: f1af0ddefee7ec632633c86601ed584a"
            ),
            )); 
    
            $response = curl_exec($curl);
            $err = curl_error($curl);
    
            curl_close($curl); 
    
            if ($err) {
            echo "cURL Error #:" . $err;
            } else {
             $data['ongkir'] = $response;
            }
    
        } 

        // $penerima=$this->input->post('alamat_penerima');
        // $berat=$this->input->post('berat');
        // $eks=$this->input->post('ekspedisi');
        //  echo var_dump($penerima);
        //  echo var_dump($berat);
        //  echo var_dump($eks);
        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "sinergisubuh";
        $data['konek']= mysqli_connect($server, $user, $pass, $database) or die (mysqli_error($konek));
 
        $data['stok'] = $this->db->get('data_produk')->result_array();
        $data['title'] = 'Keranjang';
        $data['alamat_kirim'] = $this->produk_model->alamat_admin()->result_array();
        $data['alamat_terima'] = $this->produk_model->alamat_terima()->result_array(); 
          
        // $data['jenis_donasi'] = $this->db->get_where('data_produk')->result(); 

        // $data['ambilAlamat'] = $this->produk_model->ambilAlamat()->result_array();
        //  $data['alamat'] = $this->db->get('data_alamat')->result_array();
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array();
        
      

        $this->load->view('templates/header',$data);
        $this->load->view('templates/home_topbar',$data);
        $this->load->view('user/keranjang',$data);
        $this->load->view('templates/footer');

        $action = $this->input->get('action');
        switch ($action)
        {
        case 'remove_item' :
            $rowid = $this->input->post('no');

            $this->cart->remove($rowid);
            
            $total_price = $this->cart->total();
            $ongkir = (int) ($total_price >= get_settings('min_shop_to_free_shipping_cost')) ? 0 : get_settings('shipping_cost');
            $data['code'] = 204;
            $data['message'] = 'Item dihapus dari keranjang';
            $data['total']['subtotal'] = 'Rp '. format_rupiah($total_price);
            // $data['total']['ongkir'] = ($ongkir > 0) ? 'Rp '. format_rupiah($ongkir) : 'Gratis';
            $data['total']['total'] = 'Rp '. format_rupiah($total_price + $ongkir);

            $response = $data;
        break;
    }
    }

    // function deleteCartItem($cart_id)
    // {
    //     $query = "DELETE FROM tbl_cart WHERE id = ?";
        
    //     $params = array(
    //         array(
    //             "param_type" => "i",
    //             "param_value" => $cart_id
    //         )
    //     );
        
    //     $this->updateDB($query, $params);
    // }
 
    public function hapus_prdk_keranjang ($rowid)
    {
        $this->cart->remove($rowid);              
        redirect('user/detail_keranjang');
    }

    // ================= COBA CART !!==============
    public function cart_api()
    {

        
        $action = $this->input->get('action');

        switch ($action)
        {
            case 'add_item' :
                $id = $this->input->post('id');
                $qty = $this->input->post('qty');
                $sku = $this->input->post('sku');
                $name = $this->input->post('name');
                $price = $this->input->post('price');
                
                $item = array(
                    'id' => $id,
                    'qty' => $qty,
                    'price' => $price,
                    'name' => $name
                );
                $this->cart->insert($item);
                $total_item = count($this->cart->contents());

                $response = array('code' => 200, 'message' => 'Item dimasukkan dalam keranjang', 'total_item' => $total_item);
            break;
            case 'display_cart' :
                $carts = [];

                foreach ($this->cart->contents() as $items)
                {
                    $carts[$items['rowid']]['id'] = $items['id'];
                    $carts[$items['rowid']]['name'] = $items['name'];
                    $carts[$items['rowid']]['qty'] = $items['qty'];
                    $carts[$items['rowid']]['price'] = $items['price'];
                    $carts[$items['rowid']]['subtotal'] = $items['subtotal'];
                }

                $response = array('code' => 200, 'carts' => $carts);
            break;
            case 'cart_info' :
                $total_price = $this->cart->total();
                $total_item = count($this->cart->contents());

                $data['total_price']= $total_price;
                $data['total_item'] = $total_item;

                $response['data'] = $data;
            break;
            case 'remove_item' :
                $rowid = $this->input->post('rowid');

                $this->cart->remove($rowid);
                
                $total_price = $this->cart->total();
                $ongkir = (int) ($total_price >= get_settings('min_shop_to_free_shipping_cost')) ? 0 : get_settings('shipping_cost');
                $data['code'] = 204;
                $data['message'] = 'Item dihapus dari keranjang';
                $data['total']['subtotal'] = 'Rp '. format_rupiah($total_price);
                $data['total']['ongkir'] = ($ongkir > 0) ? 'Rp '. format_rupiah($ongkir) : 'Gratis';
                $data['total']['total'] = 'Rp '. format_rupiah($total_price + $ongkir);

                $response = $data;
            break;
        }

        $response = json_encode($response);
        $this->output->set_content_type('application/json')
            ->set_output($response);
    }
// =============================================
    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('user/belanja');
    }

    

    public function pembayaran()
    {
        $data['alamat'] = $this->db->get('data_alamat')->result_array();
        $data['title'] = 'Pembayaran';
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/home_topbar',$data);
        $this->load->view('user/pembayaran',$data);
        $this->load->view('templates/footer');
    }

    public function proses_pesanan()
    { 
        

        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "sinergisubuh";
        $data['konek']= mysqli_connect($server, $user, $pass, $database) or die (mysqli_error($konek));
        $konek= mysqli_connect($server, $user, $pass, $database) or die (mysqli_error($konek));
 


        // ================COBA 
        
        // $ambilDataStok ="select * from data_produk where stok < 0";
         
        
       
                $data['title'] = 'Permintaan Terkirim';
                $data['user'] = $this->db->get_where('user',
                ['email' => $this->session->userdata('email')])
                ->row_array();
                

                // =============================
                foreach ($this->cart->contents() as $item):
                        $id_brg        = $item['id'];
                        $nama_brg      = $item['name'];
                        $qty        = $item['qty'];
                        // return TRUE;
                
                endforeach;
                // ==================================
                // foreach ($this->cart->contents() as $item){
                    // $data =array (
                        // $id_brg         = $this->cart->contents('id');
                        // $item         = $this->cart->contents();
                    
                        // $id_brg         = "PDK00009";
                        // $nama      = $item['name'];
                        // $qty        = $this->cart->contents('qty');
                        // $qty        = $item['qty'];
                    // );
                // }

                // $item = $this->cart->contents();
                //     $id_brg        = "PDK00009";
                    //    $nama_brg      = $item->name;
                        // $qty       = $item->qty;
                    
                        $cekStokSekarang = mysqli_query($konek,"select * from data_produk where id_produk='$id_brg'");
                        $ambilDatanya = mysqli_fetch_array($cekStokSekarang);
                        
                        $stokSekarang = $ambilDatanya['stok'];


                        // if($stokSekarang >= $qty)

$this->db->trans_begin();
                        if($stokSekarang >= $qty)
                        { 
                $is_processed = $this->invoice_model->index(); 
$this->db->trans_commit();
            }else{
                $this->db->trans_rollback();
                echo'
                <script>
                alert("Stok Produk '.$nama_brg.' Ga Cukup");
                window.location.href="detail_keranjang";
                </script>
                ';
            }

                if ($is_processed)
                {         
                $this->cart->destroy();
                $this->load->view('templates/header',$data);
                $this->load->view('templates/home_topbar',$data);
                $this->load->view('user/proses_pesanan',$data);
                $this->load->view('templates/footer');    
                
                redirect('user/belanja_masuk');
                } else {
                    echo "maaf, pesanan anda gagal diproses !!!";
                }
      
       
            // ===============
 
            
    }
 

    
    public function konfirmasiPembayaran()
    {
        date_default_timezone_set('Asia/Jakarta');
        // $id =  10016;
        $id =  $this->input->post('data_id');
        $tgl_bayar =  date('Y-m-d H:i:s');
        $status =  2;
 
        $data = 
        [
            'id_invoice_produk'      => $id,
            'tgl_bayar'     => $tgl_bayar ,   
            'status'     => $status ,   
        ]; 

        $where = array(
        'id_invoice_produk' => $id
        );

        $this->produk_model->update_data($where,$data,'tb_invoice_produk');

        $this->session->set_flashdata('flashBatal',' Sukses Transfer');
        redirect('user/belanja_masuk');
        // $this->session->unset_flashdata('flash');
    } 


    // ============== MIDTRANS =================
    // ============== Token ================= 
    public function token()
    {
		$nama =  $this->input->post('nama');
		$id_invoice_donasi =  $this->input->post('id_invoice_donasi');
		$email =  $this->input->post('email');
		$nama_donasi =  $this->input->post('nama_donasi');
		$nominal =  $this->input->post('nominal');
		$doa =  $this->input->post('doa');
        
		// Required
		$transaction_details = array(
		  'order_id' => rand(),
		  'gross_amount' => $nominal, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
		  'id' => $id_invoice_donasi,
		  'price' => $nominal,
		  'quantity' => 1,
		  'name' => $nama_donasi
		);

		// Optional
		// $item2_details = array(
		//   'id' => 'a2',
		//   'price' => 20000,
		//   'quantity' => 2,
		//   'name' => "SEVEL"
		// );

		// Optional
		$item_details = array ($item1_details);

		// Optional
		$billing_address = array(
		  'first_name'    => "Andri",
		  'last_name'     => "Litani",
		  'address'       => "Mangga 20",
		  'city'          => "Jakarta",
		  'postal_code'   => "16602",
		  'phone'         => "081122334455",
		  'country_code'  => 'IDN'
		);

		// Optional
		$shipping_address = array(
		  'first_name'    => "Obet",
		  'last_name'     => "Supriadi",
		  'address'       => "Manggis 90",
		  'city'          => "Jakarta",
		  'postal_code'   => "16601",
		  'phone'         => "08113366345",
		  'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
		  'first_name'    => $nama,
		//   'last_name'     => "Litani",
		  'email'         => $email,
		//   'phone'         => $doa,
		//   'billing_address'  => $billing_address,
		//   'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'minute', 
            'duration'  => 2
        );
         
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
    }
    // ============== Token =================
     
    public function finish()
    {
        
		$nama =  $this->input->post('name');
		$email =  $this->input->post('email');
		$nama_donasi =  $this->input->post('nama_donasi');
		$nominal =  $this->input->post('nominal_donasi');
		$pesan =  $this->input->post('pesan');
		$id_donasi =  $this->input->post('id_donasi');
		$status_dns =  1;


    	$result = json_decode($this->input->post('result_data'),true);
    	// var_dump($result);
        // die;
    	// echo $result['status_code'];
$data = [
    'order_id' => $result['order_id'],
    'id_donasi' => $id_donasi,
    'email' => $email,
    'name' => $nama,
    'nama_donasi' => $nama_donasi,
    'nominal' => $nominal,
    'pesan' => $pesan,
    'gross_amount' => $result['gross_amount'],
    'payment_type' => $result['payment_type'],
    'transaction_time' => $result['transaction_time'],
    'bank' => $result['va_numbers'][0]["bank"],
    'va_number' => $result['va_numbers'][0]["va_number"], 
    // 'va_number' => $result['va_number'],
    'pdf_url' => $result['pdf_url'],
    'status_code' => $result['status_code'],
    'status_dns' => $status_dns,
];
$simpan = $this->db->insert('bukti_tf_dns',$data);
if($simpan){
    // echo "sukses";
    redirect('user/donasi_masuk');
}else
echo "gagal";
    }
      // ============== MIDTRANS =================
    

      // ============== MIDTRANS BELANJA  =================
    // ============== Token =================
    public function token_buy()
    {
//     // ================COBA 
//         $server = "localhost";
//         $user = "root";
//         $pass = "";
//         $database = "sinergisubuh";
//         $data['konek']= mysqli_connect($server, $user, $pass, $database) or die (mysqli_error($konek));
//         $konek= mysqli_connect($server, $user, $pass, $database) or die (mysqli_error($konek));
        
       
//                 $data['title'] = 'Permintaan Terkirim';
//                 $data['user'] = $this->db->get_where('user',
//                 ['email' => $this->session->userdata('email')])
//                 ->row_array();
                

//                 // =============================
//                 foreach ($this->cart->contents() as $item):
//                         $id_brg        = $item['id'];
//                         $nama_brg      = $item['name'];
//                         $qty        = $item['qty'];
//                         // return TRUE;
                
//                 endforeach;
              
                    
//                         $cekStokSekarang = mysqli_query($konek,"select * from data_produk where id_produk='$id_brg'");
//                         $ambilDatanya = mysqli_fetch_array($cekStokSekarang);
                        
//                         $stokSekarang = $ambilDatanya['stok'];


//                         // if($stokSekarang >= $qty)

// $this->db->trans_begin();
//                         if($stokSekarang >= $qty)
//                         { 
                            $email =$this->input->post('email');
        $nama =$this->input->post('nama');
        $alamat =$this->input->post('alamat');
        $wa =$this->input->post('wa');
        $ekspedisi =$this->input->post('ekspedisi');
        $ongkir =$this->input->post('ongkos_kirim_fiks');
        $bayar =$this->input->post('total_bayar_fiks');
        
                // $is_processed = $this->invoice_model->checkout();
                // $is_processed = $this->invoice_model->checkout($email,$nama,$alamat,$wa,$ekspedisi,$ongkir,$bayar);
                // ===================== 
                 // Required
        $transaction_details = array(
            'order_id' => rand(),
            'gross_amount' => $bayar, // no decimal allowed for creditcard
          );
  
          // Optional
          $item1_details = array(
            'id' => $email,
            'price' => $bayar,
            'quantity' => 1,
            'name' => "[Total Tagihan Pembayaran]"
          );
  
         
          $item_details = array ($item1_details);
    
          // Optional
          $customer_details = array(
            'first_name'    => $nama,
            'email'         => $email,
            'phone'         => $wa,
          );
  
          $credit_card['secure'] = true;
         
          $time = time();
          $custom_expiry = array(
              'start_time' => date("Y-m-d H:i:s O",$time),
              'unit' => 'minute', 
              'duration'  => 2
          );
           
          $transaction_data = array(
              'transaction_details'=> $transaction_details,
              'item_details'       => $item_details,
              'customer_details'   => $customer_details,
              'credit_card'        => $credit_card,
              'expiry'             => $custom_expiry
          );
  
          error_log(json_encode($transaction_data));
          $snapToken = $this->midtrans->getSnapToken($transaction_data);
          error_log($snapToken);
          echo $snapToken;
                // ===================== 
// $this->db->trans_commit();
//             }else{
//                 $this->db->trans_rollback();
//                 echo'
//                 <script>
//                 alert("Stok Produk '.$nama_brg.' Ga Cukup");
//                 window.location.href="detail_keranjang";
//                 </script>
//                 ';
//             }

//                 if ($is_processed)
//                 {         
//                 $this->cart->destroy();
//                 $this->load->view('templates/header',$data);
//                 $this->load->view('templates/home_topbar',$data);
//                 $this->load->view('user/proses_pesanan',$data);
//                 $this->load->view('templates/footer');    
                
//                 redirect('user/belanja_masuk');
//                 } else {
//                     echo "maaf, pesanan anda gagal diproses !!!";
//                 }
      
       
            // ===============
         // _____________________________


		
    }
    // ============== Token =================
     
    public function finish_buy()
    {
        // ================COBA 
        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "sinergisubuh";
        $data['konek']= mysqli_connect($server, $user, $pass, $database) or die (mysqli_error($konek));
        $konek= mysqli_connect($server, $user, $pass, $database) or die (mysqli_error($konek));
        
       
                $data['title'] = 'Permintaan Terkirim';
                $data['user'] = $this->db->get_where('user',
                ['email' => $this->session->userdata('email')])
                ->row_array();
                

                // =============================
                foreach ($this->cart->contents() as $item):
                        $id_brg        = $item['id'];
                        $nama_brg      = $item['name'];
                        $qty        = $item['qty'];
                        // return TRUE;
                
                endforeach;
              
                    
                        $cekStokSekarang = mysqli_query($konek,"select * from data_produk where id_produk='$id_brg'");
                        $ambilDatanya = mysqli_fetch_array($cekStokSekarang);
                        
                        $stokSekarang = $ambilDatanya['stok'];


                        // if($stokSekarang >= $qty)

// $this->db->trans_begin();
                        if($stokSekarang >= $qty)
                        { 
                                                // $is_processed = $this->invoice_model->selesai();
                                                // ==============================
                                        $email =$this->input->post('email');
                                        $nama =$this->input->post('nama');
                                        $alamat =$this->input->post('alamat');
                                        $wa =$this->input->post('wa');
                                        $ekspedisi_fiks =$this->input->post('ekspedisi_fiks');
                                        $ongkir =$this->input->post('ongkos_kirim_fiks');
                                        // $bayar =$this->input->post('total_bayar_fiks');


                                    $result = json_decode($this->input->post('result_data'),true);
                                    // $id_invoice_produk = 
                                // var_dump($result);
                                //         die;
                                        // echo $result['status_code'];
                                $data = [
                                'id_invoice_produk' => $result['order_id'],
                                // 'id_donasi' => $id_donasi,
                                'email' => $email,
                                'nama' => $nama,
                                'alamat' => $alamat,
                                'wa' => $wa,
                                'ekspedisi' => $ekspedisi_fiks,
                                'ongkir' => $ongkir,

                                'noResi' => "0",

                                'gross_amount' => $result['gross_amount'],
                                'payment_type' => $result['payment_type'],
                                'transaction_time' => $result['transaction_time'],
                                'bank' => $result['va_numbers'][0]["bank"],
                                'va_number' => $result['va_numbers'][0]["va_number"], 
                                // 'va_number' => $result['va_number'],
                                'pdf_url' => $result['pdf_url'],
                                'status_code' => $result['status_code'],
                                ];
                                $simpan = $this->db->insert('tb_invoice_produk',$data);
                                $id_invoice_produkOk = $this->db->insert_id();

                                foreach ($this->cart->contents() as $item){
                                    $data =array (
                                        // 'id'    => $idDet,
                                        'id_invoice_produk'    => $id_invoice_produkOk,
                                        'id_brg'        => $item['id'],
                                        'nama_brg'      => $item['name'],
                                        'jumlah'        => $item['qty'],
                                        // 'ekspedisi'        => $ekspedisi,
                                    
                                        // 'harga'         => $total_bayar_fiks,
                                        'tgl_pesan' => date('Y-m-d H:i:s'),
                                        'harga'         => $item['price'], 
                                    );
                                    $this->db->insert('tb_pesanan_produk', $data);
                                } 
                                // return TRUE;

                            }else{
                                $this->db->trans_rollback();
                                echo'
                                <script>
                                alert("Stok Produk '.$nama_brg.' Ga Cukup");
                                window.location.href="detail_keranjang";
                                </script>
                                ';
                            }
                
                                if ($simpan)
                                {         
                                $this->cart->destroy();
                                $this->load->view('templates/header',$data);
                                $this->load->view('templates/home_topbar',$data);
                                $this->load->view('user/proses_pesanan',$data);
                                $this->load->view('templates/footer');    
                                
                                redirect('user/belanja_masuk');
                                } else {
                                    echo "maaf, pesanan anda gagal diproses !!!";
                                }

// if($simpan){
// echo "sukses";
// redirect('user/belanja_masuk');
// }else
// echo "gagal"; 
//                 // ============================== 
// $this->db->trans_commit();
//             }else{
//                 $this->db->trans_rollback();
//                 echo'
//                 <script>
//                 alert("Stok Produk '.$nama_brg.' Ga Cukup");
//                 window.location.href="detail_keranjang";
//                 </script>
//                 ';
            // }

            //     if ($simpan)
            //     {         
            //     $this->cart->destroy();
            //     $this->load->view('templates/header',$data);
            //     $this->load->view('templates/home_topbar',$data);
            //     $this->load->view('user/belanja_masuk',$data);
            //     $this->load->view('templates/footer');    
                
            //     redirect('user/belanja_masuk');
            //     } else {
            //         echo "maaf, pesanan anda gagal diproses !!!";
            //     }
      
       
            // ===============
         // _____________________________


    }
      // ============== MIDTRANS BELANJA =================
    
    public function konfirmasiPembayaranDonasi()
    {
        $id =  $this->input->post('data_id');
        $status =  1;
 
        $data = 
        [
            'id_invoice_donasi'      => $id,
            'status'     => $status,   
        ]; 

        $where = array(
        'id_invoice_donasi' => $id
        );

        $this->produk_model->update_data($where,$data,'tb_invoice_donasi');
        $this->session->set_flashdata('flashBatal',' Sukses Transfer');
        redirect('user/donasi_masuk');
        // $this->session->unset_flashdata('flash');
    }



    public function detail($id_produk)
    {
        $data['title'] = 'Detail Produk';
        $data['barang'] = $this->produk_model->detail_produk($id_produk);
        
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/home_topbar',$data);
            $this->load->view('user/detail_produk', $data);
            $this->load->view('templates/footer'); 
    }

    // ===================kategori=======================
    public function elektronik()
    {
        $data['title'] = 'Produk Elektronik';
        $data['elektronik'] = $this->kategori_model->data_elektronik()->result();
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/home_topbar', $data);
        $this->load->view('user/elektronik', $data);
        $this->load->view('templates/footer');
    }

    public function fashion()
    {
        $data['title'] = 'Produk Fashion';
        $data['fashion'] = $this->kategori_model->data_fashion()->result();
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/home_topbar', $data);
        $this->load->view('user/fashion', $data);
        $this->load->view('templates/footer');
    }

    public function merchant()
    {
        $data['title'] = 'Produk Merchant';
        $data['merchant'] = $this->kategori_model->data_merchant()->result();
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/home_topbar', $data);
        $this->load->view('user/merchant', $data);
        $this->load->view('templates/footer');
    }

    public function makanan()
    {
        $data['title'] = 'Produk Makanan';
        $data['makanan'] = $this->kategori_model->data_makanan()->result();
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array();

        $this->load->model('produk_model','kategori');
            $data['dataProduk'] = $this->kategori->getdataProduk();
            $data['kategori'] = $this->db->get('produk_kategori')->result_array();
    

        $this->load->view('templates/header',$data);
        $this->load->view('templates/home_topbar', $data);
        $this->load->view('user/makanan', $data);
        $this->load->view('templates/footer');
    }

    public function history()
    {
        // $data['invoice'] = $this->invoice_model->ambil_id_invoice($id_invoice);

                    //load Model
                    $this->load->model('invoice_model','invoice_model');
                
                    //load library
                    $this->load->library('pagination');
    
                
                // Search / Ambil data Keyword
                    // if($this->input->post('submit'))
                    // {
                    //     $data['keyword'] = $this->input->post('keyword');
    
                    //     $this->session->set_userdata('keyword', $data['keyword']);
                    // } else {
                    //     $data['keyword'] = $this->session->userdata('keyword');
                    // }
                // ====================================== 
    
                // $this->db->from('tb_invoice_produk');
                $this->db->from('tb_invoice_produk'); 
                $config['base_url'] = 'http://localhost/donasi-login/user/riwayat_belanja';
                $config['num_links'] = 5;
                $config['total_rows'] = $this->db->count_all_results();
                // $config['total_rows'] = $this->kategori_model->riwayat_belanja_costumer()->count_all_results(); 
                // $config['total_rows'] = $this->db->$this->session->userdata('email')->count_all_results(); 
                $data['total_rows'] = $config['total_rows']; 
                 $config['per_page'] = 3;
    
                //initialize
                $this->pagination->initialize($config);
    
    
     
                $data['start'] = $this->uri->segment(3);
                // $data['data_produk'] = $this->data_produk->getdataProduk($config['per_page'],$data['start'], $data['keyword']);
                $data['tb_invoice_produk'] = $this->invoice_model->getPesanan($config['per_page'], $data['start'], ); // $data['keyword']
  
                
        $data['title'] = 'History';
        $data['riwayat_belanja'] = $this->kategori_model->riwayat_belanja_costumer()->result(); 
        $data['riwayat_donasi'] = $this->kategori_model->riwayat_donasi_donatur()->result(); 
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array(); 
        // $a=1;
        // ============ BELUM BERHASIL ===========
        // $proses= $this->input->post('status');
        // $id =13;
        // Var_dump($id);
        // Var_dump($proses);
// var_dump($proses);
// $this->form_validation->set_rules('required');

// if($this->form_validation->run() == false) {
        // $data['riwayat_belanja'] = $this->invoice_model->tampil_data();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data); 
        $this->load->view('user/history',$data);
        $this->load->view('templates/footer');

//     } else {

        // $data = [    
            
            //  'status' => $proses
            //     ];

            //     $where = [

            //         'id' => $id
            //     ];
            //             $this->produk_model->update_data($where,$data,'tb_invoice_produk');
                
// $this->db->update('tb_invoice_produk', $data);
 
             
$this->session->set_flashdata('flash',' Ditambahkan');
// $this->session->unset_flashdata('flash');
// redirect('user/riwayat_belanja');
    } 


    public function belanja_masuk() 
    { 

        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "sinergisubuh";
        $data['konek']= mysqli_connect($server, $user, $pass, $database) or die (mysqli_error($konek));
 
                 
        $data['title'] = 'Belanja Pending';
        $data['riwayat_belanja'] = $this->kategori_model->riwayat_belanja_costumer()->result(); 
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array();
        $data['orderanMasukBaru'] = $this->invoice_model->Orderan_costumer()->result();
        $data['orderanMasukBaruTf'] = $this->invoice_model->Orderan_costumer_tf()->result();
        $data['orderanMasukBaru_proses'] = $this->invoice_model->Orderan_costumer_proses()->result();
        // $data['orderanMasukBaru'] = $this->invoice_model->Orderan()->result();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data); 
        $this->load->view('user/belanja_masuk',$data);
        $this->load->view('templates/footer');

$this->session->set_flashdata('flash',' Ditambahkan');

    }
 
 
    public function donasi_masuk()
    {
                 
        $data['title'] = 'Donasi Pending';
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array();
        // $data['riwayat_belanja'] = $this->kategori_model->riwayat_belanja_costumer()->result(); 
        $data['donasiMasukBaru'] = $this->invoice_model->donasi_donatur()->result(); 
        $data['donasiMasukBaruTF'] = $this->invoice_model->donasi_donaturTF()->result();  
        // $data['orderanMasukBaru'] = $this->invoice_model->Orderan()->result();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data); 
        $this->load->view('user/donasi_masuk',$data);
        $this->load->view('templates/footer');

$this->session->set_flashdata('flash',' Ditambahkan');

    }


    public function riwayat_donasi()
    {
                    //load Model
                    $this->load->model('invoice_model','tb_invoice_produk');
                
                    //load library
                    $this->load->library('pagination');
    
               $this->db->from('tb_invoice_produk'); 
                $config['base_url'] = 'http://localhost/donasi-login/user/riwayat_donasi';
                $config['num_links'] = 5;
                $config['total_rows'] = $this->db->count_all_results();
                $data['total_rows'] = $config['total_rows']; 
                 $config['per_page'] = 3;
    
                //initialize
                $this->pagination->initialize($config);
    
    
     
                $data['start'] = $this->uri->segment(3);
                // $data['data_produk'] = $this->data_produk->getdataProduk($config['per_page'],$data['start'], $data['keyword']);
                $data['tb_invoice_produk'] = $this->tb_invoice_produk->getPesanan($config['per_page'], $data['start'], ); // $data['keyword']

                
        $data['title'] = 'Riwayat Donasi';
        $data['riwayat_donasi'] = $this->kategori_model->riwayat_donasi_donatur()->result(); 
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data); 
        $this->load->view('user/riwayat_donasi',$data);
        $this->load->view('templates/footer');

$this->session->set_flashdata('flash',' Ditambahkan');
}
    
 
  
    
        public function detail_riwayat_belanja($id_invoice_produk)
        {
            $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "sinergisubuh";
        $data['konek']= mysqli_connect($server, $user, $pass, $database) or die (mysqli_error($konek));
        
            $data['invoice'] = $this->invoice_model->ambil_id_invoice($id_invoice_produk);
            $data['pesanan'] = $this->invoice_model->ambil_id_pesanan($id_invoice_produk);  
            $data['orderanMasukBaru'] = $this->invoice_model->Orderan_costumer()->result();
            
            $data['title'] = 'Detail Belanja';
            $data['user'] = $this->db->get_where('user',
            ['email' => $this->session->userdata('email')])
            ->row_array(); 
            $data['stok']  = $this->db->get_where('data_produk')->row_array();
    
            // $data['invoice'] = $this->invoice_model->tampil_data();
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('user/detail_riwayat_belanja',$data);
            $this->load->view('templates/footer');
        }
    
    
    // ========== DONASI 

    public function berdonasi()
    {
        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "sinergisubuh";
        $data['konek']= mysqli_connect($server, $user, $pass, $database) or die (mysqli_error($konek));
 
        // $this->load->model('donasi_model','nama_donasi');

        // $data['nama_donasi'] = $this->db->get_where('data_donasi',['nama_donasi' => $this->session->userdata('nama_donasi')])->row_array();

      //  $this->load->model('donasi_model');
          //$this->load->model('donasi_model');
         
        $data['title'] = 'Ayo Berdonasi';
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array();
        $data['news'] = $this->news_model->tampilNews(); 
        
        //load Model
            $this->load->model('donasi_model','kategori'); 

                 
            $data['DonasiAkumulasi'] = $this->kategori->DonasiPending()->result();  
            
        $data['dataDonasi'] = $this->kategori->getdataDonasi();
        //$data['tampilDonasi'] = $this->kategori->tampilDonasi();
        $data['kategori'] = $this->db->get('donasi_kategori')->result_array();
//pr
        $data['sesiDonasi'] = $this->db->get('data_donasi')->row_array();
       // $where = array ('id_donasi' => $id_donasi);
       //  $data['sesiDonasi'] = $this->donasi_model->tampil_poto($where, 'data_donasi')->result();
// PR
        $data['donasi'] = $this->donasi_model->tampilDonasiAktif()->result();  
        $data['news'] = $this->news_model->tampilNews(); 
        $this->load->view('templates/home_header',$data); 
        $this->load->view('templates/home_topbar',$data);
        $this->load->view('user/berdonasi',$data);
        $this->load->view('templates/home_footer',$data);
        // $data['user'] = $this->db->get_where('user',['email' => 
        // $this->session->userdata('email')])->row_array();
        // echo 'Selamat datang '.$data['user']['name'];
    }
 

    public function detail_donasi($id_donasi)
    {

        $data['title'] = 'Detail Donasi';
        $data['donasi'] = $this->donasi_model->detail_donasi($id_donasi);
        // $data['kondisi'] = if ($brg->status = "1") {echo "Aktif";}
        
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array();
            $this->load->view('templates/header',$data);
            $this->load->view('templates/home_topbar',$data);
            $this->load->view('user/detail_donasi', $data);
            $this->load->view('templates/footer'); 

    }

    public function pembayaran_donasi($id_donasi) 
    {

             //load Model
            //  $this->load->model('donasi_model','data_donasi');
                
             //load library
            //  $this->load->library('pagination');
  
         
         // Search / Ambil data Keyword
            //  if($this->input->post('submit'))
            //  {
            //      $data['keyword'] = $this->input->post('keyword');
  
            //      $this->session->set_userdata('keyword', $data['keyword']);
            //  } else {
            //      $data['keyword'] = $this->session->userdata('keyword');
            //  }
        //  $this->db->from('tb_invoice_donasi'); 
        //  $config['base_url'] = 'http://localhost/donasi-login/user/pembayaran_donasi/';
        //  $config['num_links'] = 5;
        //  $config['total_rows'] = $this->db->count_all_results();
        //  $data['total_rows'] = $config['total_rows']; 
       
    //   $config['per_page'] = 5;
    //      $this->pagination->initialize($config);
  
  
   
        //  $data['start'] = $this->uri->segment(4); 
  
         $data['donatur_'] = $this->donasi_model->getDonaturDonasi($id_donasi);
         $data['totalDonatur_'] = $this->donasi_model->getDonaturDonasiJum($id_donasi);
        //  $data['totalDonatur_']= $this->db->where('id_donasi',$id_donasi)->get('tb_invoice_donasi')->num_rows();
        //  $data['totalDonatur_']= $this->db->where('id_donasi',$id_donasi)->get('tb_invoice_donasi',array('status' => 1))->result();
        //  $data['totalDonatur_']= $this->donasi_model->DonasiPending()->result();
        //  $data['DonasiAkumulasi'] = $this->kategori->DonasiPending()->result(); 


        $data['title'] = 'Pembayaran Donasi';
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array();
        $data['jenis_donasi'] = $this->db->get_where('data_donasi',
        ['id_donasi' =>  $this->uri->segment(3)])
        ->row_array(); 
        $data['donasi'] = $this->donasi_model->detail_donasi($id_donasi);
       
       
 
        $this->load->view('templates/header',$data);
        $this->load->view('templates/home_topbar',$data);
        $this->load->view('user/pembayaran_donasi',$data);
        $this->load->view('templates/footer'); 
    }

    public function proses_donasi()
    {
        $data['title'] = 'Pembayaran Donasi';
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array();
        $data['donatur'] = $this->donasi_model->tampilDonatur()->row_array(); 
        // $data['donatur'] = $this->donasi_model->tampilPembayaran()->result(); 
          
        $is_processed = $this->invoice_model->index_donasi();    
            if ($is_processed)
            {        
            // $this->cart->destroy();
            $this->load->view('templates/header',$data);
            $this->load->view('templates/home_topbar',$data);
            $this->load->view('user/proses_donasi',$data);
            $this->load->view('templates/footer');   
            redirect('user/donasi_masuk');
            
            } else {
                echo "maaf, pesanan anda gagal diproses !!!";
            }
    }

    // public function pembayaran_donasi()
    // {
    //     $data['user'] = $this->db->get_where('user',
    //     ['email' => $this->session->userdata('email')])
    //     ->row_array();

    //     $data['donasi'] = $this->donasi_model->detail_donasi($id_donasi);

    //     $this->load->view('templates/header');
    //     $this->load->view('templates/home_topbar',$data);
    //     $this->load->view('user/pembayaran',$data);
    //     $this->load->view('templates/footer');
    // }

// ================== MASTER BELANJA ==========================
    public function konfirmasi_tf($id_invoice)
    {
        $data['invoice'] = $this->invoice_model->ambil_id_invoice($id_invoice);
        $data['pesanan'] = $this->invoice_model->ambil_id_pesanan($id_invoice);

        $data['title'] = 'Konfirmasi Transfer';
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array(); 

        // $data['invoice'] = $this->invoice_model->tampil_data();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('user/konfirmasi_tf',$data);
        $this->load->view('templates/footer');
    }

//======================UPDATE PRODUK TEST 2 ==================================
public function updateProduk(){


$id =$this->input->post('id_produk');
$nama_produk =$this->input->post('nama_produk');
$keterangan =$this->input->post('keterangan');
// $kategori_produk =$this->input->post('kategori_produk');
$harga_beli =$this->input->post('harga_beli');
$harga_jual =$this->input->post('harga_jual');
$stok =$this->input->post('stok');
// $gambar =$upload_imageBaru;
// $gambar =$this->input->post('gambar');


$data = array (
'nama_produk' => $this->input->post('nama_produk'),
'keterangan' =>$this->input->post('keterangan'),
'harga_beli' =>$this->input->post('harga_beli'),
'harga_jual' =>$this->input->post('harga_jual'),
'stok' =>$this->input->post('stok'),
// 'gambar' =>$this->input->post('gambar'),

);
$where = array(
'id_produk' => $id
);

$this->produk_model->update_data($where,$data,'data_produk');

$this->session->set_flashdata('flash',' DiUpdate');
redirect('admin/dataProduk');
$this->session->unset_flashdata('flash');
}
// ================================================================

public function news($kd_news) 
{
    $data['kdNews'] =  $this->invoice_model->ambil_kd_news($kd_news);
    $data['pilihanNews'] = $this->news_model->ambil_kd_news($kd_news);
    // $data['pesanan'] = $this->invoice_model->ambil_id_pesanan($id_invoice);
    $data['news'] = $this->news_model->tampilNews(); 
    $data['komentar'] = $this->news_model->tampilKomenNews();  

    $data['getIDkomentar'] = $this->input->post('getIDkomentar'); 

    $data['title'] = 'News';
    $data['user'] = $this->db->get_where('user',
    ['email' => $this->session->userdata('email')])
    ->row_array(); 

    // $data['invoice'] = $this->invoice_model->tampil_data();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/sidebar',$data);
    $this->load->view('templates/topbar',$data);
    $this->load->view('user/news',$data);
    $this->load->view('templates/footer'); 
} 

public function komentarNews() 
{ 
    // date_default_timezone_set('Asia/Jakarta');
    $kd_news =$this->input->post('data_kd');
    
 
    $data = [
        'kd_news' => $kd_news,    
       'komentar' => $this->input->post('komentar'),
       'email' => $this->input->post('email'),
       'name' => $this->input->post('name'),
       'image' => $this->input->post('image'),
       'tgl_komen' => date('Y-m-d H:i:s'),
   ];
  
$this->db->insert('data_komentar', $data);
   
$this->session->set_flashdata('flash',' Ditambahkan');
redirect('user/news/'.$kd_news);
}

 
public function balaskomentarNews() 
{ 
    // date_default_timezone_set('Asia/Jakarta');
    // $id_komentar =$this->input->post('data_id');
    $id_komentar =$this->input->post('data_id');
    $kd_news =$this->input->post('data_kd');
    $data = [
        'status_komen' => $id_komentar,    
       'kd_news' => $kd_news,
       'email' => $this->input->post('email'),
       'name' => $this->input->post('name'),
       'image' => $this->input->post('image'),
       'komentar' => $this->input->post('balasan'),
       'tgl_komen' => date('Y-m-d H:i:s'),
   ];
  
$this->db->insert('data_komentar', $data);
   
$this->session->set_flashdata('flash',' Ditambahkan');
redirect('user/news/'.$kd_news);
}


}