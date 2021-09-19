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

          <?php  
    foreach($data as $d) {
            $nama_kegiatan = $d->nama_kegiatan;
            $waktu = $d->waktu;
            $tempat = $d->tempat;
            $kategori = $d->kategori;
        }
          
    foreach($notulensi as $n)
    {
        $id_jadwal = $n->id_jadwal;
        $nama_notulen = $n->nama_notulen;
        $notulensi = $n->notulensi;
    }
          ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $judul ?></h1>
          </div>


          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Undangan Baru</h6>
                </div>
                
                <div class="card-body">
                    
                    <form class="form-horizontal form-validate floating-label" method="post" action="<?php echo base_url().'Administrasi/buat_undangan_baru';?>" enctype="multipart/form-data">
                        
                        
                    
                <div class="form-group">
                    <label><span>Nama Kegiatan</span></label>
                  <input type="text" name="nama_kegiatan" class="form-control form-control-user" id="nama_kegiatan" placeholder="Nama Kegiatan" value="<?= $nama_kegiatan ?>" required>
                </div>  
                        
                 <div class="form-group">
                    <label><span>Tanggal/ Jam Kegiatan</span></label>
                  <input type="datetime-local" name="jadwal_kegiatan" class="form-control form-control-user" id="jadwal_kegiatan" placeholder="Jadwal Kegiatan" value="<?= $waktu ?>" required>
                </div>  
                        
                 <div class="form-group">
                    <label><span>Tempat Kegiatan</span></label>
                  <input type="text" name="tempat_kegiatan" class="form-control form-control-user" id="tempat_kegiatan" placeholder="Tempat Kegiatan"  value="<?= $tempat ?>"required>
                </div>
                        
                <div class="form-group">
                    <label><span>Kategori Kegiatan</span></label>
                      <select class="form-control form-control-user" name="kategori" id="kategori" placeholder="Kategori">
                        <option value="umum" <?php if($kategori == 'umum') {echo "selected='selected'";}?>>Umum</option>
                        <option value="rahasia" <?php if($kategori == 'rahasia') {echo "selected='selected'";}?>>Rahasia</option>
                    </select>
                </div>
                        
                <div class="form-group">
                    <label><span>Nama Notulen</span></label>
                  <input type="text" name="nama_notulen" class="form-control form-control-user" id="nama_notulen" placeholder="Nama Notulen"  value="<?php if($notulensi != NULL) { echo $nama_notulen;} ?>">
                </div>
                        
                <div class="form-group">
                    <label><span>Nama Notulen</span></label>
                 <textarea name="notulensi" class="form-control" rows="4" cols="50"><?php if($notulensi != NULL) { echo $notulensi;} ?></textarea>
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
