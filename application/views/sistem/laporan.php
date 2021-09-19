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
<!--            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
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
                      <th>Nama Pelapor</th>
                      <th>NIM/NIP</th>
                      <th>Pekerjaan</th>
                      <th>Alamat</th>
                      <th>No Hp/Telp</th>
                      <th>Status Pelapor</th>
                      <th>Deskripsi</th>
                      <th>Foto Identitas</th>
                      <th>Bukti</th>
                      <th>Status Proses</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                      <tr>
                      <th>Nama Pelapor</th>
                      <th>NIM/NIP</th>
                      <th>Pekerjaan</th>
                      <th>Alamat</th>
                      <th>No Hp/Telp</th>
                      <th>Status Pelapor</th>
                      <th>Deskripsi</th>
                      <th>Foto Identitas</th>
                      <th>Bukti</th>
                      <th>Status Proses</th>
                      <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                      <?php foreach($data as $d) { ?>
            
                      <tr>
                        <td><?= $d->nama_pelapor ?></td>
                        <td><?= $d->nim_nip ?></td>
                        <td><?= $d->pekerjaan ?></td>
                        <td><?= $d->alamat ?></td>
                        <td><?= $d->no_tlp ?></td>
                        <td><?php echo ucfirst($d->status); ?></td>
                        <td><?= $d->deskripsi ?></td>
                          <td><a href="#" class="pop"><img src="<?php echo base_url('laporan/'. $d->foto); ?>" alt="<?= $d->nama_pelapor ?>" style="width:100%;max-width:300px" ></a></td>
                           <td><a href="#" class="pop"><img src="<?php echo base_url('laporan_bukti/'. $d->bukti); ?>" alt="<?= $d->bukti ?>" style="width:100%;max-width:300px" ></a></td>
                        <td><?= $d->status_proses ?></td>
                        <td>
                            <a href="<?php echo base_url('Inventarisasi/hapus_laporan/'. $d->id_laporan.'/'. $d->nama_pelapor); ?>" class="btn btn-danger btn-circle" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                    <i class="fas fa-trash"></i>
                  </a>
<!--                          <a href="#" class="btn btn-info btn-circle" data-toggle="modal" data-target="#editStatus" data-val="<?= $d->id_laporan ?>" class="my_link">-->
                            
                            <a href="<?php echo base_url('Inventarisasi/rincian_laporan/'. $d->id_laporan) ; ?>" class="btn btn-info btn-circle">
                    <i class="fas fa-edit"></i>
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
       $('#editStatus').on('show.bs.modal', function (event) {
  var myVal = $(event.relatedTarget).data('val');
  $(this).find(".modal-body #id_laporan").val(myVal);
});
    </script>
    
  

</body>

</html>
