<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>GST Transactions · GlobalAid Assurance RSA Portal</title>
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
    <div class="content" style="">
      <div class="list-hero"></div>
      <div class="list-panel">
        <h1>GST Transactions</h1>
        <p>View GST charged on your commission invoices, ready for input-credit reconciliation.</p>
      </div>
      <div class="list-body">
        <div class="data-card">
          
          <div style="padding:18px 20px 0;">
      <div class="filters-row">
        <div class="date-range">Start date → End date <span>📅</span></div>
        <div class="spacer"></div>
      <span class="funnel">⿰</span>
      <div class="search-wrap">
        <select><option>Search field</option></select>
        <input type="text" placeholder="Search here...">
        <button>🔍</button>
      </div>
      </div>
          </div>
          <div class="data-table-wrap">
            <table>
              <thead><tr><th>Invoice No.</th><th>Cycle</th><th style="text-align:right;">Taxable Amount</th><th style="text-align:right;">GST @ 18%</th><th>Status</th></tr></thead>
              <tbody>
            <tr><td><b>45</b></td><td>08-2026</td><td style="text-align:right;">₹520</td><td style="text-align:right;">₹93.6</td><td><span class="pill approved">Filed</span></td></tr>
            <tr><td><b>44</b></td><td>07-2026</td><td style="text-align:right;">₹1,030</td><td style="text-align:right;">₹185.4</td><td><span class="pill approved">Filed</span></td></tr>
            <tr><td><b>43</b></td><td>06-2026</td><td style="text-align:right;">₹690</td><td style="text-align:right;">₹124.2</td><td><span class="pill approved">Filed</span></td></tr>
            <tr><td><b>42</b></td><td>05-2026</td><td style="text-align:right;">₹1,230</td><td style="text-align:right;">₹221.4</td><td><span class="pill approved">Filed</span></td></tr>
            <tr><td><b>40</b></td><td>04-2026</td><td style="text-align:right;">₹780</td><td style="text-align:right;">₹140.4</td><td><span class="pill approved">Filed</span></td></tr>
              </tbody>
            </table>
          </div>
      <div class="pagination-row">
        <span>Total 5 items</span>
        <div class="pages">
          <button>‹</button>
          <button class="active">1</button>
          <button>›</button>
        </div>
        <select><option>5 / page</option></select>
      </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="<?= base_url('public/assets/app.js'); ?>"></script>
</body>
</html>
