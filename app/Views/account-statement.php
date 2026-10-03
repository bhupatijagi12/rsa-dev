<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Account Statement · GlobalAid Assurance RSA Portal</title>
<link rel="icon" href="data:,">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('public/assets/style.css'); ?>">
</head>
<body>

<div class="app">

 <?= $this->include('layouts/sidebar'); ?>
  <div class="main">
    <?= $this->include('layouts/header'); ?>
    

    <div class="content">
      <div class="page-head">
        <h1>Account Statement</h1>
        <p>Latest entries across both wallets · updated live</p>
      </div>

      <div style="display:flex;gap:8px;margin-bottom:16px;">
        <div class="filter-chip active">All</div>
        <div class="filter-chip">Policy punch</div>
        <div class="filter-chip">Commission</div>
        <div class="filter-chip">Wallet Debit/Credit</div>
      </div>

      <div class="card">
        <table>
          <thead><tr><th>Date</th><th>Particulars</th><th>Reference</th><th style="text-align:right;">Debit</th><th style="text-align:right;">Credit</th><th style="text-align:right;">Balance</th></tr></thead>
          <tbody>
            <tr><td>18 Sep, 11:45</td><td>Commission<br><span style="color:var(--ink-soft);font-size:11px;">Commission</span></td><td>1178971214326568726</td><td style="text-align:right;">—</td><td style="text-align:right;color:var(--green-600);">₹70</td><td style="text-align:right;"><b>₹230</b></td></tr>
            <tr><td>18 Sep, 11:45</td><td>Policy Created<br><span style="color:var(--ink-soft);font-size:11px;">Policy Created</span></td><td>1178971214326568726</td><td style="text-align:right;color:var(--red);">₹249</td><td style="text-align:right;">—</td><td style="text-align:right;"><b>₹3,281.15</b></td></tr>
            <tr><td>13 Sep, 13:26</td><td>Commission<br><span style="color:var(--ink-soft);font-size:11px;">Commission</span></td><td>3617892861631810970</td><td style="text-align:right;">—</td><td style="text-align:right;color:var(--green-600);">₹90</td><td style="text-align:right;"><b>₹160</b></td></tr>
            <tr><td>13 Sep, 13:26</td><td>Policy Created<br><span style="color:var(--ink-soft);font-size:11px;">Policy Created</span></td><td>3617892861631810970</td><td style="text-align:right;color:var(--red);">₹345</td><td style="text-align:right;">—</td><td style="text-align:right;"><b>₹3,530.15</b></td></tr>
            <tr><td>8 Sep, 13:13</td><td>Commission<br><span style="color:var(--ink-soft);font-size:11px;">Commission</span></td><td>1178885341817551702</td><td style="text-align:right;">—</td><td style="text-align:right;color:var(--green-600);">₹70</td><td style="text-align:right;"><b>₹70</b></td></tr>
          </tbody>
        </table>
        <div style="display:flex;justify-content:space-between;align-items:center;margin-top:14px;">
          <span style="font-size:12px;color:var(--ink-soft);">Latest 5 entries</span>
          <button class="btn btn-ghost">Open full statement</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="<?= base_url('public/assets/app.js'); ?>"></script>
</body>
</html>
