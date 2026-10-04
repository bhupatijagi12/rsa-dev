<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>

<h2>Global Aid Assurance</h2>

<p>Dear <?= $dealer_name; ?>,</p>

<p>Your onboarding documents have been <?= $status; ?>.</p>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <td><strong>Dealer Code</strong></td>
        <td><?= $dealer_code; ?></td>
    </tr>
    <tr>
        <td><strong><?= $status; ?> Date</strong></td>
        <td><?= date('d-m-Y H:i:s'); ?></td>
    </tr>
</table>


<p>
Regards,<br>
Global Aid Assurance
</p>

</body>
</html>