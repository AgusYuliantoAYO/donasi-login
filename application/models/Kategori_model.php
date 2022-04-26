<?php 

class kategori_model extends CI_Model{
    public function data_elektronik()
    {
       return $this->db->get_where("data_produk",array('kategori_produk' => '4','status'=>'1'));
    }

    public function data_fashion()
    {
       return $this->db->get_where("data_produk",array('kategori_produk' => '1','status'=>'1'));
    }

    public function data_merchant() 
    { 
       return $this->db->get_where("data_produk",array('kategori_produk' => '2','status'=>'1'));
    }

    public function data_makanan()
    {
       return $this->db->get_where("data_produk",array('kategori_produk' => '3','status'=>'1'));
    }

    public function riwayat_belanja_costumer()
    { 
      $query=$this->db->get_where("tb_invoice_produk",array('email' => $this->session->userdata('email'),'status_code' => 202));  
      // $query=$this->db->get_where("tb_invoice_produk",array('email' => $this->session->userdata('email'),'status_code'=>'201'));  
      return  $query;
    }

    public function riwayat_donasi_donatur()
    {
       $this->db->order_by('transaction_time','DESC');
      $query=$this->db->get_where("bukti_tf_dns",array('email' => $this->session->userdata('email'))); 
      return  $query;
    } 
    
}