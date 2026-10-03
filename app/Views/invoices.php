<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Invoices &amp; MIS · GlobalAid Assurance RSA Portal</title>
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
      <div class="page-head" style="display:flex;align-items:flex-start;justify-content:space-between;">
        <div>
          <h1>Invoices</h1>
          <p>Last 5 cycles. Approval moves the taxable amount, less TDS, from your commission wallet to your main wallet.</p>
        </div>
        <button class="btn btn-nav">Raise invoice</button>
      </div>

      <div class="grid grid-4" style="margin-bottom:18px;">
        <div class="card stat-card"><div class="lbl">POLICIES THIS FY</div><div class="num">73</div><div class="foot">Across all cycles</div></div>
        <div class="card stat-card"><div class="lbl">TOTAL TAXABLE</div><div class="num">₹4,250</div><div class="foot">Before GST</div></div>
        <div class="card stat-card"><div class="lbl">GST @ 18%</div><div class="num">₹765</div><div class="foot">Charged on taxable</div></div>
        <div class="card stat-card"><div class="lbl">TDS @ 5%</div><div class="num">-₹85</div><div class="foot">Deducted at source</div></div>
      </div>

      <div class="card">
        <table>
          <thead>
            <tr><th>Invoice</th><th>Cycle</th><th>Policies</th><th>Taxable</th><th>GST 18%</th><th>TDS 5%</th><th>To main wallet</th><th>Status</th></tr>
          </thead>
          <tbody>
            <tr><td>#45<br><span style="color:var(--ink-soft);font-size:11px;">raised 1 Sep</span></td><td>08-2026</td><td>—</td><td>₹520</td><td>₹93.6</td><td>-₹10.4</td><td><b>₹603.2</b></td><td><span class="pill approved">✓ Approved</span><br><span style="font-size:10.5px;color:var(--ink-soft);">Approved 1 Sep</span></td></tr>
            <tr><td>#44<br><span style="color:var(--ink-soft);font-size:11px;">raised 4 Aug</span></td><td>07-2026</td><td>—</td><td>₹1,030</td><td>₹185.4</td><td>-₹20.6</td><td><b>₹1,194.8</b></td><td><span class="pill approved">✓ Approved</span><br><span style="font-size:10.5px;color:var(--ink-soft);">Approved 4 Aug</span></td></tr>
            <tr><td>#43<br><span style="color:var(--ink-soft);font-size:11px;">raised 4 Aug</span></td><td>06-2026</td><td>—</td><td>₹690</td><td>₹124.2</td><td>-₹13.8</td><td><b>₹800.4</b></td><td><span class="pill approved">✓ Approved</span><br><span style="font-size:10.5px;color:var(--ink-soft);">Approved 4 Aug</span></td></tr>
            <tr><td>#42<br><span style="color:var(--ink-soft);font-size:11px;">raised 15 Jun</span></td><td>05-2026</td><td>—</td><td>₹1,230</td><td>₹221.4</td><td>-₹24.6</td><td><b>₹1,426.8</b></td><td><span class="pill approved">✓ Approved</span><br><span style="font-size:10.5px;color:var(--ink-soft);">Approved 17 Jun</span></td></tr>
            <tr><td>#40<br><span style="color:var(--ink-soft);font-size:11px;">raised 8 May</span></td><td>04-2026</td><td>—</td><td>₹780</td><td>₹140.4</td><td>-₹15.6</td><td><b>₹904.8</b></td><td><span class="pill approved">✓ Approved</span><br><span style="font-size:10.5px;color:var(--ink-soft);">Approved 9 May</span></td></tr>
          </tbody>
        </table>
      </div>

      <div class="card" style="margin-top:16px;">
        <div class="section-title"><h3>Policies punched — last 6 cycles</h3></div>
        <canvas id="misChart" height="90"></canvas>
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.4/chart.umd.min.js"></script>
<script src="<?= base_url('public/assets/app.js'); ?>"></script>
<script>
  new Chart(document.getElementById('misChart'), {
    type:'bar',
    data:{
      labels:['04-2026','05-2026','06-2026','07-2026','08-2026','09-2026'],
      datasets:[{
        label:'Policies punched',
        data:[63,99,56,83,42,43],
        backgroundColor:'#173a75',
        borderRadius:5,
        maxBarThickness:38
      }]
    },
    options:{
      plugins:{legend:{display:false}},
      scales:{ y:{grid:{color:'#eef1f6'}}, x:{grid:{display:false}} }
    }
  });
</script>
</body>
</html>
