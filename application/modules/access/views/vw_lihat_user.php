<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Daftar Pengguna Sistem Informasi Surat Menyurat</h2>
        <ul class="nav navbar-right panel_toolbox">
        <li class="pull-right"><a href="<?php echo base_url('access/tambah_user') ?>" class=""><i class="glyphicon glyphicon-plus"></i></a></li>
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
               <td><?php echo $value->data_group ?></td>
               <td><?php echo $value->active ?></td>
               <td>Edit | Hapus<td>
               </tr>
             <?php endforeach ?>
           </tbody>
         </table>
       </div>
     </div>
   </div>
 </div>