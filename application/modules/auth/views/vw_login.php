<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php echo $title ?></title>

  <!-- Bootstrap -->
  <link href="<?php echo base_url('template/gentelella/') ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo base_url('template/gentelella/') ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo base_url('template/gentelella/') ?>vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="<?php echo base_url('template/gentelella/') ?>vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?php echo base_url('template/gentelella/') ?>build/css/custom.min.css" rel="stylesheet">
</head>
<body class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form method="post" action="<?php echo base_url('auth/login'); ?>">
            <h1>SISTEM INFORMASI PENYURATAN</h1>
            <div>
              <?php echo form_input($identity);?>
            </div>
            <div>
              <?php echo form_input($password);?>
            </div>
            <!-- <div>
              <?php echo lang('login_remember_label', 'remember');?>
              <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
            </div> -->
            <div>
              <button type="submit" class="btn btn-default submit" >Log in</button>
              <br>
              <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p>
                <div id="infoMessage"><?php echo $message;?></div>
              </p>

              <div class="clearfix"></div>
              <br />

              <div>
                <h1><i class="fa fa-paw"></i> SIM SURAT</h1>
                <p>©2016 All Rights Reserved. <br>Kecoak Bunting Babi Ngepet Tukang Kebun</p>
              </div>
            </div>
          </form>
        </section>

      </div>
    </div>
  </div>
</body>
</html>