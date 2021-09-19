<?php $this->load->view('sistem/main_template/1_head') ?>
<style>
    a{
        color:black;
        text-decoration: none;
    }
    
    a:hover {
        color: black;
        text-decoration: none;
    }
</style>
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
<!--            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
          </div>

          

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
                      <th>Nama Pengguna</th>
                      <th>Komentar</th>
                      <th>Waktu</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tfoot>
                      <tr>
                     <th>Nama Pengguna</th>
                      <th>Komentar</th>
                      <th>Waktu</th>
                      <th>Status</th>
                    </tr>
                    </tfoot>
                    <tbody>
                      <?php foreach($data as $d) { ?>
                   
                      <tr>
                           
                          <td><a href="<?php echo base_url('Inventarisasi/rincian_laporan/'. $d->id_laporan); ?>"><?= $d->nama_user ?></a></td>
                          <td><a href="<?php echo base_url('Inventarisasi/rincian_laporan/'. $d->id_laporan); ?>"><?= $d->komentar ?></a></td>
                          <td><a href="<?php echo base_url('Inventarisasi/rincian_laporan/'. $d->id_laporan); ?>"><?= $d->waktu ?></a></td>
                          <td><a href="<?php echo base_url('Inventarisasi/rincian_laporan/'. $d->id_laporan); ?>"><a <?php if($d->status == 'sudah') { echo "style='color:green;'";} ?>><?= $d->status ?></a></a></td>
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
       $('#editStatus').on('show.bs.modal', function (event) {
  var myVal = $(event.relatedTarget).data('val');
  $(this).find(".modal-body #id_laporan").val(myVal);
});
    </script>
    
  

</body>

</html>
