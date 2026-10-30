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
p {
    font-size: 10px;
}
</style>

</head>
<body>
     <center><img src="<?= $logo; ?>" width="190"></center>
     
<div class="header">
   <center> <h1><?= $certificate_name; ?></h1>
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
<td>
<span class="label">First Name</span>
<?= $nominee_firstname; ?>
</td>
<td>
<span class="label">Middle Name</span>
<?= $nominee_middlename ?? "-"; ?>
</td>
<td>
<span class="label">Last Name</span>
<?= $nominee_lastname ?? "-"; ?>
</td>
</tr>

<tr>
<td>
<span class="label">Relationship</span>
<?= $relationship; ?>
</td>
<td>
<span class="label">Gender</span>
<?= $nominee_gender ?? "-"; ?>
</td>
<td>
<span class="label">Age</span>
<?= $nominee_dob ?? "-"; ?>
</td>
</tr>

</table>

<br>
<br>
<br>
<div class="section-title">
Plan Features & Benefits
</div>

<table class="feature-table">
<?php foreach ($remarks as $remark) : ?>
<tr>
<td><?= $remark['product_name']?></td>
<td class="yes">YES</td>
<td><?= $remark['remarks']?></td>
</tr>
<?php endforeach; ?>
<!--tr>
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
</tr-->

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
<p><b>DISCLAIMER – INSURANCE COVERAGE AND ASSISTANCE SERVICES</b></p>
<p>1. Insurance Coverage and Benefits</p>
<p>Where applicable to the member’s selected plan, insurance benefits are underwritten by Niva Bupa Health Insurance Company Limited or the relevant insurer specified in the applicable insurance policy documents. Such benefits are subject to the terms and conditions of the relevant insurance policy, including eligibility criteria, coverage limits, exclusions, waiting periods, applicable deductibles, enrolment requirements and claims procedures.
The benefits outlined in this cover letter are intended to provide a summary of the benefits applicable to the selected plan and should be read in conjunction with the relevant insurance policy documents. The actual scope of insurance coverage shall be determined by the applicable policy wording and the insurer-issued documentation.
</p>
<p>2. Role of Global Aid Assurance Services Pvt. Ltd.</p>
<p>Global Aid Assurance Services Pvt. Ltd. (“Global Aid”) facilitates and coordinates the applicable roadside assistance, medical assistance and related member support services in accordance with the selected plan and its applicable terms. Where insurance benefits form part of the selected plan, such benefits shall be governed by the relevant insurance policy and the applicable insurance arrangements.
Global Aid’s role in coordinating assistance services does not constitute a guarantee of insurance coverage or claim approval. The assessment, admissibility and settlement of insurance claims shall be subject to the applicable policy terms and the insurer’s determination in accordance with applicable law.
</p>
<p>3. Roadside Assistance and Medical Assistance Services</p>
<p>Roadside Assistance (RSA), Medical Assistance and other non-insurance services, wherever included in the selected plan, are distinct from insurance benefits and shall be provided or coordinated, as applicable, in accordance with the relevant service terms, eligibility criteria, coverage limits, geographical availability and operational conditions.
The availability and delivery of assistance services may depend on the nature of the request, the member’s location, service-provider availability and other conditions specified under the applicable plan. Any service-specific limits, exclusions or reimbursement conditions shall apply as communicated in the relevant plan documentation.
</p>
<div class="page-break"></div>
<p>4. Enrolment and Claims</p>
<p>Insurance benefits, where applicable, shall be available only to eligible members who have been enrolled in accordance with the applicable insurance arrangements and whose coverage is valid under the relevant policy. Submission of member details or receipt of this cover letter shall not, by itself, be construed as confirmation of insurance coverage unless the applicable enrolment and policy requirements have been fulfilled.
Any insurance claim must be notified, documented and submitted in accordance with the applicable insurer’s prescribed procedures and timelines. The insurer shall assess the claim in accordance with the relevant policy terms and applicable law. Global Aid may facilitate communication or coordination, where applicable, but does not independently determine the admissibility or settlement of insurance claims.
Requests for assistance services shall be handled separately in accordance with the applicable service terms and procedures.
</p>
<p>5. Accuracy of Member Information</p>
<p>The member is responsible for providing complete and accurate information and documentation required for enrolment, verification, insurance claims and assistance services. Any incorrect, incomplete or misleading information may affect eligibility, coverage or the processing of a claim or service request, subject to the applicable policy terms and law.</p>
<p>6. Important Disclaimers</p>
<p>This cover letter is a summary of the benefits applicable to the member’s selected plan and is not, by itself, an insurance policy or a guarantee of any insurance benefit, claim approval, reimbursement or assistance outcome. No benefit shall be deemed to be covered unless it is expressly included in the applicable insurance policy or assistance service terms.
In the event of any inconsistency relating to insurance coverage or insurance benefits, the relevant insurer-issued policy documents shall prevail, subject to applicable law. For roadside assistance, medical assistance and other non-insurance services, the applicable service terms and plan documentation shall govern.
Nothing in this disclaimer shall be interpreted as excluding, limiting or overriding any right, obligation or liability that cannot lawfully be excluded, limited or overridden.
For clarification regarding assistance services, members may contact Global Aid through the contact details provided in their plan documentation. For insurance coverage and claim-related matters, members should refer to the relevant insurer and the contact details specified in the applicable insurance policy documents.
</p>
</div>
<p>For detailed policy wordings, please refer to the link <a target="_blank" href="https://globalaidassurance.com/policies.html#terms">click here</a></p>
</div>
<div class="footer">
For detailed terms & conditions please refer to the policy document.
</div>

</body>
</html>
