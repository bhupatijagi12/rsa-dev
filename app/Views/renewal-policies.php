<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Renewal Policy Listing · GlobalAid Assurance RSA Portal</title>
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
        <h1>Renewal Policy Listing</h1>
        <p>Manage and track renewal policies with seamless updates and reminders</p>
      </div>
      <div class="list-body">
        <div class="data-card">
          
          <div style="padding:18px 20px 0;">
      <div class="filters-row">
        <div class="field-select">Select policy status <span>▾</span></div>
        <label class="chk"><input type="checkbox"> Is Renewed</label>
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
              <thead><tr><th>Dealer Code</th><th>Policy No</th><th>Engine No</th><th>Chassis No</th><th>Plan Name</th><th>Expires In</th><th>Status</th><th>Action</th></tr></thead>
              <tbody>
            <tr>
              <td>1986</td><td>EA0000964077</td><td>AK2DS3800259</td><td>MD625CK2XS3D00250</td><td>Service Beyond Assistance +</td>
              <td>29 days</td><td><span class="pill approved">Active</span></td>
              <td><button class="icon-btn">⬇</button><button class="icon-btn">↻</button></td>
            </tr>
            <tr>
              <td>1986</td><td>EA0000964072</td><td>AK2ES3703687</td><td>MD625CK2XS3E03832</td><td>Service Beyond Assistance +</td>
              <td>29 days</td><td><span class="pill approved">Active</span></td>
              <td><button class="icon-btn">⬇</button><button class="icon-btn">↻</button></td>
            </tr>
            <tr>
              <td>1986</td><td>EA0000960444</td><td>AK2FS3202692</td><td>MD625CK24S3F02680</td><td>Service Beyond Assistance +</td>
              <td>29 days</td><td><span class="pill approved">Active</span></td>
              <td><button class="icon-btn">⬇</button><button class="icon-btn">↻</button></td>
            </tr>
            <tr>
              <td>1986</td><td>EA0000953533</td><td>AK2FS1801144</td><td>MD625CK27S1F01177</td><td>Service Beyond Assistance +</td>
              <td>29 days</td><td><span class="pill approved">Active</span></td>
              <td><button class="icon-btn">⬇</button><button class="icon-btn">↻</button></td>
            </tr>
            <tr>
              <td>1986</td><td>EA0000953263</td><td>AK2ES3502011</td><td>MD625CK20S3E02169</td><td>Service Beyond Assistance +</td>
              <td>29 days</td><td><span class="pill approved">Active</span></td>
              <td><button class="icon-btn">⬇</button><button class="icon-btn">↻</button></td>
            </tr>
              </tbody>
            </table>
          </div>
      <div class="pagination-row">
        <span>Total 7,142 items</span>
        <div class="pages">
          <button>‹</button>
          <button class="active">1</button><button>2</button><button>3</button><button>4</button><button>5</button><span>…</span><button>1429</button>
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
