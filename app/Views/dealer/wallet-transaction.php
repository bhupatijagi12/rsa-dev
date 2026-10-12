<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from https://demo.adminkit.io/forms-validation by HTTrack Website Copier/3.x [XR&CO], Sat, 10 Oct 2026 06:59:21 GMT -->
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


<title>Wallet Transactions :   GlobalAid Assurance RSA Portal</title>

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
	 <?= $this->include('dealer/layouts/navbar'); ?>
		<div class="main">
		
	 <?= $this->include('dealer/layouts/top-bar'); ?>

			<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Wallets</h1><a class="badge bg-primary ms-2" href="<?= base_url('dashboard'); ?>"
							>Go to Dashboard<i class="fas fa-fw fa-external-link-alt"></i></a>
					</div>
							<?php if (session()->getFlashdata('success')) : ?>
	 		<p style="color:white" class="btn btn-primary"><?= session()->getFlashdata('success'); ?></p>
	 		<?php endif; ?>
					<div class="row">
						<div class="col-8">
							<div class="card">
								
								<div class="card-body">
									<form class="row needs-validation" novalidate  method="post" id="policyForm" action="<?= base_url('update-wallet-transaction');?>" enctype="multipart/form-data">
										<div class="col-md-12">
											<div class="table-responsive">
											<input type="hidden" name="dealerId" value="<?php session('dealer_id');?>"/>

									
								</div>
											<div class="row">
											<div class="col-md-4">
											<label for="amount" class="form-label">Amount *</label>
											<input type="number" class="form-control" id="amount" name="amount" value="" required>
											<div class="valid-feedback">
												Looks good!
											</div>
											<input type="hidden"
           name="dealer_id"
           value="<?= session('dealer_id'); ?>" />
										</div>
										<div class="col-md-4">
											<label for="utr_no" class="form-label">Transaction / UTR No *</label>
											<input type="text" class="form-control" id="utr_no" name="utr_no" value="" required>
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>
										<div class="col-md-4">
											<label for="transaction_file" class="form-label">Transaction File *</label>
											<input type="file" class="form-control" id="transaction_file" name="transaction_file" value="" required>
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
						<div class="col-12">
							
							<div class="card">
								
								<div class="card-body">
									<table id="datatables-multi" class="table table-striped" style="width:100%">
										<thead>
											<tr>
												<th>Transaction Amount</th>
												<th>Transaction Number</th>
												<th>Status</th>
												<th>Uploaded file</th>
												<th>Submitted Date</th>
												<th>Transaction Type</th>
												<th>Approved / Rejected By</th>
												<th>Approved / Rejected Datetime</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($transactions as $transaction) : ?>
											<tr>
												<td><?= esc($transaction['amount']) ?></td>
												<td><?= esc($transaction['transaction_no']) ?></td>
												<td><?= esc($transaction['status']) ?></td>
												<td><a class="btn btn-primary" href="<?= base_url('download-wallet-file/'.$transaction['id'])?>">Download</a></td>
												<td><?= esc($transaction['created']) ?></td>
												<td><?= esc($transaction['transaction_type']) ?></td>
												<td><?= esc($transaction['updated_by']) ?></td>
												<td><?= esc($transaction['updated_date']) ?></td>
											

											</tr>
											 <?php endforeach; ?>
										
										</tbody>
									</table>
								</div>
							</div>
						</div>
				</div>
			</main>
<?php //if (session()->getFlashdata('success')) : ?>
									<div class="modal fade" id="policyModal" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Notification</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body m-3">
													<p class="mb-0" id="responseText">Products saved successfully</p>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
													<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
												</div>
											</div>
										</div>
									</div>
									<?php //endif; ?>
				 <?= $this->include('dealer/layouts/footer'); ?>

		</div>
	</div>

	<script src="<?= base_url('public/admin-assets/js/app.js') ?>"></script>
		<script src="<?= base_url('public/admin-assets/js/datatables.js') ?>"></script>

<!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"/></script>
 -->
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
 <script>
	$("#policyModal").modal("show");
</script>

	<!-- <script>
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
						updateSummary();

						}
						form.classList.add('was-validated')
					}, false)
				})
		});

		function updateSummary()
		{
			alert("sdsd");
			 $.ajax({
            url: "",
            type: "POST",
            data : $("#policyForm").serialize(),
            dataType: "json",

            beforeSend: function () {
                			$("#btn-generate").text("Please wait..");

            },

            success: function (response) {

                if(response.status == "success")
                {
                   /* $("#msg").html(
                        '<div class="alert alert-success">'+response.message+'</div>'
                    );*/
                	   $("#policyModal").modal("show");
                		$("#responseText").text(response.message);

                }
                else
                {
                    $("#policyModal").modal("show");
                		$("#responseText").text(response.message);
                }

            },

            error: function () {
               $("#policyModal").modal("show");
                		$("#responseText").text("Something went wrong");
            }
        });

		}
	</script> -->
</body>

</html>