<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Generate Policy – Rider · GlobalAid Assurance RSA Portal</title>
<link rel="icon" href="data:,">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('public/assets/style.css'); ?>">
    
    <!-- jQuery library -->
   

</head>
<body>

<div class="app">


 <?= $this->include('layouts/sidebar'); ?>
  <div class="main">
    <?= $this->include('layouts/header'); ?>

    <div class="content">
      <form method="post" action="<?= base_url('generate-policy')?>" id ="policyForm">
      <div class="grid" style="grid-template-columns:1.7fr .9fr; gap:20px;">
        <div>
          <div class="step">
            <div class="num">1</div>
            <h3>Vehicle details</h3>
          </div>
          <div class="step-body">
            <p class="desc">Identify the vehicle being covered by this policy.</p>
            <div class="form-row two">
              <div class="form-field"><label>Engine number <span class="req">*</span></label><input placeholder="e.g. BK2BT3204079" name="engine_no" id="engine_no"></div>
              <div class="form-field"><label>Chassis number <span class="req">*</span></label><input  placeholder="e.g. MD625BK29T3804344" name="chassis_no"></div>
            </div>
            <div class="form-row two">
              <div class="form-field"><label>Vehicle type <span class="req">*</span></label>
                <select name="vehicle_type"><option>New</option><option>Used</option></select>
              </div>
              <div class="form-field"><label>Select Vehicle <span class="req">*</span></label>

                <select  name="vehicle_model">
                  <option>Select Model</option>
                   <?php foreach ($vehicles as $vehicle) : ?>
                  <option><?= $vehicle['make_name'] ?> <?= $vehicle['model_name'] ?> <?= $vehicle['variant_name'] ?> <?= $vehicle['fuel_type'] ?></option>
                  <?php endforeach; ?>
                </select>

              </div>
            </div>
          </div>

          <div class="step">
            <div class="num">2</div>
            <h3>Owner details</h3>
          </div>
          <div class="step-body">
            <p class="desc">Personal and contact information for the policy holder.</p>
            <div class="form-row three">
              <div class="form-field"><label>First name <span class="req">*</span></label><input placeholder="Full name"  name="customer_name"></div>
               <div class="form-field"><label>Middle name <span class="req"></span></label><input placeholder="Middle name"  name="middle_name"></div>
               <div class="form-field"><label>Last name <span class="req">*</span></label><input placeholder="Last name"  name="last_name"></div>
              
            </div>
             <div class="form-row three">
            
               
               <div class="form-field"><label>Gender <span class="req">*</span></label>
                 <select id="gender" name="gender" >
                  <option>Select Gender</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
               </div>
              
           
              <div class="form-field"><label>Email address<span class="req">*</span></label><input  placeholder="name@example.com" name="email"></div>
              <div class="form-field"><label>Mobile number <span class="req">*</span></label><input placeholder="10-digit mobile number"  name="mobile"></div>

              
            </div>
            <div class="form-row three">
              <div class="form-field"><label>Address<span class="req">*</span></label>
                <textarea rows="3"></textarea>
              </div>
              <div class="form-field"><label>State<span class="req">*</span></label>
                <select id="state" name="state" >
                  <option>Select State</option>
                   <?php foreach ($states as $state) : ?>
                  <option value="<?= $state['state_name']; ?>"><?= $state['state_name']; ?></option>
                   <?php endforeach; ?>
                </select>
              </div>
              
              <div class="form-field"><label>City <span class="req">*</span></label><input placeholder="Enter city" name="city"></div>
               
            </div>
             <div class="form-row three">
             <div class="form-field"><label>Pincode<span class="req">*</span></label><input  placeholder="Enter pincode" name="pincode"></div>
              <div class="form-field"><label>Date Of Birth <span class="req">*</span></label><input  type="date" name="dob"></div>
               <div class="form-field"><label>Occupation <span class="req">*</span></label><input placeholder="Enter occupation" type="text" name="occupation"></div>
            </div>
             <div class="form-row three">
             
              <div class="form-field"><label>Emergency Contact<span class="req">*</span> </label><input placeholder="Emergency Contact"></div>
             
            </div>
          </div>

         <!--  <div class="step">
            <div class="num">3</div>
            <h3>Plan Type</h3>
          </div>
           <div class="step-body">
            <div class="form-row three">
              <div class="form-field"><label>Policy Type <span class="req">*</span></label>
                <select id="select_plan_type" name="select_plan_type" >
                  <option>Select Plan type</option>
                  <option value="Fixed">Fixed</option>
                  <option value="Flexi">Flexi</option>
                </select>
              </div>
               </div>
          </div>
 -->

  <div class="step">
            <div class="num">3</div>
            <h3>Nominee Details</h3>
          </div>
           <div class="step-body">
            <div class="form-row three">
              <div class="form-field"><label>First Name <span class="req">*</span></label>
               <input  type="text" name="nominee_fname">
              </div>
              <div class="form-field"><label>Middle Name <span class="req"></span></label>
               <input  type="text" name="middle_lname"> </div>
              <div class="form-field"><label>Last Name <span class="req">*</span></label>
               <input  type="text" name="nominee_lname">
              </div>
               </div>
               <div class="form-row three">
              <div class="form-field"><label>Gender<span class="req">*</span></label>
               <input  type="text" name="nominee_gender">
              </div>
              <div class="form-field"><label>Date of Birth <span class="req">*</span></label>
               <input  type="text" name="nominee_dob"> </div>

              <div class="form-field"><label>Mobile Number<span class="req">*</span></label>
               <input  type="text" name="nominee_mobile"> </div>     
                 <div class="form-field"><label>Relationship<span class="req">*</span></label>
               <input  type="text" name="relationship"> </div>                     
               </div>
          </div>

          <div class="step">
            <div class="num">4</div>
            <h3>Plan &amp; tenure</h3>
          </div>
          <div class="step-body">
            <p class="desc">Choose the RSA coverage plan and duration.</p>
            <div class="form-row">
              <div class="form-field"><label>Plan <span class="req">*</span></label>
                <div id="fixed">
                <select id="plan" name="plan">
                  <option>Select plan</option>
                  <?php foreach ($products as $product) : ?>
                <option value="<?= $product['premium_inc_gst']; ?>">
                <?= esc($product['product_name']); ?>
                (₹<?= number_format($product['premium_inc_gst'], 2); ?>)
                 </option>                  
                <?php endforeach; ?>
                </select>
              </div>
                <div id="flexi" style="display: none;">
                <select id="plan" name="plan" width="200px" multiple>
                  <option>Select multiple plan</option>
                  <?php foreach ($products as $product) : ?>
                <option value="<?= $product['premium_inc_gst']; ?>">
                <?= esc($product['product_name']); ?>
                (₹<?= number_format($product['premium_inc_gst'], 2); ?>)
                 </option>                  
                <?php endforeach; ?>
                </select>
                <span style="font-size: 12px;">Click CTRL to select more</span>
              </div>
              </div>
              <div class="form-field"><label>Tenure <span class="req">*</span></label>
                <select id="tenure" name="tenure" class="form-select">
<option value="1">1 Year</option>
<option value="2">2 Years</option>
<option value="3">3 Years</option>
<option value="5">5 Years</option>
</select>
              </div>
              <div class="form-field"><label>Expiry date <span class="req">*</span></label><input type="date" id="start_date" name="start_date"
value="<?= date('Y-m-d');?>" style="display:none">
<input type="text" id="expiry_date" name="expiry_date" readonly></div>
            </div>
          </div>

          <div style="display:flex;gap:10px;">
            <button class="btn btn-ghost">Reset</button>
            <button class="btn btn-nav" type="submit">Generate policy</button>
          </div>
        </div>

        <div class="card" style="align-self:start;">
          <h3 style="margin-bottom:14px;">Order summary</h3>
          <div class="summary-row"><span class="k">Plan</span><span class="v">RSA — <b id="plan_type"></b></span></div>
          <div class="summary-row"><span class="k">Product</span><span id="summary_plan" class="v" style="color:var(--ink-soft);font-weight:600;">Not selected</span></div>
          <div class="summary-row"><span class="k">Tenure</span><span id="summary_tenure" class="v" style="color:var(--ink-soft);font-weight:600;">—</span></div>
          <div class="summary-row"><span class="k">Premium</span><span id="summary_premium" class="v" style="color:var(--ink-soft);font-weight:600;">—</span></div>
          <div class="summary-row"><span class="k">Available balance</span><span class="v">₹3,281.15</span><input type="hidden" id="available_balance" value="3281"></div>
          <div class="summary-row"><span class="k">Payable now</span><span id="payable_now" class="v" style="color:var(--ink-soft);font-weight:600;">—</span>
            <input type="hidden" name="premium" id="premium">
          </div>
          <div class="summary-row total"><span class="k">Balance after purchase</span><span id="balance_after" class="v" style="color:var(--ink-soft);font-weight:600;">—</span></div>
          <button class="btn btn-green" style="width:100%;justify-content:center;margin-top:14px;">Generate policy</button>
        </div>
      </div>
    </form>
    </div>
  </div>
</div>

<script src="<?= base_url('public/assets/app.js'); ?>"></script>
 <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <!-- Popper JS -->
    <script src=
"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">
    </script>
    <!-- Latest compiled JavaScript -->
    <script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
    </script>
<script>
  $(document).ready(function(){
    function updateSummary()
    {
        let plan = $("#plan option:selected").text();
        let plan_premium = $("#plan option:selected").val();
        let premium = $("#plan option:selected").data("premium") || 0;
        let tenure = $("#tenure option:selected").text();
        let balance = parseFloat($("#available_balance").val());
        let tenure_val = $("#tenure option:selected").val();
        $("#summary_plan").text(plan);
        $("#summary_tenure").text(tenure);
        $("#summary_premium").html("₹"+(plan_premium * tenure_val));
        $("#payable_now").html("₹"+(plan_premium * tenure_val));
        $("#premium").val((plan_premium * tenure_val));
        let remaining = balance - (plan_premium * tenure_val);

        $("#balance_after").html("₹"+remaining.toFixed(2));
    }

    $("#plan").change(updateSummary);
    $("#tenure").change(updateSummary);


    $("#tenure").change(function(){

    let years = parseInt($(this).val());

    if(years > 0)
    {
        let startDate = new Date($("#start_date").val());

        startDate.setFullYear(
            startDate.getFullYear() + years
        );

        let day = ("0" + startDate.getDate()).slice(-2);
        let month = ("0" + (startDate.getMonth()+1)).slice(-2);
        let year = startDate.getFullYear();

        $("#expiry_date").val(
            day + "-" + month + "-" + year
        );
    }

});


    /*$("#select_plan_type").change(function(){
      let plan_type = $("#select_plan_type option:selected").text();
      $("#plan_type").text(plan_type);
      if(plan_type == "Fixed")
      {
        $("#fixed").show();
        $("#flexi").hide();
      }
       if(plan_type == "Flexi")
      {
        $("#flexi").show();
        $("#fixed").hide();
      }

     }); */

});


  

</script>
</body>
</html>
