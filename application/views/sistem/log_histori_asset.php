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
                      <th>Tanggal</th>
                      <th>Nama Barang</th>
                      <th>Status Barang</th>
                        <th>Tindakan</th>
                        <th>Aksi</th>
                        <th>Nama User</th>
                    </tr>
                  </thead>
                  <tfoot>
                      <tr>
                      <th>Tanggal</th>
                      <th>Nama Barang</th>
                      <th>Status Barang</th>
                        <th>Tindakan</th>
                        <th>Aksi</th>
                        <th>Nama User</th>
                    </tr>
                    </tfoot>
                    <tbody>
                      <?php foreach($data as $d) { ?>
            
                      <tr>
                        <td><?= $d->tanggal ?></td>
                        <td><?= $d->nama_barang ?></td>
                        <td><?= $d->status ?></td>
                        <td><?= $d->tindakan ?></td>
                        <td><?= $d->aksi ?></td>
                        <td><?= $d->nama_user ?></td>
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
