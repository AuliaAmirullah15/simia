<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $header ?></title>
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/usu.png') ; ?>" />

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet');?>" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/add.css'); ?>" rel="stylesheet">

    <style>
        .bg-gradient-primary {
            background-color: #d6d8d9;
            background-image: linear-gradient(180deg,#d6d8d9 10%,#d6d8d9 100%)
        }
    </style>
</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5 col-lg-5 col-md-5">

          <div style="margin-top: 50px; color: #1481a1;"><center> <h1 class="h3 mb-4" >Sistem Inventarisasi Aset dan Administrasi Kegiatan</h1></center></div>
          <?php if($message != '' AND $message != null) {

							echo "

					<div class=\"section-body\">
						<div class=\"alert alert-danger alert-dismissible\" role=\"alert\"> <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
							<strong>Maaf!</strong> ". $message."</div></div>"; } ?>
           
        <div class="card o-hidden border-0 shadow-lg my-5">
            
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
             
              <div class="col-lg-12">
                <div class="p-5">
                <div class="text-center">
                  </div>
                    
                  <div class="text-center">
                    <h3 class="h4 text-gray-900 mb-4">Login</h3>
                  </div>
                  <form class="form floating-label" action="<?php base_url().'Home/login' ?>" accept-charset="utf-8" method="post">
                    <div class="form-group">
                        <?= form_input('username', $input->username,['class'=> 'form-control form-control-user','id' => 'username', 'name' => 'username', 'aria-describedby'=> 'usernameHelp', 'placeholder' => 'Masukkan username...' ]) ?>
									<?= form_error('username') ?> </div>
							
<!--                      <input type="text" class="form-control form-control-user" id="username" aria-describedby="usernameHelp" placeholder="Masukkan username...">-->
                  
                    <div class="form-group">
                        <?= form_password('password', $input->password, ['class' => 'form-control form-control-user', 'id' => 'password', 'name' => 'password', 'placeholder' => 'Password']) ?>
									<?= form_error('password') ?>
<!--                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">-->
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                      <button class="btn btn-info btn-user btn-block" type="submit">Login</button>
                   
                   
                  </form>
          
                  
              
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/js/sb-admin-2.min.js'); ?>"></script>

</body>

</html>
