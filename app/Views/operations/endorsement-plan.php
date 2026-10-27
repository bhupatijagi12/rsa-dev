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
		h5 {
			color:#fff;
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
							<?php if (session()->getFlashdata('error')) : ?>
						 		<p style="color:white" class="btn btn-danger"><?= session()->getFlashdata('error'); ?></p>
						 		<?php endif; ?>
							<form class="row needs-validation" novalidate  method="post" id="policyForm" action="<?= base_url('/ops/endorsement/update');?>" enctype="multipart/form-data">
							<div class="card">
								<div class="btn btn-primary">
									<h5 class="heading-line" style="float:left;">Vehicle details</h5>
							</div>
								
						 		
								<div class="card-body">
									

										<div class="col-md-12">
									<div class="row">
											<div class="col-md-6">
											<label for="certificate_no" class="form-label">Vehicle Reg No</label>
											<input type="text" class="form-control" value="<?= $details['veh_reg_no']; ?>" readonly id="veh_reg_no" name="veh_reg_no"  >
											<input type="hidden" name="endorse_policy_id" value="<?= $endorse_policy_id; ?>">
										</div>
										<div class="col-md-6">
											<label for="" class="form-label">Updated Vehicle Reg No</label>
											<input type="text" class="form-control compare-new" id="new_veh_reg_no" name="new_veh_reg_no" data-old="#veh_reg_no">
										  <div class="error-msg text-danger"></div>
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>
									</div>
									
									<div class="row">
											<div class="col-md-6">
											<label for="" class="form-label">Engine No</label>
											<input type="text" class="form-control" value="<?= $details['engine_no']; ?>" readonly id="engine_no" name="engine_no">
										</div>
										<div class="col-md-6">
											<label for="engine_no" class="form-label">Updated Engine No</label>
											<input type="text" class="form-control compare-new" id="new_engine_no" name="new_engine_no" data-old="#engine_no">
											<div class="error-msg text-danger"></div>
											<div class="valid-feedback">
												Looks good!
											</div>
											<div class="error-msg"></div>
										</div>
									</div>
									
									<div class="row">
											<div class="col-md-6">
											<label for="" class="form-label">Chassis No</label>
											<input type="text" class="form-control" value="<?= $details['chassis_no']; ?>" readonly id="chassis_no" name="chassis_no">
										</div>
										<div class="col-md-6">
											<label for="engine_no" class="form-label">Updated Chassis No</label>
											<input type="text" class="form-control compare-new" id="new_chassis_no" name="new_chassis_no" data-old="#chassis_no">
											<div class="error-msg text-danger"></div>
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>
									</div>
								</div>
							</div>
							</div>

								<div class="card">
									<div class="btn btn-primary">
									<h5 class="heading-line" style="float:left;">Policy holder details</h5>
									</div>
									<div class="card-body">
									<div class="col-md-12">
									<div class="row">
										
										<div class="col-md-6">
											<label for="" class="form-label">Policy Holder Firstname</label>
											<input type="text" class="form-control" value="<?= $details['firstname']; ?>" readonly id="firstname" name="firstname">
										</div>
										<div class="col-md-6">
											<label for="engine_no" class="form-label">Updated Policy Holder Firstname</label>
											<input type="text" class="form-control compare-new" id="new_firstname" name="new_firstname" data-old="#firstname">
											<div class="error-msg text-danger"></div>
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<label for="" class="form-label">Policy Holder Middlename</label>
											<input type="text" class="form-control" value="<?= $details['middlename']; ?>" readonly id="middlename" name="middlename">
										</div>
										<div class="col-md-6">
											<label for="engine_no" class="form-label">Updated Policy Holder Middlename</label>
											<input type="text" class="form-control compare-new" id="new_middlename" name="new_middlename" data-old="#middlename">
											<div class="error-msg text-danger"></div>
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>
									</div>

									<div class="row">
										
										<div class="col-md-6">
											<label for="" class="form-label">Policy Holder Lastname</label>
											<input type="text" class="form-control" value="<?= $details['lastname']; ?>" readonly id="lastname" name="lastname">
										</div>
										<div class="col-md-6">
											<label for="engine_no" class="form-label">Updated Policy Holder Lastname</label>
											<input type="text" class="form-control compare-new" id="new_lastname" name="new_lastname" data-old="#lastname">
											<div class="error-msg text-danger"></div>
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>
										
									</div>

									<div class="row">
										
										<div class="col-md-6">
											<label for="" class="form-label">Gender</label>
											<select class="form-select" disabled name="gender" id="gender">
												<option value="">Select</option>
										<option value="male" <?php if ($details['gender'] == 'male') { ?> selected <?php } ?>>Male</option>
										<option value="female" <?php if ($details['gender'] == 'female') { ?> selected <?php } ?>>Female</option>
               			 </select>
										</div>
										<div class="col-md-6">
											<label for="engine_no" class="form-label">Updated Gender</label>
											<select class="form-select compare-new" name="new_gender" id="new_gender" data-old="#gender">
												<option value="">Select</option>
										<option value="male">Male</option>
										<option value="female" >Female</option>
               			 </select>
											<div class="error-msg text-danger"></div>
										</div>
										
									</div>

									<div class="row">
										
										<div class="col-md-6">
											<label for="" class="form-label">Policy Holder Email Address</label>
											<input type="text" class="form-control" value="<?= $details['email']; ?>" readonly id="email" name="email">
										</div>
										<div class="col-md-6">
											<label for="email" class="form-label">Updated Policy Holder Email Address</label>
											<input type="text" class="form-control compare-new" id="new_email" name="new_email" data-old="#email">
											<div class="error-msg text-danger"></div>
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>
										
									</div>

									<div class="row">
										
										<div class="col-md-6">
											<label for="" class="form-label">Policy Holder Mobile No</label>
											<input type="text" class="form-control" value="<?= $details['mobile']; ?>" readonly id="mobile" name="mobile">
										</div>
										<div class="col-md-6">
											<label for="engine_no" class="form-label">Updated Policy Mobile No</label>
											<input type="text" class="form-control compare-new" maxlength="10" id="new_mobile" name="new_mobile" data-old="#mobile">
											<div class="error-msg text-danger"></div>
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>
										
									</div>

									<div class="row">
										
										<div class="col-md-6">
											<label for="" class="form-label">Policy Holder Address</label>
											<input type="text" class="form-control" value="<?= $details['address']; ?>" readonly id="address" name="address">
										</div>
										<div class="col-md-6">
											<label for="engine_no" class="form-label">Updated Policy Address</label>
											<input type="text" class="form-control compare-new" id="new_address" name="new_address" data-old="#address">
											<div class="error-msg text-danger"></div>
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>
										
									</div>

									<div class="row">
										
										<div class="col-md-6">
											<label for="" class="form-label">Policy Holder Occupation</label>
										
 									<input class="form-control" type="text" name="occupation" id="occupation" value="<?= $details['occupation']; ?>" readonly>

 								</select>
										</div>
										<div class="col-md-6">
											<label for="engine_no" class="form-label">Updated Policy Holder Occupation</label>
											<select class="form-control compare-new" name="new_occupation" id="new_occupation" data-old="#occupation">
 									<option value="">Select Occupation</option>
 									<option value="Salaried">Salaried</option>
 									<option value="Business">Business</option>
 									<option value="Retired">Retired</option>
 									<option value="Student">Student</option>
 									<option value="Homemaker">Homemaker</option>

 								</select>
 								<div class="error-msg text-danger"></div>
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>
										
									</div>


									<div class="row">
										
										<div class="col-md-6">
											<label for="" class="form-label">State</label>
											<select class="form-select" disabled name="state" id="state">
												 <?php foreach ($states as $state) : ?>
												 	 <option value="<?= $state['id']; ?>" <?php if ($details['state'] == $state['id']) { ?> selected <?php } ?>><?= $state['state_name']; ?></option>
                   <?php endforeach; ?>
											</select>
										</div>
										<div class="col-md-6">
											<label for="engine_no" class="form-label">Updated State</label>
											<select class="form-select" name="new_state" id="new_state" data-old="#state">
											<option selected disabled value="">Choose...</option>
 								 <?php foreach ($states as $state) : ?>
												 	 <option value="<?= $state['id']; ?>"><?= $state['state_name']; ?></option>
                   <?php endforeach; ?>
 								</select>
 								<!-- <div class="error-msg text-danger"></div> -->
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>
										
									</div>

									<div class="row">
										
										<div class="col-md-6">
											<label for="" class="form-label">City</label>
											<input type="text" class="form-control" value="<?= $cityName;?>" readonly id="city" name="city">
										</div>
										<div class="col-md-6">
											<label for="engine_no" class="form-label">Updated City</label>
											<select class="form-select compare-new" id="new_city" name="new_city" data-old="#city">
							    <option value="">Choose City</option>
							</select>
							<div class="error-msg text-danger"></div>
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>
										
									</div>

									<div class="row">
										
										<div class="col-md-6">
											<label for="" class="form-label">Policy Holder Pincode</label>
											<input type="text" class="form-control" value="<?= $details['pincode']; ?>" readonly id="pincode" name="pincode">
										</div>
										<div class="col-md-6">
											<label for="engine_no" class="form-label">Updated Pincode</label>
											<input type="text" class="form-control compare-new" maxlength="10" id="new_pincode" name="new_pincode" data-old="#pincode">
											<div class="error-msg text-danger"></div>
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>
										
									</div>

									</div>
								</div>
							</div>

							<div class="card">
								<div class="btn btn-primary">
									<h5 class="heading-line" style="float:left;">Nominee details</h5>
							</div>
								
						 		
								<div class="card-body">
									

										<div class="col-md-12">
									<div class="row">
											<div class="col-md-6">
											<label for="certificate_no" class="form-label">Nominee Firstname</label>
											<input type="text" class="form-control" value="<?= $details['nominee_firstname']; ?>" readonly id="nominee_firstname" name="nominee_firstname">
										</div>
										<div class="col-md-6">
											<label for="" class="form-label">Updated Nominee Firstname</label>
											<input type="text" class="form-control compare-new" id="new_nominee_firstname" name="new_nominee_firstname" data-old="#nominee_firstname">
											<div class="error-msg text-danger"></div>
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>
									</div>
									
									<div class="row">
											<div class="col-md-6">
											<label for="" class="form-label">Nominee Middlename</label>
											<input type="text" class="form-control" value="<?= $details['nominee_middlename']; ?>" readonly id="nominee_middlename" name="nominee_middlename">
										</div>
										<div class="col-md-6">
											<label for="engine_no" class="form-label">Updated Nominee Middlename</label>
											<input type="text" class="form-control compare-new" id="new_nominee_middlename" name="new_nominee_middlename" data-old="#nominee_middlename">
											<div class="error-msg text-danger"></div>
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>
									</div>
									
									<div class="row">
											<div class="col-md-6">
											<label for="" class="form-label">Nominee Lastname</label>
											<input type="text" class="form-control" value="<?= $details['nominee_lastname']; ?>" readonly id="nominee_lastname" name="nominee_lastname">
										</div>
										<div class="col-md-6">
											<label for="engine_no" class="form-label">Updated Nominee Lastname</label>
											<input type="text" class="form-control compare-new" id="new_nominee_lastname" name="new_nominee_lastname" data-old="#nominee_lastname">
											<div class="error-msg text-danger"></div>
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>
									</div>

									<div class="row">
											<div class="col-md-6">
											<label for="" class="form-label">Nominee Gender</label>
											<select class="form-select" disabled id="nominee_gender"  name="nominee_gender">
												<option value="">Select</option>
										<option value="male" <?php if ($details['nominee_gender'] == 'male') { ?> selected <?php } ?>>Male</option>
										<option value="female" <?php if ($details['nominee_gender'] == 'female') { ?> selected <?php } ?>>Female</option>
               			 </select>
										</div>
										<div class="col-md-6">
											<label for="engine_no" class="form-label">Updated Nominee Gender</label>
											<select class="form-select compare-new" id="new_nominee_gender"  name="new_nominee_gender" data-old="#nominee_gender">
												<option value="">Select</option>
										<option value="male">Male</option><option value="female">Female</option>
               			 </select>
               			 <div class="error-msg text-danger"></div>
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>
									</div>

									<div class="row">
											<div class="col-md-6">
											<label for="" class="form-label">Nominee Age</label>
											<input type="text" class="form-control" value="<?= $details['nominee_dob']?>" readonly  id="nominee_dob" name="nominee_dob">
										</div>
										<div class="col-md-6">
											<label for="engine_no" class="form-label">Updated Nominee Age</label>
											<input type="text" class="form-control compare-new" id="new_nominee_dob" name="new_nominee_dob" data-old="#nominee_dob">
											<div class="error-msg text-danger"></div>
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>
									</div>

									<div class="row">
											<div class="col-md-6">
											<label for="" class="form-label">Nominee Mobile</label>
											<input type="text" class="form-control" value="<?= $details['nominee_mobile']?>" readonly id="nominee_mobile" name="nominee_mobile">
										</div>
										<div class="col-md-6">
											<label for="engine_no" class="form-label">Updated Nominee Mobile</label>
											<input type="text" class="form-control compare-new" maxlength="10" id="new_nominee_mobile" name="new_nominee_mobile" data-old="#nominee_mobile">
											<div class="error-msg text-danger"></div>
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>
									</div>

									<div class="row">
											<div class="col-md-6">
											<label for="" class="form-label">Nominee Relationship</label>
											<input type="text" class="form-control" value="<?= $details['relationship']?>" readonly name="relationship" id="relationship">
										</div>
										<div class="col-md-6">
											<label for="engine_no" class="form-label">Updated Nominee Relationship</label>
											<select name="new_relationship" id="new_relationship" class="form-control compare-new" data-old="#relationship">
												<option value="">Select Relationship</option>
												<?php foreach ($relations as $relation) : ?>
												<option value="<?php echo $relation['relationship_name']?>"><?php echo $relation['relationship_name']?></option>
											<?php endforeach; ?>
											</select>
											<div class="error-msg text-danger"></div>
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>
									</div>

								</div>
							</div>
							</div>


							<div class="card">
										<div class="card-body">
												<div class="col-md-12"><br>
													<button class="btn btn-primary" type="submit">Submit</button>
												</div>
										</div>
									</div>
									</form>
							
							
						
							
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



		$('#new_state').on('change', function () {

    var state_id = $(this).val();

    $.ajax({
        url: "<?= base_url('get-cities') ?>",
        type: "POST",
        data: {
            state_id: state_id
        },
        dataType: "json",
        success: function(response) {

            $('#new_city').html('<option value="">Choose City</option>');

            $.each(response, function(index, city) {

                $('#new_city').append(
                    '<option value="' + city.id + '">' +
                    city.city_name +
                    '</option>'
                );

            });
        }
    });

});


$(document).ready(function () {

    function validateField(element)
    {
        let oldSelector = $(element).data('old');
        let oldValue = $.trim($(oldSelector).val()).toLowerCase();
        let newValue = $.trim($(element).val()).toLowerCase();

        let errorDiv = $(element).next('.error-msg');
       
         if (oldSelector === "#city")
        {
        	 newValue = $("#new_city option:selected").text().toLowerCase();
        }
        /* console.log("newValue = " + newValue);
        console.log("oldSelector = " + oldSelector);
         console.log("oldValue = " + oldValue);*/
        if (newValue !== '' && oldValue === newValue)
        {
            errorDiv.text('Old and New values cannot be same.');
            return false;
        }
        else
        {
            errorDiv.text('');
            return true;
        }

    }

    // Real-time validation
    $(document).on('keyup change blur', '.compare-new', function () {
        validateField(this);
    });

    // Form submit validation
    $('#policyForm').submit(function (e) {

        let isValid = true;

        $('.compare-new').each(function () {
            if (!validateField(this))
            {
                isValid = false;
            }
        });

        if (!isValid)
        {
            e.preventDefault();
        }
    });

});

	</script>
</body>


<!-- Mirrored from https://demo.adminkit.io/tables-datatables-multi by HTTrack Website Copier/3.x [XR&CO], Sat, 10 Oct 2026 06:59:21 GMT -->
</html>