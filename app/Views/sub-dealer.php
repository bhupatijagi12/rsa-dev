<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sub Dealer List · GlobalAid Assurance RSA Portal</title>
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
      <div class="nav-item parent"><span class="row"><span class="ic">👥</span> Sub Dealer</span><span class="caret open">›</span></div>
      <div class="nav-sub open">
        <div class="nav-item active">Sub Dealer List</div>
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
    <div class="content" style="">
      <div class="list-hero"></div>
      <div class="list-panel">
        <h1>Sub Dealer List</h1>
        <p>Onboard and monitor sub-dealers operating under your dealership code.</p>
      </div>
      <div class="list-body">
        <div class="data-card">
          <div class='top-actions'><span></span><button class="btn btn-nav">Add Sub Dealer</button></div>
          <div style="padding:18px 20px 0;">
      <div class="filters-row">
        <div class="field-select">Status <span>▾</span></div>
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
              <thead><tr><th>Sub Dealer Code</th><th>Name</th><th>Location</th><th>Status</th><th>Policies Sold</th><th>Action</th></tr></thead>
            </table>
<div class="empty-state"><div class="ic">📭</div><div class="msg">No sub-dealers added yet</div></div>
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

<script src="assets/app.js"></script>
</body>
</html>
