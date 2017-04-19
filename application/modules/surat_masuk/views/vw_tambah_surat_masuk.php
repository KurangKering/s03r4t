<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Form Tambah Surat Masuk</h2>
                    <!-- <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                  </ul> -->
                  <div class="clearfix"></div>
              </div>
              <div class="x_content">
              	<br>
              	<form class="form-horizontal form-label-left" novalidate="" method="post" enctype="multipart/form-data>
              		<div class="item form-group">
              			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_lembar_disposisi">No. Lembar Disposisi
              			</label>
              			<div class="col-md-6 col-sm-6 col-xs-12">
              				<input id="no_lembar_disposisi" class="form-control col-md-7 col-xs-12" name="no_lembar_disposisi" required="required" type="text">
              			</div>
              		</div>
              		<div class="item form-group">
              			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal_masuk">Tanggal Masuk
              			</label>
              			<div class="col-md-6 col-sm-6 col-xs-12">
              				<input id="tanggal_masuk" data-inputmask="'mask': '99/99/9999'"  class="form-control col-md-7 col-xs-12" name="tanggal_masuk" required="required" type="text">
              			</div>
              		</div>
              		<div class="item form-group">
              			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="pengirim">Pengirim
              			</label>
              			<div class="col-md-6 col-sm-6 col-xs-12">
              				<input id="pengirim" name="pengirim" required="required" class="form-control col-md-7 col-xs-12" type="email">
              			</div>
              		</div>
              		<div class="item form-group">
              			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="tujuan">Penerima
              			</label>
              			<div class="col-md-6 col-sm-6 col-xs-12">
              				<input id="tujuan" class="form-control col-md-7 col-xs-12" name="tujuan" required="required" type="text">
              			</div>
              		</div>
              		<div class="item form-group">
              			<label for="perihal" class="control-label col-md-3">Perihal</label>
              			<div class="col-md-6 col-sm-6 col-xs-12">
              				<input id="perihal" name="perihal"  class="form-control col-md-7 col-xs-12" required="required" type="text">
              			</div>
              		</div>
              		<div class="item form-group">
              			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="file_scanned">File
              			</label>
              			<div class="col-md-6 col-sm-6 col-xs-12">
              				<input id="file_scanned" name="file_scanned" required="required"  class="form-control col-md-7 col-xs-12" type="tel">
              			</div>
              		</div>
              		<div class="item form-group">
              			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="diposisi_tujuan">Tujuan Disposisi
              			</label>
              			<div class="col-md-6 col-sm-6 col-xs-12">
              				<input id="diposisi_tujuan" name="diposisi_tujuan" required="required"  class="form-control col-md-7 col-xs-12" type="tel">
              			</div>
              		</div>
              		<div class="item form-group">
              			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="diposisi_tujuan">Catatan
              			</label>
              			<div class="col-md-6 col-sm-6 col-xs-12">
              				<textarea id="diposisi_tujuan" name="diposisi_tujuan"  class="form-control col-md-7 col-xs-12"> </textarea>
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