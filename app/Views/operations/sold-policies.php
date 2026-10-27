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

	<title>Policy List</title>

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
						<h1 class="h3 d-inline align-middle">Sold Policy</h1>
					</div>

					<div class="row">
						<div class="col-12">
							
							<div class="card">
								
								<div class="card-body">
									<table id="datatables-multi" class="table table-striped" >
										<thead>
											<tr>
												<th>Certificate No</th>
												<th>Premium (with GST)</th>
												<th>GST Amount</th>
												<th>Premium Ex GST</th>
												<th>Start Date</th>
												<th>End Date</th>
												<th>Status</th>
												<th>#</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($policies as $policy) : ?>
											<tr>
												<td><?= esc($policy['policy_no']) ?></td>
												<td><?= esc($policy['premium_payable']) ?></td>
												<td><?= esc($policy['gst']) ?></td>
												<td><?= esc($policy['premium_ex_gst']) ?></td>
												<td><?= esc($policy['certificate_start_date']) ?></td>
												<td><?= esc($policy['certificate_end_date']) ?></td>
												<td><?= esc($policy['status_name']) ?></td>
												<td><a href="<?= base_url('policy/view/'."POL".$policyNo = str_replace('/', '-', $policy['policy_no']))?>.pdf" class="btn btn-primary" target="_blank">Download Policy</a></td>
											</tr>
											 <?php endforeach; ?>
											<!--tr>
												<td>Tiger Nixon</td>
												<td>System Architect</td>
												<td>Edinburgh</td>
												<td>61</td>
												<td>2023/04/25</td>
												<td>$320,800</td>
												<td>$320,800</td>
												<td>2023/04/25</td>
												<td>$320,800</td>
												<td>$320,800</td>
												<td>$320,800</td>
											</tr>
											<tr>
												<td>Tiger Nixon</td>
												<td>System Architect</td>
												<td>Edinburgh</td>
												<td>61</td>
												<td>2023/04/25</td>
												<td>$320,800</td>
												<td>$320,800</td>
												<td>2023/04/25</td>
												<td>$320,800</td>
												<td>$320,800</td>
												<td>$320,800</td>
											</tr>
										<tr>
												<td>Tiger Nixon</td>
												<td>System Architect</td>
												<td>Edinburgh</td>
												<td>61</td>
												<td>2023/04/25</td>
												<td>$320,800</td>
												<td>$320,800</td>
												<td>2023/04/25</td>
												<td>$320,800</td>
												<td>$320,800</td>
												<td>$320,800</td>
											</tr>
											<tr>
												<td>Tiger Nixon</td>
												<td>System Architect</td>
												<td>Edinburgh</td>
												<td>61</td>
												<td>2023/04/25</td>
												<td>$320,800</td>
												<td>$320,800</td>
												<td>2023/04/25</td>
												<td>$320,800</td>
												<td>$320,800</td>
												<td>$320,800</td>
											</tr>
											<tr>
												<td>Tiger Nixon</td>
												<td>System Architect</td>
												<td>Edinburgh</td>
												<td>61</td>
												<td>2023/04/25</td>
												<td>$320,800</td>
												<td>$320,800</td>
												<td>2023/04/25</td>
												<td>$320,800</td>
												<td>$320,800</td>
												<td>$320,800</td>
											</tr>
											<tr>
												<td>Tiger Nixon</td>
												<td>System Architect</td>
												<td>Edinburgh</td>
												<td>61</td>
												<td>2023/04/25</td>
												<td>$320,800</td>
												<td>$320,800</td>
												<td>2023/04/25</td>
												<td>$320,800</td>
												<td>$320,800</td>
												<td>$320,800</td>
											</tr>
											<tr>
												<td>Tiger Nixon</td>
												<td>System Architect</td>
												<td>Edinburgh</td>
												<td>61</td>
												<td>2023/04/25</td>
												<td>$320,800</td>
												<td>$320,800</td>
												<td>2023/04/25</td>
												<td>$320,800</td>
												<td>$320,800</td>
												<td>$320,800</td>
											</tr>
											<tr>
												<td>Tiger Nixon</td>
												<td>System Architect</td>
												<td>Edinburgh</td>
												<td>61</td>
												<td>2023/04/25</td>
												<td>$320,800</td>
												<td>$320,800</td>
												<td>2023/04/25</td>
												<td>$320,800</td>
												<td>$320,800</td>
												<td>$320,800</td>
											</tr>
											<tr>
												<td>Tiger Nixon</td>
												<td>System Architect</td>
												<td>Edinburgh</td>
												<td>61</td>
												<td>2023/04/25</td>
												<td>$320,800</td>
												<td>$320,800</td>
												<td>2023/04/25</td>
												<td>$320,800</td>
												<td>$320,800</td>
												<td>$320,800</td>
											</tr>
											<tr>
												<td>Tiger Nixon</td>
												<td>System Architect</td>
												<td>Edinburgh</td>
												<td>61</td>
												<td>2023/04/25</td>
												<td>$320,800</td>
												<td>$320,800</td>
												<td>2023/04/25</td>
												<td>$320,800</td>
												<td>$320,800</td>
												<td>$320,800</td>
											</tr-->
										</tbody>
									</table>
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