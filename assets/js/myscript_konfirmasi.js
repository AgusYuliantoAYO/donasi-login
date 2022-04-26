const flashData = $('.flash-data').data('flashdata');
// console.log(flashData);

//Tambah
if (flashData) {
	Swal.fire({
		title: 'Data',
		text: 'Berhasil' + flashData,
		icon: 'success'
	});
}


//tombol-hapus
// $('.tombol-hapus').on('click', function (e) {
// 	e.preventDefault();
// 	const href = $(this).attr('href');
// 	Swal.fire({
// 		title: 'Apakah anda yakin',
// 		text: "data ini akan dihapus",
// 		icon: 'warning',
// 		showCancelButton: true,
// 		confirmButtonColor: '#3085d6',
// 		cancelButtonColor: '#d33',
// 		confirmButtonText: 'Hapus Data !'
// 	}).then((result) => {
// 		if (result.isConfirmed) {
// 			document.location.href = href;
// 		}
// 	})
// });

//tombol-konfirmasi
$('.tombol-tambah').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
		title: 'Apakah anda yakin',
		text: "data ini akan diTambah",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Data !'
	}).then((result) => {
		if (result.isConfirmed) {
			document.location.href = href;
		}
	})
});




//tombol-simpan

// $(document).ready(function () {
// $('#tombol-simpan').load('dataProduk.php');
// $('#tombol-simpan').click(function (e) {
// 	e.preventDefault();
// 	var dataform = $('#form')[0];
// 	var dataform = new FormData(dataform);

// 	var nama_produk = $('#nama_produk').val();
// 	if (nama_produk == "") {
// 		Swal.fire({
// 			title: 'opps....',
// 			text: 'Nama belum diisi',
// 			icon: 'error'

// 		})
// 	}

// });

