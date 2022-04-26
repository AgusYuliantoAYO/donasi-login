<?php
class invoice_model extends CI_Model{
    public function index()
    {


        date_default_timezone_set('Asia/Jakarta');
        // $id = $this->produk_model->CreateCodeInvProduk();
        
        $email =$this->input->post('email');
        $nama =$this->input->post('nama');
        $alamat =$this->input->post('alamat');
        $wa =$this->input->post('wa');
        $ekspedisi =$this->input->post('ekspedisi_fiks');
        $ongkir =$this->input->post('ongkos_kirim_fiks');
           

        
        $invoice = array (
            // 'id' => $id,
            'email' => $email,
            'nama' => $nama,
            'alamat' => $alamat,
            'wa' => $wa, 
            'ekspedisi' => $ekspedisi,
            'ongkir'        => $ongkir,
            'tgl_pesan' => date('Y-m-d H:i:s'),
            'batas_bayar' => date('Y-m-d H:i:s',mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y'))),
 
        );
        $this->db->insert('tb_invoice_produk', $invoice);
        $id_invoice_produk = $this->db->insert_id();
        // die;

      
        
        $total_bayar_fiks =$this->input->post('total_bayar_fiks');
        // $idDet = $this->produk_model->CreateCodeInvProdukDet();
        


        foreach ($this->cart->contents() as $item){
            $data =array (
                // 'id'    => $idDet,
                'id_invoice_produk'    => $id_invoice_produk,
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
        return TRUE;
    }
 

    // =========================
    public function checkout()
    {
        
        // // Required
        // $transaction_details = array(
        //   'order_id' => rand(),
        //   'gross_amount' => $bayar, // no decimal allowed for creditcard
        // );

        // // Optional
        // $item1_details = array(
        //   'id' => $email,
        //   'price' => $bayar,
        //   'quantity' => 1,
        //   'name' => "[Total Tagihan Pembayaran]"
        // );

        // // Optional
        // // $item2_details = array(
        // //   'id' => 'a2',
        // //   'price' => 20000,
        // //   'quantity' => 2,
        // //   'name' => "SEVEL"
        // // );

        // // Optional
        // $item_details = array ($item1_details);

        // // // Optional
        // // $billing_address = array(
        // //   'first_name'    => "Andri",
        // //   'last_name'     => "Litani",
        // //   'address'       => "Mangga 20",
        // //   'city'          => "Jakarta",
        // //   'postal_code'   => "16602",
        // //   'phone'         => "081122334455",
        // //   'country_code'  => 'IDN'
        // // );

        // // // Optional
        // // $shipping_address = array(
        // //   'first_name'    => "Obet",
        // //   'last_name'     => "Supriadi",
        // //   'address'       => "Manggis 90",
        // //   'city'          => "Jakarta",
        // //   'postal_code'   => "16601",
        // //   'phone'         => "08113366345",
        // //   'country_code'  => 'IDN'
        // // );

        // // Optional
        // $customer_details = array(
        //   'first_name'    => $nama,
        // //   'last_name'     => "Litani",
        //   'email'         => $email,
        //   'phone'         => $wa,
        // //   'billing_address'  => $billing_address,
        // //   'shipping_address' => $shipping_address
        // );

        // // Data yang akan dikirim untuk request redirect_url.
        // $credit_card['secure'] = true;
        // //ser save_card true to enable oneclick or 2click
        // //$credit_card['save_card'] = true;

        // $time = time();
        // $custom_expiry = array(
        //     'start_time' => date("Y-m-d H:i:s O",$time),
        //     'unit' => 'minute', 
        //     'duration'  => 2
        // );
         
        // $transaction_data = array(
        //     'transaction_details'=> $transaction_details,
        //     'item_details'       => $item_details,
        //     'customer_details'   => $customer_details,
        //     'credit_card'        => $credit_card,
        //     'expiry'             => $custom_expiry
        // );

        // error_log(json_encode($transaction_data));
        // $snapToken = $this->midtrans->getSnapToken($transaction_data);
        // error_log($snapToken);
        // echo $snapToken;
    }

    public function selesai()
    { 
//         $email =$this->input->post('email');
//         $nama =$this->input->post('nama');
//         $alamat =$this->input->post('alamat');
//         $wa =$this->input->post('wa');
//         $ekspedisi =$this->input->post('ekspedisi');
//         $ongkir =$this->input->post('ongkos_kirim_fiks');
//         $bayar =$this->input->post('total_bayar_fiks');


//     $result = json_decode($this->input->post('result_data'),true);

// $data = [
// 'order_id' => $result['order_id'],
// 'id_donasi' => $id_donasi,
// 'email' => $email,
// 'name' => $nama,
// 'nama_donasi' => $nama_donasi,
// 'nominal' => $nominal,
// 'pesan' => $pesan,
// 'gross_amount' => $result['gross_amount'],
// 'payment_type' => $result['payment_type'],
// 'transaction_time' => $result['transaction_time'],
// 'bank' => $result['va_numbers'][0]["bank"],
// 'va_number' => $result['va_numbers'][0]["va_number"], 
// // 'va_number' => $result['va_number'],
// 'pdf_url' => $result['pdf_url'],
// 'status_code' => $result['status_code'],
// ];
// $simpan = $this->db->insert('bukti_tf_dns',$data);
// if($simpan){
// // echo "sukses";
// redirect('user/belanja_masuk');
// }else
// echo "gagal";
    }


// =========================


    public function tampil_data()
    {
        $this->db->order_by('transaction_time','DESC');
 

        $result = $this->db->get('tb_invoice_produk');
        if($result->num_rows() > 0){
            return $result->result();
        }else {
            return false;
        }
    }

   
 
    public function ambil_id_invoice($id_invoice_produk)
    {

        $result = $this->db->where('id_invoice_produk', $id_invoice_produk)->limit(1)->get('tb_invoice_produk');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return false;
        }
    } 

    public function ambil_id_pesanan($id_invoice_produk)
    {
        $result = $this->db->where('id_invoice_produk', $id_invoice_produk)->get('tb_pesanan_produk');
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
    }

    
        // ===== KONFIGURASI dalam TABEL Responsiv
        public function getAllPesanan()
        {
            return $this->db->get('tb_invoice_produk')->result_array();
        }

        public function Orderan() 
        {
            // $this->db->select('tb_invoice_produk.nama, tb_invoice_produk.alamat, tb_invoice_produk.tgl_pesan, tb_invoice_produk.status');
    
            // $this->db->from('tb_invoice_produk');
           //  $this->db->join('user', 'user.id = rent.id_user');
           //  $this->db->join('vehicle', 'vehicle.id_vehicle = rent.id_vehicle');
            // $this->db->where('tb_invoice_produk.status', 0);
            // return $this->db->get('tb_invoice_produk')->result_array();
            $this->db->order_by('transaction_time','DESC');
            $query=$this->db->get_where("tb_invoice_produk",array('status_code' => 201)); 
            return  $query;
        }

        public function OrderanKirim()
        {
            $this->db->order_by('transaction_time','DESC');
            $query=$this->db->get_where("tb_invoice_produk",array('status_code' => 200)); 
            return  $query; 
        }  
        
        public function Orderan_costumer()
        {
            $this->db->order_by('transaction_time','DESC');
            $query=$this->db->get_where("tb_invoice_produk",array('email' => $this->session->userdata('email'),'status_code' => 201)); 
            return  $query;
            // return $this->db->get_where("tb_invoice_produk",array('status_code' => 0));

        }
        public function Orderan_costumer_tf()
        {
            $this->db->order_by('transaction_time','DESC');
            $query=$this->db->get_where("tb_invoice_produk",array('email' => $this->session->userdata('email'),'status_code' => 200)); 
            return  $query;
        }
        public function Orderan_costumer_proses()
        {
            $this->db->order_by('transaction_time','DESC');
            $query=$this->db->get_where("tb_invoice_produk",array('email' => $this->session->userdata('email'),'status_code' => 202)); 
            return  $query;
            // return $this->db->get_where("tb_invoice_produk",array('status_code' => 0));

        }

        public function donasi_donatur()
        {
            // return $this->db->get_where("tb_invoice_produk",array('status' => 0));
            $this->db->order_by('transaction_time','DESC');
            $query= $this->db->get_where("bukti_tf_dns",array('email' => $this->session->userdata('email'),'status_code' => 201,'status_dns'=>1));
            return  $query;
        }
        public function donasi_donaturTF()
        { 
            $this->db->order_by('transaction_time','DESC');
            $query=$this->db->get_where("bukti_tf_dns",array('email' => $this->session->userdata('email'),'status_code' => 200));
            return  $query;
        }
    
        public function getPesanan($limit, $start, $keyword = null )
        {
            // if ($keyword){
            //     $this->db->like('nama_produk', $keyword);
            //     $this->db->or_like('keterangan', $keyword);
            // }
            // return $this->db->get('data_produk', $limit, $start)->result_array();
        }
    
        public function countAllPesanan()
        {
            return $this->db->get('tb_invoice_produk')->num_rows();
        }
       
    
    
    //================== DONASI =============================
    public function index_donasi()
    {   

        // $data['user'] = $this->db->get_where('data_donasi',
        // ['id_donasi' => $this->input->post('')])
        // ->row_array();

  
        $id_invoice_donasi = $this->donasi_model->CreateCodeInvDonasi();
        // date_default_timezone_set('Asia/Jakarta');
        $id_donasi =$this->input->post('id_donasi');
        $email =$this->input->post('email');
        $name =$this->input->post('name');
        $nama_donasi =$this->input->post('nama_donasi');
        // $nama_donasi =$this->input->post('nama_donasi');
        $nominal_donasi =$this->input->post('nominal_donasi');
        $pesan =$this->input->post('pesan');
        $status =0;
        $status_dns =1;
        
        $invoice_donasi = array (
            'id_invoice_donasi'    => $id_invoice_donasi,
            'id_donasi' => $id_donasi,
            'email' => $email,
            'name' => $name,
            'nama_donasi' => $nama_donasi,
            'tgl_donasi' => date('Y-m-d H:i:s'), 
            'nominal' => $nominal_donasi,
            'pesan' => $pesan,
            'status' => $status,
            'status_dns' => $status_dns,
            // 'batas_bayar' => date('Y-m-d H:i:s',mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y'))),

        );
        $this->db->insert('bukti_tf_dns', $invoice_donasi);


        return TRUE;
    }
  
    public function tampil_data_donasi()
    {
        $this->db->order_by('transaction_time','DESC');
        $result = $this->db->get('bukti_tf_dns');
        if($result->num_rows() > 0){
            return $result->result();
        }else {
            return false;
        }
    }
    
   
    // ============== Komentar 
    public function ambil_kd_news($kd_news)
    {

      

        $result = $this->db->where('kd_news', $kd_news)->limit(1)->get('data_news');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return false;
        }
    }

    // return $this->db->get_where("bukti_tf_dns",array('email' => $this->session->userdata('email'),'status' => 0,'status_dns'=>1));
     
}