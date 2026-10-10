<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dealer Onboarding · GlobalAid Assurance RSA Portal</title>
<link rel="icon" href="data:,">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('public/assets/style.css'); ?>">
</head>
<body>

<div class="app">
  <?= $this->include('layouts/sidebar'); ?>
 <?= $this->include('layouts/header'); ?>
 

    <div class="content">
      <div class="page-head">
        <h1>Dealer Onboarding</h1>
        <p>Set up a new dealer on the RSA network — business details, KYC, and bank information.</p>
      </div>

      <div class="grid" style="grid-template-columns:1.7fr .9fr; gap:20px;">
        <form id="onboardingForm" method="post">
        <div>

          <div class="step">
            <div class="num">1</div>
            <h3>Business details</h3>
          </div>
          <div class="step-body">
            <p class="desc">Tell us about the dealership applying to the network.</p>
            <div class="form-row two">
              <div class="form-field"><label>Dealership name <span class="req"></span></label><input name="dealer_name" value="<?= $name;?>" disabled></div>
              <div class="form-field"><label>Dealer code</label><input name="dealer_code" value="<?= $dealer_code;?>" disabled></div>
            </div>
            <div class="form-row two">
              <div class="form-field"><label>GST number <span class="req"></span></label><input name="gst_number" value="<?= $gst_number;?>" disabled></div>
              <div class="form-field"><label>PAN number <span class="req"></span></label><input name="pan_number" placeholder="10-character PAN" value="<?= $pan_number;?>"></div>
            </div>
            <div class="form-field" style="margin-bottom:16px;"><label>Registered address <span class="req"></span></label><input name="address" placeholder="Street, city, state, pincode" value="<?= $address;?>"></div>
            <div class="form-row two">
              <div class="form-field"><label>Contact person <span class="req"></span></label><input name="contact_person" placeholder="Full name" value="<?= $contact_person;?>"></div>
              <div class="form-field"><label>Mobile number <span class="req"></span></label><input name="mobile" placeholder="10-digit mobile number" value="<?= $mobile;?>"></div>
 <div class="form-field"><label>RM Name <span class="req"></span></label><input name="rm_name" placeholder="Representative Name" value="<?= $rm_name;?>"></div>
               <div class="form-field"><label>Referred By <span class="req"></span></label><input name="referred_by" placeholder="Referred by" value="<?= $referred_by;?>"></div>

            </div>
          </div>

          <div class="step">
            <div class="num">2</div>
            <h3>Payment details</h3>
          </div>
          <div class="step-body">
            <p class="desc">Used to settle commission payouts to your main wallet.</p>
            <div class="form-row two">
              <div class="form-field"><label>Dealer Payment <span class="req"></span></label>
               <select name="dealer_payment">
                   <option value="">Select</option>
                   <option value="cut_n_pay" <?= ($dealer_payment == 'cut_n_pay') ? 'selected' : ''; ?>>
Cut &amp; Pay
</option>
                   <option value="monthly" <?= ($dealer_payment == 'monthly') ? 'selected': ''; ?>>Monthly</option>
               </select> 
           </div>
               
              <div class="form-field"><label>Payment Mode <span class="req"></span></label>
 <select name="payment_mode">
                   <option value="">Select</option>
                   <option value="Advance" <?= ($payment_mode == 'Advance') ? 'selected' : ''; ?>>Advance</option>
                   <option value="credit" <?= ($payment_mode == 'credit') ? 'selected' : ''; ?>>Credit</option>
               </select>          
           </div>
          </div>

      </div>

          <div class="step">
            <div class="num">3</div>
            <h3>Bank details</h3>
          </div>
          <div class="step-body">
            <div class="form-row two">
              <div class="form-field"><label>Account holder name <span class="req"></span></label><input name="account_holder_name" placeholder="As per bank records" value="<?= $account_holder_name;?>"></div>
              <div class="form-field"><label>Account number <span class="req"></span></label><input name="account_number" placeholder="Bank account number" value="<?= $account_number;?>"></div>
            </div>
            <div class="form-row two">
              <div class="form-field"><label>IFSC code <span class="req"></span></label><input name="ifsc_code" placeholder="e.g. SBIN0018143" value="<?= $ifsc_code;?>"></div>
              <div class="form-field"><label>Bank &amp; branch</label><input name="bank_name" placeholder="Auto-filled from IFSC" value="<?= $bank_name;?>"></div>
            </div>
          </div>

        <!--   <div class="step">
            <div class="num">3</div>
            <h3>KYC documents</h3>
          </div>
          <div class="step-body">
            <p class="desc">Upload signed agreement, PAN, GST certificate and a cancelled cheque.</p>
            <div class="upload-box">
              <label class="choose">⬆ Choose files… <input type="file" multiple style="display:none;"></label>
              <div class="hint">You can also complete this later from <a href="upload-documents.html" style="color:var(--navy-700);font-weight:600;">Upload Documents</a>.</div>
            </div>
          </div> -->

          <div style="display:flex;gap:10px;">
            <button type="submit" id="saveButton" class="btn btn-ghost">Save as draft</button>
            <?php if(session('dealer_status') == 2) { ?>
            <button type="button" id="submitButton" class="btn btn-nav">Submit application</button>

            <?php } ?>
             <?php if(session('dealer_status') == 1) { ?>
            <p class="btn btn-nav btn-green">Already Approved</p>

            <?php } ?>
             <?php if(session('dealer_status') == 3) { ?>
            <p class="btn btn-nav btn-red">Rejected</p>

            <?php } ?>
            <?php if(session('dealer_status') == 2) { ?>
            <p class="btn btn-nav btn-yellow">Pending</p>

            <?php } ?>
          </div>
          <div style="color: red;" id="msg"></div>

        </div>
      </form>
       <!--  <div class="card" style="align-self:start;">
          <h3 style="margin-bottom:14px;">Application status</h3>
          <div class="summary-row"><span class="k">Business details</span><span class="v" style="color:var(--green-600);">Complete</span></div>
          <div class="summary-row"><span class="k">Bank details</span><span class="v" style="color:var(--amber);">In progress</span></div>
          <div class="summary-row"><span class="k">KYC documents</span><span class="v" style="color:var(--ink-soft);font-weight:600;">Not started</span></div>
          <div class="summary-row total"><span class="k">Overall</span><span class="v">1 of 3 steps done</span></div>
          <div class="bar" style="margin-top:4px;"><span style="width:33%"></span></div>
          <p class="hint" style="font-size:11.5px;color:var(--ink-soft);margin-top:14px;">Onboarding review usually takes 2–3 working days once all documents are submitted. You'll be notified by email once your dealer account is activated.</p>
        </div> -->
      </div>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.trap@5.3.3/dist/js/bootstrap.bundle.min.js"/></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"/></script>
<link rel="stylesheet" href="<?= base_url('public/assets/app.js'); ?>">

<script>
$(document).ready(function () {
    $("#saveButton").click(function(){

    $.ajax({
        url : "<?= base_url('onboarding/save-onboarding') ?>",
        type : "POST",
        data : $("#onboardingForm").serialize(),
        dataType : "json",

        beforeSend : function(){
            $("#msg").html("Please wait...");
            $("#saveButton").prop("disabled", true);
        },

        success : function(response){

            $("#saveButton").prop("disabled", false);

            if(response.status == "success")
            {
                $("#msg").html(
                    '<div class="text-success">'+
                    response.message+
                    '</div>'
                );

               /* setTimeout(function(){
                    window.location.href =
                        response.redirect_url;
                },1500);*/
            }
            else
            {
                $("#msg").html(
                    '<div class="text-danger">'+
                    response.message+
                    '</div>'
                );
            }
        },

        error : function(xhr){
            $("#saveButton").prop("disabled", false);
            console.log(xhr.responseText);
        }
    });

});


    $("#submitButton").click(function(){
      $.ajax({
        url : "<?= base_url('onboarding/submit-onboarding') ?>",
        type : "GET",
       // data : $("#onboardingForm").serialize(),
        dataType : "json",

        beforeSend : function(){
            $("#msg").html("Please wait...");
            $("#submitButton").prop("disabled", true);
        },

        success : function(response){

            $("#submitButton").prop("disabled", false);

            if(response.status == "success")
            {
                $("#msg").html(
                    '<div class="text-success">'+
                    response.message+
                    '</div>'
                );

               /* setTimeout(function(){
                    window.location.href =
                        response.redirect_url;
                },1500);*/
            }
            else
            {
                $("#msg").html(
                    '<div class="text-danger">'+
                    response.message+
                    '</div>'
                );
            }
        },

        error : function(xhr){
            $("#submitButton").prop("disabled", false);
            console.log(xhr.responseText);
        }
    });
    });  

});
</script>
</body>
</html>
