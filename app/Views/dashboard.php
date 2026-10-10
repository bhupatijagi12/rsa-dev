<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dealer Dashboard · GlobalAid Assurance RSA Portal</title>
<link rel="icon" href="data:,">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('public/assets/style.css'); ?>">
</head>
<body>

<div class="banner"><marquee>Dear Dealers, please note our RSA portal URL has been updated. Bookmark <b>rsa-portal.globalaidassurance.com</b> going forward.</marquee></div>

<div class="app">
 <?= $this->include('layouts/sidebar'); ?>
 <?= $this->include('layouts/header'); ?>

 <!--  <div class="main">
    <div class="topbar">
      <div style="display:flex;align-items:center;gap:12px;">
        <span class="hamb" style="display:none;">☰</span>
        <span class="badge-rsa">RSA</span>
      </div>
      <div class="topbar-right">
        <div class="wallet-chip">
          <div class="lbl">WALLET LOW</div>
          <div class="val">₹3,281.15</div>
        </div>
        <div class="time-chip" data-clock></div>
        <div class="dealer-chip">
          <div class="info"><div class="name">TVS AUTO</div><div class="id">DEALER · 1986</div></div>
          <div class="avatar">SA</div>
        </div>
      </div>
    </div> -->

    <div class="content">
      <div class="page-head">
        <h1>Dealer Dashboard</h1>
        <p>Policy counts cover punches through today. Wallet balances and invoices below are live.</p>
      </div>

      <!-- Cycle card -->
      <div class="card" style="margin-bottom:16px;">
        <div class="section-title">
          <h3>September 2026 cycle</h3>
          <div style="display:flex;gap:8px;">
            <button class="btn btn-ghost">Add funds</button>
            <button class="btn btn-nav" onclick="location.href='generate-policy.html'">+ Punch policy</button>
          </div>
        </div>
        <p class="desc">43 policies through 19 Sep · Best day Sep 05–19 · Closes 30 Sep, invoicing unlocks 1 Oct</p>
        <div style="display:flex;gap:4px;flex-wrap:wrap;">
          <script>
            // 30-day cycle strip, generated client-side
            document.write(Array.from({length:30}, (_,i)=>{
              const d=i+1, active = d<=19;
              const tall = [5,12,13,17].includes(d);
              return `<div title="Day ${d}" style="width:22px;height:${tall?34:20}px;border-radius:4px;background:${active?(tall?'linear-gradient(180deg,#204a8f,#173a75)':'#c9d6ea'):'#eef1f6'};align-self:flex-end;"></div>`;
            }).join(''));
          </script>
        </div>
      </div>

      <!-- Wallet stats -->
      <div class="grid grid-3" style="margin-bottom:16px;">
        <div class="card stat-card">
          <div class="lbl">MAIN WALLET</div>
          <div class="num">₹3,281.15</div>
          <div class="bar"><span style="width:22%"></span></div>
          <div class="foot">Funds roughly 288 more policies at ₹11.39 avg premium</div>
        </div>
        <div class="card stat-card">
          <div class="lbl">COMMISSION WALLET</div>
          <div class="num">₹230.00</div>
          <div class="foot">Earned and held — moves to main wallet once an invoice covering it is approved</div>
        </div>
        <div class="card stat-card">
          <div class="lbl">TRANSFERRED TO MAIN WALLET</div>
          <div class="num">₹4,56,944.24</div>
          <div class="sub">99.3% share of commission earned</div>
          <div class="foot">From 73 approved invoices this financial year</div>
        </div>
      </div>

      <!-- Activity chart + at a glance -->
      <div class="grid grid-2">
        <div class="card">
          <div class="section-title">
            <div>
              <h3>Daily activity</h3>
              <p class="desc" style="margin-bottom:0;">Premium out, commission in · September 2026 · to 19 Sep</p>
            </div>
            <div data-tabgroup style="display:flex;gap:6px;">
              <button class="btn btn-ghost" data-tab="week">This week</button>
              <button class="btn btn-ghost active" data-tab="month">This month</button>
            </div>
          </div>
          <canvas id="activityChart" height="220"></canvas>
          <div class="legend" style="margin-top:12px;">
            <span><span class="dot" style="background:#173a75"></span>Premium punched (₹K)</span>
            <span><span class="dot" style="background:#2fb85a"></span>Commission earned (₹K)</span>
            <span><span class="dot" style="background:#b9c4d6"></span>Policies</span>
          </div>
        </div>

        <div class="card">
          <h3 style="margin-bottom:14px;">This cycle at a glance</h3>
          <div class="summary-row"><span class="k">Avg commission / policy</span><span class="v">₹5</span></div>
          <div class="summary-row"><span class="k">Blended commission rate</span><span class="v">32.21%</span></div>
          <div class="summary-row"><span class="k">Avg policies / day</span><span class="v">2.3</span></div>
          <div class="summary-row"><span class="k">Days to invoice window</span><span class="v">11</span></div>
          <div class="summary-row total"><span class="k">Cycle so far</span><span class="v" style="color:var(--green-600);">↗ 43 policies</span></div>
        </div>
      </div>

      <!-- Additional graphs: policy mix, 6-month trend, wallet split -->
      <div class="grid grid-3" style="margin-top:16px;">
        <div class="card">
          <h3 style="margin-bottom:2px;">Policy mix</h3>
          <p class="desc">By product, this cycle</p>
          <canvas id="mixChart" height="200"></canvas>
          <div class="legend" style="margin-top:12px;justify-content:center;">
            <span><span class="dot" style="background:#173a75"></span>Rider</span>
            <span><span class="dot" style="background:#2fb85a"></span>Sales</span>
            <span><span class="dot" style="background:#b8860b"></span>Service</span>
          </div>
        </div>

        <div class="card">
          <h3 style="margin-bottom:2px;">6-month trend</h3>
          <p class="desc">Premium punched vs commission earned (₹K)</p>
          <canvas id="trendChart" height="200"></canvas>
        </div>

        <div class="card">
          <h3 style="margin-bottom:2px;">Wallet split</h3>
          <p class="desc">Commission transferred vs still held</p>
          <canvas id="walletChart" height="200"></canvas>
          <div class="legend" style="margin-top:12px;justify-content:center;">
            <span><span class="dot" style="background:#2fb85a"></span>Transferred</span>
            <span><span class="dot" style="background:#eef1f6"></span>Still held</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- <div class="modal fade" id="changePasswordModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">
                    Change Password
                </h5>
            </div>

            <div class="modal-body">

                <div id="passMsg"></div>

                <form id="changePasswordForm">

                    <div class="mb-3">
                        <label>Current Password</label>
                        <input type="password"
                               class="form-control"
                               name="old_password"
                               required>
                    </div>

                    <div class="mb-3">
                        <label>New Password</label>
                        <input type="password"
                               class="form-control"
                               name="new_password"
                               id="new_password"
                               required>
                    </div>

                    <div class="mb-3">
                        <label>Confirm Password</label>
                        <input type="password"
                               class="form-control"
                               name="confirm_password"
                               required>
                    </div>

                    <button class="btn btn-success w-100">
                        Update Password
                    </button>

                </form>

            </div>

        </div>
    </div>
</div> -->
<?php if($forcePasswordChange){ ?>
<script>
document.addEventListener("DOMContentLoaded", function() {

    let modal = new bootstrap.Modal(
        document.getElementById('changePasswordModal')
    );

    modal.show();

});
</script>
<?php } ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.4/chart.umd.min.js"></script>
<script src="<?= base_url('public/assets/app.js'); ?>"></script>
<script>
  const ctx = document.getElementById('activityChart');
  const days = Array.from({length:19}, (_,i)=>String(i+1).padStart(2,'0'));
  const premium = [4,34,6,10,3,34,7,9,2,10,34,8,10,2,34,6,9,3,7];
  const commission = [1,10,2,3,1,9,2,3,1,3,10,2,3,1,9,2,3,1,2];
  const policies  = [1,3,1,2,1,3,2,2,1,2,3,2,2,1,3,2,2,1,2];
  new Chart(ctx, {
    type:'line',
    data:{
      labels:days,
      datasets:[
        {label:'Premium punched (₹K)', data:premium, borderColor:'#173a75', backgroundColor:'rgba(23,58,117,.08)', fill:true, tension:.35, pointRadius:0, yAxisID:'y'},
        {label:'Commission earned (₹K)', data:commission, borderColor:'#2fb85a', backgroundColor:'rgba(47,184,90,.10)', fill:true, tension:.35, pointRadius:0, yAxisID:'y'},
        {label:'Policies', data:policies.map(p=>p*5), borderColor:'#b9c4d6', borderDash:[4,3], pointRadius:0, tension:.3, yAxisID:'y1'}
      ]
    },
    options:{
      plugins:{legend:{display:false}},
      scales:{
        y:{grid:{color:'#eef1f6'}, ticks:{font:{size:10}}},
        y1:{position:'right', grid:{display:false}, ticks:{font:{size:10}}}
      }
    }
  });

  // Policy mix — doughnut
  new Chart(document.getElementById('mixChart'), {
    type:'doughnut',
    data:{
      labels:['Rider','Sales','Service'],
      datasets:[{ data:[43,21,9], backgroundColor:['#173a75','#2fb85a','#b8860b'], borderWidth:0 }]
    },
    options:{ cutout:'68%', plugins:{legend:{display:false}} }
  });

  // 6-month trend — grouped bars
  new Chart(document.getElementById('trendChart'), {
    type:'bar',
    data:{
      labels:['Apr','May','Jun','Jul','Aug','Sep'],
      datasets:[
        {label:'Premium (₹K)', data:[63,99,56,83,42,43], backgroundColor:'#173a75', borderRadius:4, maxBarThickness:16},
        {label:'Commission (₹K)', data:[19,29,17,25,13,14], backgroundColor:'#2fb85a', borderRadius:4, maxBarThickness:16}
      ]
    },
    options:{
      plugins:{legend:{display:false}},
      scales:{ y:{grid:{color:'#eef1f6'}, ticks:{font:{size:10}}}, x:{grid:{display:false}, ticks:{font:{size:10}}} }
    }
  });

  // Wallet split — doughnut
  new Chart(document.getElementById('walletChart'), {
    type:'doughnut',
    data:{
      labels:['Transferred','Still held'],
      datasets:[{ data:[99.3,0.7], backgroundColor:['#2fb85a','#eef1f6'], borderWidth:0 }]
    },
    options:{ cutout:'68%', plugins:{legend:{display:false}} }
  });
</script>


<script src="https://cdn.jsdelivr.trap@5.3.3/dist/js/bootstrap.bundle.min.js"/></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"/></script>
<script>
  $(document).ready(function () {
  $("#changePasswordForm").submit(function(e){

    e.preventDefault();

    $.ajax({
        url:"<?= base_url('dealer/change-password') ?>",
        type:"POST",
        data:$(this).serialize(),
        dataType:"json",

        beforeSend:function(){
            $("#passMsg").html("Please wait...");
        },

        success:function(response){

            if(response.status=="success")
            {
                $("#passMsg").html(
                    '<div class="alert alert-success">'+
                    response.message+
                    '</div>'
                );

                setTimeout(function(){
                    location.reload();
                },1500);
            }
            else
            {
                $("#passMsg").html(
                    '<div class="alert alert-danger">'+
                    response.message+
                    '</div>'
                );
            }
        }
    });

});
  });
</script>
</body>
</html>
