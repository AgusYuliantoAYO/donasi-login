<!DOCTYPE html>
<html lang="en">
<head>

<?php $this->load->view('layout/meta'); ?>
<title>Search Transaksi | Lembaga Manajemen Infaq</title>
<?php $this->load->view('layout/css'); ?>

<body class="sidebar-mini">
<div class="wrapper"> 
    <?php $this->load->view('layout/header') ?>
    <?php $this->load->view('layout/sidebar') ?>

    <div class="content-wrapper">
        <section class="content-header">
          <h1>Transaksi</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa credit-card"></i> Transaksi</a></li>
            <li class="active"><i class="fa fa-dashboard"></i> Search Donasi</li>
          </ol>
        </section>
      
        <section class="content container-fluid">
          <div class="col-md-5 col-md-offset-3">
            <?php
              foreach($tmpSearchTransaksi as $rows) {
            ?>
            
              <form action="<?php echo base_url('admin/Transaksi/search'); ?>" method="post" class="chart-box">
                <h4>Edit Jumlah Donasi</h4>
                <h4><?php echo $rows->kode_transaksi; ?></h4>
                <p><?php echo $rows->nama_donatur; ?></p>
                <br/>
                <div class="row">
                <input class="form-control" value="<?php echo $rows->id_transaksi; ?>" name="id_transaksi" id="basicInput" type="hidden" />
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label>Bayar</label>
                      <label>Jumlah Donasi</label>
                      <input class="form-control" value="<?php echo $rows->jumlah_donasi; ?>" name="jumlah_donasi" id="basicInput" type="number" />
                    </fieldset>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <button type="submit" name="insert" class="btn btn-primary">Submit</button>
                    </fieldset>
                  </div>
                </div>
              </form>
                <?php } ?>
          </div>
        </section>
    </div> 

    <?php $this->load->view('layout/footer'); ?>
</div>

<?php $this->load->view('layout/js'); ?>

</body>
</html>