<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class produk_model extends CI_Model
{
 
    public function tampil_produk()
    {
        // return $this->db->get('data_produk');
        return $this->db->get_where("data_produk",array('status' => 1));
    }
    public function tampil_produkOk($limit, $start = null) 
    {

        

        // $this->db->order_by('tgl_donasi','DESC');
        $query=$this->db->get_where("data_produk",array('status' => 1));
        return  $query;

        // return $this->db->get('data_produk');
        // return $this->db->get_where("data_produk",array('status' => 1));
    }

    public function edit_produk($where,$table)
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

    public function getdataProduk()
    {
        $query="SELECT `data_produk`.*,`produk_kategori`.`kategori`
                FROM `data_produk` JOIN `produk_kategori`
                ON `data_produk`.`kategori_produk`=`produk_kategori`.`id`
            ";
        return $this->db->query($query)->result_array();
    }

    public function CreateCode()
    {
        $this->db->select('RIGHT(data_produk.id_produk,5) as id_produk', FALSE);
        $this->db->order_by('id_produk','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('data_produk');
            if($query->num_rows() != 0){      
                 $data = $query->row();
                 $kode = intval($data->id_produk) + 1; 
            }
            else{      
                 $kode = 1;  
            }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
        $kodetampil = "PDK".$batas;
        return $kodetampil;  
    }

    // public function get_donasi_keyword($keyword){
    //     $this->db->select('*');
    //     $this->db->from('data_donasi');
    //     $this->db->like('nama_donasi',$keyword);
    //     $this->db->or_like('kategori_donasi',$keyword);
    //     return $this->db->get()->result();
    // }
    // public function caridataDonasi()
    // {
    //     $cari = $this->input->GET('cari', TRUE);
    //     $data = $this->db->query("SELECT * from data_donasi where nama_donasi like '%$cari%' ");
    //     return $data->result();
    // }

    public function find($id)
    {
        
        // $qtyy=$this->input->post('quantity');
        $result = $this->db->where('id_produk', $id)
                            ->limit (1)
                            ->get('data_produk');
                            $qty = $this->input->post('quantity');  
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return array ();
        }
    }

    // public function qty($id)
    // {
    //     $result = $this->db->where('id_produk', $id)
    //                         ->limit (1)
    //                         ->get('data_produk');
    //     if($result->num_rows() > 0){
    //         return $this->input->post('quantity');
    //     }else{
    //         return array ();
    //     }
    // }

    public function detail_produk($id_produk)
    {
        $result = $this->db->where('id_produk',$id_produk)->get('data_produk');
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
    }

    // ===== KONFIGURASI dalam TABEL Responsiv
    public function getAllProduk()
    {
        return $this->db->get('data_produk')->result_array();
    }
 
    public function getProduk($limit, $start, $keyword = null )
    {
        if ($keyword){
            $this->db->like('nama_produk', $keyword);
            $this->db->or_like('keterangan', $keyword);
        }

        $this->db->order_by('status','DESC');
        $this->db->order_by('id_produk','DESC');
        $query=$this->db->get('data_produk', $limit, $start)->result_array();
        return  $query;

    }

    public function countAllProduk()
    {
        return $this->db->get('data_produk')->num_rows();
    }

    // public function qtty()
    // {
    //      $this->input->post('quantity');
    // }
 
    public function alamat()
    {
       return $this->db->get_where("data_alamat",array('email' => $this->session->userdata('email')));
    }

    public function CreateCodeAlamat()
    {
        $this->db->select('RIGHT(data_alamat.id_alamat,5) as id_alamat', FALSE);
        $this->db->order_by('id_alamat','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('data_alamat');
            if($query->num_rows() != 0){      
                 $data = $query->row();
                 $kode = intval($data->id_alamat) + 1; 
            }
            else{      
                 $kode = 1;  
            }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
        $kodetampil = "ALT".$batas;
        return $kodetampil;  
    }

    public function alamat_terima() 
    {
      // $data['user'] = $this->db->get_where('user', 
      // ['email' => $this->session->userdata('email')]);
    //    return $this->db->get_where("tb_invoice_produk",array('email' => 'ayo.scaleup@gmail.com'));
       return $this->db->get_where("data_alamat",array('email' => $this->session->userdata('email')));
    //    return $this->db->get_where("data_alamat",array('email' => $this->session->userdata('email')));
       
      //  ['email' => $this->session->userdata('email')])
      //  ->row_array();
    } 
   
    public function alamat_admin()
    {
      // $data['user'] = $this->db->get_where('user', 
      // ['email' => $this->session->userdata('email')]);
    //    return $this->db->get_where("tb_invoice_produk",array('email' => 'ayo.scaleup@gmail.com'));
       return $this->db->get_where("data_alamat",array('email' => 'ayo.agusyulianto@gmail.com'));
       
      //  ['email' => $this->session->userdata('email')])
      //  ->row_array();
    }

    // public function ambilAlamat() 
    // {
    //   return $this->db->get_where("user",array('email' => $this->session->userdata('email')));
       
    // }

     //MENU MANAGE RENT/PAYMENT
    //  public function get_allshop()
    //  {
    //      $this->db->select('rent.id_rent, rent.id_user, rent.id_vehicle, vehicle.name_vehicle, vehicle.plate_vehicle, rent.date_rent, 
    //      rent.date_return, rent.total_payment, rent.confirmation_status, rent.image');
 
    //      $this->db->from('rent');
    //      $this->db->join('user', 'user.id = rent.id_user');
    //      $this->db->join('vehicle', 'vehicle.id_vehicle = rent.id_vehicle');
    //      $this->db->where('rent.confirmation_status', 0);
    //      return $this->db->get()->result_array();
    //  }
  
    // ===============================LAPORAN
    function getTahun()
    {
        $query= $this->db->query("SELECT YEAR(transaction_time) AS tahun FROM tb_invoice_produk GROUP BY YEAR(transaction_time) ORDER BY YEAR(transaction_time) ASC");
    
        return $query->result();
    }

    function filterbyTanggal($tanggalAwal,$tanggalAkhir)
    {
        $query= $this->db->query("SELECT * from tb_invoice_produk where transaction_time BETWEEN '$tanggalAwal' and '$tanggalAkhir' ORDER BY transaction_time ASC");
    
        return $query->result();
    }

    function filterbyBulan($tahun1,$bulanAwal,$bulanAkhir)
    {
        $query= $this->db->query("SELECT * from tb_invoice_produk where YEAR(transaction_time)='$tahun1' and MONTH(transaction_time) BETWEEN '$bulanAwal' and '$bulanAkhir' ORDER BY transaction_time ASC");
    
        return $query->result();
    }
    
    function filterbyTahun($tahun2)
    {
        $query= $this->db->query("SELECT * from tb_invoice_produk where YEAR(transaction_time)='$tahun2' ORDER BY transaction_time ASC");
    
        return $query->result();
    }

    // ==============Detail
     // ===============================LAPORAN Detail
     function getTahunDet()
     {
         $query= $this->db->query("SELECT YEAR(tgl_pesan) AS tahun FROM tb_pesanan_produk GROUP BY YEAR(tgl_pesan) ORDER BY YEAR(tgl_pesan) ASC");
     
         return $query->result();
     }
 
     function filterbyTanggalDet($tanggalAwal,$tanggalAkhir)
     {
         $query= $this->db->query("SELECT * from tb_pesanan_produk where tgl_pesan BETWEEN '$tanggalAwal' and '$tanggalAkhir' ORDER BY tgl_pesan ASC");
     
         return $query->result();
     }
 
     function filterbyBulanDet($tahun1,$bulanAwal,$bulanAkhir)
     {
         $query= $this->db->query("SELECT * from tb_pesanan_produk where YEAR(tgl_pesan)='$tahun1' and MONTH(tgl_pesan) BETWEEN '$bulanAwal' and '$bulanAkhir' ORDER BY tgl_pesan ASC");
     
         return $query->result();
     }
     
    function filterbyTahunDet($tahun2)
    {
        $query= $this->db->query("SELECT * from tb_pesanan_produk where YEAR(tgl_pesan)='$tahun2' ORDER BY tgl_pesan ASC");
    
        return $query->result();
    }
    
    // ========================================= REPORT INDEX 
    function filterbyBulanLalu($tahun1,$bulanAwal)
     {
         $query= $this->db->query("SELECT * from tb_pesanan_produk where YEAR(tgl_pesan)='$tahun1' and MONTH(tgl_pesan)='$bulanAwal'  ORDER BY tgl_pesan ASC");
     
         return $query->result();
     }

     public function CreateCodeInvProduk()
     {
         $this->db->select('RIGHT(tb_invoice_produk.id,5) as id', FALSE);
         $this->db->order_by('id','DESC');    
         $this->db->limit(1);    
         $query = $this->db->get('tb_invoice_produk');
             if($query->num_rows() != 0){      
                  $data = $query->row();
                  $kode = intval($data->id) + 1; 
             }
             else{      
                  $kode = 1;  
             }
         $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
         $kodetampil = "INVPRDK".$batas;
         return $kodetampil;  
     } 
     public function CreateCodeInvProdukDet()
     {
         $this->db->select('RIGHT(tb_pesanan_produk.id,5) as id', FALSE);
         $this->db->order_by('id','DESC');    
         $this->db->limit(1);    
         $query = $this->db->get('tb_pesanan_produk');
             if($query->num_rows() != 0){      
                  $data = $query->row();
                  $kode = intval($data->id) + 1; 
             }
             else{      
                  $kode = 1;  
             }
         $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
         $kodetampil = "INVPRDKDET".$batas;
         return $kodetampil;  
     } 


     public function ambil_id_produk()
     {
 
         $result = $this->db->where('id_produk')->limit(1)->get('data_produk');
         if($result->num_rows() > 0){
             return $result->row();
         }else{
             return false;
         }
     }
}