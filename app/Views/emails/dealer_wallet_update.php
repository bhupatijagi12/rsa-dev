<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>

<h2>Global Aid Assurance</h2>

<p>Dear <?= $dealer_name; ?>,</p>

<p>You have successfully updated below Transactions details.</p>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <td><strong>Dealer Code</strong></td>
        <td><?= $dealer_code; ?></td>
    </tr>
    <tr>
        <td><strong>Submission Date</strong></td>
        <td><?= date('d-m-Y H:i:s'); ?></td>
    </tr>
     <tr>
        <td><strong>Transaction Number</strong></td>
        <td><?= $utr_no; ?></td>
    </tr>
     <tr>
        <td><strong>Transaction Amount</strong></td>
        <td><?= $amount; ?></td>
    </tr>
</table>

<p>
Our team will review the documents and update the status shortly.
</p>

<p>
Regards,<br>
Global Aid Assurance
</p>

</body>
</html>