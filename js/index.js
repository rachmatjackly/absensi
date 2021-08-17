$(document).ready(function() {
	$('#status').change(function() { // Jika Select Box id provinsi dipilih
		var status = $(this).val(); // Ciptakan variabel provinsi
		$.ajax({
			type: 'POST', // Metode pengiriman data menggunakan POST
			url: 'modal.php', // File yang akan memproses data
			data: 'status=' + status, // Data yang akan dikirim ke file pemroses
			success: function(response) { // Jika berhasil
				$('#buttonKelas').html(response); // Berikan hasil ke id kota
			}
		});
    });

	$('#kelas1').change(function() { // Jika Select Box id provinsi dipilih
		console.log("The text has been changed.");
		var kelas = $(this).val(); // Ciptakan variabel provinsi
		$.ajax({
			type: 'POST', // Metode pengiriman data menggunakan POST
			url: '../kelas.php', // File yang akan memproses data
			data: 'kelas=' + kelas, // Data yang akan dikirim ke file pemroses
			success: function(response) { // Jika berhasil
				$('#namaaa').html(response); // Berikan hasil ke id kota
			}
		});
    });
});