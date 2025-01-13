<div class="footer-atas bg-gray-800 text-white py-8">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 mb-6">
				<div class="footer-content">
					<h2 class="text-3xl font-semibold mb-4">DESA MADURETNO</h2>					
					<p class="text-lg">Sistem Informasi Desa dan Kawasan</p>
					<div class="row">
						<div class="col-md-6">
							<ul class="list-unstyled text-sm">
								<li><i class="fa fa-map-marker"></i> Kantor Desa</li>
								<li><i class="fa fa-location-arrow"></i> JL. Padaherang RT.004/007 KM. 10</li>
								<li><i class="fa fa-location-arrow"></i> Waluran KAB. Sukabumi 43157</li>	
								<li><i class="fa fa-map-marker"></i> Kantor Karang Taruna</li>
								<li><i class="fa fa-location-arrow"></i> JL. Padaherang RT.004/007 KM. 10</li>
								<li><i class="fa fa-location-arrow"></i> Waluran KAB. Sukabumi 43157</li>
							</ul>
						</div>
						<div class="col-md-6">
							<ul class="list-unstyled text-sm">
								<li><i class="fa fa-phone pr-2"></i> 0266 837 929</li>
								<li><i class="fa fa-envelope-o pr-2"></i> caringinnunggal@yahoo.com</li>
								<li><i class="fa fa-mobile-phone pr-2"></i> +62821 2188 5876</li>
							</ul>
							<ul class="social-links list-inline mt-3">
								<li class="list-inline-item"><a target="_blank" href="https://blogbugabagi.blogspot.com" class="text-white"><i class="fa fa-link"></i></a></li>
								<li class="list-inline-item"><a target="_blank" href="https://facebook.com/bugabagiblog" class="text-white"><i class="fa fa-facebook"></i></a></li>
								<li class="list-inline-item"><a target="_blank" href="https://twitter.com" class="text-white"><i class="fa fa-twitter"></i></a></li>
								<li class="list-inline-item"><a target="_blank" href="http://plus.google.com/" class="text-white"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
						<div class="col-md-12 mt-4">
							<div class="logo-footer text-center">
								<img src="<?php echo base_url(); ?>assetku/img/logo_footer.png" alt="Logo" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="footer-content">
					<h2 class="text-3xl font-semibold mb-4">Kontak / Saran / Keluhan</h2>
					<?php 
					$attributes = array('id' => 'formKontak');
					echo form_open('c_kontak/simpan_kontak/', $attributes); ?>
						<div class="form-group mb-4">
							<label for="nama" class="sr-only">Nama</label>
							<input type="text" class="form-control input-md" placeholder="Nama Lengkap" id="nama" name="nama" required>
						</div>
						<div class="form-group mb-4">
							<label for="email" class="sr-only">Alamat Email</label>
							<input type="email" class="form-control input-md" placeholder="Alamat Email" id="email" name="email" required>
						</div>
						<div class="form-group mb-4">
							<label for="pesan" class="sr-only">Pesan</label>
							<textarea class="form-control input-md" rows="4" placeholder="Isi Pesan" id="pesan" name="pesan" required></textarea>
						</div>
						
						<div class="form-group mb-4">
							<input class="form-control input-md" type="text" id="aunt" name="aunt" placeholder="Masukan Kode Captcha Diatas" required>
						</div>
						<div class="form-group">
							<button id="kirim" name="kirim" class="btn btn-primary w-full py-2">Kirim</button>
						</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="footer-bawah bg-gray-900 text-white py-4">
	<div class="container text-center">
		&copy; <span id="tahun"></span> All Rights Reserved.
		<script>
			document.getElementById("tahun").innerHTML = new Date().getFullYear();
		</script>
	</div>
</div>

<!-- Alertify CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assetku/alertify/themes/alertify.core.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assetku/alertify/themes/alertify.default.css" id="toggleCSS" />

<!-- Alertify JavaScript -->
<script src="<?php echo base_url(); ?>assetku/alertify/lib/alertify.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assetku/js/jquery-1.11.0.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assetku/realperson/jquery.realperson.css" media="screen" />
<script type="text/javascript" src="<?php echo base_url(); ?>assetku/realperson/jquery.plugin.js"></script>	
<script type="text/javascript" src="<?php echo base_url(); ?>assetku/realperson/jquery.realperson.js"></script>	

<style>
label { display: none; width: 20%; }

.realperson-challenge 
{  
	display: inline-block;
	padding: 2px;
	padding-top: 5px;
	margin-bottom: 13px;
	background-color: #fff;
	background-image: none;
	border: 1px solid #ccc;
	border-radius: 4px;
	-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
	box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
	-webkit-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
	transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
</style>

<script>
$(function() {
	$('#aunt').realperson({chars: $.realperson.alphanumeric, regenerate: '', length: 5});
	
	$('.realperson-challenge').click(function() { 
		window.location.reload(1);
	});
	
	$('#formKontak').submit(function(event) { 
		$.ajax({
			type: "POST",
			url: "<?=site_url("c_kontak/simpan_kontak/");?>",
			data: $('form').serialize(),
			success: function(data){
				if(data){
					alertify.success("Terima Kasih, pesan telah terkirim!");
					$('#kirim').prop('disabled', true);
					setTimeout(function(){
						window.location.reload(1);
					}, 1000);
				} else {
					alertify.error("Kode tidak cocok!");
					$('#kirim').prop('disabled', true);
					setTimeout(function(){
						window.location.reload(1);
					}, 1000);
				}
			}
		});
		event.preventDefault();
	});
});
</script>
