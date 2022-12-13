<!doctype html>
<html lang="en">
<head>
	<title>Form Absensi</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	
	<link rel="stylesheet" href="{{ asset('form/css/style.css') }}">
	
</head>
<body>
	@include('sweetalert::alert')
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-10 col-md-12">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-md-7 d-flex align-items-stretch">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4">Form Absensi</h3>
									<div id="form-message-warning" class="mb-4"></div> 
									<div id="form-message-success" class="mb-4">
										Your message was sent, thank you!
									</div>
									<form method="POST" action="{{ route('form.store') }}" name="form1" enctype="multipart/form-data">
										@csrf
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="exampleInputEmail1">Karyawan</label>
													<select name="employe_id" required="required" class="form-control js-example-basic-single" style="height: 30px !important;">
														<option value="">Pilih Karyawan</option>
														@foreach($employes as $employe)
														<option value="{{ $employe->id }}">{{ $employe->name }}</option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="col-md-6"> 
												<div class="form-group">
													<label for="exampleInputEmail1">Tanggal</label>
													<input type="date" required="required" class="form-control" name="date">
												</div>
											</div>
											{{-- <div class="col-md-3">
												<div class="form-group">
													<div class="form-check form-check-inline">
														<input class="form-check-input" checked="checked" type="radio" name="status" id="inlineRadio2" value="H">
														<label class="form-check-label" for="inlineRadio2">Hadir</label>
													</div>
												</div>
											</div> --}}
											<div class="col-md-3">
												<div class="form-group">
													<div class="form-check form-check-inline">
														<input class="form-check-input" checked="checked" type="radio" name="status" id="inlineRadio2" value="I">
														<label class="form-check-label" for="inlineRadio2">Ijin</label>
													</div>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="S">
														<label class="form-check-label" for="inlineRadio2">Sakit</label>
													</div>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="C">
														<label class="form-check-label" for="inlineRadio2">Cuti</label>
													</div>
												</div>
											</div>
											{{-- <div class="col-md-12" id="type">
												<div class="form-group">
													<label for="exampleInputEmail1">Masuk/Keluar</label>
													<select name="type" class="form-control">
														<option value="in">Masuk</option>
														<option value="out">Keluar</option>
													</select>
												</div>
											</div> --}}
											<div class="col-md-12">
												<div class="form-group">
													<label for="exampleInputEmail1">Gambar</label>
													<input type="file" name="gambar" class="form-control" required>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label for="exampleInputEmail1">Keterangan</label>
													<textarea name="value" class="form-control" id="message" cols="30" rows="7" placeholder="Masukkan keterangan"></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" value="Kirim" class="btn btn-primary">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-md-5 d-flex align-items-stretch">
								<div class="info-wrap bg-primary w-100 p-lg-5 p-4">
									<h3 class="mb-4 mt-md-4">Contact us</h3>
									<div class="dbox w-100 d-flex align-items-start">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="fa fa-map-marker"></span>
										</div>
										<div class="text pl-3">
											<p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
										</div>
									</div>
									<div class="dbox w-100 d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="fa fa-phone"></span>
										</div>
										<div class="text pl-3">
											<p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
										</div>
									</div>
									<div class="dbox w-100 d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="fa fa-paper-plane"></span>
										</div>
										<div class="text pl-3">
											<p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
										</div>
									</div>
									<div class="dbox w-100 d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="fa fa-globe"></span>
										</div>
										<div class="text pl-3">
											<p><span>Website</span> <a href="#">yoursite.com</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<script src="{{ asset('form/js/jquery.min.js') }}"></script>
	<script src="{{ asset('form/js/popper.js') }}"></script>
	<script src="{{ asset('form/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('form/js/jquery.validate.min.js') }}"></script>
	<script src="{{ asset('form/js/main.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.js-example-basic-single').select2();
		});
		
		jQuery(document).ready(function($) {
			var form = $('form[name="form1"]'),
			radio = $('input[name="status"]'),
			choice = '';
			
			radio.change(function(e) {
				choice = this.value;
				
				if (choice === 'H') {
					document.getElementById('type').style.display = 'block';
				} else {
					document.getElementById('type').style.display = 'none';
				}
			});
		});
	</script>
</body>
</html>

