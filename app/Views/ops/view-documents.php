<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>View Documents · GlobalAid Assurance RSA Portal</title>
<link rel="icon" href="data:,">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('public/assets/style.css'); ?>">
</head>
<body>

<div class="app">
   <?= $this->include('ops/layouts/sidebar'); ?>

  <div class="main">
    <?= $this->include('ops/layouts/header'); ?>

    <div class="content" style="max-width:900px;">
      <div class="page-head">
        <h1>View Documents</h1>
<!--         <p>Start punching policy by uploading dealer's documents.</p>
 -->      </div>
        <form id="documentForm" method="post" enctype="multipart/form-data">
            <input type="hidden" name="dealer_id" id="dealer_id" value="<?= $dealer_id; ?>">

      <div class="card">
        <div style="text-align:center;margin-bottom:22px;">
          <button class="btn" style="background:var(--red);color:#fff;padding:11px 22px;"><a href="<?= base_url('ops/download/'.$dealer_id."/agreement") ?>" target="_blank">⬇ Download Agreement PDF</a></button>
        </div>
        <table>
          <thead>
            <tr><th>Document name</th><th>File name</th><th style="text-align:right;">Download</th></tr>
          </thead>
          <tbody id="docRows">
            <tr data-doc="PAN">
              <td>PAN <span class="req" style="color:var(--red);">*</span></td>
              <td class="file-label" style="color:var(--ink-soft);"></td>
              <td style="text-align:right;">
                <label class="btn btn-ghost" style="cursor:pointer;padding:6px 12px;"><a href="<?= base_url('ops/download/'.$dealer_id."/pan") ?>" target="_blank">⬇</a></label>
              </td>
            </tr>
             <tr data-doc="MSME">
              <td>MSME <span class="req" style="color:var(--red);">*</span></td>
              <td class="file-label" style="color:var(--ink-soft);"></td>
              <td style="text-align:right;">
                <label class="btn btn-ghost" style="cursor:pointer;padding:6px 12px;"><a href="<?= base_url('ops/download/'.$dealer_id."/msme") ?>" target="_blank">⬇</a></label>
              </td>
            </tr>
            <tr data-doc="GST">
              <td>GST <span class="req" style="color:var(--red);">*</span></td>
              <td class="file-label" style="color:var(--ink-soft);"></td>
              <td style="text-align:right;">
                <label class="btn btn-ghost" style="cursor:pointer;padding:6px 12px;"><a href="<?= base_url('ops/download/'.$dealer_id."/gst") ?>" target="_blank">⬇</a></label>
              </td>
            </tr>
            <tr data-doc="Cancelled cheque">
              <td>Cancelled cheque <span class="req" style="color:var(--red);">*</span></td>
              <td class="file-label" style="color:var(--ink-soft);"></td>
              <td style="text-align:right;">
                <label class="btn btn-ghost" style="cursor:pointer;padding:6px 12px;"><a href="<?= base_url('ops/download/'.$dealer_id."/cancelled_cheque") ?>" target="_blank">⬇</a></label>
              </td>
            </tr>
             <tr data-doc="Dealer Comments">
              <td>Dealer Comments <span class="req" style="color:var(--red);">*</span></td>
              <td></td>
              <td class="file-label" style="color:var(--ink-soft);"><textarea name="comments" rows="5" cols="20" readonly><?= $comments ?></textarea></td>
           
            </tr>
          </tbody>
        </table>

      
<div style="color: red;" id="msg"></div>

        <div style="display:flex;gap:10px;">
          <button class="btn btn-ghost final" id="btnReject" type="button">Reject</button>
          <button class="btn btn-nav final" id="btnApprove" type="button">Approve</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>

<link rel="stylesheet" href="<?= base_url('public/assets/app.js'); ?>">
<script>
  document.querySelectorAll('[data-upload-row]').forEach(inp => {
    inp.addEventListener('change', () => {
      const row = inp.closest('tr');
      const label = row.querySelector('.file-label');
      label.textContent = inp.files[0] ? inp.files[0].name : 'No file chosen';
      label.style.color = inp.files[0] ? 'var(--ink)' : 'var(--ink-soft)';
    });
  });
  document.getElementById('resetDocs').addEventListener('click', () => {
    document.querySelectorAll('[data-upload-row]').forEach(i => i.value = '');
    document.querySelectorAll('.file-label').forEach(l => { l.textContent = 'No file chosen'; l.style.color='var(--ink-soft)'; });
  });
 /* document.getElementById('uploadAll').addEventListener('click', () => {
    alert('Documents submitted for review. (Demo action — no files are actually sent anywhere.)');
  });*/
</script>
<script src="https://cdn.jsdelivr.trap@5.3.3/dist/js/bootstrap.bundle.min.js"/></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"/></script>
<script>
  $(document).ready(function () {
$(".final").click(function(e){
   // e.preventDefault();
  var status = $(this).text();

  var dealer_id = $("#dealer_id").val();

    $.ajax({
        url: "<?= base_url('ops/verify-docs') ?>",
        type: "POST",
        //data: formData,
        data: {
        dealer_id: dealer_id,
        status: status
        },
        dataType: "json",

        beforeSend:function(){
            $("#msg").html("Please wait...");
        },

        success:function(response){

            if(response.status=="success")
            {
                $("#msg").html(
                    '<div class="alert alert-success">'+
                    response.message+
                    '</div>'
                );
            }
            else
            {
                $("#msg").html(
                    '<div class="alert alert-danger">'+
                    response.message+
                    '</div>'
                );
            }

        }

    });

});
});
</script>
</body>
</html>
