<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salespay extends CI_Controller 
{
    public function __construct()
	{
	    parent::__construct();
        is_logged_in();
        
        $params = array('server_key' => 'SB-Mid-server-HtexOJKpb1HCzF17mOvMF3Ki', 'production' => false);
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
 
    
    public function token_buy()
    {

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
                                // redirect('user/belanja_masuk');
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



    }
    

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
    
}