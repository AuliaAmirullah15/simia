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
            <a href="<?php echo base_url('Administrasi/buat_undangan'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah data</a>
          </div>

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
              <h6 class="m-0 font-weight-bold text-primary">Inventaris Fasilkom-TI</h6>
            </div>
                <div class="card-body">
                      <!-- DataTales Example -->
          
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama Kegiatan</th>
                        <th>Waktu</th>
                        <th>Tempat</th>
                        <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                      <tr>
                      <th>Nama Kegiatan</th>
                        <th>Waktu</th>
                        <th>Tempat</th>
                        <th>Status</th>
                      <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                      <?php foreach($data as $d) { ?>
            
                      <tr>
                        <td><?= $d->nama_kegiatan ?></td>
                          <td><?= $d->waktu ?></td>
                          <td><?= $d->tempat ?></td>
                          <td><?php 
                              
                            if($d->status == 'on') { echo "<p style='color:green;'>Aktif</p>"; }
                             else if($d->status == 'batal') { echo "<p style='color:red;'>Batal</p>"; }
                            else if($d->status == 'valid') { echo "<p style='color:blue;'>Valid</p>"; }
                              ?></td>
                        <td><a href="<?php echo base_url('Administrasi/hapus_data/adm_jadwal_kegiatan/'. $d->id_jadwal); ?>" class="btn btn-danger btn-circle" onclick="return confirm('Apakah anda yakin data ini dihapus?')">
                    <i class="fas fa-trash"></i>
                  </a>
                          <a href="<?php echo base_url('Administrasi/edit_kegiatan/'. $d->id_jadwal); ?>" class="btn btn-info btn-circle" >
                    <i class="fas fa-info-circle"></i>
                  </a>
                            
                            <a href="<?php echo base_url('Administrasi/cetak_undangan/'. $d->id_jadwal); ?>" class="btn btn-primary btn-circle" >
                    <i class="fas fa-print"></i>
                  </a>
                          </td>
                      </tr>
                      
                        
                      <?php } ?>
                    
                  </tbody>
                </table>
              </div>
                    </div></div>
                    
            

             
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
    

     <script>
       $('#editSDModal').on('show.bs.modal', function (event) {
  var myVal = $(event.relatedTarget).data('val');
    var splitter = myVal.split("_");
  $(this).find(".modal-body #id_sumber_dana1").val(splitter[0]);
         $(this).find(".modal-body #sumber_dana1").val(splitter[1]);
});
    </script>


</body>

</html>
