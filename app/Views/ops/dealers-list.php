<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dealers List · GlobalAid Assurance RSA Portal</title>
<link rel="icon" href="data:,">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('public/assets/style.css'); ?>">

</head>
<body>

<div class="app">
 
 <?= $this->include('ops/layouts/sidebar'); ?>
  <div class="main">
    <?= $this->include('ops/layouts/header'); ?>
    
    <div class="content" style="">
      <div class="list-hero"></div>
      <div class="list-panel">
        <h1>Dealers List</h1>
<!--         <p>A brief snapshot of your Sold Policies</p> -->
      </div>
      <div class="list-body">
        <div class="data-card">
          
          <div style="padding:18px 20px 0;">
      <div class="filters-row">
        <div class="field-select"> Status <span>▾</span></div>
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
              <thead><tr><th>Dealer Code</th><th>Dealer Name</th><th>Mobile</th><th>Contact Person</th><th>RM Name</th><th>Referred By</th><th>Status</th><th>Action</th></tr></thead>
              <tbody>
                 <?php foreach ($dealers as $dealer) : ?>
            <tr>
              <td><?= esc($dealer['dealer_code']) ?></td>
              <td><?= esc($dealer['name']) ?></td>
              <td><?= esc($dealer['mobile']) ?></td>
              <td><?= esc($dealer['contact_person']) ?></td>
              <td><?= esc($dealer['rm_name']) ?></td>
              <td><?= esc($dealer['referred_by']) ?></td>
              <td><span class="pill approved"><?= esc($dealer['status_name']) ?></span></td>
              <td><!-- <button class="icon-btn">⬇</button>
                <button class="icon-btn">✎</button> -->
                <button class="icon-btn"><a href="<?= base_url('ops/view-documents/'.$dealer['id']);?>">🔗</a></button>
              </td>
            </tr>
              <?php endforeach; ?>
            <!-- <tr>
              <td>1986</td><td>BAIN0006711014</td><td>DF9FT1812967</td><td>MD625AF94T1F33985</td><td>Service Beyond Assistance +</td>
              <td><span class="pill approved">Active</span></td>
              <td><button class="icon-btn">⬇</button><button class="icon-btn">✎</button><button class="icon-btn">🔗</button></td>
            </tr>
            <tr>
              <td>1986</td><td>BA0005122906</td><td>BP2KL1840284</td><td>MD621BP26L1K43263</td><td>Service Beyond Assistance (renewal M…</td>
              <td><span class="pill approved">Active</span></td>
              <td><button class="icon-btn">⬇</button><button class="icon-btn red">✖</button><button class="icon-btn">✎</button><button class="icon-btn">🔗</button></td>
            </tr>
            <tr>
              <td>1986</td><td>EAIN0001787257</td><td>CE8HT2625319</td><td>MD634BE89T2H25421</td><td>Service Beyond Assistance +</td>
              <td><span class="pill approved">Active</span></td>
              <td><button class="icon-btn">⬇</button><button class="icon-btn">✎</button><button class="icon-btn">🔗</button></td>
            </tr>
            <tr>
              <td>1986</td><td>EAIN0001787256</td><td>CE8HT2106678</td><td>MD634BE89T2H06755</td><td>Service Beyond Assistance +</td>
              <td><span class="pill approved">Active</span></td>
              <td><button class="icon-btn">⬇</button><button class="icon-btn">✎</button><button class="icon-btn">🔗</button></td>
            </tr> -->
              </tbody>
            </table>
          </div>
      <div class="pagination-row">
        <span>Total 8,476 items</span>
        <div class="pages">
          <button>‹</button>
          <button class="active">1</button><button>2</button><button>3</button><button>4</button><button>5</button><span>…</span><button>1696</button>
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
