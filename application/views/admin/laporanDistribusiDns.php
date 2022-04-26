<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<!-- =========================== -->
<div class="container-fluid col-12 ml-2 mt-5 mb-3">
    <div class="col-12">
    <div align="center">
        <div class="row ml-5">
            <div class="col-md-4">
            <div class="card text-success border-success shadow mb-3" style="max-width: 20rem;">
                    <div class="card-body ">
                    <div class="card-header bg-success text-white ">
                    Laporan Distribusi Donasi by <b>Tanggal</b>
                </div>
                        <!-- <h3 class="card-text"> <b>Orang Baik</b></h3> -->
                        <form action="<?= base_url();?>admin/filterDD" method="POST" target='_blank'>
                        <input type="hidden" name="nilaiFilter" value="1">

                        <p class="card-text "><b class="text-success">Tanggal Awal</b></p>
                        <input type="date" name="tanggalAwal" required=""> <br>
                        <p class="card-text mt-3"><b class="text-danger">Tanggal Akhir</b></p>
                        <input type="date" name="tanggalAkhir" required=""> <br>

                        <!-- <input type="submit" value="Print"> -->
                        <div class="col-12 mt-2" align="center">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i></button>
                        </div>
                    </form>

                    </div>
                    </div>
            </div> 
              
            <div class="col-md-4">
            <div class="card text-success border-success shadow mb-3" style="max-width: 20rem;">
                    <div class="card-body ">
                    <div class="card-header bg-success text-white ">
                    Laporan Distribusi Donasi by <b>Bulan</b>
                </div>
                        <!-- <h3 class="card-text">Rp <b>,00</b></h3> -->
                        <form action="<?= base_url();?>admin/filterDD" method="POST" target='_blank'>
                        <input type="hidden" name="nilaiFilter" value="2">

                        <h5 class="card-title "><b> Pilih Tahun</b></h5>
                        <select name="tahun1" required="">
                            <?php foreach ($tahun as $row ) :?>
                            <option value="<?= $row->tahun?>"><?= $row->tahun?></option>
                            <?php endforeach?>
                        </select>


                        <p class="card-text mt-3"><b class="text-danger">Bulan Awal</b></p>
                        <select name="bulanAwal" required="">
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mai</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select> <br>
                        <p class="card-text mt-3"><b class="text-success">Bulan Akhir</b></p>
                        <select name="bulanAkhir" required="">
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mai</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select><br>
                        <div class="col-12 mt-2" align="center">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i></button>
                        </div>
                    </form>

                    </div>
                    </div>
            </div>
            <div class="col-md-4">
            <div class="card text-success border-success shadow mb-3" style="max-width: 20rem;">
                    <div class="card-body">
                    <div class="card-header bg-success text-white ">
                    Laporan Distribusi Donasi by <b>Tahun</b>
                </div>
                        <!-- <h3 class="card-text"><b>Transaksi Sukses</b> </h3> -->
                        <form action="<?= base_url();?>admin/filterDD" method="POST" target='_blank'>
                        <input type="hidden" name="nilaiFilter" value="3">

                        <h5 class="card-title"><b>Pilih Tahun</b></h5>
                        <select name="tahun2" required="">
                            <?php foreach ($tahun as $row ) :?>
                            <option value="<?= $row->tahun?>"><?= $row->tahun?></option>
                            <?php endforeach?>
                        </select>


                        <!-- <input type="submit" value="Print"> -->
                        <div class="col-12 mt-2" align="center">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i></button>
                        </div>
                    </form>
                    </div>
                    </div>
            </div>
        </div>
    </div> 
    </div>
</div>
<!-- =========================== -->

   
    <!-- </div> -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->