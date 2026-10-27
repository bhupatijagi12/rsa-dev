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

	<title>Mis Reports</title>

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
						<h1 class="h3 d-inline align-middle">Dealer Details</h1>
					</div>
<?php if (session()->getFlashdata('success')) : ?>
	 		<p style="color:white" class="btn btn-primary"><?= session()->getFlashdata('success'); ?></p>
	 						<?php endif; ?>
	 						<?php if (session()->getFlashdata('error')) : ?>
	 		<p style="color:white" class="btn btn-error"><?= session()->getFlashdata('error'); ?></p>
	 						<?php endif; ?>
					<div class="row">
						<div class="col-12">
							<div class="card">
								
								<div class="card-body">
									<form class="row needs-validation" novalidate  method="post" id="policyForm" action="<?= base_url('update-dealer');?>" enctype="multipart/form-data">
										<div class="col-md-12">
											<div class="table-responsive">
											<input type="hidden" name="dealerId" value="<?= $detail['id'];?>"/>

									
								</div>
											<div class="row">
											<div class="col-md-4">
											<label for="from_date" class="form-label">Name</label>
											<input type="text" class="form-control" id="name" name="name" disabled value="<?= $detail['name']?>">
											<div class="valid-feedback">
												Looks good!
											</div>
											<input type="hidden"
           name="dealer_id"
           value="<?= session('dealer_id'); ?>" />
										</div>
										<div class="col-md-4">
											<label for="to_date" class="form-label">Email</label>
											<input type="text" class="form-control" id="email" name="email" value="<?= $detail['email']?>" disabled>
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>
											<div class="col-md-4">
											<label for="to_date" class="form-label">Mobile</label>
											<input type="text" class="form-control" id="mobile" name="mobile" value="<?= $detail['mobile']?>" disabled>
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>

											<div class="col-md-4">
											<label for="to_date" class="form-label">Address</label>
											<input type="text" class="form-control" id="address" name="address" value="<?= $detail['address']?>" disabled>
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>

											<div class="col-md-4">
											<label for="to_date" class="form-label">Pincode</label>
											<input type="text" class="form-control" id="pincode" name="pincode" value="<?= $detail['pincode']?>" disabled>
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>

											<div class="col-md-4">
											<label for="to_date" class="form-label">GST Number</label>
											<input type="text" class="form-control" id="gst_number" name="gst_number" value="<?= $detail['gst_number']?>" disabled>
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>

											<div class="col-md-4">
											<label for="to_date" class="form-label">Pan Number</label>
											<input type="text" class="form-control" id="pan_number" name="pan_number" value="<?= $detail['pan_number']?>" disabled>
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>

											<div class="col-md-4">
											<label for="to_date" class="form-label">Contact Person</label>
											<input type="text" class="form-control" id="contact_person" name="contact_person" value="<?= $detail['contact_person']?>" disabled>
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>

											<div class="col-md-4">
											<label for="to_date" class="form-label">RM Name</label>
											<input type="text" class="form-control" id="rm_name" name="rm_name" value="<?= $detail['rm_name']?>" disabled>
										
										</div>

											<div class="col-md-4">
											<label for="to_date" class="form-label">Referred By</label>
											<input type="text" class="form-control" id="referred_by" name="referred_by" value="<?= $detail['referred_by']?>" disabled>
										</div>
											<div class="col-md-4">
											<label for="to_date" class="form-label">Account Holder Name</label>
											<input type="text" class="form-control" id="account_holder_name" name="account_holder_name" value="<?= $detail['account_holder_name']?>" >
											
										</div>

											<div class="col-md-4">
											<label for="to_date" class="form-label">Account Number</label>
											<input type="text" class="form-control" id="account_number" name="account_number" value="<?= $detail['account_number']?>" >
											
										</div>
											<div class="col-md-4">
											<label for="to_date" class="form-label">IFSC Code </label>
											<input type="text" class="form-control" id="ifsc_code" name="ifsc_code" value="<?= $detail['ifsc_code']?>" >
											
										</div>

											<div class="col-md-4">
											<label for="to_date" class="form-label">Bank Name</label>
											<input type="text" class="form-control" id="bank_name" name="bank_name" value="<?= $detail['bank_name']?>" >
										
										</div>

											<div class="col-md-4">
											<label for="to_date" class="form-label">Dealer Payment</label>
											<select class="form-control" id="dealer_payment" name="dealer_payment">
												<option value="cut_n_pay" <?php if ($detail['dealer_payment'] == "cut_n_pay") { ?> selected <?php } ?>>Cut & Pay</option>
												<option value="monthly" <?php if ($detail['dealer_payment'] == "monthly") { ?> selected <?php } ?>>Monthly</option>
											</select>
											
										</div>

										<div class="col-md-4">
											<label for="to_date" class="form-label">Payment Mode</label>
											<select class="form-control" id="payment_mode" name="payment_mode">
												<option value="Advance" <?php if ($detail['payment_mode'] == "Advance") { ?> selected <?php } ?>>Advance</option>
												<option value="credit" <?php if ($detail['payment_mode'] == "credit") { ?> selected <?php } ?>>Credit</option>
											</select>
											
										</div>

											<div class="col-md-4">
											<label for="to_date" class="form-label">Commission %</label>
											<input type="text" class="form-control" id="discount_rate" name="discount_rate" value="<?= $detail['discount_rate']?>" >
										
										</div>

										<div class="col-md-4">
											<label for="to_date" class="form-label">Limited Amount</label>
											<input type="text" class="form-control" id="limited_amount" name="limited_amount" value="<?= $detail['limited_amount']?>" >
										
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