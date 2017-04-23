<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Daftar Surat Masuk</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li class=""><button  onclick="location.href = '<?php echo base_url('surat_masuk/tambah') ?>';" class="btn btn-primary">Tambah</button>
            <!-- <a href="<?php echo base_url('access/tambah_user') ?>" class=""><i class="glyphicon glyphicon-plus"></i></a></li> -->
            <li>
              <div class="input-group top_search">
                <input class="form-control" placeholder="Search for..." type="text">
              </div>
            </li>
        <!--   <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li> -->
          <!-- <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="<?php  ?>">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li> -->
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>No. Diposisi</th>
              <th>Tanggal Masuk</th>
              <th>Sifat</th>
              <th>Pengirim</th>
              <th>Penerima</th>
              <th>Perihal</th>
              <th>Tujuan Disposisi</th>
              <th>File</th>
              <th>Status</th>
              <th>Edit | Hapus</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($surat_masuk as $key => $value): ?>
              <tr>
                <td><?php echo $value['no_lembar_disposisi'] ?></td>
                <td><?php echo $value['tgl_masuk'] ?></td>
                <td><?php echo $value['tujuan_id'] ?></td>
                <td><?php echo $value['pengirim'] ?></td>
                <td><?php echo $value['tujuan_text'] ?></td>
                <td><?php echo $value['perihal'] ?></td>
                <td><?php echo $value['disposisi_tujuan_id'] ?></td>
                <td><?php echo $value['file'] ?></td>
                <td><?php echo $value['disposisi_terakhir_text'] ?></td>
                <td>Edit | Hapus</td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="modal fade bs-example-modal-sm" id="myModals" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Daftar Group User</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <label for="Username" class="col-md-3 control-label">Username </label>
          <span class="col-md-9" id="username">Alibaba</span>
          <p id="par"></p>
        </div>
        <div class="row">
          <label for="Groups" class="col-md-3 control-label">Groups </label>
          <div class="col-md-12">
            <ul id="groups">
            </ul>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(function() {
    new PNotify({
      title: 'Regular Success',
      text: 'That thing that you were trying to do worked!',
      type: 'success',
      styling: 'bootstrap3'
    });
  });
  
</script>