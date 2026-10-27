<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>OTP Verification · GlobalAid Assurance RSA Portal</title>
<link rel="icon" href="data:,">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('public/assets/style.css'); ?>">
</head>
<body>

<div class="auth-shell">
  <div class="auth-card" style="max-width:460px;">
    <div class="auth-hero" style="height:auto;padding:22px;">
      <div>
        <h2 style="color:#fff;font-size:19px;">OTP Verification</h2>
        <span style="display:block;margin-top:4px;">Enter the code sent to your email to verify your identity</span>
      </div>
    </div>
    <div class="auth-body">
      <div style="color: red;" id="msg"></div>
      <form id="otpForm" method="post">
        <div class="otp-block">
          <h4>Email</h4>
          <span class="sub">Enter OTP sent to <?= $email?></span>
          <div class="otp-inputs">
            <input maxlength="1" inputmode="numeric" value="" required class="otp">
            <input maxlength="1" inputmode="numeric" value="" required class="otp">
            <input maxlength="1" inputmode="numeric" value="" required class="otp">
            <input maxlength="1" inputmode="numeric" value="" required class="otp">
            <input maxlength="1" inputmode="numeric" value="" required class="otp">
            <input maxlength="1" inputmode="numeric" value="" required class="otp">
          </div>
          <input type="hidden" name="otp" id="otp">
        </div>

       <!--  <div class="otp-block">
          <h4>Email</h4>
          <span class="sub">Enter OTP sent to s••••e@shyamashreeauto.com</span>
          <div class="otp-inputs">
            <input maxlength="1" inputmode="numeric" autofocus>
            <input maxlength="1" inputmode="numeric">
            <input maxlength="1" inputmode="numeric">
            <input maxlength="1" inputmode="numeric">
            <input maxlength="1" inputmode="numeric">
            <input maxlength="1" inputmode="numeric">
          </div>
        </div> -->

        <button type="button" class="btn-primary" id="verifyOtpBtn">Verify OTP</button>
<!--         <span class="resend">Resend OTP in <b data-countdown>120</b> seconds</span>
 -->      </form>
    </div>
  </div>
</div>

<script src="<?= base_url('assets/app.js'); ?>"/></script>

<script src="https://cdn.jsdelivr.trap@5.3.3/dist/js/bootstrap.bundle.min.js"/></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"/></script>
<script>
$(document).ready(function () { 
      $(".otp").on("input", function(){

        if($(this).val().length == 1)
        {
            $(this).next(".otp").focus();
        }

      });

      $(".otp").on("keydown", function(e){

        if(e.key === "Backspace" && $(this).val() === "")
        {
            $(this).prev(".otp").focus();
        }

      });

      $("#verifyOtpBtn").click(function(){
        let otp = "";

        $(".otp").each(function(){
           otp += $(this).val();
        });

        $("#otp").val(otp);

        $.ajax({
            url: "<?= base_url('dealer/verify-otp') ?>",
            type: "POST",
            data : {
              otp : otp
            },
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
