<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<style>

body{
    font-family: DejaVu Sans, sans-serif;
    font-size:12px;
    color:#333;
}

table{
    width:100%;
    border-collapse:collapse;
}

.section-title{
    background:#0d6efd;
    color:#fff;
    padding:8px;
    font-weight:bold;
    margin-top:15px;
}

.header{
    border-bottom:3px solid #0d6efd;
    margin-bottom:20px;
    padding-bottom:10px;
}

.logo{
    height:70px;
}

.company-name{
    font-size:24px;
    font-weight:bold;
    color:#0d6efd;
}

.policy-title{
    font-size:18px;
    font-weight:bold;
    text-align:center;
    margin-top:10px;
}

.info-table td{
    border:1px solid #ddd;
    padding:8px;
}

.details-table td{
    border:1px solid #ddd;
    padding:8px;
}

.label{
    font-weight:bold;
    width:35%;
    background:#f5f5f5;
}

.footer{
    margin-top:30px;
    font-size:10px;
    text-align:center;
    color:#666;
}

.signature{
    margin-top:50px;
}

.signature-box{
    width:200px;
    border-top:1px solid #000;
    text-align:center;
    padding-top:5px;
    float:right;
}

.tnc{
    font-size:11px;
    line-height:18px;
}

</style>

</head>

<body>

<!-- HEADER -->

<table class="header">
    <tr>

        <td width="20%">
            <img src='<?= base_url('public/assets/logo.png'); ?>' class="logo">
        </td>

        <td width="50%" style="text-align:center">
            <div class="company-name">
                GLOBAL AID ASSURANCE
            </div>

            <div>
                Roadside Assistance Program
            </div>

            <div class="policy-title">
                CERTIFICATE
            </div>
        </td>

        <td width="30%" style="text-align:right">

            <?php if(!empty($dealer_logo)){ ?>

               <!--  <?= FCPATH.$dealer_logo; ?>  -->
                          <img src='<?= $dealer_logo; ?>' class="logo">


            <?php } ?>

        </td>

    </tr>
</table>

<!-- POLICY DETAILS -->

<div class="section-title">
    Policy Details
</div>

<table class="info-table">

    <tr>
        <td class="label">Certificate Number</td>
        <td><?= $policy_no ?></td>

        <td class="label">Issue Date</td>
        <td><?= $certificate_issue_datetime ?></td>
    </tr>
     <tr>
        <td class="label">Certificate Start Date</td>
        <td><?= $start_date ?></td>

        <td class="label">Certificate End Date</td>
        <td><?= $expiry_date ?></td>
    </tr>

    <tr>
        <td class="label">Dealer Name</td>
        <td><?= $dealer_name ?></td>

        <td class="label">Dealer Code</td>
        <td><?= $dealer_code ?></td>
    </tr>

</table>

<!-- CUSTOMER DETAILS -->

<div class="section-title">
    Policy Holder Details
</div>

<table class="details-table">

    <tr>
        <td class="label">First Name</td>
        <td><?= $firstname ?></td>
    </tr>
      <tr>
        <td class="label">Middle Name</td>
        <td><?= $middlename ?></td>
    </tr>

    <tr>
        <td class="label">Last Name</td>
        <td><?= $lastname ?></td>
    </tr>
     <tr>
        <td class="label">Gender</td>
        <td><?= $gender ?></td>
    </tr>
    <tr>
        <td class="label">Mobile Number</td>
        <td><?= $mobile ?></td>
    </tr>

    <tr>
        <td class="label">Email Address</td>
        <td><?= $email ?></td>
    </tr>

      <tr>
        <td class="label">state</td>
        <td><?= $state ?></td>
    </tr>

     <tr>
        <td class="label">city</td>
        <td><?= $city ?></td>
    </tr>
     <tr>
        <td class="label">address</td>
        <td><?= $address ?></td>
    </tr>

    <tr>
        <td class="label">Pincode</td>
        <td><?= $pincode ?></td>
    </tr>

</table>

<!-- VEHICLE DETAILS -->

<div class="section-title">
    Vehicle Details
</div>

<table class="details-table">

    <tr>
        <td class="label">Engine Number</td>
        <td><?= $engine_no ?></td>
    </tr>

    <tr>
        <td class="label">Chassis Number</td>
        <td><?= $chassis_no ?></td>
    </tr>

    <tr>
        <td class="label">Vehicle Type</td>
        <td><?= $vehicle_type ?></td>
    </tr>

    <tr>
        <td class="label">Vehicle Model</td>
        <td><?= $vehicle_model ?></td>
    </tr>

</table>

<!-- PLAN DETAILS -->

<div class="section-title">
    Coverage Details
</div>

<table class="details-table">

    <tr>
        <td class="label">Plan</td>
        <td><?= $plan ?></td>
    </tr>

    <tr>
        <td class="label">Tenure</td>
        <td><?= $tenure ?> Year(s)</td>
    </tr>

    <tr>
        <td class="label">Start Date</td>
        <td><?= $start_date ?></td>
    </tr>

    <tr>
        <td class="label">Expiry Date</td>
        <td><?= $expiry_date ?></td>
    </tr>

</table>

<!-- PREMIUM -->

<div class="section-title">
    Premium Details
</div>

<table class="details-table">

    <tr>
        <td class="label">Premium Amount without GST</td>
        <td>
            ₹ <?= $premium_ex_gst ?>
        </td>
    </tr>
    <tr>
        <td class="label">GST Amount</td>
        <td>
            ₹ <?= $gst ?>
        </td>
    </tr>
    <tr>
        <td class="label">Premium Amount</td>
        <td>
            ₹ <?= $premium ?>
        </td>
    </tr>

    <tr>
        <td class="label">Payment Status</td>
        <td>
            PAID
        </td>
    </tr>

</table>

<!-- BENEFITS -->

<div class="section-title">
    RSA Benefits Covered
</div>

<table class="details-table">

    <tr>
        <td>✔ 24x7 Roadside Assistance</td>
    </tr>

    <tr>
        <td>✔ Towing Assistance</td>
    </tr>

    <tr>
        <td>✔ Battery Jump Start</td>
    </tr>

    <tr>
        <td>✔ Flat Tyre Support</td>
    </tr>

    <tr>
        <td>✔ Fuel Delivery Assistance</td>
    </tr>

    <tr>
        <td>✔ Minor On-site Repair Assistance</td>
    </tr>

</table>

<!-- TERMS -->

<div class="section-title">
    Terms & Conditions
</div>

<div class="tnc">

1. RSA services are available during the policy period only.<br>
2. Services are subject to policy terms and operational conditions.<br>
3. Assistance requests are serviced through authorized service providers.<br>
4. Misrepresentation of information may result in cancellation of the policy.<br>
5. Global Aid Assurance reserves the right to amend service conditions.<br>

</div>

<!-- SIGNATURE -->

<div class="signature">

    <div class="signature-box">
        Authorized Signatory
    </div>

</div>

<div style="clear:both"></div>

<!-- FOOTER -->

<div class="footer">

    Global Aid Assurance Pvt. Ltd.<br>

    Customer Support : 24 x 7 Roadside Assistance Helpdesk<br>

    This is a computer-generated certificate and does not require a physical signature.

</div>

</body>
</html>