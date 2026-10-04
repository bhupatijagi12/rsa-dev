  <?php //if(session('dealer_status') != 2): ?>
 <div class="main">
    <div class="topbar">
      <span class="badge-rsa">RSA</span>
      <div class="topbar-right">
<!--         <div class="wallet-chip"><div class="lbl">WALLET LOW</div><div class="val">₹3,281.15</div></div>
 -->        <div class="time-chip" data-clock></div>
        <div class="dealer-chip">
          <div class="info"><div class="name"><?= session('name');?></div><div class="id">Ops · <?= session('user');?></div></div>
<!--           <div class="avatar">SA</div>
 -->        </div>
      </div>
    </div>
      <?php //endif; ?>