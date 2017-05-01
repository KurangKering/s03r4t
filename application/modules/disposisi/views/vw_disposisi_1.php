
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Input Disposisi </h2>
        <ul class="nav navbar-right panel_toolbox">
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div id="smartwizard" class="sw-main sw-theme-arrows">
            <ul class="nav nav-tabs step-anchor">
                <li class="active"><a href="#step-0">Surat Masuk<br><small>Panduan</small></a></li>
                <li class=""><a href="#step-1">Disposisi 1<br><small>Ketua / Wakil</small></a></li>
                <li><a href="#step-2">Disposisi 2<br><small>Panitera / Sekretaris</small></a></li>
                <li><a href="#step-3">Disposisi 3<br><small>Kabag</small></a></li>
            </ul>

            <div class="sw-container tab-content" style="min-height: 163px;">
                <div id="step-0" class="step-content" style="display: block;">
                    <br>
                    <form class="form-horizontal form-label-left" novalidate="" method="post" enctype="multipart/form-data">
                        <div class="item form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_lembar_disposisi">No. Lembar Disposisi
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                              <input value="<?php echo $surat_masuk['no_lembar_disposisi']; ?>" id="no_lembar_disposisi" class="form-control col-md-7 col-xs-12" name="no_lembar_disposisi"  disabled type="text">
                          </div>
                      </div>
                      <div class="item form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal_masuk">Tanggal Masuk
                         </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="<?php echo date_converter($surat_masuk['tgl_masuk']); ?>" id="tanggal_masuk" data-inputmask="'mask': '99/99/9999'"  class="form-control col-md-7 col-xs-12" name="tanggal_masuk"  disabled type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                      <label for="perihal" class="control-label col-md-3 col-sm-3 col-xs-12">Tujuan ID</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="<?php echo $surat_masuk['tujuan_id']; ?>" id="tanggal_masuk" class="form-control col-md-7 col-xs-12" name="tanggal_masuk"  disabled type="text">

                    </div>
                </div>
                <div class="item form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pengirim">Pengirim
                   </label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                      <input value="<?php echo $surat_masuk['pengirim'] ?>" id="pengirim" name="pengirim"  class="form-control col-md-7 col-xs-12" disabled type="text">
                  </div>
              </div>
              <div class="item form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="penerima">Penerima
                 </label>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                    <input value="<?php echo $surat_masuk['tujuan_text'] ?>"  id="penerima" class="form-control col-md-7 col-xs-12" name="penerima"  disabled type="text">
                </div>
            </div>
            <div class="item form-group">
               <label for="perihal" class="control-label col-md-3 col-sm-3 col-xs-12">Perihal</label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                  <input value="<?php echo $surat_masuk['perihal'] ?>"  id="perihal" name="perihal"  class="form-control col-md-7 col-xs-12"  disabled type="text">
              </div>
          </div>
          <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="disposisi_tujuan_id">Tujuan Disposisi
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <input value="<?php echo $surat_masuk['perihal'] ?>"  id="perihal" name="perihal"  class="form-control col-md-7 col-xs-12"  disabled type="text">

                  <!--  <input id="diposisi_tujuan" name="diposisi_tujuan"   class="form-control col-md-7 col-xs-12" type="text"> -->
              </div>
          </div>
          <div class="item form-group">
           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="file">File
           </label>
           <div class="col-md-6 col-sm-6 col-xs-12">
             <div id="option_file">
               <?php if ($surat_masuk['file']) { ?>
               <div id="aksi_file">
                   <a href="<?php echo base_url('uploads/surat_masuk/' . $surat_masuk['file']) ?>" class="btn btn-info btn-xs" target="_blank">Lihat</a> 
               </div>
               <?php }  ?>
               <!-- <input id="file" accept="application/pdf" name="file"  class=" col-md-7 col-xs-12" type="file"> -->
           </div>
       </div>
   </div>
   <div class="item form-group">
       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="catatan_tambahan">Catatan
       </label>
       <div class="col-md-6 col-sm-6 col-xs-12">
          <textarea id="catatan_tambahan" name="catatan_tambahan"  disabled="" class="form-control col-md-7 col-xs-12"><?php echo $surat_masuk['catatan_tambahan'] ?></textarea>
      </div>
  </div>

</form>
</div>
<div id="step-1" class="step-content" style="display: none;"><div class ="x_content">
   <br>
   <form class="form-horizontal form-label-left" novalidate="" method="post" enctype="multipart/form-data">
    <div class="item form-group">
     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="disposisi_ke_id">Disposisi Kepada
     </label>
     <div class="col-md-6 col-sm-6 col-xs-12">
      <input value="<?php set_value('disposisi_ke_id'); ?>" required id="disposisi_ke_id" class="form-control col-md-7 col-xs-12" name="disposisi_ke_id"   type="text">
  </div>
</div>
<div class="item form-group">
   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal_disposisi">Tanggal Disposisi
   </label>
   <div class="col-md-6 col-sm-6 col-xs-12">
    <input  value="<?php set_value('tanggal_disposisi'); ?>" id="tanggal_disposisi" required data-inputmask="'mask': '99/99/9999'"  class="form-control col-md-7 col-xs-12" name="tanggal_disposisi"   type="text">
</div>
</div>



<div class="item form-group">
   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="is_disposisi">isi Disposisi
   </label>
   <div class="col-md-6 col-sm-6 col-xs-12">
    <textarea id="is_disposisi" name="is_disposisi"   required class="form-control col-md-7 col-xs-12"> </textarea>
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
</div></div>
<div id="step-2" class="step-content" style="display: none;">

</div>
<div id="step-3" class="step-content" style="display: none;">

</div>

</div>

</div>
</div>
</div>
</div>
</div>


<script type="text/javascript">
    $(document).ready(function(){

            // Step show event 
            $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
               //alert("You are on step "+stepNumber+" now");
               if(stepPosition === 'first'){
                   $("#prev-btn").addClass('disabled');
               }else if(stepPosition === 'final'){
                   $("#next-btn").addClass('disabled');
               }else{
                   $("#prev-btn").removeClass('disabled');
                   $("#next-btn").removeClass('disabled');
               }
           });
            
            // Toolbar extra buttons
            var btnFinish = $('<button></button>').text('Selesai')
            .addClass('btn btn-info')
            .on('click', function(){ alert('Finish Clicked'); });
            var btnCancel = $('<button></button>').text('Cancel')
            .addClass('btn btn-danger')
            .on('click', function(){ $('#smartwizard').smartWizard("reset"); });                         
            
            
            // Smart Wizard
            $('#smartwizard').smartWizard({ 
                disabledSteps : [2, 3],
                selected: 0, 
                theme: 'default',
                transitionEffect:'fade',
                showStepURLhash: true,
                toolbarSettings: {
                    toolbarPosition: 'bottom',
                   // showNextButton : false,
                    //showPreviousButton : false,
                    toolbarExtraButtons: [ btnCancel],

                }

            });

            
            // External Button Events
            $("#reset-btn").on("click", function() {
                // Reset wizard
                $('#smartwizard').smartWizard("reset");
                return true;
            });
            
            $("#prev-btn").on("click", function() {
                // Navigate previous
                $('#smartwizard').smartWizard("prev");
                return true;
            });
            
            $("#next-btn").on("click", function() {
                // Navigate next
                $('#smartwizard').smartWizard("next");
                return true;
            });
            
            
        });   
    </script>