<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Invoice Listings · GlobalAid Assurance RSA Portal</title>
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
        <h1>Invoice Listings</h1>
        <p>Generate and manage invoices efficiently with detailed transaction records</p>
      </div>
      <div class="list-body">
        <div class="data-card">
          <div class='top-actions'><span></span><button class="btn btn-nav">Generate Invoice</button></div>
          <div style="padding:18px 20px 0;">
      <div class="filters-row">
        
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
              <thead><tr><th>Invoice No.</th><th>Invoice month</th><th>Invoice date</th><th>Transferred To</th><th style="text-align:right;">Taxable Amount</th><th>Status</th><th>Action</th></tr></thead>
              <tbody>
            <tr>
              <td><b>45</b></td><td>Aug 2026</td><td>2026-09-01</td>
              <td>Transferred to<br>Wallet</td>
              <td style="text-align:right;">₹520.00</td>
              <td><span class="pill approved">Approved</span></td>
              <td><button class="icon-btn">📄</button><button class="icon-btn">⬇</button></td>
            </tr>
            <tr>
              <td><b>43</b></td><td>Jun 2026</td><td>2026-08-04</td>
              <td>Transferred to<br>Wallet</td>
              <td style="text-align:right;">₹690.00</td>
              <td><span class="pill approved">Approved</span></td>
              <td><button class="icon-btn">📄</button><button class="icon-btn">⬇</button></td>
            </tr>
            <tr>
              <td><b>44</b></td><td>Jul 2026</td><td>2026-08-04</td>
              <td>Transferred to<br>Wallet</td>
              <td style="text-align:right;">₹1,030.00</td>
              <td><span class="pill approved">Approved</span></td>
              <td><button class="icon-btn">📄</button><button class="icon-btn">⬇</button></td>
            </tr>
            <tr>
              <td><b>42</b></td><td>May 2026</td><td>2026-06-15</td>
              <td>Transferred to<br>Wallet</td>
              <td style="text-align:right;">₹1,230.00</td>
              <td><span class="pill approved">Approved</span></td>
              <td><button class="icon-btn">📄</button><button class="icon-btn">⬇</button></td>
            </tr>
            <tr>
              <td><b>40</b></td><td>Apr 2026</td><td>2026-05-08</td>
              <td>Transferred to<br>Wallet</td>
              <td style="text-align:right;">₹780.00</td>
              <td><span class="pill approved">Approved</span></td>
              <td><button class="icon-btn">📄</button><button class="icon-btn">⬇</button></td>
            </tr>
              </tbody>
            </table>
          </div>
      <div class="pagination-row">
        <span>Total 73 items</span>
        <div class="pages">
          <button>‹</button>
          <button class="active">1</button><button class="">2</button><button class="">3</button><button class="">4</button><button class="">5</button><span>…</span><button>15</button>
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
