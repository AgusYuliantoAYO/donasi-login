<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class donasi_model extends CI_Model
{
    public function tampilDonasi()
    { 
        // return $this->db->get('data_donasi');
        return $this->db->get_where("data_donasi");
    }

    public function tampilDonasiAktif() 
    { 
        // return $this->db->get('data_donasi');
        return $this->db->get_where("data_donasi",array('status' => 1));
    }

    public function tampil_poto($where,$table)
    {
        return $this->db->get_where($table,$where);    
    }
 
    public function edit_donasi($where,$table)
    {
        return $this->db->get_where($table,$where);    
    }

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


    public function getdataDonasi()
    {
        $query="SELECT `data_donasi`.*,`donasi_kategori`.`kategori`
                FROM `data_donasi` JOIN `donasi_kategori`
                ON `data_donasi`.`kategori_donasi`=`donasi_kategori`.`id`
            ";
        return $this->db->query($query)->result_array();
    }

    public function CreateCode()
    {
        $this->db->select('RIGHT(data_donasi.id_donasi,5) as id_donasi', FALSE);
        $this->db->order_by('id_donasi','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('data_donasi');
            if($query->num_rows() != 0){      
                 $data = $query->row();
                 $kode = intval($data->id_donasi) + 1; 
            }
            else{      
                 $kode = 1;  
            }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
        $kodetampil = "DNS".$batas;
        return $kodetampil;  
    } 
    
    public function CreateCodeInvDonasi()
    {
        $this->db->select('RIGHT(tb_invoice_donasi.id_invoice_donasi,5) as id_invoice_donasi', FALSE);
        $this->db->order_by('id_invoice_donasi','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('tb_invoice_donasi');
            if($query->num_rows() != 0){      
                 $data = $query->row();
                 $kode = intval($data->id_invoice_donasi) + 1; 
            }
            else{      
                 $kode = 1;  
            }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
        $kodetampilInDns = "INVDNS".$batas;
        return $kodetampilInDns;  
    } 


    // public function get_donasi_keyword($keyword){
    //     $this->db->select('*');
    //     $this->db->from('data_donasi');
    //     $this->db->like('nama_donasi',$keyword);
    //     $this->db->or_like('kategori_donasi',$keyword);
    //     return $this->db->get()->result();
    // }
    public function caridataDonasi()
    {
        $cari = $this->input->GET('cari', TRUE);
        $data = $this->db->query("SELECT * from data_donasi where nama_donasi like '%$cari%' ");
        return $data->result();
    }

    public function find($id)
    {
        $result = $this->db->where('id_donasi', $id)
                            ->limit (1)
                            ->get('data_donasi');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return array ();
        }
    }

    public function detail_donasi($id_donasi)
    {
        
         
        $result = $this->db->where('id_donasi',$id_donasi)->get('data_donasi');
        
        if($result->num_rows() > 0){ 
            return $result->result();
            // $this->db->order_by('tgl_donasi','DESC');
        }else{
            return false;
        } 
    }

    // ===== KONFIGURASI dalam TABEL Responsiv
    public function getAllDonasi()
    {
        return $this->db->get('data_donasi')->result_array();
    }

    public function getDonasi($limit, $start, $keyword = null )
    {
        if ($keyword){
            $this->db->like('nama_donasi', $keyword);
            $this->db->or_like('kategori_donasi', $keyword);
        }
        $this->db->order_by('status','DESC');
        $this->db->order_by('tgl_donasi','DESC');
        // $query= $this->db->get_where("data_donasi", $limit, $start,array('status' => 1));

        $query=$this->db->get('data_donasi', $limit, $start)->result_array();
        return $query;
    }

    public function getDonatur($limit, $start, $keyword = null )
    {
        // if ($keyword){
            // $this->db->like('name', $keyword);
            // $this->db->or_like('kategori_donasi', $keyword);
        // }

        $this->db->order_by('transaction_time','DESC');
        $query=$this->db->get('bukti_tf_dns', $limit, $start)->result_array();
        return  $query;
        
    }

    // $data['totalDonatur_']= $this->db->where('id_donasi',$id_donasi)->get('tb_invoice_donasi')->num_rows();
    // public function tampilDonaturSukses($id_donasi) 
    // { 
    //     return $this->db->get_where("tb_invoice_donasi",array('status' => 1));
    //     return  $this->db->where('id_donasi',$id_donasi,)->get('tb_invoice_donasi');

    // }
 
 

    public function getDonaturDonasiJum($id_donasi)
    {
        // $this->db->order_by('tgl_donasi','DESC');
        // $this->db->get_where("bukti_tf_dns",array('status_code' => 200));
        $result = $this->db->where('id_donasi',$id_donasi)->get('bukti_tf_dns');
            // return $result->num_rows();
            return $result->result_array();
    }

    public function getDonaturDonasi($id_donasi)
    {
        // $this->db->order_by('id_donasi',$id_donasi);
        // $this->db->order_by('tgl_donasi','DESC');
        // $query=$this->db->get('tb_invoice_donasi')->result_array();
        // return  $query;
        $this->db->order_by('transaction_time','DESC');
        // $this->db->get_where("bukti_tf_dns",array('status_code' => 200));
        $result = $this->db->where('id_donasi',$id_donasi)->get('bukti_tf_dns');
        // if($result->num_rows() > 0){
            return $result->result_array();
        // }else{
        //     return false;
        // } 
        
    } 

    public function countAllDonasi()
    {
        return $this->db->get('data_donasi')->num_rows();
    }

    public function tampilDonatur()
    {
        
        $this->db->order_by('transaction_time','DESC');
        $query=$this->db->get('bukti_tf_dns');
        return  $query;
    } 

    public function tampilPembayaran()
    {
    return $this->db->get_where("bukti_tf_dns",array('email' => $this->session->userdata('email')));
    }

    

    public function DonasiPending()
    {
    return $this->db->get_where("bukti_tf_dns",array('status_code' => 200));
    }
    // public function DonasiAkumulasi()
    // {
    // return $this->db->get_where("bukti_tf_dns");
    // }

    // ===============================LAPORAN
    function getTahun() 
    {
        $query= $this->db->query("SELECT YEAR(transaction_time) AS tahun FROM bukti_tf_dns GROUP BY YEAR(transaction_time) ORDER BY YEAR(transaction_time) ASC");
    
        return $query->result();
    }

    function filterbyTanggal($tanggalAwal,$tanggalAkhir)
    {
        $query= $this->db->query("SELECT * from bukti_tf_dns where transaction_time BETWEEN '$tanggalAwal' and '$tanggalAkhir' ORDER BY transaction_time ASC");
    
        return $query->result();
    }

    function filterbyBulan($tahun1,$bulanAwal,$bulanAkhir) 
    {
        $query= $this->db->query("SELECT * from bukti_tf_dns where YEAR(transaction_time)='$tahun1' and MONTH(transaction_time) BETWEEN '$bulanAwal' and '$bulanAkhir' ORDER BY transaction_time ASC");
    
        return $query->result();
    }
    
    function filterbyTahun($tahun2)
    {
        $query= $this->db->query("SELECT * from bukti_tf_dns where YEAR(transaction_time)='$tahun2' ORDER BY transaction_time ASC");
    
        return $query->result();
    }

    // =================================== Laporan Distribusi Donasi
    function filterDDbyTanggal($tanggalAwal,$tanggalAkhir)
    {
        $query= $this->db->query("SELECT * from data_news where kategori_news = 1 AND tgl_distribusi BETWEEN '$tanggalAwal' and '$tanggalAkhir' ORDER BY tgl_distribusi ASC");
    
        return $query->result();
    }

    function filterDDbyBulan($tahun1,$bulanAwal,$bulanAkhir)
    {
        $query= $this->db->query("SELECT * from data_news where kategori_news = 1 AND YEAR(tgl_distribusi)='$tahun1' and MONTH(tgl_distribusi) BETWEEN '$bulanAwal' and '$bulanAkhir' ORDER BY tgl_distribusi ASC");
    
        return $query->result();
    }
    
    function filterDDbyTahun($tahun2)
    {
        $query= $this->db->query("SELECT * from data_news where kategori_news = 1 AND YEAR(tgl_distribusi)='$tahun2' ORDER BY tgl_distribusi ASC ");
    
        return $query->result();
    }

// ========================================= REPORT INDEX 
function filterbyBulanLalu($tahun1,$bulanAwal)
{
    $query= $this->db->query("SELECT * from bukti_tf_dns where YEAR(transaction_time)='$tahun1' and MONTH(transaction_time)='$bulanAwal'  ORDER BY transaction_time ASC");

    return $query->result();
}
    
function getdatajenis($id_news)
// function getdatajenis()
{
    if ($id_news==1){
        $query = $this->db->query("SELECT * FROM data_donasi");
        // $query = $this->db->query("SELECT * FROM data_donasi WHERE id_donasi ='$id_news' ORDER BY data_donasi ASC");
    } else{
       echo '0';
// hide; 
    }

    return $query->result();
}
// function hidedatajenis($id_news)
// {
//     if ($id_news==1){
//         $query = $this->db->query("SELECT * FROM data_donasi");
//     } else{
//        echo '0';
//     }

//     return $query->result();
// }

public function tampilCarousel()
{ 
    // return $this->db->get('data_donasi');

    $query=$this->db->get_where("data_carousel")->result_array();
    return $query;
}
   
}