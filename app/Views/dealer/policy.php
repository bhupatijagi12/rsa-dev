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


<title>Generate Policy · GlobalAid Assurance RSA Portal</title>

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
		.heading-line
		{
			float: left;
	    color: white;
	    font-size: 20px;
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
						<h1 class="h3 d-inline align-middle"><?php echo $plan['product_name'];?></h1><a class="badge bg-primary ms-2" href="<?= base_url('products')?>"
							>Go to Products<i class="fas fa-fw fa-external-link-alt"></i></a>
							<h3 style="float: right;">Available Balance : <b>Rs <?= $totalWallet['amount']; ?></b></h3>
					</div>

	 		<?php if (session()->getFlashdata('success')) : ?>
	 		<p style="color:green"><?= session()->getFlashdata('success'); ?></p>
	 		<?php endif; ?>
	 			<?php if (session()->getFlashdata('error')) : ?>
	 		<p style="color:red"><?= session()->getFlashdata('error'); ?></p>
	 		<?php endif; ?>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="btn btn-primary">
									<h5 class="card-title heading-line" style="float:left;">Vehicle details</h5>
<!-- 									<h5 class="card-subtitle text-muted">Identify the vehicle being covered by this policy.</h5>
 -->								</div>
								<div class="card-body">
									<form class="row needs-validation" novalidate method="post" id="policyForm" action="<?= base_url('generate-policy') ?>" >
										<div class="col-md-4">
											<label for="engine_no" class="form-label">Engine number*</label>
											<input type="text" class="form-control" id="engine_no" name="engine_no" value="" required>
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>
										<div class="col-md-4">
											<label for="chassis_no" class="form-label">Chassis number*</label>
											<input type="text" class="form-control" id="chassis_no" name="chassis_no" value="" required>
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>
										<div class="col-md-4">
											<label for="vehicle_type" class="form-label">Vehicle type*</label>
											<select class="form-select" id="vehicle_type"  name="vehicle_type" required>
												<option value="">Select</option>
										<option value="new">New</option><option value="old">Old</option>
               			 </select>
											<div class="invalid-feedback">
												Please select Vehicle Type.
											</div>
											<input type="hidden" name="plan_category" value="<?= $plancategory; ?>">	

										</div>
										<div class="col-md-4">
											<label for="vehicle_variant" class="form-label">Select Vehicle Model*</label>
											 <select class="form-select" id="vehicle_variant"  name="vehicle_variant" required>
		                 <option selected disabled value="">Choose...</option>
		                   <?php foreach ($vehicles as $vehicle) : ?>
		                  <option value="<?= $vehicle['id'] ?>"><?= $vehicle['make_name'] ?> <?= $vehicle['model_name'] ?> <?= $vehicle['variant_name'] ?> <?= $vehicle['fuel_type'] ?></option>
		                  <?php endforeach; ?>
               			 </select>
											<div class="invalid-feedback">
												Please select Model.
											</div>
											<br>
										</div>

										<div class="btn btn-primary">

									<h5 class="card-title heading-line">Owner Details</h5>
								<!-- 	<h5 class="card-subtitle text-muted">Please enter your details
										properly</h5> -->
									</div>
	<br>
										<div class="col-md-4">
										
											<label for="firstname" class="form-label">First name*</label>
											<input type="text" class="form-control" id="firstname" name="firstname" value="" required>
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>
										<div class="col-md-4">
											<label for="middlename" class="form-label">Middle name</label>
											<input type="text" class="form-control" id="middlename" name="middlename" value="">
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>
										<div class="col-md-4">
											<label for="lastname" class="form-label">Last name*</label>
											<input type="text" class="form-control" id="lastname" name="lastname" value="" required>
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>
											<div class="col-md-4">
											<label for="gender" class="form-label">Gender*</label>
											<select class="form-select" id="gender"  name="gender" required>
												<option value="">Select</option>
										<option value="male">Male</option><option value="female">Female</option>
               			 </select>
											<div class="invalid-feedback">
												Please select Gender.
											</div>
										</div>
											<div class="col-md-4">
											<label for="email" class="form-label">Email Address</label>
											<input type="text" class="form-control" id="email" name="email" required>
											<div class="invalid-feedback">
												Please provide email address.
											</div>
										</div>
										<div class="col-md-4">
											<label for="mobile" class="form-label">Mobile Number</label>
											<input type="text" class="form-control" id="mobile" name="mobile" required>
											<div class="invalid-feedback">
												Please provide Mobile number.
											</div>
										</div>
											<div class="col-md-4">
											<label for="city" class="form-label">Address</label>
											<input type="text" class="form-control" id="address" name="address" required>
											<div class="invalid-feedback">
												Please provide address.
											</div>
										</div>
								
										<div class="col-md-4">
											<label for="city" class="form-label">City</label>
											<input type="text" class="form-control" id="city" name="city" required>
											<div class="invalid-feedback">
												Please provide a valid city.
											</div>
										</div>
										<div class="col-md-4">
											<label for="state_name" class="form-label">State</label>
											<select class="form-select" id="state_name" required name="state">
												<option selected disabled value="">Choose...</option>
												 <?php foreach ($states as $state) : ?>
												 	 <option value="<?= $state['state_name']; ?>"><?= $state['state_name']; ?></option>
                   <?php endforeach; ?>
											</select>
											<div class="invalid-feedback">
												Please select a valid state.
											</div>
										</div>
										<div class="col-md-4">
											<label for="pincode" class="form-label">Zip</label>
											<input type="text" class="form-control" id="pincode" required name="pincode">
											<div class="invalid-feedback">
												Please provide a valid Pincode.
											</div>
										</div>
											<div class="col-md-4">
											<label for="dob" class="form-label">Date of Birth*</label>
											<input type="date" class="form-control " id="dob" name="dob" required>

											<div class="invalid-feedback">
												Please provide your dob.
											</div>
										</div>
										<div class="col-md-4">
											<label for="occupation" class="form-label">Occupation *</label>
											<input type="text" class="form-control" name="occupation" id="occupation" required>
											<div class="invalid-feedback">
												Please provide a Occupation.
											</div>
											<br>
										</div>
										<div class="btn btn-primary">
									<h5 class="card-title heading-line">Nominee Details</h5>
									<!-- <h5 class="card-subtitle text-muted">Please enter Nominee details
										properly</h5> -->
									</div>
									<br>
									<div class="col-md-4">

											<label for="nominee_fname" class="form-label">Firstname *</label>
											<input type="text" class="form-control" id="nominee_fname" required name="nominee_firstname">
											<div class="invalid-feedback">
												Please provide a Nominee Firstname.
											</div>
										</div>
											<div class="col-md-4">
											<label for="middle_lname" class="form-label">Middlename *</label>
											<input type="text" class="form-control" id="middle_lname" name="nominee_middle_name" required>
											<div class="invalid-feedback">
												Please provide a Nominee Middlename.
											</div>
										</div>
										<div class="col-md-4">
											<label for="nominee_lname" class="form-label">Lastname *</label>
											<input type="text" class="form-control" id="nominee_lname" name="nominee_lastname" required>
											<div class="invalid-feedback">
												Please provide a Nominee Lastname.
											</div>
										</div>
											<div class="col-md-4">
											<label for="nominee_gender" class="form-label">Gender*</label>
											<select class="form-select" id="nominee_gender"  name="nominee_gender" required>
												<option value="">Select</option>
										<option value="male">Male</option><option value="female">Female</option>
               			 </select>
											<div class="invalid-feedback">
												Please select Gender.
											</div>
										</div>
										<div class="col-md-4">
											<label for="nominee_dob" class="form-label">Date of Birth*</label>
											<input type="date" class="form-control " id="nominee_dob" name="nominee_dob" required>

											<div class="invalid-feedback">
												Please provide Nominee dob.
											</div>
										</div>
										<div class="col-md-4">
											<label for="nominee_mobile" class="form-label">Mobile Number*</label>
											<input type="text" class="form-control " id="nominee_mobile" name="nominee_mobile" required>

											<div class="invalid-feedback">
												Please provide Nominee Mobile.
											</div>
										</div>
										<div class="col-md-4">
											<label for="relationship" class="form-label">Relationship*</label>
											<input type="text" class="form-control " id="relationship" name="relationship" required>

											<div class="invalid-feedback">
												Please provide Relationship.
											</div>
										</div>
										<div class="col-md-4">
											<label for="emergency_contact" class="form-label">Emergency Contact*</label>
											<input type="text" class="form-control " id="emergency_contact" name="emergency_contact" required>

											<div class="invalid-feedback">
												Please provide Emergency Contact.
											</div>
											<br>
										</div>
										<div class="btn btn-primary">

									<h5 class="card-title heading-line">Plan Details</h5>
<!-- 									<h5 class="card-subtitle text-muted">Please select plan details properly</h5>
 -->									</div>
 <br>
									<div class="col-md-4">

											<label for="validationCustom04" class="form-label">Select Plan</label>
											<select class="form-select" id="validationCustom04" required name="product_name">
												<option selected disabled value="">Choose...</option>
												 <?php foreach ($plan_products as $plan_product) : ?>
												 	 <option value="<?= $plan_product['id']; ?>"><?= $plan_product['product_name']; ?></option>
                 				  <?php endforeach; ?>
											</select>
											<div class="invalid-feedback">
												Please select plan.
											</div>
										</div>
										<div class="col-md-4">
											<label for="premium" class="form-label">Premium*</label>
											<input type="text" class="form-control" id="premium" name="premium" required>
											<input type="hidden" name="limited_amount" id="limited_amount">		
											<div class="invalid-feedback">
												Please enter Premium amount.
											</div>
										</div>
											<div class="col-md-4">
											<label for="gst_amount" class="form-label">GST</label>
											<input type="text" class="form-control " id="gst_amount" name="gst_amount" readonly>

										</div>
										<div class="col-md-4">
											<label for="premium_ex_gst" class="form-label">Premium without GST</label>
											<input type="text" class="form-control " id="premium_ex_gst" name="premium_ex_gst" readonly>

										</div>
										<!-- 	<div class="col-md-4">
											<label for="tenure" class="form-label">Tenure*</label>
											<select id="tenure" name="tenure" class="form-select" required>
											<option value="1">1 Year</option>
											<option value="2">2 Years</option>
											<option value="3">3 Years</option>
											<option value="5">5 Years</option>
											</select>

											<div class="invalid-feedback">
												Please select Tenure.
											</div>
										</div> -->
											<div class="col-md-4">
											<label for="start_date" class="form-label">Start Certificate Date</label>
											<input type="text" class="form-control " id="start_date" name="start_date" readonly value="<?= date('Y-m-d');?>">

										
										</div>
										<div class="col-md-4">
											<label for="expiry_date" class="form-label">Expiry Certificate Date</label>
											<input type="text" class="form-control " id="expiry_date" name="expiry_date" readonly>

										
										</div>
										<div class="col-12">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
												<label class="form-check-label" for="invalidCheck">
													Agree to terms and conditions
												</label>
												<div class="invalid-feedback">
													You must agree before submitting.
												</div>
											</div>
										</div>

										<div class="col-12">
												<br>
											<button class="btn btn-primary btn-generate" type="submit">Generate</button>
										</div>
									</form>
								</div>
							</div>
							
					</div>
					<!-- <div class="col-4">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Order summary</h5>
								</div>
								<ul class="list-group list-group-flush">
									<li class="list-group-item">Plan : <b>RSA</b></li>
									<li class="list-group-item">Product : <b>Dapibus ac facilisis in</b></li>
									<li class="list-group-item">Tenure : <b>1 year</b></li>
									<li class="list-group-item">Base Premium  : <b>Rs 600</b></li>
								<li class="list-group-item">Available Balance : <b>Rs 600</b></li>
 								<li class="list-group-item">GST @ 18% : <b>Rs 160</b></li>
										<li class="list-group-item">Total Payable : <b>Rs 760</b></li>
 									<li class="list-group-item">Balance after Purchase : <b>Rs 600</b></li>
 									<button class="btn btn-primary btn-generate" type="submit">Generate Policy</button>
 							</ul>
							</div-->
					

									<div class="modal fade" id="policyModal" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Notification</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body m-3">
													<p class="mb-0" id="responseText"></p>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
													<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
												</div>
											</div>
										</div>
									</div>
					</div> 
				</div>
			</main>

				 <?= $this->include('dealer/layouts/footer'); ?>

		</div>
	</div>

	<script src="<?= base_url('public/admin-assets/js/app.js') ?>"></script>
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

		function updateSummary()
		{
			alert("sdsd");
			 $.ajax({
            url: "<?= base_url('generate-policy') ?>",
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

		$('#tenure').on('change', function () {

			var limited_amount = parseFloat($("#limited_amount").val());
			var premium_amount = parseFloat($("#premium").val());
			var total = premium_amount * parseFloat($(this).val());
			if (total > limited_amount) 
			{
				$("#policyModal").modal("show");

                $('#responseText').text(
                    'Premium cannot be more than ₹' + limited_amount
                );
                	$("#tenure").val(1);
			}
		 });
		 

		$('#premium').on('blur', function () {
    var premiumIncGST = parseFloat($(this).val());
    //var tenure = parseFloat($("#tenure").val());
    var tenure = parseFloat(1);
    var gstPercentage = 18;
    var premiumIncGSTWithTenure = premiumIncGST * tenure;
    $.ajax({
        url: "<?= base_url('check-premium'); ?>",
        type: "GET",
        dataType: "json",
        success: function(response) {

            if ((premiumIncGSTWithTenure) > parseFloat(response.limited_premium)) {
            	 $("#policyModal").modal("show");

                $('#responseText').text(
                    'Premium cannot be more than ₹' + response.limited_premium
                );

                $('#premium').val('').focus();

            } else {
                //$('#responseText').html('');
            	if (!isNaN(premiumIncGSTWithTenure)) {
            			$('#limited_amount').val(response.limited_premium);
            				
					        var premiumExGST = premiumIncGSTWithTenure / (1 + (gstPercentage / 100));
					        var gstAmount = premiumIncGSTWithTenure - premiumExGST;

					        $('#premium_ex_gst').val(premiumExGST.toFixed(2));
					        $('#gst_amount').val(gstAmount.toFixed(2));
					        var date = new Date(); // Current date
									date.setFullYear(date.getFullYear() + 1);
									let newDate = date.toISOString().split('T')[0];
					        $("#expiry_date").val(newDate);
					    }
            }
        }
    });

});
``
	</script>
</body>

</html>