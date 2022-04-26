<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profil_model extends CI_Model
{
    public function update_data($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    public function hapus_data ($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);    
    }
    public function alamat()
    {
      // $data['user'] = $this->db->get_where('user',
      // ['email' => $this->session->userdata('email')]);
      //  return $this->db->get_where("tb_invoice_produk",array('email' => 'ayo.scaleup@gmail.com'));
       return $this->db->get_where("data_alamat",array('email' => $this->session->userdata('email')));
      //  ['email' => $this->session->userdata('email')])
      //  ->row_array();
    }

}