<?php echo $message ?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Form Tambah Arsip</h2>
        <div class="clearfix"></div>
      </div>
      <div class ="x_content">
       <br>
       <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_ruang">No. Ruang
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input value="<?php echo set_value('no_ruang'); ?>" id="no_ruang" class="form-control col-md-7 col-xs-12" name="no_ruang"  required="required" type="text">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_lemari">No. Lemari
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input value="<?php echo set_value('no_lemari'); ?>" id="no_lemari" class="form-control col-md-7 col-xs-12" name="no_lemari"  required="required" type="text">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_rak">No. Rak
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input value="<?php echo set_value('no_rak'); ?>" id="no_rak" class="form-control col-md-7 col-xs-12" name="no_rak"  required="required" type="text">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_berkas">No. Berkas
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input value="<?php echo set_value('no_berkas'); ?>" id="no_berkas" class="form-control col-md-7 col-xs-12" name="no_berkas"  required="required" type="text">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_arsip">No. Arsip
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input value="<?php echo set_value('no_arsip'); ?>" id="no_arsip" class="form-control col-md-7 col-xs-12" name="no_arsip"  required="required" type="text">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="perkara_id">Perkara Id
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input value="<?php echo set_value('perkara_id'); ?>" id="perkara_id" class="form-control col-md-7 col-xs-12" name="perkara_id"  required="required" type="text">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_perkara">No. Perkara
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input value="<?php echo set_value('no_perkara'); ?>" id="no_perkara" class="form-control col-md-7 col-xs-12" name="no_perkara"  required="required" type="text">
          </div>
        </div>
        <div class="item form-group">
         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal_masuk_arsip">Tanggal Masuk Arsip
         </label>
         <div class="col-md-6 col-sm-6 col-xs-12">
          <input  value="<?php echo set_value('tanggal_masuk_arsip'); ?>" id="tanggal_masuk_arsip" data-inputmask="'mask': '99/99/9999'"  class="form-control col-md-7 col-xs-12" name="tanggal_masuk_arsip"  required="required" type="text">
        </div>
      </div>
      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_penerima">Nama Penerima
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select name="nama_penerima" class="form-control col-md-7 col-xs-12">
            <?php foreach ($nama_penerima as $key => $value): ?>
              <option value="<?php echo $value['id'] ?>"><?php echo $value['first_name'] . ' ' .  $value['last_name'] ?></option>             
            <?php endforeach ?>
          </select>
        </div>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_penyerah">Nama Penyerah
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input value="<?php echo set_value('nama_penyerah'); ?>" id="nama_penyerah" class="form-control col-md-7 col-xs-12" name="nama_penyerah"  required="required" type="text">
        </div>
      </div>
      <div class="item form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lengkap">Lengkap ?
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input value="<?php echo set_value('lengkap'); ?>" id="lengkap" class="form-control col-md-7 col-xs-12" name="lengkap"  required="required" type="text">
        </div>
      </div>
       <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input value="<?php echo set_value('status'); ?>" id="status" class="form-control col-md-7 col-xs-12" name="status"  required="required" type="text">
          </div>
        </div>
      <div class="item form-group">
       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keterangan">Keterangan
       </label>
       <div class="col-md-6 col-sm-6 col-xs-12">
        <textarea id="keterangan" name="keterangan"  class="form-control col-md-7 col-xs-12"> </textarea>
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