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


<title>View Plans  GlobalAid Assurance RSA Portal</title>

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
						<h1 class="h3 d-inline align-middle">View Plan</h1><a class="badge bg-primary ms-2" href="<?= base_url('ops/dealers'); ?>"
							>Go to Dealers<i class="fas fa-fw fa-external-link-alt"></i></a>
							<!--select name="select_plan" id="select_name" onchange="selectplan(this.value);">
								<option value="">Select Plan</option>
								<?php //foreach ($gaamasterproducts as $gaamasterproduct) : ?>
								<option value="<?php //$gaamasterproduct['id']; ?>"><?php //$gaamasterproduct['product_name']; ?></option>
							<?php //endforeach; ?>
							</select-->
					</div>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<?php if (session()->getFlashdata('success')) : ?>
						 		<p style="color:white" class="btn btn-primary"><?= session()->getFlashdata('success'); ?></p>
						 		<?php endif; ?>
						 		<?php if (session()->getFlashdata('error')) : ?>
						 		<p style="color:white" class="btn btn-primary"><?= session()->getFlashdata('error'); ?></p>
	 		<?php endif; ?>
								<div class="card-body">
									<form class="row"  method="post" id="policyForm" action="<?= base_url('ops/update-plan');?>">
										<div class="col-md-12">
											<div class="table-responsive">
											<input type="hidden" name="dealerId" value="<?php echo $dealer_id; ?>"/>

									<table id="datatables-multi11" class="table mb-0">
										<thead>
											<tr>
												<th scope="col">Insurance Product</th>
												<th scope="col">Insurance Company</th>
												<th scope="col">Master Policy No</th>
												<th scope="col">Start Date</th>
												<th scope="col">End Date</th>
												<th scope="col">Plan Code</th>
												<th scope="col">Plan Type</th>
												<th scope="col">Product Code</th>
												<th scope="col">Plan Name</th>
												<th scope="col">Coverage</th>
												<th scope="col">Sum Insured</th>
												<th scope="col">Base Price</th>
												<th scope="col">GST</th>
												<th scope="col">Premium</th>
												<th scope="col">Remarks</th>
												<th scope="col">Choose</th>
												<!-- <th scope="col">Plan Name</th>
												<th scope="col">Price (with GST)</th>
												<th scope="col">Choose</th> -->
												
											</tr>
										</thead>
										<tbody>
											 <?php foreach ($gaaproducts as $product) : ?>
											<tr>
												<td scope="row"><?= $product['insurance_product']; ?></td>
												<td scope="row"><?= $product['insurance_company']; ?></td>
												<td scope="row"><?= $product['master_policy_no']; ?></td>
												<td scope="row"><?= $product['start_date']; ?></td>
												<td scope="row"><?= $product['end_date']; ?></td>
												
												<td scope="row"><?= $product['plan_code']; ?></td>
												<td scope="row"><?= $product['category_name']; ?></td>
												<td scope="row"><?= $product['master_product_code']; ?></td>

												<td scope="row"><?= $product['product_name']; ?></td>
												<td scope="row"><?= $product['coverage']; ?></td>
												<td scope="row"><?= $product['sum_insured']; ?></td>
												<td scope="row"><?= $product['premium_ex_gst']; ?></td>
												<td scope="row"><?= $product['gst_amount']; ?></td>
												<td scope="row"><?= $product['premium_inc_gst']; ?></td>

												<td scope="row"><?= $product['remarks']; ?></td>
												
														<!-- <td>
													<span class="form-check-label"><?= $product['premium_inc_gst']; ?></span></td> -->
													<td><input type="checkbox" class="form-check-input" name="planid[]" value="<?= $product['master_product_code']; ?>">
												</td>
												
											</tr>
											 <?php endforeach; ?>
										</tbody>
									</table>
								</div>
											<div class="row">
						
					</div>
										</div>
									
										
										<div class="col-12">
											<br>
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
												<th>Product Code</th>
												<th>Plan Name</th>
												<th>Plan Cost (without GST)</th>
											</tr>
										</thead>
										<tbody>
											 <?php foreach ($dealerCustomizedPlans as $plan) : ?>
											<tr>
												<td><?= esc($plan['product_code']) ?></td>
												<td><?= esc($plan['product_name']) ?></td>
												<td><input type="text" name="plan_amount" class="plan" onchange="updateplan(this.value)" placeholder="Enter Plan Amount" data-id = "<?= $plan['id']?>" value="<?= esc($plan['plan_amount']);?>"></td>

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
				 <?= $this->include('operations/layouts/footer'); ?>

		</div>
	</div>

	<script src="<?= base_url('public/admin-assets/js/app.js') ?>"></script>
		<script src="<?= base_url('public/admin-assets/js/datatables.js') ?>"></script>

<!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"/></script>
 -->
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

	<script>
		$('.plan').on('change', function() {

			var plan_amount = $(this).val();
			var plan_id = $(this).attr('data-id');
			
			$.ajax({
            url: "<?= base_url('update-planamount')?>",
            type: "POST",
            data : {
		            amount: plan_amount,
		            plan_id: plan_id
		        },
            dataType: "json",
			/*
            beforeSend: function () {
                			$("#btn-generate").text("Please wait..");

            },*/

            success: function (response) {

                if(response.status == "success")
                {
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
		});

		function selectplan(plan_id)
		{
			$.ajax({
            url: "<?= base_url('ops/view-plan/')?>",
            type: "POST",
            data : {
		            amount: plan_amount,
		            plan_id: plan_id
		        },
            dataType: "json",
			/*
            beforeSend: function () {
                			$("#btn-generate").text("Please wait..");

            },*/

            success: function (response) {

                if(response.status == "success")
                {
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
	</script>
</body>

</html>