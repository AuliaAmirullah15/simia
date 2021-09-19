<?php $this->load->view('sistem/main_template/1_head') ?>

<?php foreach($data as $d) {
  $id_laporan = $d->id_laporan;  
  $nama_pelapor = $d->nama_pelapor;
  $nim_nip = $d->nim_nip;
  $pekerjaan = $d->pekerjaan;
  $alamat = $d->alamat;
  $no_tlp = $d->no_tlp;
  $status = $d->status;
  $deskripsi = $d->deskripsi;
  $status_proses = $d->status_proses;
}
?>
<style>
    .input-group-text {
        height: 38px;   
        background-color: #bfbfbf;
        transition: 0.5s;
    }
    
    .input-group-text:hover {
        background-color: #707070;
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
              
               
            <div class="card-header py-2">
              <h6 class="m-0 font-weight-bold text-primary">Rincian laporan</h6>
            </div>
                <div class="card-body">
                      <!-- Content -->
                    
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Nama Pelapor</td>
                                        <td>: <?= $nama_pelapor ?></td>
                                    </tr>
                                    <tr>
                                        <td>NIM/NIP</td>
                                        <td>: <?= $nim_nip ?></td>
                                    </tr>
                                    <tr>
                                        <td>Pekerjaan</td>
                                        <td>: <?= $pekerjaan ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>: <?= $alamat ?></td>
                                    </tr>
                                    <tr>
                                        <td>No Telepon</td>
                                        <td>: <?= $no_tlp ?></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>: <?= $status ?></td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi</td>
                                        <td>: <?= $deskripsi ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="row">
                         <?php if($status_proses == 'belum') { ?>
                         <button href="#" class="btn btn-primary" data-toggle="modal" data-target="#editStatus" data-val="<?= $d->id_laporan ?>" class="my_link">Verifikasi</button>
                        <?php } else { ?>
                         <button href="#" class="btn btn-success" data-toggle="modal" data-target="#editStatus" data-val="<?= $d->id_laporan ?>" class="my_link" disabled>Sudah diverifikasi</button>
                        <?php } ?>
                    </div>
                    </div></div>
                    
            

             
              </div> </div>
          
          
          
          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
              
               
            <div class="card-header py-2">
              <h6 class="m-0 font-weight-bold text-primary">Komentar</h6>
            </div>
                <div class="card-body">
                      <!-- Content -->
                    
                    <?php foreach($komentar as $k) { ?>
                <div id="display_comment">    
                <div class="col-sm-12 d-flex align-items-center">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="" width="50px" height="50px">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="col-sm-12 font-weight-bold">
                    <div><?= $k->komentar ?></div>
                    <div class="small text-gray-500"><?= $k->nama_user ?> · <?= $k->waktu ?></div>
                  </div>
                    </div><hr></div>
                    <?php } ?>
                    
                
            
                    
                    <form method="post" action="<?php echo base_url('Inventarisasi/tambah_komentar_update/'. $id_laporan); ?>">
                        <div class="input-group mb-3">
    <input type="text" name="komentar" id="komentar" class="form-control" placeholder="Ketik komentar disini">
    <div class="input-group-append">
      <span class="input-group-text"><button type="submit" class="btn btn-primary btn-submit" style="background-color: transparent; border-color: transparent">+</button></span>
    </div>
  </div>
                        
                    </form>
                  
                    </div></div>
                    
                
            
               <!-- Nav Item - Messages -->
        
              
            
          
           

             
              </div> </div>
          </div></div>
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
    
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
        function viewData() {
            $.get('<?php echo base_url("Inventarisasi/view/". $id_laporan) ?>', function(data){
//                $("#display_comment").html("")
//                alert(data)
                $('#display_comment').html(data)
            })
        }
        
        function chk()
        {
            var id_laporan = '<?= $id_laporan ?>';
            var id_user = '<?= $_SESSION['id_user'] ?>';
            var komentar = $("#komentar").val();
            var dataString = 'komentar=' + komentar + '&id_laporan=' + id_laporan + '&id_user=' + id_user;
            
            $.ajax({
                type:"POST",
                url:"../tambah_komentar",
                data: dataString,
                cache: false,
//                success: function(html){
//                    $('#msg').html(html);
//                    alert("SUKSES");
//                }
//                 success: function(data){
//                    $("#display_comment").html("");
//                    viewData()
//                     $('#nama_user').val(' ')
//                     $('#waktu').val(' ')
//                     $('#komentar').val(' ')
//                     
//                }
                    success: function(response){
                    $("#display_comment").html("");
                    viewData()
                     $('#nama_user').val(' ')
                     $('#waktu').val(' ')
                     $('#komentar').val(' ')
                     
                }
            });
            
            return false;
        }
    </script>
    
     <script>
       $('#editStatus').on('show.bs.modal', function (event) {
  var myVal = $(event.relatedTarget).data('val');
  $(this).find(".modal-body #id_laporan").val(myVal);
});
    </script>

</body>

</html>
