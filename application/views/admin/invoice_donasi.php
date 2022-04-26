<div class="container-fluid">
    <h4>Invoice Pemesanan Produk</h4>
    <div class="table-responsive"  >

    <table class="table table-bordered table-hover table-striped"  >
    <tr>
        <th>Id</th>
        <th>Email</th>
        <th>Nama Donatur</th>
        <th>Nama Donasi</th>
        <th>Tanggal Donasi</th>
        <th>Nominal</th>
        <th>Pesan</th>
    </tr>
    <?php foreach ($invoice as $inv): ?>
    <tr>
        <td><?php echo $inv->id_invoice_donasi ?></td>
        <td><?php echo $inv->email?></td>
        <td><?php echo $inv->name ?></td>
        <td><?php echo $inv->nama_donasi ?></td>
        <td><?php echo $inv->tgl_donasi ?></td>
        <td><?php echo $inv->nominal ?></td>
        <td><?php echo $inv->pesan ?></td>
        <!-- <td>?php echo anchor('admin/detail/'.$inv->id,'<div class="btn btn-sm btn-primary">Detail</div>') ?></td> -->
    
    </tr>
    
    <?php endforeach; ?>
    
    </table>
    
    </div>
</div>
<!-- 
    Bootstrap core JavaScript
    <script src="vendor/sb-admin-2/vendor/jquery/jquery.min.js"></script>
    <script src="vendor/sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    Core plugin JavaScript
    <script src="vendor/sb-admin-2/vendor/jquery-easing/jquery.easing.min.js"></script>

    Custom scripts for all pages
    <script src="vendor/sb-admin-2/js/sb-admin-2.min.js"></script>

    Page level plugins
    <script src="vendor/sb-admin-2/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    Page level custom scripts
    <script src="vendor/sb-admin-2/js/demo/datatables-demo.js"></script>

=========test====
   Load Jquery & Datatable JS
   <script type="text/javascript" src="?php echo base_url('js/jquery.min.js') ?>"></script>
    <script type="text/javascript" src="?php echo base_url('datatables/datatables.min.js') ?>"></script>
    <script type="text/javascript" src="?php echo base_url('datatables/lib/js/dataTables.bootstrap.min.js') ?>"></script>
<script>
    var tabel = null;
    $(document).ready(function() {
        tabel = $('#table-view').DataTable({
            "processing": true,
            "serverSide": true,
            "ordering": true, // Set true agar bisa di sorting
            "order": [[ 0, 'asc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
            "ajax":
            {
                "url": "?php echo base_url('admin/view') ?>", // URL file untuk proses select datanya
                "type": "POST"
            },
            "deferRender": true,
            "aLengthMenu": [[5, 10, 50],[ 5, 10, 50]], // Combobox Limit
            "columns": [
                { "data": "nis" }, // Tampilkan nis
                { "data": "nama" },  // Tampilkan nama
                { "render": function ( data, type, row ) {  // Tampilkan jenis kelamin
                        var html = ""
                        if(row.jenis_kelamin == 1){ // Jika jenis kelaminnya 1
                            html = 'Laki-laki' // Set laki-laki
              }else{ // Jika bukan 1
                            html = 'Perempuan' // Set perempuan
                        }
                        return html; // Tampilkan jenis kelaminnya
                    }
                },
                { "data": "telp" }, // Tampilkan telepon
                { "data": "alamat" }, // Tampilkan alamat
                { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                        var html  = "<a href=''>EDIT</a> | "
                        html += "<a href=''>DELETE</a>"
                        return html
                    }
                },
            ],
        });
    });
    </script> -->
