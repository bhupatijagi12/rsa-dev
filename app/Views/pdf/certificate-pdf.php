<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Policy Certificate</title>

<style>
body{
    font-family: DejaVu Sans, sans-serif;
    font-size:12px;
    color:#222;
    margin:0;
    padding:0;
}

.header{
    background:#0b2d63;
    color:#fff;
    padding:5px;
}

.header h1{
    margin:0;
    font-size:12px;
}

.header p{
    margin:2px 0 0;
}

.section-title{
    background:#f1f3f8;
    color:#0b2d63;
    padding:6px;
    font-size:10px;
    font-weight:bold;
    border:1px solid #ddd;
}

.container{
    padding:5px;
}

.box{
    border:1px solid #d9d9d9;
    margin-bottom:4px;
}

table{
    width:100%;
    border-collapse:collapse;
}

td,th{
    padding:7px;
    border:1px solid #ddd;
    font-size: 7px;
}

.label{
    font-size:7px;
    color:#666;
    text-transform:uppercase;
}

.value{
    font-weight:bold;
    font-size:9px;
}

.payment-table td{
    text-align:center;
}

.payment-head{
    background:#f3f5fa;
    font-size:10px;
}

.payment-value{
    font-size:12px;
    font-weight:bold;
}

.feature-table td{
    border:1px solid #e4e4e4;
}

.yes{
    text-align:center;
    background:#0d6efd;
    color:#fff;
    font-weight:bold;
}

.footer{
    background:#0d6efd;
    color:#fff;
    padding:10px;
    font-size:11px;
    margin-top:10px;
}

.page-break{
    page-break-before:always;
}
</style>

</head>
<body>
     <center><img src="<?= $logo; ?>" width="190"></center>
     
<div class="header">
   <center> <h1>CERTIFICATE</h1>
    <!-- <p>Medical Assistance + Complimentary Personal Accident Cover</p> -->
    <p>Assistance / Queries : 8510085600</p></center>
</div>

<div class="container">

<table class="payment-table">
<tr>
<td width="33%">
<div class="payment-head">PLAN AMOUNT</div>
<div class="payment-value">₹<?= $premium_ex_gst; ?></div>
</td>

<td width="33%">
<div class="payment-head">GST</div>
<div class="payment-value">₹<?= $gst; ?></div>
</td>

<td width="33%">
<div class="payment-head">TOTAL AMOUNT</div>
<div class="payment-value">₹<?= $premium; ?></div>
</td>
</tr>
</table>

<br>

<div class="section-title">
Certificate & Coverage Details
</div>

<table>
<tr>
<td width="35%">
<div class="label">Certificate Number</div>
<div class="value"><?= $policy_no; ?></div>
</td>

<td width="35%">
<div class="label">Plan Name</div>
<div class="value"><?= $plan; ?></div>
</td>

<td width="35%">
<div class="label">Plan Code</div>
<div class="value"><?= $code; ?></div>
</td>
</tr>

<tr>
<td>
<div class="label">Start Date</div>
<div class="value"><?= date('d/m/Y',strtotime($start_date)) ?></div>
</td>

<td>
<div class="label">End Date</div>
<div class="value"><?= date('d/m/Y',strtotime($expiry_date)) ?></div>
</td>
</tr>
</table>

<br>

<div class="section-title">
Vehicle Details
</div>

<table>
<tr>
<td><span class="label">Make</span> <?= $make ?></td>
<td><span class="label">Model</span> <?= $model ?></td>
</tr>

<tr>
<td><span class="label">Registration No</span> <?= $veh_reg_no ?></td>
<td><span class="label">Engine No</span> <?= $engine_no ?></td>
</tr>

<tr>
<td colspan="2">
<span class="label">Chassis No</span><br>
<?= $chassis_no ?>
</td>
</tr>
</table>

<br>

<div class="section-title">
Customer Details
</div>

<table>

<tr>
<td>
<span class="label">First Name</span>
<?= $firstname; ?>
</td>
<td>
<span class="label">Middle Name</span>
<?= $middlename ?? "-"; ?>
</td>
<td>
<span class="label">Last Name</span>
<?= $lastname ?? "-"; ?>
</td>
</tr>

<tr>
<td>
<span class="label">Date of Birth</span>
<?= $dob; ?>
</td>

<td>
<span class="label">Mobile Number</span>
<?= $mobile; ?>
</td>
</tr>

<tr>
<td colspan="2">
<span class="label">Address</span>
<?= $address; ?>
</td>
</tr>

<tr>
    <td>
<span class="label">State</span>
<?= $state; ?>
</td>
<td>
<span class="label">City</span>
<?= $city; ?>
</td>

<td>
<span class="label">Pin Code</span>
<?= $pincode; ?>
</td>
</tr>

</table>

<br>

<div class="section-title">
Nominee Details
</div>

<table>

<tr>
<td><?= $nominee_firstname; ?> <?= $nominee_middlename; ?> <?= $nominee_lastname; ?></td>
<td><?= $relationship; ?></td>
<td><?php $gender; ?></td>
</tr>

</table>

<br>
<br>
<br>
<div class="section-title">
Plan Features & Benefits
</div>

<table class="feature-table">

<tr>
<td>Emergency Message Transmission</td>
<td class="yes">YES</td>
<td>Scope of Services: Covers emergency on-spot minor repairs, tire changes, fuel delivery, or towing to the nearest authorized garage upon mechanical, electrical, or accidental breakdown.</td>
</tr>

<tr>
<td>Doctor on Call (Family of 6)</td>
<td class="yes">YES</td>
<td>Usage Caps: Free or included services are usually restricted to a maximum number of events per year (e.g., up to 4 services annually for standard two-wheeler or car add-ons).</td>
</tr>

<tr>
<td>Complimentary Personal Accident Cover</td>
<td class="yes">YES</td>
<td>Scope of Services: Covers emergency on-spot minor repairs, tire changes, fuel delivery, or towing to the nearest authorized garage upon mechanical, electrical, or accidental breakdown.</td>
</tr>

<tr>
<td>Discounts on Diagnostics</td>
<td class="yes">YES</td>
<td>Usage Caps: Free or included services are usually restricted to a maximum number of events per year (e.g., up to 4 services annually for standard two-wheeler or car add-ons).</td>
</tr>

<tr>
<td>Ambulance Assistance</td>
<td class="yes">YES</td>
<td>Scope of Services: Covers emergency on-spot minor repairs, tire changes, fuel delivery, or towing to the nearest authorized garage upon mechanical, electrical, or accidental breakdown.</td>
</tr>

<tr>
<td>Taxi Assistance</td>
<td class="yes">YES</td>
<td>Usage Caps: Free or included services are usually restricted to a maximum number of events per year (e.g., up to 4 services annually for standard two-wheeler or car add-ons).</td>
</tr>

<tr>
<td>Road Side Legal Assistance</td>
<td class="yes">YES</td>
<td>Scope of Services: Covers emergency on-spot minor repairs, tire changes, fuel delivery, or towing to the nearest authorized garage upon mechanical, electrical, or accidental breakdown.</td>
</tr>

</table>


</div>

<div class="page-break"></div>

<div class="header">
<h1>Insurance Details</h1>
</div>

<div class="container">

<div class="section-title">
Master Policy Holder
</div>

<table>
<tr>
<td>GLOBAL AID ASSURANCE PRIVATE LIMITED</td>
</tr>
</table>

<br>

<div class="section-title">
Insured & Nominee Information
</div>

<table>

<tr>
<td>Certificate No</td>
<td><?= $policy_no; ?></td>
</tr>

<tr>
<td>Insured Name</td>
<td><?= $firstname.' '.$lastname; ?></td>
</tr>

<tr>
<td>DOB</td>
<td><?= $dob; ?></td>
</tr>

<tr>
<td>Nominee Name</td>
<td><?= $nominee_firstname; ?></td>
</tr>

<tr>
<td>Relationship</td>
<td><?= $relationship; ?></td>
</tr>

</table>

<br>

<div class="section-title">
Coverage Details
</div>

<div style="border:1px solid #ddd;padding:10px;line-height:20px;">
Enrolled Member will be covered in case of accidental Death or permanentTotal Disability while the insured is driving or
accompanied the vehicle, covered under the Roadside Assistance oranyassistance plan offered by Across Assist or
accompanied the vehicle covered under the plan mentioned above asa passenger or drivingthe vehicle.This master policy has
been booked in the name of Across Assist Pvt Ltd. And insurance is provided by Manipal Cigna Health Insurance Company
Limited.This benefit will be offered subject to termsand conditions of Manipal Cigna Health Insurance Company limited
applicable to this product..
</div>
<p>For detailed policy wordings, please refer to the link <a target="_blank" href="https://globalaidassurance.com/policies.html#terms">click here</a></p>
</div>
<div class="footer">
For detailed terms & conditions please refer to the policy document.
</div>

</body>
</html>
