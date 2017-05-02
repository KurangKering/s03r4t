<?php echo $message; ?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Form Tambah User</h2>
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
                    <form class="form-horizontal form-label-left" novalidate="" method="post">


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name">First Name
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="first_name" class="form-control col-md-7 col-xs-12" name="first_name" value="<?php echo $user->first_name; ?>" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_name">Last Name
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="last_name" class="form-control col-md-7 col-xs-12" name="last_name" value="<?php echo $user->last_name; ?>" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="email" name="email" value="<?php echo $user->email; ?>" required="required" class="form-control col-md-7 col-xs-12" type="email">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Username
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="username" readonly="" class="form-control col-md-7 col-xs-12" name="username" value="<?php echo $user->username; ?>" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password" class="control-label col-md-3">Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password" name="password"  class="form-control col-md-7 col-xs-12" type="password">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Password Confirmation</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password2" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" type="password">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Telephone
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="telephone" name="phone" value="<?php echo $user->phone; ?>" required="required"  class="form-control col-md-7 col-xs-12" type="tel">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">User Expired
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="expired" data-inputmask="'mask': '99/99/9999'" value="<?php echo date('d/m/Y/', strtotime($user->user_expired)); ?>" name="expired" required="required"  class="form-control col-md-7 col-xs-12" type="date">
                        </div>
                      </div>

                      <!-- <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Active</label>
                        <div class="col-md-1 col-sm-1 col-xs-12">
                          <div class="">
                            <label>
                              <input name="status" type="checkbox" class="js-switch" <?php echo $user->active == 1 ? "checked" : "" ?> />
                            </label>
                          </div>
                        </div>

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Allow Concurrent Login</label>
                        <div class="col-md-1 col-sm-1 col-xs-12">
                          <div class="">
                            <label>
                              <input name="en_concurrent_login" type="checkbox" class="js-switch" <?php echo $user->allow_concurrent_login == 1 ? "checked" : "" ?> /> 
                            </label>
                          </div>
                        </div>


                        
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Enable Change Password</label>
                        <div class="col-md-1 col-sm-1 col-xs-12">
                          <div class="">
                            <label>
                              <input name="en_change_pass" type="checkbox" class="js-switch" <?php echo $user->enable_change_password == 1 ? "checked" : "" ?> /> 
                            </label>
                          </div>
                        </div>


                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Password Expired Remainder</label>
                        <div class="col-md-1 col-sm-1 col-xs-12">
                          <div class="">
                            <label>
                              <input name="en_expired_remainder" type="checkbox" class="js-switch" <?php echo $user->password_expired_remainder == 1 ? "checked" : "" ?> /> 
                            </label>
                          </div>
                        </div>

                      </div> -->
                      <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">Groups
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <div class="col-md-7">

                            <?php foreach (array_slice($groups, 0, count($groups)/2) as $key => $value): ?>
                              <?php
                              $gID=$value->id;
                              $checked = null;
                              $item = null;
                              foreach($currentGroups as $grp) {
                                if ($gID == $grp->id) {
                                  $checked= ' checked="checked"';
                                  break;
                                }
                              }
                              ?>
                              <div class="">
                                <label>
                                  <input name="groups[]" type="checkbox" class="flat" value="<?php echo $value->id; ?>" <?php echo $checked;?> > <?php echo $value->name; ?>
                                </label>
                              </div>
                            <?php endforeach ?>
                          </div>
                          <div class="col-md-5">
                            <?php foreach (array_slice($groups, count($groups)/2, count($groups)) as $key => $value): ?>
                              <?php
                              $gID=$value->id;
                              $checked = null;
                              $item = null;
                              foreach($currentGroups as $grp) {
                                if ($gID == $grp->id) {
                                  $checked= ' checked="checked"';
                                  break;
                                }
                              }
                              ?>
                              <div class="">
                                <label>
                                  <input name="groups[]" type="checkbox" class="flat" value="<?php echo $value->id; ?>" <?php echo $checked;?>> <?php echo $value->name; ?>
                                </label>
                              </div>
                            <?php endforeach ?>
                          </div>


                          <!-- <div class="">
                            <label>
                              <input type="checkbox" class="flat" > Panitera Muda
                            </label>
                          </div> -->
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
