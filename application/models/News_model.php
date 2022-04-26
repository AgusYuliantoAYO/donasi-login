<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class news_model extends CI_Model
{
    public function tampilNews()
    {
        $this->db->order_by('tgl_post','DESC');
        $query=$this->db->get('data_news');
        return  $query->result();
    }

    public function getdataNews()
    {
        $query="SELECT `data_news`.*,`donasi_kategori`.`kategori`
                FROM `data_news` JOIN `donasi_kategori`
                ON `data_news`.`kategori_news`=`donasi_kategori`.`id`
            ";
        return $this->db->query($query)->result_array();
    }

    public function CreateCode()
    {
        $this->db->select('RIGHT(data_news.kd_news,5) as kd_news', FALSE);
        $this->db->order_by('kd_news','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('data_news');
            if($query->num_rows() != 0){      
                 $data = $query->row();
                 $kode = intval($data->kd_news) + 1; 
            }
            else{      
                 $kode = 1;  
            }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
        $kodetampil = "NWS".$batas;
        return $kodetampil;  
    }
 


    // public function caridataDonasi()
    // {
    //     $cari = $this->input->GET('cari', TRUE);
    //     $data = $this->db->query("SELECT * from data_donasi where nama_donasi like '%$cari%' ");
    //     return $data->result();
    // }

    public function find($id) 
    {
        $result = $this->db->where('kd_news', $id)
                            ->limit (1)
                            ->get('data_news');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return array ();
        }
    } 

    public function getNews($limit, $start, $keyword = null ) 
    {
        if ($keyword){
            $this->db->like('judul_news', $keyword);
            $this->db->or_like('deskripsi_news', $keyword);
        }
        $this->db->order_by('tgl_post','DESC');
        $query=$this->db->get('data_news', $limit, $start);
        return  $query->result_array();
        // return $this->db->get('data_news', $limit, $start)->result_array();
    } 
// ============ SOON

public function ambil_kd_news($kd_news)
{
    $result = $this->db->where('kd_news', $kd_news)->limit(1)->get('data_news');
    if($result->num_rows() > 0){
        return $result->result();
    }else{
        return false;
    }
}

public function edit_News($kd_news)
{
    $result = $this->db->where('kd_news',$kd_news)->get('data_news');
    if($result->num_rows() > 0){
        return $result->result();
    }else{
        return false;
    } 
}


public function tampilKomenNews()
{
    $this->db->order_by('tgl_komen','DESC');
    $query=$this->db->get('data_komentar');
    return  $query->result();
}

}