<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Daftar Surat Masuk</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li class=""><button  onclick="location.href = '<?php echo base_url('access/tambah_user') ?>';" class="btn btn-primary">Tambah</button>
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
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Username</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Larry</td>
                          <td>the Bird</td>
                          <td>@twitter</td>
                        </tr>
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