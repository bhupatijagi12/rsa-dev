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
        <td><strong>Approved / Rejected Date</strong></td>
        <td><?= $updatedatetime; ?></td>
    </tr>
     <tr>
        <td><strong>Transaction Number</strong></td>
        <td><?= $utr_no; ?></td>
    </tr>
     <tr>
        <td><strong> Status</strong></td>
        <td><?= $status; ?></td>
    </tr>
    <tr>
        <td><strong> Approved / Rejected By</strong></td>
        <td><?= $updated_by; ?></td>
    </tr>
</table>

<p>
Thank you </p>

<p>
Regards,<br>
Global Aid Assurance
</p>

</body>
</html>