<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller 
{
    public function __construct()
	{
	    parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user',
        ['email' => $this->session->userdata('email')])
        ->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu','Menu','required');

        if ($this->form_validation->run() == false){

            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('menu/index',$data);
            $this->load->view('templates/footer');

        } else {
            $this->db->insert('user_menu',['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
					 Menu added </div>'); redirect('admin/role');
             }

        }



        public function submenu()
        {
            $data['title'] = 'Submenu Management';
            $data['user'] = $this->db->get_where('user',
            ['email' => $this->session->userdata('email')])
            ->row_array();
            $this->load->model('menu_model','menu');

            $data['subMenu'] = $this->menu->getSubMenu();
            $data['menu'] = $this->db->get('user_menu')->result_array();

            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('menu_id','Menu','required');
            $this->form_validation->set_rules('url','URL','required');
            $this->form_validation->set_rules('icon','icon','required');

            if($this->form_validation->run() == false) {
                $this->load->view('templates/header',$data);
                $this->load->view('templates/sidebar',$data);
                $this->load->view('templates/topbar',$data);
                $this->load->view('menu/submenu',$data);
                $this->load->view('templates/footer');
            } else {
                $data = [
                    'title' => $this->input->post('title'),
                    'menu_id' => $this->input->post('menu_id'),
                    'url' => $this->input->post('url'),
                    'icon' => $this->input->post('icon'),
                    'is_active' => $this->input->post('is_active'),
                ];
                $this->db->insert('user_sub_menu', $data);
                $this->session->set_flashdata('message','<div class="alert 
                alert-success" role="alert"> New SubMenu added </div>'); 
                redirect('admin/role');
            }
        }


        public function editSubMenu($id)
        {
            $data['title'] = 'Edit Sub Menu';
            $data['user'] = $this->db->get_where('user',
            ['email' => $this->session->userdata('email')])
            ->row_array(); 
            $this->load->model('menu_model');
            // $id_donasi = $this->donasi_model->CreateCode();
            $data['kategoriMenu'] = $this->db->get('user_menu')->result_array();
           

            $this->form_validation->set_rules('title','title','required');
            $this->form_validation->set_rules('url','url','required');
// $this->form_validation->set_rules('status','Status','required');
// $this->form_validation->set_rules('gambar_donasi','Tanggal Mulai','required');
// $this->form_validation->set_rules('kategori_produk','Kategori','required');

if ($this->form_validation->run() == false){
            // $where = array ('id' => $id);
            // $data['subMenu'] = $this->menu_model->edit_SubMenu($where, 'user_sub_menu')->result();
            $data['subMenu'] = $this->menu_model->edit_SubMenu($id); 
            $data['menu'] = $this->db->get('user_menu')->result_array();
            // $data['menuku'] =   $data['riwayat_belanja'] = $this->menu_model->userMenu()->result();

            // $menuku = $this->db->get_where("user_menu",array('id' => $this->input->post('menu_id')));
            // $data['role'] = $this->db->get_where('user_role',['id' => $role_id])
            // ->row_array();
            // $this->db->where('id !=', 1);
            // $data['menu'] = $this->db->get('user_menu')->result_array();
    
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('admin/editSubMenu',$data);
            $this->load->view('templates/footer');

        }else{
            $upload_imageBaru = $_FILES['gambar']['name'];
            if($upload_imageBaru){
            $config['allowed_types'] = 'gif|jpg|png|JPG|jpeg|PNG';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/produk/';
            $config ['remove_spaces'] = FALSE;
            
            $this->load->library('upload', $config);
         
            }
            }
            
        }


        public function updateSubMenu()
        {
            $id =$this->input->post('id');
            $title =$this->input->post('title');
            $url =$this->input->post('url');
            $menu_id =$this->input->post('menu_id');
            $icon =$this->input->post('icon');
            $is_active =$this->input->post('is_active')+0 ;
            
            
            $data = array (
            'title' => $this->input->post('title'),
            'url' =>$this->input->post('url'),
            'menu_id' =>$this->input->post('menu_id'),
            'icon' =>$this->input->post('icon'),
            'is_active' =>$this->input->post('is_active'),
            );
            $where = array(
            'id' => $id
            );
            $this->load->model('menu_model');
            $this->menu_model->update_data($where,$data,'user_sub_menu');
            
            $this->session->set_flashdata('flash',' DiUpdate');
            redirect('admin/role');
            $this->session->unset_flashdata('flash');
            }
            



 
        //  public function editMenuManagement()
        // {
        //     $data['title'] = 'Edit Menu Management';
        //     $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
 
        //     $this->load->model('menu_model','menu');

        //     //$data['subMenu'] = $this->menu->getSubMenu();
        //   //  $data['menu'] = $this->db->get('user_menu')->result_array();
        //     $data['menu'] = $this->db->get_where('user_menu',['menu' => $this->session->userdata('menu')])->row_array();
 
        //     if($this->form_validation->run() == false){
        //         $this->load->view('templates/header',$data);
        //         $this->load->view('templates/sidebar',$data);
        //         $this->load->view('templates/topbar',$data);
        //         $this->load->view('menu/editMenuManagement',$data);
        //         $this->load->view('templates/footer');
        //     }else {
        //   }
    
        //  }
        public function ubahMenu()
        {
            
            // $id =$this->input->post('id_donasi');
            // $masa =$this->input->post('masa_donasi_update');
            $id =$this->input->post('data_id');
            $menu =  $this->input->post('data_menu');
    
            $data = 
            [
                'id'      => $id,
                'menu'     => $menu,   
            ]; 
    
            $where = array(
            'id' => $id
            ); 
     
            $this->donasi_model->update_data($where,$data,'user_menu');
    
            $this->session->set_flashdata('flash',' DiUpdate');
            redirect('admin/role');
            // $this->session->unset_flashdata('flash');
        }

        public function ubahRole()
        {
            $id =$this->input->post('data_id');
            $role =  $this->input->post('data_role');

            $data = 
            [
                'id'      => $id,
                'role'     => $role,   
            ]; 
    
            $where = array(
            'id' => $id
            ); 
     
            $this->donasi_model->update_data($where,$data,'user_role');
    
            $this->session->set_flashdata('flash',' DiUpdate');
            redirect('admin/role');
            // $this->session->unset_flashdata('flash');
        }

        public function ubahUser()
        {
            $email =$this->input->post('data_id');
            $role =  $this->input->post('data_role');
            $isAct =  $this->input->post('data_isact');

            $data = 
            [
                'email'      => $email,
                'role_id'     => $role,   
                'is_active'     => $isAct,   
            ]; 
    
            $where = array( 
            'email' => $email
            ); 
     
            $this->donasi_model->update_data($where,$data,'user');
    
            $this->session->set_flashdata('flash',' DiUpdate');
            redirect('menu/dataUser');
            // $this->session->unset_flashdata('flash');
        }


         public function datauser()
         {

                   //load Model
                   $this->load->model('menu_model','data_menu');
                
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
               $this->db->like('name', $data['keyword']);
               $this->db->or_like('alamat', $data['keyword']);
               $this->db->from('user');
               $config['base_url'] = 'http://localhost/donasi-login/menu/datauser';
               $config['num_links'] = 5;
               $config['total_rows'] = $this->db->count_all_results();
               $data['total_rows'] = $config['total_rows']; 
               $config['per_page'] = 4;
   
               //initialize
               $this->pagination->initialize($config);
   
    
   
               $data['start'] = $this->uri->segment(3);
               // $data['data_produk'] = $this->data_produk->getdataProduk($config['per_page'],$data['start'], $data['keyword']);
               $data['data_menu'] = $this->data_menu->getUser($config['per_page'], $data['start'], $data['keyword']);
   
               

               
             $data['title'] = 'Data User';
             $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
             $data['userRole'] = $this->db->get_where('user_role')->result_array();
  
            //  $this->load->model('menu_model','menu');
 
             //$data['subMenu'] = $this->menu->getSubMenu();
           //  $data['menu'] = $this->db->get('user_menu')->result_array();
            //  $data['menu'] = $this->db->get_where('user_menu',['menu' => $this->session->userdata('menu')])->row_array();
//   
            //  if($this->form_validation->run() == false){
                 $this->load->view('templates/header',$data);
                 $this->load->view('templates/sidebar',$data);
                 $this->load->view('templates/topbar',$data);
                 $this->load->view('admin/datauser',$data);
                 $this->load->view('templates/footer');
            //  }else {
                 // $this->db->insert('user_menu',['menu' => $this->input->post('menu')]);
                 // $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                 //          Menu added </div>'); redirect('user');
            // }
     
          }

}