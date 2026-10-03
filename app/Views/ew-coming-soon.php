<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Extended Warranty · GlobalAid Assurance Portal</title>
<link rel="icon" href="data:,">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('public/assets/style.css'); ?>">
</head>
<body>

<div class="picker-shell">
  <aside class="icon-sidebar">
    <div class="ic-btn" onclick="location.href='<?= base_url('dashboard') ?>'" title="Dashboard">▦</div>
    <div class="ic-btn" title="Accounts">👥</div>
  </aside>
  <div class="picker-main">
    <div class="topbar-simple">
      <div class="left">
        <img src="<?= base_url('public/assets/logo.png'); ?>" alt="GlobalAid Assurance" style="height:26px;">
      </div>
      <div class="user">Welcome &middot; <?= session('dealer_code');?><div class="avatar">👤</div></div>
    </div>
    <div class="hero-gradient"></div>
    <div style="padding:60px; max-width:520px;">
      <div style="font-size:44px;margin-bottom:14px;">🛡️</div>
      <h1 style="font-size:22px;margin-bottom:10px;">Extended Warranty is on its way</h1>
      <p style="color:var(--ink-soft);font-size:14px;line-height:1.6;margin-bottom:22px;">This module is coming soon</p>
      <button class="btn btn-nav" onclick="location.href='<?= base_url('products') ?>'">← Back to products</button>
    </div>
  </div>
</div>

</body>
</html>
