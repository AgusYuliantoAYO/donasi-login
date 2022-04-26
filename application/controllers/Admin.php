<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{  
    public function __construct()
	{
        parent::__construct();
      //  $this->load->library('session');
        //$this->load->model('MdlDonasi');

        // parent::__construct();
        is_logged_in();
    //    $this->model_upload = new UploadModel();
    }
     
    public function index()
    {
        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "sinergisubuh";
        $data['konek']= mysqli_connect($server, $user, $pass, $database) or die (mysqli_error($konek));

           //load Model
           $this->load->model('donasi_model','data_donasi');
                
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
       // ======================================

       //   pagination
    //    $this->db->like('nama_donasi', $data['keyword']);
       // $this->db->or_like('kategori_donasi', $data['keyword']);
    //    $result = $this->db->get_where('user_access_menu', $data);
 
       $this->db->from('tb_invoice_donasi');
       $config['base_url'] = 'http://localhost/donasi-login/admin/index';
       $config['num_links'] = 5;
       $config['total_rows'] = $this->db->count_all_results();
       $data['total_rows'] = $config['total_rows']; 
     
    //    $config['per_page_'] = 4;
    //    $config['per_page'] = $this->input->post('per_page');
       $config['per_page'] = 5;
    //    $config['per_page'] = 2;

       //initialize
       $this->pagination->initialize($config);


 
    //    $data['start_'] = $this->uri->segment(3);
       $data['start'] = $this->uri->segment(3);
 
       $data['donatur_'] = $this->data_donasi->getDonatur($config['per_page'], $data['start'], $data['keyword']);
    //    $data['donatur_'] = $this->data_donasi->getDonatur()->result();
    //    $data['donasi'] = $this->data_donasi->getDonasi($config['per_page'], $data['keyword']);
       $data['donasi'] = $this->data_donasi->tampilDonasiAktif()->result();  
       $data['donasiPending'] = $this->data_donasi->DonasiPending()->result();  
    //    $data['donasiTotal'] = $this->data_donasi->DonasiTotal()->result();  
 
        

        
  
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array();
        // $data['donasi'] = $this->donasi_model->tampilDonasi()->result(); 
        // $data['donatur'] = $this->donasi_model->tampilDonatur()->result(); 
        $data['jenis_donasi'] = $this->db->get_where('data_donasi')
        ->result();
        

        

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/index',$data);
        $this->load->view('templates/footer');
    }


    public function campaignStatus()
    {
        
        // $id =$this->input->post('id_donasi');
        $status =$this->input->post('status');

        $dns =  $this->input->post('id_donasi');

     


        $data = 
        [
            'id_donasi'      => $dns,
            'status'     => $status,   
        ]; 

        // $data = array (
        //     $barang->id_produk,
        // 'status' =>$this->input->post('status'),

        // );

        $where = array(
        'id_donasi' => $dns
        );

        $this->donasi_model->update_data($where,$data,'data_donasi');

        $this->session->set_flashdata('flash',' DiUpdate');
        redirect('admin');
        $this->session->unset_flashdata('flash');
    }

    public function produkStatus()
    {
        
        // $id =$this->input->post('id_donasi');
        $status =$this->input->post('status');

        $dns =  $this->input->post('id_produk');

     


        $data = 
        [
            'id_produk'      => $dns,
            'status'     => $status,   
        ]; 

        // $data = array (
        //     $barang->id_produk,
        // 'status' =>$this->input->post('status'),

        // );

        $where = array(
        'id_produk' => $dns
        );

        $this->produk_model->update_data($where,$data,'data_produk');

        $this->session->set_flashdata('flash',' DiUpdate');
        redirect('admin/dataproduk');
        $this->session->unset_flashdata('flash');
    }

    public function konfirmasiTerimaOrderan()
    {
        // date_default_timezone_set('Asia/Jakarta');
        // $id =  10016;
        $id =  $this->input->post('data_id');
        // $noResi =  $this->input->post('noResi');
        $status =  1;
 
        $data = 
        [
            'id_invoice_produk'      => $id,
            // 'noResi'     => $noResi ,   
            'status'     => $status ,   
        ];  

        $where = array(
        'id_invoice_produk' => $id
        );
 
        $this->produk_model->update_data($where,$data,'tb_invoice_produk');

        $this->session->set_flashdata('flashTolak',' Sukses Konfirmasi Kirim Produk');
        redirect('admin/orderanMasuk');
        // $this->session->unset_flashdata('flash');
    }

    public function konfirmasiPengirimanProduk()
    {
        date_default_timezone_set('Asia/Jakarta');
        // $id =  10016;
        $id =  $this->input->post('data_id');
        $noResi =  $this->input->post('noResi');
        $status =  202; //DIKIRiM
 
        $data = 
        [
            'id_invoice_produk'      => $id,
            'noResi'     => $noResi ,   
            'status_code'     => $status ,     
        ]; 

        $where = array(
        'id_invoice_produk' => $id
        );
 
        $this->produk_model->update_data($where,$data,'tb_invoice_produk');

        $this->session->set_flashdata('flashTolak',' Sukses Konfirmasi Kirim Produk');
        redirect('admin/orderanMasuk');
        // $this->session->unset_flashdata('flash');
    }
 

    public function ubahTglCpgn()
    {
        
        // $id =$this->input->post('id_donasi');
        // $masa =$this->input->post('masa_donasi_update');
        $masa =$this->input->post('masa_donasi_update');
        $dns =  $this->input->post('data_id');

        $data = 
        [
            'id_donasi'      => $dns,
            'masa_donasi'     => $masa,   
        ]; 

        $where = array(
        'id_donasi' => $dns
        ); 
  
        $this->donasi_model->update_data($where,$data,'data_donasi');

        $this->session->set_flashdata('flash',' DiUpdate');
        redirect('admin/editDonasi/'.$dns);
        // $this->session->unset_flashdata('flash');
    }




    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array();
        
        $this->load->model('menu_model','menu');
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        $data['subMenu'] = $this->menu->getSubMenu();

        $this->form_validation->set_rules('role','Role','required');
        if ($this->form_validation->run() == false){
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/role',$data);
        $this->load->view('templates/footer');
    } else {
        $this->db->insert('user_role',['role' => $this->input->post('role')]);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                 Menu added </div>'); redirect('admin/role');
         }

        
    }



   
    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array();

        $data['role'] = $this->db->get_where('user_role',['id' => $role_id])
        ->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/role-access',$data);
        $this->load->view('templates/footer');
        
    }
 

   



   



    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');
        
        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
         
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Access Change !</div>');
    }


public function tambahNews()
    {
        $data['title'] = 'Tambah News';
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array();

       

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/tambahNews',$data);
        $this->load->view('templates/footer');
    }

    public function dataNews()
    {
               //load Model
               $this->load->model('news_model','data_news');
                
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
           // ================ ======================

           //   pagination
           $this->db->like('judul_news', $data['keyword']);
           $this->db->or_like('deskripsi_news', $data['keyword']);
           $this->db->from('data_news');
           $config['base_url'] = 'http://localhost/donasi-login/Admin/dataNews';
           $config['num_links'] = 5;
           $config['total_rows'] = $this->db->count_all_results();
           $data['total_rows'] = $config['total_rows'];
           $config['per_page'] = 3;
 
           //initialize
           $this->pagination->initialize($config);



           $data['start'] = $this->uri->segment(3);
           $data['data_news'] = $this->data_news->getNews($config['per_page'], $data['start'], $data['keyword']);

           
        // Kode Unik ID
        $this->load->model('news_model');
        $kd_news = $this->news_model->CreateCode();
           
        // .........
        $data['title'] = 'Data News';
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array();
        $data['kategori'] = $this->db->get('news_kategori')->result_array();
        $data['jenis'] = $this->db->get('data_donasi')->result_array();
        // $data[''] = $this->db->get('donasi_kategori')->result_array();

        $this->load->model('news_model','kategori');

        // $data['dataNews'] = $this->kategori->getdataNews();
        // $data['tampilNews'] = $this->kategori->tampilNews();
        // $data['kategori'] = $this->db->get('donasi_kategori')->result_array();

        // $this->form_validation->set_rules('','Judul','required');
        // $this->form_validation->set_rules('nominal_salur','Kategori','required');
        $this->form_validation->set_rules('judul_news','Judul','required');
        $this->form_validation->set_rules('deskripsi_news','Deskripsi','required');
        // $this->form_validation->set_rules('gambar_news','Dokumentasi','required');
        // $this->form_validation->set_rules('tgl_post','Tanggal','required');
         
        if($this->form_validation->run() == false) {
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('admin/dataNews',$data);
            $this->load->view('templates/footer');
        } else {
            //gambar 1
            $upload_gambar = $_FILES['gambar_news']['name'];
            if($upload_gambar){
                $config['allowed_types'] = 'gif|jpg|png|JPG|jpeg|PNG';
                $config['max_size'] = '20048';
                $config['upload_path'] = './assets/img/news/';
                $config ['remove_spaces'] = FALSE;
    
                $this->load->library('upload', $config);
    
                if($this->upload->do_upload('gambar_news')){
                        $this->session->set_flashdata('message','<div class="alert 
                        alert-danger" role="alert"> Gagal Upload Gambar </div>');
                    }else {
                        $gambarBaru=$this->upload->data('file_name');
                        $this->db->set('gambar_news', $gambarBaru);
                }
            }
              
            //..............
            $id_donasi=$this->input->post('get_id_donasi');
            if ($id_donasi==null){
                $id_donasi_ok=null;
            }else{
                $id_donasi_ok=$this->input->post('get_id_donasi');
            }
            $data = [ 
                 'kd_news' => $kd_news,    
                'id_donasi' => $id_donasi_ok,
                // 'id_donasi' => $this->input->post('get_id_donasi'),
                'judul_news' => $this->input->post('judul_news'),
                'kategori_news' => $this->input->post('id_news'),
                'tgl_distribusi' => $this->input->post('get_tgl_salur'),
                'nominal_salur' => (int) $this->input->post('get_nominal_salur')+0,
                'deskripsi_news' => $this->input->post('deskripsi_news'),
                'gambar_news' => $upload_gambar,
                'tgl_post' => date('Y-m-d H:i:s'), 
            ];
            $this->db->insert('data_news', $data);
            $this->session->set_flashdata('message','<div class="alert 
            alert-success" role="alert"> New SubMenu added </div>'); 
            redirect('admin/dataNews');
        }

    } 

    public function editNews($kd_news)
    {
        $data['title'] = 'Edit News';
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array(); 
        $this->load->model('menu_model');
        $data['kategoriMenu'] = $this->db->get('user_menu')->result_array();
       
//         $this->form_validation->set_rules('title','title','required');
//         $this->form_validation->set_rules('url','url','required');

// if ($this->form_validation->run() == false){
        $data['news'] = $this->news_model->edit_news($kd_news);
        $data['menu'] = $this->db->get('user_menu')->result_array();
       
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/editNews',$data);
        $this->load->view('templates/footer');
 
    // }else{
    //     $upload_imageBaru = $_FILES['gambar']['name'];
    //     if($upload_imageBaru){
    //     $config['allowed_types'] = 'gif|jpg|png|JPG|jpeg|PNG';
    //     $config['max_size'] = '2048';
    //     $config['upload_path'] = './assets/img/produk/';
    //     $config ['remove_spaces'] = FALSE;
        
    //     $this->load->library('upload', $config);
    //     }
    //     }
        
    }


    //======================UPDATE News TEST 1 ==================================
public function updateNews(){


    $this->load->model('news_model'); 

$kd_news =$this->input->post('kd_news');
$judul_news =$this->input->post('judul_news');
$deskripsi_news =$this->input->post('deskripsi_news');
// $gambar_news =$this->input->post('gambar_news');
// $status =$this->input->post('status');


$baru =  $_FILES ['gambar_news']['name'];
if($baru){
    $config['allowed_types'] = 'gif|jpg|png|JPG|jpeg|PNG';
    $config['max_size'] = '2048';
    // $config['encrypt_name']	= TRUE;
    $config['upload_path'] = './assets/img/news/';

$this->load->library('upload', $config);
 

if($this->upload->do_upload('gambar_news')){
    $old_image = $data['data_news']['gambar_news'];
    if($old_image != 'default.jpg')
    {
        unlink(FCPATH . 'assets/img/news'.$old_image);
    }
    
    $gambarBaru=$this->upload->data('file_name');
    $this->db->set('gambar_news', $gambarBaru);
}else {
    $this->session->set_flashdata('message','<div class="alert 
    alert-danger" role="alert"> Gagal Upload Gambar </div>');
 
}
}

$data = [
'judul_news' => $this->input->post('judul_news'),
'deskripsi_news' =>$this->input->post('deskripsi_news'),
// 'gambar' =>$this->upload->data('file_name'),
// 'gambar_news' => $baru,
// 'status' =>$this->input->post('status'),

];
$where = [
'kd_news' => $kd_news
]; 

$this->produk_model->update_data($where,$data,'data_news');

$this->session->set_flashdata('flash',' DiUpdate');
redirect('admin/dataNews');
// $this->session->unset_flashdata('flash');

}





    public function tambahDonasi()
    {
        $data['title'] = 'Tambah Donasi';
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array();

       
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/tambahDonasi',$data);
        $this->load->view('templates/footer');
    }

    function getjenisdonasi(){
        $id_news= $this->input->post('news');
        $getjenisdonasi= $this->donasi_model->getdatajenis($id_news); 

        echo json_encode($getjenisdonasi);
    } 
    function hidejenisdonasi(){
        $id_news= $this->input->post('news');
        // $hidejenisdonasi= $this->donasi_model->hidedatajenis($id_news); 
        $hidejenisdonasi= 1; 

        echo json_encode($hidejenisdonasi);
    } 
    

    
    public function dataDonasi()
    {
        
                //load Model
                $this->load->model('donasi_model','data_donasi');
                
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
            // ======================================

            //   pagination
            $this->db->like('nama_donasi', $data['keyword']);
            // $this->db->or_like('kategori_donasi', $data['keyword']);
            $this->db->from('data_donasi');
            $config['base_url'] = 'http://localhost/donasi-login/Admin/dataDonasi';
            $config['num_links'] = 5;
            $config['total_rows'] = $this->db->count_all_results();
            $data['total_rows'] = $config['total_rows']; 
            $config['per_page'] = 3;

            //initialize
            $this->pagination->initialize($config);



            $data['start'] = $this->uri->segment(3);
            $data['data_donasi'] = $this->data_donasi->getDonasi($config['per_page'], $data['start'], $data['keyword']);

            

        // Kode Unik ID
        $this->load->model('donasi_model');
        $id_donasi = $this->donasi_model->CreateCode();
            
        // .........
        $data['title'] = 'Data Donasi';
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array();
        $this->load->model('donasi_model','kategori');

    //    $masa_donasi_aktif= $this->input->post('masa_donasi');
    //     $durasi =  durasi_donasi($masa_donasi_aktif);   
        
        
        date_default_timezone_set('Asia/Jakarta');
        $data['dataDonasi'] = $this->kategori->getdataDonasi();
        //$data['tampilDonasi'] = $this->kategori->tampilDonasi(); 
        $data['kategori'] = $this->db->get('donasi_kategori')->result_array();

        $this->form_validation->set_rules('nama_donasi','Nama','required');
        $this->form_validation->set_rules('kategori_donasi','Kategori','required');
        $this->form_validation->set_rules('target_donasi','Target','required');
        // $this->form_validation->set_rules('perolehan_donasi','Perolehan','required');
        $this->form_validation->set_rules('masa_donasi','Masa Donasi','required');
        $this->form_validation->set_rules('deskripsi_donasi','Deskripsi','required');
        // $this->form_validation->set_rules('tgl_donasi','Tanggal Donasi','required');
        // $this->form_validation->set_rules('masa_aktif','Masa Aktif','required');
        // $this->form_validation->set_rules('status','Status','required');
        
        if($this->form_validation->run() == false) {
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('admin/dataDonasi',$data);
            $this->load->view('templates/footer');
        } else {

        

            //gambar 1
            $upload_image1 = $_FILES['gambar_donasi']['name'];
            if($upload_image1){
                $config['allowed_types'] = 'gif|jpg|png|JPG|jpeg|PNG';
                $config['max_size'] = '2048';
                $config['encrypt_name']	= TRUE;
                $config['upload_path'] = './assets/img/dokdonasi/';
    
                $this->load->library('upload', $config);
    
                if($this->upload->do_upload('gambar_donasi')){
                        $this->session->set_flashdata('message','<div class="alert 
                        alert-danger" role="alert"> Gagal Upload Gambar </div>');
                    }else {
                        $gambarBaru=$this->upload->data('file_name');
                        $this->db->set('gambar_donasi', $gambarBaru);
                }
            } 
            //.............. 
            $data = [
                 'id_donasi' => $id_donasi,    
                'nama_donasi' => $this->input->post('nama_donasi'),
                'kategori_donasi' => $this->input->post('kategori_donasi'),
                'target_donasi' => $this->input->post('target_donasi'),
                'perolehan_donasi' => 0,
                // 'perolehan_donasi' => $this->input->post('perolehan_donasi'),
                'masa_donasi' => $this->input->post('masa_donasi'),
                'deskripsi_donasi' => $this->input->post('deskripsi_donasi'),
                'tgl_donasi' => date('Y-m-d H:i:s'),
                // 'tgl_donasi' => $this->input->post('tgl_donasi'),
                // 'masa_aktif' => $this->input->post('masa_aktif'),
                // 'masa_aktif' => $durasi,
                // 'masa_aktif' => $this->input->post('masa_aktif'),
                'gambar_donasi' => $this->upload->data('file_name'),
                'status' => 1,
                // 'status' => $this->input->post('status'),
                // 'status' => $this->input->post('status'),
            ];
           
$this->db->insert('data_donasi', $data);
// $this->session->set_flashdata('message','<div class="alert 
            // alert-success" role="alert"> New SubMenu added </div>');
             
$this->session->set_flashdata('flash',' Ditambahkan');
// $this->session->unset_flashdata('flash');
redirect('admin/dataDonasi');
}
}


//======================EDIT PRODUK TEST 2 ==================================

public function editProduk ($id)
{
$data['title'] = 'Edit Produk';
$data['user'] = $this->db->get_where('user',
['email' => $this->session->userdata('email')])
->row_array();

$this->form_validation->set_rules('nama_produk','Nama','required');
$this->form_validation->set_rules('keterangan','Keterangan','required');
// $this->form_validation->set_rules('kategori_produk','Kategori','required');
$this->form_validation->set_rules('harga_beli','Harga Beli','required');
$this->form_validation->set_rules('harga_jual','Harga Jual','required');
$this->form_validation->set_rules('stok','Stok','required');

// if ($this->form_validation->run() == false){
$where = array ('id_produk' => $id);
$data['produk'] = $this->produk_model->edit_produk($where, 'data_produk')->result_array();

$this->load->view('templates/header',$data);
$this->load->view('templates/sidebar',$data);
$this->load->view('templates/topbar',$data);
$this->load->view('admin/editProduk',$data);
$this->load->view('templates/footer');
// }else{
// $upload_imageBaru = $_FILES['gambar']['name'];
// if($upload_imageBaru){
// $config['allowed_types'] = 'gif|jpg|png|JPG|jpeg|PNG';
// $config['max_size'] = '2048';
// $config['upload_path'] = './assets/img/produk/';
// $config ['remove_spaces'] = FALSE;

// $this->load->library('upload', $config);

////========= GAMBAR
// if($this->upload->do_upload('gambar')){
// // $this->session->set_flashdata('message','<div class="alert 
        //         // alert-danger" role="alert"> Gagal Upload Gambar </div>');
// $old_imageNew = $data['data_produk']['gambar'];
// if($old_imageNew != 'default.jpg')
// {
// unlink(FCPATH . 'assets/img/produk'.$old_imageNew);
// }

// $new_image = $this->upload->data('file_name');
// $this->db->set('gambar', $new_image);

// }else {
// echo $this->upload->display_errors();
// }
// // .........

// // ..........
// =================
// }
// } 

}  

//======================UPDATE PRODUK TEST 2 ==================================
public function updateProduk(){


    $this->load->model('produk_model'); 

$id =$this->input->post('id_produk');
$nama_produk =$this->input->post('nama_produk');
$keterangan =$this->input->post('keterangan');
$harga_beli =$this->input->post('harga_beli');
$harga_jual =$this->input->post('harga_jual');
$stok =$this->input->post('stok');
// $gambar =$this->input->post('gambar');
$status =$this->input->post('status');


$baru =  $_FILES ['gambar']['name'];
if($baru){
    $config['allowed_types'] = 'gif|jpg|png|JPG|jpeg|PNG';
    $config['max_size'] = '2048';
    $config['max_width'] = '3000';
    $config['max_hight'] = '3000';
    $config['maintain_ratio']	= FALSE;
    $config['encrypt_name']	= TRUE;
    $config['upload_path'] = './assets/img/produk/';
// $config ['remove_spaces'] = FALSE;

$this->load->library('upload', $config);


if($this->upload->do_upload('gambar')){
    $old_image = $data['data_produk']['gambar'];
    if($old_image != 'default.jpg')
    {
        unlink(FCPATH . 'assets/img/profile'.$old_image);
    }
    
    $gambarBaru=$this->upload->data('file_name');
    $this->db->set('gambar', $gambarBaru);
}else {
    $this->session->set_flashdata('message','<div class="alert 
    alert-danger" role="alert"> Gagal Upload Gambar </div>');

}
}


$data = [
'nama_produk' => $this->input->post('nama_produk'),
'keterangan' =>$this->input->post('keterangan'),
'harga_beli' =>$this->input->post('harga_beli'),
'harga_jual' =>$this->input->post('harga_jual'),
'stok' =>$this->input->post('stok'),
// 'gambar' =>$this->upload->data('file_name'),
// 'gambar' => $gambarBaru,
'status' =>$this->input->post('status'),

];
$where = [
'id_produk' => $id
]; 

$this->produk_model->update_data($where,$data,'data_produk');

$this->session->set_flashdata('flash',' DiUpdate');
redirect('admin/dataProduk');
$this->session->unset_flashdata('flash');


// $upload_image = $_FILES['gambar']['name'];
// if($upload_image){
// $config['allowed_types'] = 'gif|jpg|png|JPG|jpeg|PNG';
// $config['max_size'] = '2048';
// $config['upload_path'] = './assets/img/produk/';
// $config ['remove_spaces'] = FALSE;


// $this->load->library('upload', $config);

// if($this->upload->do_upload('gambar')){
// $old_image = $data['data_produk']['gambar'];
// if($old_image != 'default.jpg')
// {
// unlink(FCPATH . 'assets/img/produk'.$old_image);
// }

// $new_image = $this->upload->data('file_name');
// $this->db->set('gambar', $new_image);

// }else {
// echo $this->upload->display_errors();
// }
// }




// $this->db->set('nama_produk',$nama_produk);
// $this->db->set('keterangan',$keterangan);
// $this->db->set('harga_beli',$harga_beli);
// $this->db->set('harga_jual',$harga_jual);
// // $this->db->set('gambar',$upload_image);
// $this->db->set('stok',$stok);
// $this->db->where('id_produk', $id_produk);
// $this->db->update('data_produk');
// ===========coba



// ==================

}

public function editDonasi ($id)
{
$data['title'] = 'Edit Donasi';
$data['user'] = $this->db->get_where('user',
['email' => $this->session->userdata('email')])
->row_array();

$this->form_validation->set_rules('nama_donasi','Nama','required');
// $this->form_validation->set_rules('kategori_donasi','Kategori','required');
$this->form_validation->set_rules('target_donasi','target','required');
// $this->form_validation->set_rules('perolehan_donasi','perolehan','required');
// $this->form_validation->set_rules('masa_donasi','Masa Donasi','required');
$this->form_validation->set_rules('deskripsi_donasi','Deskripsi','required');
$this->form_validation->set_rules('tgl_donasi','Tanggal Mulai','required');
$this->form_validation->set_rules('status','Status','required');
// $this->form_validation->set_rules('gambar_donasi','Tanggal Mulai','required');
// $this->form_validation->set_rules('kategori_produk','Kategori','required');

// if ($this->form_validation->run() == false){
$where = array ('id_donasi' => $id);
$data['donasi'] = $this->donasi_model->edit_donasi($where, 'data_donasi')->result_array();

$this->load->view('templates/header',$data);
$this->load->view('templates/sidebar',$data);
$this->load->view('templates/topbar',$data);
$this->load->view('admin/editDonasi',$data);
$this->load->view('templates/footer');
// }else{
// $upload_imageBaru = $_FILES['gambar']['name'];
// if($upload_imageBaru){
// $config['allowed_types'] = 'gif|jpg|png|JPG|jpeg|PNG';
// $config['max_size'] = '2048';
// $config['upload_path'] = './assets/img/produk/';
// $config ['remove_spaces'] = FALSE;

// $this->load->library('upload', $config);
// =================
// }
// }

}

//======================UPDATE PRODUK TEST 2 ==================================
public function updateDonasi(){

    $this->load->model('donasi_model'); 

$id =$this->input->post('id_donasi');
$nama_donasi =$this->input->post('nama_donasi');
$target_donasi =$this->input->post('target_donasi');
$deskripsi_donasi =$this->input->post('deskripsi_donasi');
$masa_donasi =$this->input->post('masa_donasi');
// $gambar_donasi =$this->input->post('gambar_donasi');
$status =$this->input->post('status');
// $kategori_donasi =$this->input->post('kategori_donasi');
// $perolehan_donasi =$this->input->post('perolehan_donasi');
// $masa_donasi =$this->input->post('masa_donasi');
// $masa_aktif =$this->input->post('masa_aktif');
// $kategori_produk =$this->input->post('kategori_produk');
// $gambar =$upload_imageBaru;


$baruDns =  $_FILES ['gambar_donasi']['name'];
if($baruDns){
    $config['allowed_types'] = 'gif|jpg|png|JPG|jpeg|PNG';
    $config['max_size'] = '2048';
    $config['encrypt_name']	= TRUE;
    $config['upload_path'] = './assets/img/dokdonasi/';
// $config ['remove_spaces'] = FALSE;

$this->load->library('upload', $config);


if($this->upload->do_upload('gambar_donasi')){
    $old_image = $data['data_donasi']['gambar_donasi'];
    if($old_image != 'default.jpg')
    {
        unlink(FCPATH . 'assets/img/dokdonasi'.$old_image);
    }
    
    $gambarBaruDns=$this->upload->data('file_name');
    $this->db->set('gambar_donasi', $gambarBaruDns);
}else {
    $this->session->set_flashdata('message','<div class="alert 
    alert-danger" role="alert"> Gagal Upload Gambar </div>');

}
}


$data = [
'nama_donasi' => $this->input->post('nama_donasi'),
'target_donasi' =>$this->input->post('target_donasi'),
// 'perolehan_donasi' =>$this->input->post('perolehan_donasi'),
// 'masa_donasi' =>$this->input->post('masa_donasi'),
'deskripsi_donasi' =>$this->input->post('deskripsi_donasi'),
'masa_donasi' =>$this->input->post('masa_donasi'),
// 'masa_donasi' =>$this->input->post('masa_donasi'),
// 'gambar_donasi' =>$gambarBaruDns,
'status' =>$this->input->post('status'),

];
$where = [
'id_donasi' => $id
];

$this->donasi_model->update_data($where,$data,'data_donasi');

$this->session->set_flashdata('flash',' DiUpdate');
redirect('admin/dataDonasi');
$this->session->unset_flashdata('flash');
}






public function hapusProduk ($id_produk)
{
    $this->load->library('session');
$where= array('id_produk' => $id_produk);
$this->produk_model->hapus_data($where, 'data_produk');
// $this->session->unmark_flashdata('flash');
$this->session->set_flashdata('flashHpsPrdk',' diHapus');


redirect('admin/dataProduk');
}

public function hapusDonasi ($id_donasi)
{
$where= array('id_donasi' => $id_donasi);
$this->donasi_model->hapus_data($where, 'data_donasi');
$this->session->set_flashdata('flashHpsDns','diHapus');
redirect('admin/dataDonasi');
}
public function hapusNews ($kd_news)
{
$where= array('kd_news' => $kd_news);
$this->donasi_model->hapus_data($where, 'data_news');
$this->session->set_flashdata('flash','diHapus');
redirect('admin/dataNews');
}



public function tolakOrderan ($id_invoice_produk)
{
    $this->load->library('session');
$where= array('id_invoice_produk' => $id_invoice_produk);
$this->produk_model->hapus_data($where, 'tb_invoice_produk');
$this->produk_model->hapus_data($where, 'tb_pesanan_produk');
// $this->session->unmark_flashdata('flash');
// $this->session->set_flashdata('flashHpsPrdk',' diHapus');
$this->session->set_flashdata('flashTolak','diHapus');


redirect('admin/orderanMasuk');
}




public function hapusRole ($id)
{
    $this->load->library('session');
$where= array('id' => $id);
$this->produk_model->hapus_data($where, 'user_role');
$this->session->set_flashdata('flash',' diHapus');

redirect('admin/role');
}

public function hapusMenuManagement ($id)
{
    $this->load->library('session');
$where= array('id' => $id);
$this->produk_model->hapus_data($where, 'user_role');
$this->session->set_flashdata('flash',' diHapus');


redirect('admin/role');
}



public function tambahProduk()
{
$data['title'] = 'Tambah Produk';
$data['user'] = $this->db->get_where('user',
['email' => $this->session->userdata('email')])
->row_array();

$this->load->view('templates/header',$data);
$this->load->view('templates/sidebar',$data);
$this->load->view('templates/topbar',$data);
$this->load->view('admin/tambahProduk',$data);
$this->load->view('templates/footer');
// $data['user'] = $this->db->get_where('user',['email' =>
// $this->session->userdata('email')])->row_array();
// echo 'Selamat datang '.$data['user']['name'];
}

public function dataProduk()
{
//load Model
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
// ======================================

// pagination 
$this->db->like('nama_produk', $data['keyword']);
$this->db->or_like('keterangan', $data['keyword']);
$this->db->from('data_produk');
$config['base_url'] = 'http://localhost/donasi-login/Admin/dataProduk';
$config['num_links'] = 5;
$config['total_rows'] = $this->db->count_all_results();
$data['total_rows'] = $config['total_rows'];
$config['per_page'] = 3;

//initialize
$this->pagination->initialize($config);



$data['start'] = $this->uri->segment(3);
// $data['data_produk'] = $this->data_produk->getdataProduk($config['per_page'],$data['start'], $data['keyword']);
$data['data_produk'] = $this->data_produk->getProduk($config['per_page'], $data['start'], $data['keyword']);



// Kode Unik ID
$this->load->model('produk_model');
$id_produk = $this->produk_model->CreateCode();

// .........
$data['title'] = 'Data Produk';
$data['alamat_kirim'] = $this->produk_model->alamat_admin()->result_array();
$data['user'] = $this->db->get_where('user',
['email' => $this->session->userdata('email')])
->row_array();
$this->load->model('produk_model','kategori');

// $data['dataProduk'] = $this->kategori->getdataProduk();
$data['kategori'] = $this->db->get('produk_kategori')->result_array();

$this->form_validation->set_rules('nama_produk','Nama','required');
$this->form_validation->set_rules('keterangan','Keterangan','required');
$this->form_validation->set_rules('kategori_produk','Kategori','required');
$this->form_validation->set_rules('harga_beli','Harga Beli','required');
$this->form_validation->set_rules('harga_jual','Harga Jual','required');
$this->form_validation->set_rules('stok','Stok','required');

if($this->form_validation->run() == false) {
$this->load->view('templates/header',$data);
$this->load->view('templates/sidebar',$data);
$this->load->view('templates/topbar',$data);
$this->load->view('admin/dataProduk',$data);
$this->load->view('templates/footer');
// $data['user'] = $this->db->get_where('user',['email' =>
// $this->session->userdata('email')])->row_array();
// echo 'Selamat datang '.$data['user']['name'];
} else {
    // $config['encrypt_name']	= TRUE;
    // $upload_image = $_FILES (['gambar']['name'],$config);
    $upload_image =  $_FILES ['gambar']['name'];
    if($upload_image){
        $config['allowed_types'] = 'gif|jpg|png|JPG|jpeg|PNG';
        $config['max_size'] = '2048';
        $config['max_width'] = '3000';
        $config['max_hight'] = '3000';
        $config['maintain_ratio']	= FALSE;
        $config['encrypt_name']	= TRUE;
        $config['upload_path'] = './assets/img/produk/';
// $config ['remove_spaces'] = FALSE;

$this->load->library('upload', $config);


 

if($this->upload->do_upload('gambar')){
$this->session->set_flashdata('message','<div class="alert 
                    alert-danger" role="alert"> Gagal Upload Gambar </div>');
}else {
     
    $gambarBaru=$this->upload->data('file_name');
    $this->db->set('gambar', $gambarBaru);
    
}
 
}

$data = [
'id_produk' => $id_produk,
// 'id_alamat' => $this->input->post('id_alamat'),
'nama_produk' => $this->input->post('nama_produk'),
'keterangan' => $this->input->post('keterangan'),
'kategori_produk' => $this->input->post('kategori_produk'),
'harga_beli' => $this->input->post('harga_beli'),
'harga_jual' => $this->input->post('harga_jual'),
'berat' => $this->input->post('berat'),
'stok' => $this->input->post('stok'),
'gambar' =>  $this->upload->data('file_name'), 
'status' => 1,
// 'gambar' => $avatar->getName() 


];
// $this->model_upload->insert_gambar($data);
// return redirect()->to(base_url('upload'))->with('success', 'Upload successfully');

$this->db->insert('data_produk', $data);
// $this->session->set_flashdata('message','<div class="alert 
        // alert-success" role="alert"> New SubMenu added </div>');

$this->session->set_flashdata('flash',' Ditambahkan');
// $this->session_unset('flash');
redirect('admin/dataProduk');
// $this->session->unset_flashdata('flash');


}
 

} 


public function invoice()
{
$data['title'] = 'Invoice';
$data['user'] = $this->db->get_where('user',
['email' => $this->session->userdata('email')])
->row_array();
$data['start'] = $this->uri->segment(3);
$data['starts'] = $this->uri->segment(3);

$data['invoice'] = $this->invoice_model->tampil_data();
$data['invoice_donasi'] = $this->invoice_model->tampil_data_donasi();
$this->load->view('templates/header',$data);
$this->load->view('templates/sidebar',$data);
$this->load->view('templates/topbar',$data);
$this->load->view('admin/invoice',$data);
$this->load->view('templates/footer');
}

public function detail_invoice($id_invoice)
{
$data['invoice'] = $this->invoice_model->ambil_id_invoice($id_invoice);
$data['pesanan'] = $this->invoice_model->ambil_id_pesanan($id_invoice);
$data['orderanMasukBaru'] = $this->invoice_model->Orderan_costumer()->result();
             

$data['title'] = 'Invoice';
$data['user'] = $this->db->get_where('user',
['email' => $this->session->userdata('email')])
->row_array();

// $data['invoice'] = $this->invoice_model->tampil_data();
$this->load->view('templates/header',$data);
$this->load->view('templates/sidebar',$data);
$this->load->view('templates/topbar',$data);
$this->load->view('admin/detail_invoice',$data);
$this->load->view('templates/footer');
}


//========================DONASI

 
public function invoice_donasi()
{
$data['title'] = 'Invoice Donasi';
$data['user'] = $this->db->get_where('user',
['email' => $this->session->userdata('email')])
->row_array();

$data['invoice'] = $this->invoice_model->tampil_data_donasi();
$this->load->view('templates/header',$data);
$this->load->view('templates/sidebar',$data);
$this->load->view('templates/topbar',$data);
$this->load->view('admin/invoice_donasi',$data);
$this->load->view('templates/footer');
}


public function orderanMasuk()
{ 
             
    $data['title'] = 'Orderan Masuk';
    $data['riwayat_belanja'] = $this->kategori_model->riwayat_belanja_costumer()->result(); 
    $data['user'] = $this->db->get_where('user',
    ['email' => $this->session->userdata('email')]) 
    ->row_array();
    $data['orderanMasukBaru'] = $this->invoice_model->Orderan()->result();
    $data['orderanMasukBaruKirim'] = $this->invoice_model->OrderanKirim()->result();

    $this->load->view('templates/header',$data);
    $this->load->view('templates/sidebar',$data);
    $this->load->view('templates/topbar',$data); 
    $this->load->view('admin/orderanMasuk',$data);
    $this->load->view('templates/footer');

$this->session->set_flashdata('flash',' Ditambahkan');

}  

public function detail_riwayat_belanja_adm($id_invoice)
{
    $data['invoice'] = $this->invoice_model->ambil_id_invoice($id_invoice);
    $data['pesanan'] = $this->invoice_model->ambil_id_pesanan($id_invoice);

    $data['title'] = 'Detail Belanja';
    $data['user'] = $this->db->get_where('user',
    ['email' => $this->session->userdata('email')])
    ->row_array(); 
    $data['orderanMasukBaru'] = $this->invoice_model->Orderan_costumer()->result();

    // $data['invoice'] = $this->invoice_model->tampil_data();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/sidebar',$data);
    $this->load->view('templates/topbar',$data);
    $this->load->view('admin/detail_riwayat_belanja_adm',$data);
    $this->load->view('templates/footer');
}

// ======================= Controller LAPORAN
// ================= DONASI Laporan
public function laporanDonasi()
{
    $data['title'] = 'Laporan Donasi';
    $data['user'] = $this->db->get_where('user',
    ['email' => $this->session->userdata('email')])
    ->row_array(); 

    $data['tahun'] = $this->donasi_model->getTahun();

    // $data['invoice'] = $this->invoice_model->tampil_data();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/sidebar',$data);
    $this->load->view('templates/topbar',$data);
    $this->load->view('admin/laporanDonasi',$data);
    $this->load->view('templates/footer');
}

public function filter()
{
    $tanggalAwal=$this->input->post('tanggalAwal');
    $tanggalAkhir=$this->input->post('tanggalAkhir');
    $tahun1=$this->input->post('tahun1');
    $bulanAwal=$this->input->post('bulanAwal');
    $bulanAkhir=$this->input->post('bulanAkhir');
    $tahun2=$this->input->post('tahun2');
    $nilaiFilter=$this->input->post('nilaiFilter');

    if ($nilaiFilter==1) 
    { 
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array(); 
        $data['title'] = 'Laporan <b class="text-success">Donasi</b> <i>by</i> <b>Tanggal</b>';  
        $data['subTitle'] = '<small><b class="alert-danger">Dari Tanggal: </b>'.format_indoTgl($tanggalAwal).' <b class="alert-success">Sampai Tanggal:</b> '.format_indoTgl($tanggalAkhir).'<small>';  
        $data['dataFilter'] = $this->donasi_model->filterbyTanggal($tanggalAwal,$tanggalAkhir);

        $this->load->view('templates/header',$data);
        // $this->load->view('templates/sidebar',$data);
        // $this->load->view('templates/topbar',$data);
        $this->load->view('admin/printLaporan',$data);
        // $this->load->view('templates/footer');
    }
    else if ($nilaiFilter==2) 
    {
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array(); 
        
        // $data['subTitle'] = '<small><b class="alert-danger">Dari Tanggal: </b>'.format_indoTgl($tanggalAwal).' <b class="alert-success">Sampai Tanggal:</b> '.format_indoTgl($tanggalAkhir).'<small>';  
        
        $data['title'] = 'Laporan <b class="text-success">Donasi</b> <i>by</i> <b>Bulan</b>';  
        // $data['title'] = 'Laporan Donasi byBulan';  
        $data['subTitle'] = '<b class="alert-danger">Dari Bulan :</b> '.$bulanAwal.' <b class="alert-success">Sampai Bulan  :</b> '.$bulanAkhir.' <b>Tahun</b> '.$tahun1;  
        $data['dataFilter'] = $this->donasi_model->filterbyBulan($tahun1,$bulanAwal,$bulanAkhir);
        
        $this->load->view('templates/header',$data);
        $this->load->view('admin/printLaporan',$data);
    }
    else if ($nilaiFilter==3) 
    {
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array(); 
        
        $data['title'] = 'Laporan <b class="text-success">Donasi</b> <i>by</i> <b>Tahun</b>';  
        // $data['title'] = 'Laporan Donasi byTahun';  
        $data['subTitle'] = '<b class="alert-success">Tahun</b> '.$tahun2;  
        $data['dataFilter'] = $this->donasi_model->filterbyTahun($tahun2);
        
        $this->load->view('templates/header',$data);
        $this->load->view('admin/printLaporan',$data);
    }
}

// ================== Laporan Penjualan
public function laporanPenjualan()
{
    $data['title'] = 'Laporan Penjualan';
    $data['user'] = $this->db->get_where('user',
    ['email' => $this->session->userdata('email')])
    ->row_array(); 

    $data['tahun'] = $this->donasi_model->getTahun();


    // $data['invoice'] = $this->invoice_model->tampil_data();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/sidebar',$data);
    $this->load->view('templates/topbar',$data);
    $this->load->view('admin/laporanPenjualan',$data);
    $this->load->view('templates/footer');

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


redirect('admin/orderanmasuk');
}

public function filterPrdk()
{
    // $id_invoice=$this->input->post('id_invoice');
    $tanggalAwal=$this->input->post('tanggalAwal');
    $tanggalAkhir=$this->input->post('tanggalAkhir');
    $tahun1=$this->input->post('tahun1');
    $bulanAwal=$this->input->post('bulanAwal');
    $bulanAkhir=$this->input->post('bulanAkhir');
    $tahun2=$this->input->post('tahun2');
    $nilaiFilter=$this->input->post('nilaiFilter');

    if ($nilaiFilter==1) 
    { 
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array(); 
        $data['title'] = 'Laporan <b class="text-success">Penjualan</b> <i>by</i> <b>Tanggal</b>';  
        $data['subTitle'] = '<small><b class="alert-danger">Dari Tanggal: </b>'.format_indoTgl($tanggalAwal).' <b class="alert-success">Sampai Tanggal:</b> '.format_indoTgl($tanggalAkhir).'<small>';  
        $data['dataFilter'] = $this->produk_model->filterbyTanggal($tanggalAwal,$tanggalAkhir);

        $this->load->view('templates/header',$data);
        // $this->load->view('templates/sidebar',$data);
        // $this->load->view('templates/topbar',$data);
        $this->load->view('admin/printLaporanPenjualan',$data);
        // $this->load->view('templates/footer');
    }
    else if ($nilaiFilter==2) 
    {
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array(); 

        // $data['subTitle'] = '<small><b class="alert-danger">Dari Tanggal: </b>'.format_indoTgl($tanggalAwal).' <b class="alert-success">Sampai Tanggal:</b> '.format_indoTgl($tanggalAkhir).'<small>';  
        
        $data['title'] = 'Laporan <b class="text-success">Penjualan</b> <i>by</i> <b>Bulan</b>';  
        // $data['title'] = 'Laporan Penjualan byBulan';  
        $data['subTitle'] = '<b class="alert-danger">Dari Bulan :</b> '.$bulanAwal.' <b class="alert-success">Sampai Bulan  :</b> '.$bulanAkhir.' <b>Tahun</b> '.$tahun1;  
        $data['dataFilter'] = $this->produk_model->filterbyBulan($tahun1,$bulanAwal,$bulanAkhir);
        
        $this->load->view('templates/header',$data);
        $this->load->view('admin/printLaporanPenjualan',$data);
    }
    else if ($nilaiFilter==3) 
    {
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array(); 
   
        
        $data['title'] = 'Laporan <b class="text-success">Penjualan </b> <i>by</i> <b>Tahun (detail)</b>';  
        // $data['title'] = 'Laporan Donasi byTahun';  
        $data['subTitle'] = '<b class="alert-success">Tahun</b> '.$tahun2;  
        $data['dataFilter'] = $this->produk_model->filterbyTahun($tahun2);
        
        $this->load->view('templates/header',$data);
        $this->load->view('admin/printLaporanPenjualan',$data);
    }
}
// ==============================
// ================== Laporan Penjualan
public function laporanPenjualanDetail()
{
    $data['title'] = 'Laporan Penjualan Detail';
    $data['user'] = $this->db->get_where('user',
    ['email' => $this->session->userdata('email')])
    ->row_array(); 

    $data['tahun'] = $this->donasi_model->getTahun();


    // $data['invoice'] = $this->invoice_model->tampil_data();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/sidebar',$data);
    $this->load->view('templates/topbar',$data);
    $this->load->view('admin/laporanPenjualanDetail',$data);
    $this->load->view('templates/footer');

}

public function filterPrdkDet()
{
    // $id_invoice=$this->input->post('id_invoice');
    $tanggalAwal=$this->input->post('tanggalAwal');
    $tanggalAkhir=$this->input->post('tanggalAkhir');
    $tahun1=$this->input->post('tahun1');
    $bulanAwal=$this->input->post('bulanAwal');
    $bulanAkhir=$this->input->post('bulanAkhir');
    $tahun2=$this->input->post('tahun2');
    $nilaiFilter=$this->input->post('nilaiFilter');

    if ($nilaiFilter==1) 
    { 
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array(); 
        $data['title'] = 'Laporan <b class="text-success">Penjualan </b> <i>by</i> <b>Tanggal (detail)</b>';  
        $data['subTitle'] = '<small><b class="alert-danger">Dari Tanggal: </b>'.format_indoTgl($tanggalAwal).' <b class="alert-success">Sampai Tanggal:</b> '.format_indoTgl($tanggalAkhir).'<small>';  
        $data['dataFilter'] = $this->produk_model->filterbyTanggalDet($tanggalAwal,$tanggalAkhir);

        $this->load->view('templates/header',$data);
        // $this->load->view('templates/sidebar',$data);
        // $this->load->view('templates/topbar',$data);
        $this->load->view('admin/printLaporanPenjualanDetail',$data);
        // $this->load->view('templates/footer');
    }
    else if ($nilaiFilter==2) 
    {
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array(); 

        // $data['titleTop'] = 'Laporan Penjualan';  
        $data['title'] = 'Laporan <b class="text-success">Penjualan </b> <i>by</i> <b>Bulan (detail)</b>';  
        $data['subTitle'] = '<b class="alert-danger">Dari Bulan :</b> '.$bulanAwal.' <b class="alert-success">Sampai Bulan  :</b> '.$bulanAkhir.' <b>Tahun</b> '.$tahun1;  
        $data['dataFilter'] = $this->produk_model->filterbyBulanDet($tahun1,$bulanAwal,$bulanAkhir);
        
        $this->load->view('templates/header',$data);
        $this->load->view('admin/printLaporanPenjualanDetail',$data);
    }
    else if ($nilaiFilter==3) 
    {
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array(); 
   
         
        $data['title'] = 'Laporan <b class="text-success">Penjualan</b> <i>by</i> <b>Tahun (detail) </b>';  
        // $data['title'] = 'Laporan Donasi byTahun';  
        $data['subTitle'] = '<b class="alert-success">Tahun</b> '.$tahun2;  
        $data['dataFilter'] = $this->produk_model->filterbyTahunDet($tahun2);
        
        $this->load->view('templates/header',$data);
        $this->load->view('admin/printLaporanPenjualanDetail',$data);
    }
}
// ==============================

public function filterPrdkBlnLalu()
{
    $tahun1=(int)$this->input->post('tahun1');
    $bulanAwal=(int)$this->input->post('bulanAwal');

    
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array(); 

        // $data['titleTop'] = 'Laporan Penjualan';  
        $data['title'] = 'Laporan <b class="text-success">Penjualan </b> <i>by</i> <b>Bulan </b>'. bln() .' '. $tahun1;  
        $data['subTitle'] = '<b class="alert-danger">Dari Bulan :</b> '.bln($bulanAwal).' <b>Tahun</b> '.$tahun1;  
        $data['dataFilter'] = $this->produk_model->filterbyBulanLalu($tahun1,$bulanAwal); 
        
        $this->load->view('templates/header',$data);
        $this->load->view('admin/printPrdkLaporanBulanLalu',$data);
}


public function filterDnsBlnLalu()
{
    $tahun1=(int)$this->input->post('tahun1');
    $bulanAwal=(int)$this->input->post('bulanAwal');

    
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array(); 

        // $data['titleTop'] = 'Laporan Penjualan';  
        $data['title'] = 'Laporan <b class="text-success">Donasi </b> <i>by</i> <b>Bulan </b>'. bln() .' '. $tahun1;  
        $data['subTitle'] = '<b class="alert-danger">Dari Bulan :</b> '.bln($bulanAwal).' <b>Tahun</b> '.$tahun1;  
        $data['dataFilter'] = $this->donasi_model->filterbyBulanLalu($tahun1,$bulanAwal); 
        
        $this->load->view('templates/header',$data);
        $this->load->view('admin/printDnsLaporanBulanLalu',$data);
}
 

// ==================== Laporan DISTRIBUSI Donasi
public function laporanDistribusiDns()
{
    $data['title'] = 'Laporan Distribusi Donasi';
    $data['user'] = $this->db->get_where('user',
    ['email' => $this->session->userdata('email')])
    ->row_array(); 

    $data['tahun'] = $this->donasi_model->getTahun();

    // $data['invoice'] = $this->invoice_model->tampil_data();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/sidebar',$data);
    $this->load->view('templates/topbar',$data);
    $this->load->view('admin/laporanDistribusiDns',$data);
    $this->load->view('templates/footer');
}

public function filterDD()
{
    $tanggalAwal=$this->input->post('tanggalAwal');
    $tanggalAkhir=$this->input->post('tanggalAkhir');
    $tahun1=$this->input->post('tahun1');
    $bulanAwal=$this->input->post('bulanAwal');
    $bulanAkhir=$this->input->post('bulanAkhir');
    $tahun2=$this->input->post('tahun2');
    $nilaiFilter=$this->input->post('nilaiFilter');

    if ($nilaiFilter==1) 
    {  
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array(); 
        $data['title'] = 'Laporan <b class="text-success">Distribusi Donasi</b> <i>by</i> <b>Tanggal</b>';  
        $data['subTitle'] = '<small><b class="alert-danger">Dari Tanggal: </b>'.format_indoTgl($tanggalAwal).' <b class="alert-success">Sampai Tanggal:</b> '.format_indoTgl($tanggalAkhir).'<small>';  
        $data['dataFilter'] = $this->donasi_model->filterDDbyTanggal($tanggalAwal,$tanggalAkhir);

        $this->load->view('templates/header',$data);
        $this->load->view('admin/printLaporanDistribusiDns',$data);
    }
    else if ($nilaiFilter==2) 
    {
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array(); 
        
        $data['title'] = 'Laporan <b class="text-success">Distribusi Donasi</b> <i>by</i> <b>Bulan</b>';  
        $data['subTitle'] = '<b class="alert-danger">Dari Bulan :</b> '.$bulanAwal.' <b class="alert-success">Sampai Bulan  :</b> '.$bulanAkhir.' <b>Tahun</b> '.$tahun1;  
        $data['dataFilter'] = $this->donasi_model->filterDDbyBulan($tahun1,$bulanAwal,$bulanAkhir);
        
        $this->load->view('templates/header',$data);
        $this->load->view('admin/printLaporanDistribusiDns',$data);
    } 
    else if ($nilaiFilter==3) 
    {
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array(); 
        
        $data['title'] = 'Laporan <b class="text-success">Distribusi Donasi</b> <i>by</i> <b>Tahun</b>';  
        $data['subTitle'] = '<b class="alert-success">Tahun</b> '.$tahun2;  
        $data['dataFilter'] = $this->donasi_model->filterDDbyTahun($tahun2);
        
        $this->load->view('templates/header',$data);
        $this->load->view('admin/printLaporanDistribusiDns',$data);
    }
}


// ===================== Carousel
public function dataCarousel()
{
    // .........
    $data['title'] = 'Data Carousel';
    $data['user'] = $this->db->get_where('user',
    ['email' => $this->session->userdata('email')])
    ->row_array();
    $this->load->model('donasi_model','donasi_model');

    // $this->db->from('data_carousel');
//    $masa_donasi_aktif= $this->input->post('masa_donasi');
    // $durasi =  durasi_donasi($masa_donasi_aktif);   
    

    $judul = $this->input->post('judul');
    $link = $this->input->post('link');
    
    date_default_timezone_set('Asia/Jakarta');
    $data['dataCarousel'] = $this->donasi_model->tampilCarousel();
    // $data['kategori'] = $this->db->get('donasi_kategori')->result_array();

   
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/dataCarousel',$data);
        $this->load->view('templates/footer');

}


//======================UPDATE Carousel TEST 1 ==================================
public function updateCarousel(){


// $this->load->model('news_model'); 
// $data['user'] = $this->db->get_where('user',
// ['email' => $this->session->userdata('email')])
// ->row_array();
// $data['carousel'] = $this->db->get_where('data_donasi')->result(); 

$this->form_validation->set_rules('data_name', 'judul', 'required|trim');
$this->form_validation->set_rules('data_link', 'link', 'required|trim');
// $this->form_validation->set_rules('wa', 'Nomor Whatsapp', 'required|trim');
// $this->form_validation->set_rules('wa', 'Nomor Whatsapp', 'required|trim');


if ($this->form_validation->run() == false){
    $this->load->view('templates/header',$data);
    $this->load->view('templates/sidebar',$data);
    $this->load->view('templates/topbar',$data);
    $this->load->view('admin/datacarousel',$data);
    $this->load->view('templates/footer');
} else {
    $id_carousel =$this->input->post('data_id');
    $judul =$this->input->post('data_name');
    $link =$this->input->post('data_link');

$baruKog =  $_FILES ['gambar_carousel']['name'];

if($baruKog)
{
    $config['allowed_types'] = 'gif|jpg|png|JPG|jpeg|PNG';
    $config['max_size'] = '2048';
    $config['encrypt_name']	= TRUE;
    $config['upload_path'] = './assets/img/carousel/';

$this->load->library('upload', $config);
 
if($this->upload->do_upload('gambar_carousel')){
    $old_image = $data['data_carousel']['gambar_carousel'];
    if($old_image != 'default.jpg')
    {
        unlink(FCPATH . 'assets/img/carousel'.$old_image);
    }
    
    $gambarBaru=$this->upload->data('file_name');
    $this->db->set('gambar_carousel', $gambarBaru);
}else {
    $this->session->set_flashdata('message','<div class="alert 
    alert-danger" role="alert"> Gagal Upload Gambar </div>');
 
}
}




$data = [
'judul' => $judul,
'link' =>$link,
// 'gambar_carousel' => $this->upload->data('file_name'),
// 'gambar_carousel' => $gambarBaru,
// 'gambar_carousel' =>$gambar_carousel,
// 'gambar_carousel' =>$baru ,
// 'deskripsi_news' =>$this->input->post('deskripsi_news'),
// 'gambar' =>$this->upload->data('file_name'),
// 'gambar_news' => $baru,
// 'status' =>$this->input->post('status'),

];
$where = [
'id_carousel' => $id_carousel
]; 

$this->donasi_model->update_data($where,$data,'data_carousel');

$this->session->set_flashdata('flash',' DiUpdate');
redirect('admin/datacarousel');
// $this->session->unset_flashdata('flash');

}
}




}