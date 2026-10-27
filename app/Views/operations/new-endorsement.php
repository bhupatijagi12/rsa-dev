<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from https://demo.adminkit.io/tables-datatables-multi by HTTrack Website Copier/3.x [XR&CO], Sat, 10 Oct 2026 06:59:21 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="keywords" content="">

	<link rel="preconnect" href="https://fonts.gstatic.com/">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="tables-datatables-multi" />

	<title>Endorsement</title>

	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&amp;display=swap" rel="stylesheet">

	<!-- Choose your prefered color scheme -->
	<!-- <link href="css/light.css" rel="stylesheet"> -->
	<!-- <link href="css/dark.css" rel="stylesheet"> -->

	<!-- BEGIN SETTINGS -->
	<!-- Remove this after purchasing -->
<link  href="<?= base_url('public/admin-assets/css/light.css') ?>" rel="stylesheet">
	<script src="<?= base_url('public/admin-assets/js/settings.js') ?>"></script>
	<style>
		body {
			opacity: 0;
		}
	</style>
	<!-- END SETTINGS -->
</head>
<!--
  HOW TO USE: 
  data-theme: default (default), dark, light, colored
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-layout: default (default), compact
-->

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
	<div class="wrapper">
				 <?= $this->include('operations/layouts/navbar'); ?>


		<div class="main">
							 <?= $this->include('operations/layouts/top-bar'); ?>


			<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Endorsement</h1>
					</div>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<?php if (session()->getFlashdata('error')) : ?>
						 		<p style="color:white" class="btn btn-primary"><?= session()->getFlashdata('error'); ?></p>
						 		<?php endif; ?>
								<div class="card-body">
									<form class="row needs-validation" novalidate  method="post" id="policyForm" action="<?= base_url('/ops/endorsement/view');?>" enctype="multipart/form-data">
										<div class="col-md-12">
											<div class="table-responsive">

									
								</div>
											<div class="row">
											<div class="col-md-4">
											<label for="certificate_no" class="form-label">Certificate No *</label>
											<input type="text" class="form-control" id="certificate_no" name="certificate_no" value="" required>
											<div class="valid-feedback">
												Looks good!
											</div>
											
										</div>
									
									</div>

										
										<div class="col-12"><br>
											<button class="btn btn-primary" type="submit">Submit</button>
										</div>
									</form>
								</div>
							</div>
						
							
						</div>
					</div>

					

				</div>
			</main>

									 <?= $this->include('operations/layouts/footer'); ?>

		</div>
	</div>

	<script src="<?= base_url('public/admin-assets/js/app.js') ?>"></script>

	<script src="<?= base_url('public/admin-assets/js/datatables.js') ?>"></script>
<script>
	document.addEventListener("DOMContentLoaded", function() {
			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.querySelectorAll('.needs-validation')
			// Loop over them and prevent submission
			Array.prototype.slice.call(forms)
				.forEach(function(form) {
					form.addEventListener('submit', function(event) {
						if (!form.checkValidity()) {
							
							event.preventDefault()
							event.stopPropagation()
						} else {
						//updateSummary();
						}
						form.classList.add('was-validated')
					}, false)
				})
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Datatables with Multiselect
			var datatablesMulti = $("#datatables-multi").DataTable({
				responsive: true,
				select: {
					style: "multi"
				}
			});
		});
	</script>
</body>


<!-- Mirrored from https://demo.adminkit.io/tables-datatables-multi by HTTrack Website Copier/3.x [XR&CO], Sat, 10 Oct 2026 06:59:21 GMT -->
</html>