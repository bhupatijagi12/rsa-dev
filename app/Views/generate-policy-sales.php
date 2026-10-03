<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Generate Policy – Sales · GlobalAid Assurance RSA Portal</title>
<link rel="icon" href="data:,">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="app">
  <aside class="sidebar">
    <div class="brand"><img src="assets/logo.png" alt="GlobalAid"><span class="hamb">☰</span></div>
    <nav class="nav">
      <div class="nav-item" onclick="location.href='dashboard.html'"><span class="ic">▦</span> Dealer Dashboard</div>
      <div class="nav-item parent"><span class="row"><span class="ic">🎫</span> Ticketing</span><span class="caret">›</span></div>
      <div class="nav-sub">
        <div class="nav-item">Raise Ticket</div>
        <div class="nav-item">My Tickets</div>
      </div>
      <div class="nav-item parent"><span class="row"><span class="ic">🏦</span> Bank</span><span class="caret">›</span></div>
      <div class="nav-sub">
        <div class="nav-item" onclick="location.href='bank-transactions.html'">Bank Transactions</div>
        <div class="nav-item">Transaction Requests</div>
        <div class="nav-item" onclick="location.href='account-statement.html'">Transaction Statement</div>
      </div>
      <div class="nav-item parent"><span class="row"><span class="ic">📄</span> Policy</span><span class="caret open">›</span></div>
      <div class="nav-sub open">
        <div class="nav-item" onclick="location.href='generate-policy.html'">Generate Policy – Rider</div>
        <div class="nav-item active">Generate Policy – Sales</div>
        <div class="nav-item">Generate Policy – Service</div>
        <div class="nav-item" onclick="location.href='sold-policies.html'">Sold Policies</div>
        <div class="nav-item" onclick="location.href='policy-cancellation.html'">Policy Cancellation Requests</div>
        <div class="nav-item" onclick="location.href='renewal-policies.html'">Renewal Policies</div>
        <div class="nav-item" onclick="location.href='endorsement-requests.html'">Endorsement Requests</div>
        <div class="nav-item" onclick="location.href='generate-invoice.html'">Generate Invoice</div>
        <div class="nav-item" onclick="location.href='gst-transactions.html'">GST Transactions</div>
      </div>
      <div class="nav-item parent"><span class="row"><span class="ic">👥</span> Sub Dealer</span><span class="caret">›</span></div>
      <div class="nav-sub">
        <div class="nav-item" onclick="location.href='sub-dealer.html'">Sub Dealer List</div>
      </div>
      <div class="nav-item" onclick="location.href='claims-report.html'"><span class="ic">📊</span> Claims Report</div>
      <div class="nav-item" onclick="location.href='download-center.html'"><span class="ic">⬇</span> Download Center</div>
      <div class="nav-item" onclick="location.href='invoices.html'"><span class="ic">🧾</span> Invoices / MIS</div>
      <div class="nav-item parent"><span class="row"><span class="ic">🧩</span> Onboarding</span><span class="caret">›</span></div>
      <div class="nav-sub">
        <div class="nav-item" onclick="location.href='onboarding.html'">Dealer Onboarding</div>
        <div class="nav-item" onclick="location.href='upload-documents.html'">Upload Documents</div>
      </div>
    </nav>
    <div class="nav-footer">
      <div class="nav-item logout" onclick="location.href='index.html'"><span class="ic">⏻</span> Logout</div>
    </div>
  </aside>

  <div class="main">
    <div class="topbar">
      <span class="badge-rsa">RSA</span>
      <div class="topbar-right">
        <div class="wallet-chip"><div class="lbl">WALLET LOW</div><div class="val">₹3,281.15</div></div>
        <div class="time-chip" data-clock></div>
        <div class="dealer-chip">
          <div class="info"><div class="name">TVS AUTO</div><div class="id">DEALER · 1986</div></div>
          <div class="avatar">SA</div>
        </div>
      </div>
    </div>

    <div class="content" style="max-width:1000px;">
      <div class="list-hero" style="border-radius:0 0 0 0; margin:-24px -26px 20px; padding:26px;">
        <h1 style="color:#fff;font-size:20px;position:relative;">Road Side Assistance (RSA) — Sales</h1>
        <p style="color:rgba(255,255,255,.75);font-size:13px;max-width:640px;margin-top:8px;position:relative;">
          Whenever a vehicle breaks down, Roadside Assistance is available around-the-clock as an emergency service.<br>
          Complete the steps below to issue a new policy.
        </p>
      </div>

      <div class="card" id="findVehicle">
        <h3 style="margin-bottom:4px;">Find a vehicle</h3>
        <p class="desc">Enter the 17-character chassis number to auto-fill the vehicle and owner details.</p>
        <div style="display:flex;gap:10px;max-width:640px;">
          <input id="chassisInput" placeholder="Enter Chassis Number" style="flex:1;padding:11px 14px;border:1.4px solid var(--line);border-radius:8px;font-size:13.5px;background:#fbfcfe;">
          <button class="btn btn-nav" style="padding:11px 26px;" onclick="lookupVehicle()">Search</button>
        </div>
      </div>

      <div id="resultSection" style="display:none;margin-top:16px;">
        <div class="grid" style="grid-template-columns:1.7fr .9fr; gap:20px;">
          <div>
            <div class="step"><div class="num">1</div><h3>Vehicle details</h3></div>
            <div class="step-body">
              <p class="desc">Auto-filled from chassis lookup — confirm before continuing.</p>
              <div class="form-row two">
                <div class="form-field"><label>Engine number</label><input id="engineOut"></div>
                <div class="form-field"><label>Chassis number</label><input id="chassisOut" disabled></div>
              </div>
              <div class="form-row two">
                <div class="form-field"><label>Vehicle type</label><select><option>New</option><option>Used</option></select></div>
                <div class="form-field"><label>Model</label><select><option>Apache RTR 160</option><option>Jupiter</option><option>Raider</option><option>RADEON</option></select></div>
              </div>
            </div>

            <div class="step"><div class="num">2</div><h3>Owner details</h3></div>
            <div class="step-body">
              <p class="desc">Personal and contact information for the policy holder.</p>
              <div class="form-row two">
                <div class="form-field"><label>Policy holder name <span class="req">*</span></label><input placeholder="Full name"></div>
                <div class="form-field"><label>Mobile number <span class="req">*</span></label><input placeholder="10-digit mobile number"></div>
              </div>
            </div>

            <div class="step"><div class="num">3</div><h3>Plan &amp; tenure</h3></div>
            <div class="step-body">
              <p class="desc">Choose the RSA coverage plan and duration.</p>
              <div class="form-row">
                <div class="form-field"><label>Plan <span class="req">*</span></label><select><option>Select plan</option><option>Basic RSA</option><option>RSA + Roadside Care</option><option>RSA Premium</option></select></div>
                <div class="form-field"><label>Tenure <span class="req">*</span></label><select><option>Select tenure</option><option>1 year</option><option>2 years</option><option>3 years</option></select></div>
                <div class="form-field"><label>Start date <span class="req">*</span></label><input type="date"></div>
              </div>
            </div>

            <div style="display:flex;gap:10px;">
              <button class="btn btn-ghost" onclick="location.reload()">Reset</button>
              <button class="btn btn-nav">Generate policy</button>
            </div>
          </div>

          <div class="card" style="align-self:start;">
            <h3 style="margin-bottom:14px;">Order summary</h3>
            <div class="summary-row"><span class="k">Product</span><span class="v">RSA — Sales</span></div>
            <div class="summary-row"><span class="k">Plan</span><span class="v" style="color:var(--ink-soft);font-weight:600;">Not selected</span></div>
            <div class="summary-row"><span class="k">Premium</span><span class="v" style="color:var(--ink-soft);font-weight:600;">—</span></div>
            <div class="summary-row"><span class="k">Available balance</span><span class="v">₹3,281.15</span></div>
            <button class="btn btn-green" style="width:100%;justify-content:center;margin-top:14px;">Generate policy</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="assets/app.js"></script>
<script>
  function lookupVehicle(){
    const chassis = document.getElementById('chassisInput').value.trim() || 'MD625CK2XS3D00250';
    document.getElementById('chassisOut').value = chassis;
    document.getElementById('engineOut').value = 'AK2DS' + chassis.slice(-7);
    document.getElementById('resultSection').style.display = 'block';
    document.getElementById('resultSection').scrollIntoView({behavior:'smooth', block:'start'});
  }
</script>
</body>
</html>
