<?php $this->load->view('sistem/main_template/1_head') ?>



<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
        <?php $this->load->view('sistem/main_template/3_sidebar') ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
            <?php $this->load->view('sistem/main_template/4_topbar') ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $judul ?></h1>
          </div>

         
            <?php 
    
        foreach($data as $d)
        {
            $id_user = $d->id_user;
            $nama_user = $d->nama_user;
            $username = $d->username;
            $password = $d->password;
            $level = $d->level;
            $created_date = $d->created_date;
        }
    
    ?>
            
            
           <?php if($message != '') { ?>
     <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Selamat!</strong> <?= $message ?>
</div>
            
            <?php } ?>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Form Asset</h6>
                </div>
                
                <div class="card-body">
                    
                    <form class="form-horizontal form-validate floating-label" method="post" action="<?php echo base_url().'Sistem/update_profile/'. $id_user;?>" enctype="multipart/form-data">
                        
                        
        
                       
                <div class="form-group">
                    <label><span>Nama User</span></label>
                  <input type="text" name="nama_user" class="form-control form-control-user" id="nama_user" placeholder="Nama User" value="<?php echo $nama_user; ?>" required>
                </div>  
                    
                <div class="form-group">
                    <label><span>Username</span></label>
                  <input type="text" name="username" class="form-control form-control-user" id="username" placeholder="Username" value="<?php echo $username; ?>" required>
                </div>  
                        
                <div class="form-group">
                    <label><span>Password</span></label>
                  <input type="text" name="password" class="form-control form-control-user" id="password" placeholder="Ubah Password">
                </div> 
                        
               <div class="form-group">
                    <label><span>Level</span></label>
                  <input type="text" name="level" class="form-control form-control-user" id="level" placeholder="level" value="<?php
                
                if($level == 'akademik') {
                    echo "Kasubbag Akademik, Kemahasiswaan dan Kealumnian";
                }
                else if($level == 'aset') {
                    echo "Kasubbag Pengelolaan Aset, Keuangan dan SDM";
                }
                else if($level == 'penelitian') {
                    echo "Penelitian, Pengabdian Masyarakat, Kerjasama";
                }
                else if($level == 'wd1') {
                    echo "Wakil Dekan 1";
                }
                else if($level == 'wd2') {
                    echo "Wakil Dekan 2";
                } 
                else if($level == 'wd3') {
                    echo "Wakil Dekan 3";
                } 
                else if($level == 'dekan') {
                    echo "Dekan";
                }
                else if($level == 'master_admin') {
                    echo "Master Admin";
                }  
                else {
                    echo $level;
                }                                                                                                               
    ?>" disabled>
                </div>
                        
                <div class="form-group">
                    <label><span>Created Date</span></label>
                  <input type="text" name="created_date" class="form-control form-control-user" id="created_date" placeholder="Ubah Password" value="<?php echo $created_date; ?>" disabled>
                </div> 
                    
               
                        
                    <div class="form-group">
                        <button class="btn btn-primary btn-icon-split">  <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>  <span class="text">Submit</span></button>    
                    </div>
                    </form>
                </div>
               

             
              </div> </div></div></div>
      <!-- End of Main Content -->

      <!-- Footer -->
        <?php $this->load->view('sistem/main_template/5_footer'); ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

    <?php $this->load->view('sistem/main_template/6_modal'); ?>

<?php $this->load->view('sistem/main_template/2_javascript') ?>

</body>

</html>
