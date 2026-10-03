<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Policy Cancellation Requests · GlobalAid Assurance RSA Portal</title>
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
        <h1>Policy Cancellation Requests</h1>
        <p>Track requests for cancelled policies with streamlined processing</p>
      </div>
      <div class="list-body">
        <div class="data-card">
          
          <div style="padding:18px 20px 0;">
      <div class="filters-row">
        <div class="field-select">Cancellation status <span>▾</span></div>
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
              <thead><tr><th>Employee Code</th><th>Policy No</th><th>Engine No</th><th>Chassis No</th><th>Plan Name</th><th>Customer Name</th><th>Company</th><th>Status</th><th>Action</th></tr></thead>
            </table>
<div class="empty-state"><div class="ic">📭</div><div class="msg">No data</div></div>
          </div>
      <div class="pagination-row">
        <span>Total 0 items</span>
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
