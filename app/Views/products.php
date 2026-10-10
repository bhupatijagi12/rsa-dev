<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Choose a Product · GlobalAid Assurance Portal</title>
<link rel="icon" href="data:,">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('public/assets/style.css'); ?>">
</head>
<body>

<div class="picker-shell">
  <aside class="icon-sidebar">
    <div class="ic-btn active" title="Dashboard">▦</div>
    <div class="ic-btn" title="Accounts">👥</div>
  </aside>

  <div class="picker-main">
    <div class="topbar-simple">
      <div class="left">
        <img src="<?= base_url('public/assets/logo.png'); ?>" alt="GlobalAid Assurance" style="height:26px;">
        <span class="datetime" data-clock-simple></span>
      </div>
            <div class="user">Welcome &middot; <?= session('dealer_code');?><div class="avatar">👤</div></div>

    </div>

    <div class="hero-gradient"></div>

    <div class="product-grid">
      <div class="product-card">
        <div class="art">🛡️</div>
        <h3>Extended Warranty</h3>
        <a href="<?= base_url('coming-soon') ?>">Click here →</a>
      </div>
      <div class="product-card">
        <div class="art">🚚</div>
        <h3>Road Side Assistance</h3>
        <a href="<?= base_url('dashboard') ?>">Click here →</a>
      </div>
      <div class="product-card">
        <div class="art">🚚</div>
        <h3>Make My Plan</h3>
        <a href="<?= base_url('dashboard') ?>">Click here →</a>
      </div>
    </div>
  </div>
</div>

<script src="<?= base_url('public/assets/app.js'); ?>"></script>
<script>
  const clockEl = document.querySelector('[data-clock-simple]');
  if (clockEl) {
    const render = () => {
      const now = new Date();
      const day = now.getDate();
      const suffix = (day % 10 === 1 && day !== 11) ? 'st' : (day % 10 === 2 && day !== 12) ? 'nd' : (day % 10 === 3 && day !== 13) ? 'rd' : 'th';
      const month = now.toLocaleDateString('en-IN', { month:'short' });
      const year = now.getFullYear();
      const time = now.toLocaleTimeString('en-IN', { hour:'2-digit', minute:'2-digit', second:'2-digit', hour12:false });
      clockEl.textContent = `${day}${suffix} ${month} ${year} ${time}`;
    };
    render();
    setInterval(render, 1000);
  }
</script>
</body>
</html>
