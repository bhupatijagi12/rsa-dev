<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Upload Documents · GlobalAid Assurance RSA Portal</title>
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

    <div class="content" style="max-width:900px;">
      <div class="page-head">
        <h1>Upload Documents</h1>
        <p>Start punching policy by uploading dealer's documents.</p>
      </div>
        <form id="documentForm" method="post" enctype="multipart/form-data">

      <div class="card">
        <div style="text-align:center;margin-bottom:22px;">
          <button class="btn" style="background:var(--red);color:#fff;padding:11px 22px;"><a href="<?= base_url('onboarding/download-agreement') ?>" target="_blank">⬇ Download Agreement PDF</a></button>
        </div>
        <table>
          <thead>
            <tr><th>Document name</th><th>File name</th><th style="text-align:right;">Action</th></tr>
          </thead>
          <tbody id="docRows">
            <tr data-doc="Agreement">
              <td>Agreement <span class="req" style="color:var(--red);">*</span></td>
              <td class="file-label" style="color:var(--ink-soft);">No file chosen</td>
              <td style="text-align:right;">
                <label class="btn btn-ghost" style="cursor:pointer;padding:6px 12px;">⬆<input type="file" style="display:none;" data-upload-row accept=".pdf,.jpg,.jpeg,.png" name="agreement"></label>
              </td>
            </tr>
            <tr data-doc="PAN">
              <td>PAN <span class="req" style="color:var(--red);">*</span></td>
              <td class="file-label" style="color:var(--ink-soft);">No file chosen</td>
              <td style="text-align:right;">
                <label class="btn btn-ghost" style="cursor:pointer;padding:6px 12px;">⬆<input type="file" style="display:none;" data-upload-row accept=".pdf,.jpg,.jpeg,.png" name="pan"></label>
              </td>
            </tr>
             <tr data-doc="MSME">
              <td>MSME <span class="req" style="color:var(--red);">*</span></td>
              <td class="file-label" style="color:var(--ink-soft);">No file chosen</td>
              <td style="text-align:right;">
                <label class="btn btn-ghost" style="cursor:pointer;padding:6px 12px;">⬆<input type="file" style="display:none;" data-upload-row accept=".pdf,.jpg,.jpeg,.png" name="msme"></label>
              </td>
            </tr>
            <tr data-doc="GST">
              <td>GST <span class="req" style="color:var(--red);">*</span></td>
              <td class="file-label" style="color:var(--ink-soft);">No file chosen</td>
              <td style="text-align:right;">
                <label class="btn btn-ghost" style="cursor:pointer;padding:6px 12px;">⬆<input type="file" style="display:none;" data-upload-row accept=".pdf,.jpg,.jpeg,.png" name="gst"></label>
              </td>
            </tr>
            <tr data-doc="Cancelled cheque">
              <td>Cancelled cheque <span class="req" style="color:var(--red);">*</span></td>
              <td class="file-label" style="color:var(--ink-soft);">No file chosen</td>
              <td style="text-align:right;">
                <label class="btn btn-ghost" style="cursor:pointer;padding:6px 12px;">⬆<input type="file" style="display:none;" data-upload-row accept=".pdf,.jpg,.jpeg,.png" name="cancelled_cheque"></label>
              </td>
            </tr>
             <tr data-doc="Dealer Comments">
              <td>Dealer Comments <span class="req" style="color:var(--red);">*</span></td>
              <td></td>
              <td class="file-label" style="color:var(--ink-soft);"><textarea name="comments" rows="5" cols="20"><?= $comments; ?></textarea></td>
             <!--  <td style="text-align:right;">
                <label class="btn btn-ghost" style="cursor:pointer;padding:6px 12px;">⬆<input type="file" style="display:none;" data-upload-row accept=".pdf,.jpg,.jpeg,.png" name="cancelled_cheque"></label>
              </td> -->
            </tr>
          </tbody>
        </table>

        <p class="hint" style="font-size:11.5px;color:var(--ink-soft);margin:16px 0 20px;">Accepted formats: PDF, JPG or PNG, up to 5 MB per file. Fields marked <span style="color:var(--red);">*</span> are required before documents can be submitted.</p>
<div style="color: red;" id="msg"></div>

        <div style="display:flex;gap:10px;">
          <button class="btn btn-ghost" id="resetDocs">Reset</button>
          <button class="btn btn-nav" id="uploadAll" type="submit">Upload all documents</button>
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
$("#documentForm").submit(function(e){
    e.preventDefault();

    let formData = new FormData(this);

    $.ajax({
        url: "<?= base_url('onboarding/upload-documents') ?>",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        dataType: "json",

        beforeSend:function(){
            $("#msg").html("Uploading...");
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
</script>
</body>
</html>
