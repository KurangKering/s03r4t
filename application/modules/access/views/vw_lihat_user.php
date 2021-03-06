<?php echo $message; ?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Daftar Pengguna</h2>
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
              <th>Nama Lengkap</th>
              <th>Username</th>
              <th>E-mail</th>
              <th>Groups</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $num = 1; ?>
            <?php foreach ($users as $key => $value): ?>
             <tr>
               <td><?php echo $num++; ?></td>
               <td><?php echo $value->first_name . ' ' . $value->last_name; ?></td>
               <td><?php echo $value->username ?></td>
               <td><?php echo $value->email ?></td>
               <td><button type="button" onClick="showModals('<?php echo $value->id; ?>')" class="btn btn-dark btn-sm">details</button></td>
               <td><?php echo $value->active ? 'active' : 'inactive' ?></td>
               <td><button onclick="location.href = '<?php echo base_url('access/edit_user/'.$value->id) ?>';" type="button" class="btn btn-warning btn-sm">Edit</button> 
                 <button type="button" class="btn btn-danger btn-sm">Hapus</button><td>
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