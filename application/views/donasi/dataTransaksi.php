<!DOCTYPE html>
<html lang="en">
<head>

<?php $this->load->view('layout/meta'); ?>
<title>Data Transaksi | Lembaga Manajemen Infaq</title>
<?php $this->load->view('layout/css'); ?>

<body class="sidebar-mini">
<div class="wrapper"> 
    <?php $this->load->view('layout/header') ?>
    <?php $this->load->view('layout/sidebar') ?>

    <div class="content-wrapper">
        <section class="content-header">
          <h1>Transaksi</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-credit-card"></i> Transaksi</a></li>
            <li class="active"><i class="fa fa-dashboard"></i> Data</li>
          </ol>
        </section>
      
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="chart-box">
                        <h4>Data Transaksi
                        <!-- <div class="col-md-3" action="<?php echo base_url('Transaksi/search') ?>">
                        <input type="text" name="kode_transaksi" class="form-control" style="position-left" placeholder="Kode Transaksi"/>
                        </div>
                        <button type="submit" class="btn btn-success" style="position-left">Search</button>
                         -->
                        </h4>
                       
                        <div class="table-responsive m-top-2">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Donasi</th>
                                    <th>Nama Donatur</th>
                                    <th>No Telp</th>
                                    <th>Jumlah Donasi</th>
                                    <th>Pesan</th>
                                    <th>Kode Transaksi</th>
                                    <th>Tanggal</th>
                                    <th>Status Bayar</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $no = 1;

                                    foreach($tmpTransaksi as $rows) {
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $rows->nama_donasi; ?></td>
                                        <td><?php echo $rows->nama_donatur; ?></td>
                                        <td><?php echo $rows->no_telp_donatur; ?></td>
                                        <td><?php echo 'Rp.'.nominal($rows->jumlah_donasi); ?></td>
                                        <td><?php echo $rows->pesan_donatur; ?></td>
                                        <td><?php echo $rows->kode_transaksi; ?></td>
                                        <td><?php echo tgl_indo($rows->tgl_transaksi); ?></td>
                                        <td>
                                            <a href="<?php echo base_url('admin/Transaksi/editBayar/'.$rows->id_transaksi); ?>">
                                                <?php 
                                                    if($rows->bayar == 0) {
                                                        echo "<span class='lable-tag tag-unpaid'>Belum</span>";
                                                    } else {
                                                        echo "<span class='lable-tag tag-success'>Dibayar</span>";
                                                    }
                                                ?>
                                            </a>
                                        </td>

                                        <td>
                                            <center>
                                                <a href="<?php echo base_url('admin/Transaksi/edit/'.$rows->id_transaksi); ?>"><i class="fa fa-edit fa-lg"></i></a>
                                               
                                                <span class="spasi">
                                
                                                <a href="<?php echo base_url('admin/Transaksi/delete/'.$rows->id_transaksi) ?>" onclick="return confirm(' Apakah anda yakin HAPUS DATA TRANSAKSI ini ? ');"></span><i class="fa fa-trash fa-lg "></a></i>
                                            </center>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                    }
                                ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
    </div> 

    <?php $this->load->view('layout/footer'); ?>
</div>

<?php $this->load->view('layout/js'); ?>
<script>
    function printTiket() 
    {
        var divToPrint = document.getElementById('print');
        var newWin = window.open('','Print-Window');
        newWin.document.open();
        newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
        newWin.document.close();
        setTimeout(function() {
            newWin.close();
        }, 10);
    }
</script>
</body>
</html>