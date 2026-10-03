<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dealer Login · GlobalAid Assurance RSA Portal</title>
<link rel="icon" href="data:,">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('public/assets/style.css'); ?>">
</head>
<body>

<div class="auth-shell">
  <div class="auth-card">
    <div class="auth-hero"><span>Roadside Assistance · Dealer Network</span></div>
    <div class="auth-body">
      <div class="auth-logo"><img src="<?= base_url('public/assets/logo.png'); ?>" alt="GlobalAid Assurance"></div>
      <div class="auth-title">Dealer Login</div>
<div style="color: red;" id="msg"></div>
      <form id="loginForm" method="post">
        <div class="field">
          <label>Dealer Code <span class="req">*</span></label>
          <input type="text" placeholder="Enter your code" required name="dealer_code">
        </div>
        <div class="field">
          <label>Password <span class="req">*</span></label>
          <div class="pw-wrap">
            <input type="password" placeholder="Enter your password" required name="password">
            <span class="toggle">👁</span>
          </div>
        </div>
        <button type="submit" class="btn-primary">Log in</button>

      </form>

      <div class="auth-links">
        <span class="muted">Reset password</span>
        <span class="accent">Need help?</span>
      </div>

     <!--  <div class="demo-note">Demo build — any username / password logs you in.</div> -->
    </div>
  </div>
</div>

<div style="position:fixed;bottom:14px;left:0;right:0;text-align:center;font-size:11px;color:rgba(255,255,255,.5);">
  Copyright © 2026 GlobalAid Assurance. All rights reserved.
</div>


<script src="<?= base_url('assets/app.js')?>"/></script>

<script src="https://cdn.jsdelivr.trap@5.3.3/dist/js/bootstrap.bundle.min.js"/></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"/></script>
<script>
$(document).ready(function () {
    $("#loginForm").submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: "<?= base_url('dealer/send-otp') ?>",
            type: "POST",
            data: $(this).serialize(),
            dataType: "json",

            beforeSend: function () {
                $("#msg").html(
                    '<div class="text-primary">Please wait...</div>'
                );
            },

            success: function (response) {

                if(response.status == "success")
                {
                    $("#msg").html(
                        '<div class="alert alert-success">'+response.message+'</div>'
                    );

                    window.location.href =
                        response.redirect_url;
                }
                else
                {
                    $("#msg").html(
                        '<div class="alert alert-danger">'+response.message+'</div>'
                    );
                }

            },

            error: function () {
                $("#msg").html(
                    '<div class="alert alert-danger">Something went wrong.</div>'
                );
            }
        });

    });

});
</script>
</body>
</html>
