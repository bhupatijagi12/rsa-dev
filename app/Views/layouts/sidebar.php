<aside class="sidebar">
    <div class="brand"><img src="<?= base_url('public/assets/logo.png'); ?>" alt="GlobalAid"><span class="hamb">☰</span></div>
    <nav class="nav">
     <?php if(session('dealer_status') != 2): ?>
      <div class="nav-item" onclick="location.href='<?= base_url('dashboard') ?>'"><span class="ic">▦</span> Dealer Dashboard</div>
     <!--  <div class="nav-item parent"><span class="row"><span class="ic">🎫</span> Ticketing</span><span class="caret">›</span></div>
      <div class="nav-sub">
        <div class="nav-item">Raise Ticket</div>
        <div class="nav-item">My Tickets</div>
      </div> -->
      <div class="nav-item parent"><span class="row"><span class="ic">🏦</span> Bank</span><span class="caret">›</span></div>
      <div class="nav-sub">
        <div class="nav-item" onclick="location.href='<?= base_url('bank') ?>'">Bank Transactions</div>
<!--         <div class="nav-item">Transaction Requests</div>
 -->        <div class="nav-item" onclick="location.href='<?= base_url('bank-statement') ?>'">Transaction Statement</div>
      </div>
      <div class="nav-item parent"><span class="row"><span class="ic">📄</span> Policy</span><span class="caret">›</span></div>
      <div class="nav-sub">
        <div class="nav-item" onclick="location.href='<?= base_url('policy') ?>'">Generate Policy</div>
        <!--div class="nav-item" onclick="location.href='generate-policy-sales.html'">Generate Policy – Sales</div>
        <div class="nav-item">Generate Policy – Service</div-->
        <div class="nav-item" onclick="location.href='<?= base_url('sold-policies') ?>'">Sold Policies</div>
        <div class="nav-item" onclick="location.href='<?= base_url('cancellation') ?>'">Policy Cancellation Requests</div>
        <div class="nav-item" onclick="location.href='<?= base_url('renewal-policies') ?>'">Renewal Policies</div>
        <div class="nav-item" onclick="location.href='<?= base_url('endorsement') ?>'">Endorsement Requests</div>
        <div class="nav-item" onclick="location.href='<?= base_url('generate-invoice') ?>'">Generate Invoice</div>
        <div class="nav-item" onclick="location.href='<?= base_url('gst-transaction') ?>'">GST Transactions</div>
      </div>
     <!--  <div class="nav-item parent"><span class="row"><span class="ic">👥</span> Sub Dealer</span><span class="caret">›</span></div>
      <div class="nav-sub">
        <div class="nav-item" onclick="location.href='sub-dealer.html'">Sub Dealer List</div>
      </div>
      <div class="nav-item" onclick="location.href='claims-report.html'"><span class="ic">📊</span> Claims Report</div>
      <div class="nav-item" onclick="location.href='download-center.html'"><span class="ic">⬇</span> Download Center</div> -->
      <div class="nav-item" onclick="location.href='<?= base_url('invoices') ?>'"><span class="ic">🧾</span> Invoices / MIS</div>
      <?php endif; ?>
      <div class="nav-item parent"><span class="row"><span class="ic">🧩</span> Onboarding</span><span class="caret open">›</span></div>
      <div class="nav-sub open">
        <div class="nav-item active" onclick="location.href='<?= base_url('onboarding') ?>'">Dealer Onboarding</div>
        <div class="nav-item" onclick="location.href='<?= base_url('upload-document') ?>'">Upload Documents</div>
      </div>
    </nav>
    <div class="nav-footer">
      <div class="nav-item logout" onclick="location.href='<?= base_url('logout') ?>'"><span class="ic">⏻</span> Logout</div>
    </div>
  </aside>