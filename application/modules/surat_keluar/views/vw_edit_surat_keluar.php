<?php echo $message ?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Form Edit Surat Keluar</h2>
        <div class="clearfix"></div>
      </div>
      <div class ="x_content">
       <br>
       <form class="form-horizontal form-label-left" novalidate="" method="post" enctype="multipart/form-data">
         <div class="item form-group">
           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_surat_keluar">No. Surat Keluar
           </label>
           <div class="col-md-6 col-sm-6 col-xs-12">
             <input value="<?php echo $surat_keluar['no_surat_keluar']; ?>" id="no_surat_keluar" class="form-control col-md-7 col-xs-12" name="no_surat_keluar"  required="required" type="text">
           </div>
         </div>
         <div class="item form-group">
           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal_keluar">Tanggal Masuk
           </label>
           <div class="col-md-6 col-sm-6 col-xs-12">
            <input  value="<?php echo $surat_keluar['tgl_surat']; ?>" id="tanggal_keluar" data-inputmask="'mask': '99/99/9999'"  class="form-control col-md-7 col-xs-12" name="tanggal_keluar"  required="required" type="text">
          </div>
        </div>
        <div class="item form-group">
          <label for="jenis_keluar" class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Surat</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
           <div class="radio">
             <div class="col-md-3"> 
               <input type="radio" class="flat" name="jenis_keluar"   value="1"  <?php echo $surat_keluar['jenis_surat_keluar_id'] == '1'  ? 'checked' : ''; ?>> Biasa</div>
               <div class="col-md-3"> 
                 <input type="radio" class="flat" name="jenis_keluar"  value="2" <?php echo $surat_keluar['jenis_surat_keluar_id'] == '2'  ? 'checked' : ''; ?>> Internal
               </div>
             </div>
           </div>
         </div>
         <div class="item form-group">
          <label for="tujuan_id_keluar" class="control-label col-md-3 col-sm-3 col-xs-12">Tujuan ID</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
           <div class="radio">
             <div class="col-md-3">
               <input type="radio" class="flat" name="tujuan_id_keluar"   value="1" <?php echo $surat_keluar['tujuan_id'] == '1'  ? 'checked' : ''; ?>> Internal
             </div>
             <div class="col-md-3">

               <input type="radio" class="flat" name="tujuan_id_keluar"  value="2" <?php echo $surat_keluar['tujuan_id'] == '2'  ? 'checked' : ''; ?>> Lain-Lain
             </div>
           </div>
         </div>
       </div>
       <div class="item form-group">
         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pengirim_keluar">Pengirim
         </label>
         <div class="col-md-6 col-sm-6 col-xs-12">
          <input  value="<?php echo $surat_keluar['pembuat_surat_text']; ?>" id="pengirim_keluar" name="pengirim_keluar"  class="form-control col-md-7 col-xs-12" required="required" type="text">
        </div>
      </div>

      <div class="item form-group">
       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="penerima_keluar">Penerima
       </label>
       <div class="col-md-6 col-sm-6 col-xs-12">
        <input  value="<?php echo $surat_keluar['tujuan_text']; ?>" id="penerima_keluar" class="form-control col-md-7 col-xs-12" name="penerima_keluar"  required="required" type="text">
      </div>
    </div>
    <div class="item form-group">
     <label for="perihal_keluar" class="control-label col-md-3 col-sm-3 col-xs-12">Perihal</label>
     <div class="col-md-6 col-sm-6 col-xs-12">
      <input  value="<?php echo $surat_keluar['perihal']; ?>" id="perihal_keluar" name="perihal_keluar"  class="form-control col-md-7 col-xs-12"  required="required" type="text">
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dikirim_via">Dikirim Via
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">

      <select name="dikirim_via" class="form-control col-md-7 col-xs-12">
        <?php foreach ($dikirim_via as $key => $value): ?>
          <?php if ($value['id'] == $surat_keluar['dikirim_via']): ?>
            <?php $selected = 'selected'; ?>
          <?php else: ?>
            <?php $selected = ''; ?>
          <?php endif ?>
          <option value="<?php echo $value['id'] ?>" <?php echo $selected ?>><?php echo $value['nama_pengiriman']?></option>             
        <?php endforeach ?>
      </select>
      <!--  <input id="diposisi_tujuan" name="diposisi_tujuan"   class="form-control col-md-7 col-xs-12" type="text"> -->
    </div>
  </div>

  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_resi">No Resi Pengiriman
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input  value="<?php echo $surat_keluar['no_resi_pengiriman']; ?>" id="no_resi" class="form-control col-md-7 col-xs-12" name="no_resi"  required="required" type="text">
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal_pengiriman">Tanggal Pengiriman
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input  value="<?php echo $surat_keluar['tanggal_pengiriman']; ?>" id="tanggal_pengiriman" data-inputmask="'mask': '99/99/9999'"  class="form-control col-md-7 col-xs-12" name="tanggal_pengiriman"  required="required" type="text">
    </div>
  </div>


  <div class="item form-group">
   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="file_keluar">File
   </label>
   <div class="col-md-6 col-sm-6 col-xs-12">
     <div id="option_file">
     <?php if ($surat_keluar['file']) { ?>
       <div id="aksi_file">
       <a href="<?php echo base_url('uploads/surat_keluar/' . $surat_keluar['file']) ?>" class="btn btn-info btn-xs" target="_blank">Lihat</a> <button id="btn_hapus_keluar" type="button" class="btn btn-danger btn-xs" onclick="showDeleteFile('<?php echo $surat_keluar['file'] ?>')" >Hapus</button>
       </div>
       <?php }
       else { ?>
       <div id="file_upload_keluar">
         <input id="file_keluar" accept="application/pdf" name="file_keluar"  type="file">
       </div>
       <?php } ?>
       <!-- <input id="file" accept="application/pdf" name="file"  class=" col-md-7 col-xs-12" type="file"> -->
     </div>
   </div>
 </div>

 <div class="item form-group">
   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="catatan_tambahan_keluar">Catatan
   </label>
   <div class="col-md-6 col-sm-6 col-xs-12">
    <textarea value="<?php echo $surat_keluar['catatan_tambahan']; ?>" id="catatan_tambahan_keluar" name="catatan_tambahan_keluar"  class="form-control col-md-7 col-xs-12"> </textarea>
  </div>
</div>
<div class="ln_solid"></div>
<div class="form-group">
 <div class="col-md-6 col-md-offset-3">
   <a href="<?php echo base_url('surat_keluar') ?>" class="btn btn-dark ">Batal</a>
   <button class="btn btn-primary" type="reset">Reset</button>
   <button id="send" type="submit" class="btn btn-success">Submit</button>
 </div>
</div>
</form>
</div>
</div>
</div>
</div>
<!-- Modal untuk delete file -->
<div class="modal fade bs-example-modal-sm"  id="modal_delete_file" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h5 class="modal-title" id="myModalLabel2">Yakin Ingin Menghapus File  Ini ? </h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning btn-ok btn-xs">Delete</button>
      </div>
    </div>
  </div>
</div>
<script>
  function showDeleteFile(file){
    var x= $('#modal_delete_file');
    x.modal('show');
    $('.btn-ok').click(function() {
      $.ajax({
        url: '<?php echo base_url('surat_keluar/ajax_delete_file') ?>',
        type: 'POST',
        data: {file_keluar:file,id_surat_keluar: '<?php echo $surat_keluar['id_surat_keluar'] ?>'},
    //processData: false, // Don't process the files
    //contentType: false, // Set content type to false as jQuery will tell the server its a query string request
    success: function(data, textStatus, jqXHR)
    {
      if (data == 'OK') {
        $('#option_file').html('');
        $('#option_file').html("<div id='file_upload_keluar'> <input id='file_keluar' accept='application/pdf' name='file_keluar' type='file'></div>");
      }
      x.modal('hide');
    },
    error: function(jqXHR, textStatus, errorThrown)
    {
    // Handle errors here
    console.log('ERRORS: ' + textStatus);
    // STOP LOADING SPINNER
  }
});
    });
  }
  function deleteFile()
  {
  }
  $(document).ready(function() {
   $('#modal_delete_file').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').click(function() {
    });
  });
 });
</script>