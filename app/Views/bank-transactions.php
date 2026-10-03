<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bank Transactions · GlobalAid Assurance RSA Portal</title>
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
      <div class="page-head">
        <h1>Bank Details</h1>
        <p>A bank transaction is any money that moves in or out of your dealer wallet.</p>
      </div>

      <div class="grid" style="grid-template-columns:1.5fr 1fr; gap:16px;">
        <div class="card">
          <div class="tabs" data-tabgroup>
            <div class="tab active" data-tab="deposit">Deposit</div>
            <div class="tab" data-tab="withdrawal">Withdrawal</div>
          </div>

          <div data-panel="deposit">
            <div class="form-row">
              <div class="form-field"><label>IFSC code <span class="req">*</span></label><input value="SBIN0018143"></div>
              <div class="form-field"><label>Bank name <span class="req">*</span></label><input value="State Bank of India" disabled></div>
              <div class="form-field"><label>Account name <span class="req">*</span></label><input value="TVS AUTO"></div>
            </div>
            <div class="form-row">
              <div class="form-field"><label>Account number <span class="req">*</span></label><input value="37761442418"></div>
              <div class="form-field"><label>Transaction number <span class="req">*</span></label><input placeholder="Enter transaction number"></div>
              <div class="form-field"><label>Deposit amount <span class="req">*</span></label><input placeholder="Enter deposit amount"></div>
            </div>
            <div class="form-row two">
              <div class="form-field"><label>Transaction date <span class="req">*</span></label><input type="date"></div>
              <div class="form-field">
                <label>Proof of transfer <span class="req">*</span></label>
                <div class="upload-box" style="padding:12px;text-align:left;">
                  <label class="choose">⬆ Choose file… <input type="file" style="display:none;"></label>
                  <span class="file-name hint">No file chosen</span>
                </div>
              </div>
            </div>
            <p class="hint" style="font-size:11.5px;color:var(--ink-soft);margin-bottom:16px;">Every deposit needs proof of the transfer — a screenshot, PDF receipt, or bank statement excerpt (PDF, JPG or PNG).</p>
            <div style="display:flex;gap:10px;">
              <button class="btn btn-ghost">Reset</button>
              <button class="btn btn-green">Deposit</button>
            </div>
          </div>

          <div data-panel="withdrawal" style="display:none;">
            <div class="form-row two">
              <div class="form-field"><label>Withdrawal amount <span class="req">*</span></label><input placeholder="Enter amount"></div>
              <div class="form-field"><label>Reason <span class="req">*</span></label><input placeholder="Reason for withdrawal"></div>
            </div>
            <div style="display:flex;gap:10px;">
              <button class="btn btn-ghost">Reset</button>
              <button class="btn btn-green">Submit request</button>
            </div>
          </div>
        </div>

        <div class="card">
          <h3>GlobalAid bank details</h3>
          <p class="desc">Use these details to conduct bank transactions</p>
          <div style="font-size:11px;font-weight:700;color:var(--green-600);letter-spacing:.03em;margin-bottom:10px;">BANK TRANSFER</div>
          <div class="summary-row"><span class="k">Beneficiary name</span><span class="v">GlobalAid Infotech Ltd</span></div>
          <div class="summary-row"><span class="k">Bank name</span><span class="v">ICICI Bank</span></div>
          <div class="summary-row"><span class="k">Branch name</span><span class="v">MIDC Andheri</span></div>
          <div class="summary-row"><span class="k">Account number</span><span class="v">ICCP0001986</span></div>
          <div class="summary-row"><span class="k">IFSC code</span><span class="v">ICIC0000104</span></div>
        </div>
      </div>

      <div class="card" style="margin-top:16px;">
        <div class="section-title"><h3>Recent approved transactions</h3><span class="desc" style="margin:0;">Last 5 that cleared</span></div>
        <table>
          <tbody>
            <tr><td>Deposit<br><span style="color:var(--ink-soft);font-size:11.5px;">Ref 380277410432 · 14 May 2026</span></td><td style="text-align:right;">+ ₹10,000.00</td><td style="width:120px;text-align:right;"><span class="pill approved">Approved</span></td></tr>
            <tr><td>Deposit<br><span style="color:var(--ink-soft);font-size:11.5px;">Ref 610812598282 · 3 Feb 2026</span></td><td style="text-align:right;">+ ₹10,000.00</td><td style="text-align:right;"><span class="pill approved">Approved</span></td></tr>
            <tr><td>Deposit<br><span style="color:var(--ink-soft);font-size:11.5px;">Ref 075344925089 · 16 Dec 2025</span></td><td style="text-align:right;">+ ₹10,000.00</td><td style="text-align:right;"><span class="pill approved">Approved</span></td></tr>
            <tr><td>Deposit<br><span style="color:var(--ink-soft);font-size:11.5px;">Ref 439311755250 · 13 Oct 2025</span></td><td style="text-align:right;">+ ₹10,000.00</td><td style="text-align:right;"><span class="pill approved">Approved</span></td></tr>
            <tr><td>Deposit<br><span style="color:var(--ink-soft);font-size:11.5px;">Ref SBINN5025042334996631 · 23 Apr 2025</span></td><td style="text-align:right;">+ ₹20,000.00</td><td style="text-align:right;"><span class="pill approved">Approved</span></td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script src="<?= base_url('public/assets/app.js'); ?>"></script>
</body>
</html>
