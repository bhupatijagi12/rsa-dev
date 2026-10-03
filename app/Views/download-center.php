<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Download Center · GlobalAid Assurance RSA Portal</title>
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
      <div class="nav-item parent"><span class="row"><span class="ic">📄</span> Policy</span><span class="caret">›</span></div>
      <div class="nav-sub">
        <div class="nav-item" onclick="location.href='generate-policy.html'">Generate Policy – Rider</div>
        <div class="nav-item" onclick="location.href='generate-policy-sales.html'">Generate Policy – Sales</div>
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
      <div class="nav-item active"><span class="ic">⬇</span> Download Center</div>
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
    <div class="content" style="max-width:760px;">
      <div class="page-head">
        <h1>Download Center</h1>
        <p>Dealer agreements, rate cards and product collateral in one place.</p>
      </div>
      <div class="card">
          <div class="dl-row">
            <div><div class="name">Dealer Agreement</div><div class="meta">PDF · updated 1 Apr 2026</div></div>
            <button class="btn btn-ghost">⬇ Download</button>
          </div>
          <div class="dl-row">
            <div><div class="name">RSA Rate Card</div><div class="meta">PDF · updated 12 Jun 2026</div></div>
            <button class="btn btn-ghost">⬇ Download</button>
          </div>
          <div class="dl-row">
            <div><div class="name">Product Brochure — Road Side Assistance</div><div class="meta">PDF · 2.1 MB</div></div>
            <button class="btn btn-ghost">⬇ Download</button>
          </div>
          <div class="dl-row">
            <div><div class="name">Product Brochure — Extended Warranty</div><div class="meta">PDF · 1.8 MB</div></div>
            <button class="btn btn-ghost">⬇ Download</button>
          </div>
          <div class="dl-row">
            <div><div class="name">Claim Intimation Form</div><div class="meta">PDF · fillable</div></div>
            <button class="btn btn-ghost">⬇ Download</button>
          </div>
          <div class="dl-row">
            <div><div class="name">GST Invoice Format Guide</div><div class="meta">PDF · 340 KB</div></div>
            <button class="btn btn-ghost">⬇ Download</button>
          </div>
      </div>
    </div>
  </div>
</div>

<script src="assets/app.js"></script>
</body>
</html>
