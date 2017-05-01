<?php echo $message ?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Form Tambah Surat Keluar</h2>
        <div class="clearfix"></div>
      </div>
      <div class ="x_content">
       <br>
       <form class="form-horizontal form-label-left" novalidate="" method="post" enctype="multipart/form-data">
        <div class="item form-group">
         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_surat_keluar">No. Surat Keluar
         </label>
         <div class="col-md-6 col-sm-6 col-xs-12">
          <input value="<?php set_value('no_surat_keluar'); ?>" id="no_surat_keluar" class="form-control col-md-7 col-xs-12" name="no_surat_keluar"  required="required" type="text">
        </div>
      </div>
      <div class="item form-group">
       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal_keluar">Tanggal Masuk
       </label>
       <div class="col-md-6 col-sm-6 col-xs-12">
        <input  value="<?php set_value('tanggal_keluar'); ?>" id="tanggal_keluar" data-inputmask="'mask': '99/99/9999'"  class="form-control col-md-7 col-xs-12" name="tanggal_keluar"  required="required" type="text">
      </div>
    </div>
    <div class="item form-group">
      <label for="jenis_keluar" class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Surat</label>
      <div class="col-md-6 col-sm-6 col-xs-12">
       <div class="radio">
         <div class="col-md-3"> 
           <input type="radio" class="flat" name="jenis_keluar"   value="1" checked> Biasa</div>
           <div class="col-md-3"> 
             <input type="radio" class="flat" name="jenis_keluar"  value="2"> Internal
           </div>
         </div>
       </div>
     </div>
     <div class="item form-group">
      <label for="tujuan_id_keluar" class="control-label col-md-3 col-sm-3 col-xs-12">Tujuan ID</label>
      <div class="col-md-6 col-sm-6 col-xs-12">
       <div class="radio">
         <div class="col-md-3">
           <input type="radio" class="flat" name="tujuan_id_keluar"   value="1" checked> Internal
         </div>
         <div class="col-md-3">

           <input type="radio" class="flat" name="tujuan_id_keluar"  value="2"> Lain-Lain
         </div>
       </div>
     </div>
   </div>
   <div class="item form-group">
     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pengirim_keluar">Pengirim
     </label>
     <div class="col-md-6 col-sm-6 col-xs-12">
      <input  value="<?php set_value('pengirim_keluar'); ?>" id="pengirim_keluar" name="pengirim_keluar"  class="form-control col-md-7 col-xs-12" required="required" type="text">
    </div>
  </div>

  <div class="item form-group">
   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="penerima_keluar">Penerima
   </label>
   <div class="col-md-6 col-sm-6 col-xs-12">
    <input  value="<?php set_value('penerima_keluar'); ?>" id="penerima_keluar" class="form-control col-md-7 col-xs-12" name="penerima_keluar"  required="required" type="text">
  </div>
</div>
<div class="item form-group">
 <label for="perihal_keluar" class="control-label col-md-3 col-sm-3 col-xs-12">Perihal</label>
 <div class="col-md-6 col-sm-6 col-xs-12">
  <input  value="<?php set_value('perihal_keluar'); ?>" id="perihal_keluar" name="perihal_keluar"  class="form-control col-md-7 col-xs-12"  required="required" type="text">
</div>
</div>
<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dikirim_via">Dikirim Via
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">

    <select name="dikirim_via" class="form-control col-md-7 col-xs-12">
      <?php foreach ($dikirim_via as $key => $value): ?>
        <option value="<?php echo $value['id'] ?>"><?php echo $value['nama_pengiriman'] ?></option>             
      <?php endforeach ?>
    </select>
    <!--  <input id="diposisi_tujuan" name="diposisi_tujuan"   class="form-control col-md-7 col-xs-12" type="text"> -->
  </div>
</div>

<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_resi">No Resi Pengiriman
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input  value="<?php set_value('no_resi'); ?>" id="no_resi" class="form-control col-md-7 col-xs-12" name="no_resi"  required="required" type="text">
  </div>
</div>
<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal_pengiriman">Tanggal Pengiriman
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input  value="<?php set_value('tanggal_pengiriman'); ?>" id="tanggal_pengiriman" data-inputmask="'mask': '99/99/9999'"  class="form-control col-md-7 col-xs-12" name="tanggal_pengiriman"  required="required" type="text">
  </div>
</div>


<div class="item form-group">
 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="file_keluar">File
 </label>
 <div class="col-md-6 col-sm-6 col-xs-12">
  <input id="file_keluar" accept="application/pdf" name="file_keluar"  class=" col-md-7 col-xs-12" type="file">
</div>
</div>

<div class="item form-group">
 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="catatan_tambahan_keluar">Catatan
 </label>
 <div class="col-md-6 col-sm-6 col-xs-12">
  <textarea id="catatan_tambahan_keluar" name="catatan_tambahan_keluar"  class="form-control col-md-7 col-xs-12"> </textarea>
</div>
</div>
<div class="ln_solid"></div>
<div class="form-group">
 <div class="col-md-6 col-md-offset-3">
  <button type="button" onclick="location.href ='<?php echo base_url('access'); ?>'" class="btn btn-primary">Cancel</button>
  <button class="btn btn-primary" type="reset">Reset</button>
  <button id="send" type="submit" class="btn btn-success">Submit</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>