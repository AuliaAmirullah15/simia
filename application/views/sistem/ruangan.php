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
            <a href="#" data-toggle="modal" data-target="#tambahRuanganModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah data</a>
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
                      <th>Ruangan</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                      <tr>
                      <th>Ruangan</th>
                      <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                      <?php foreach($data as $d) { ?>
            
                      <tr>
                        <td><?= $d->nama_ruangan ?></td>
                        <td><a href="<?php echo base_url('Inventarisasi/hapus_ruangan/'. $d->id_ruangan); ?>" class="btn btn-danger btn-circle" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                    <i class="fas fa-trash"></i>
                  </a>
                          <a href="#" class="btn btn-info btn-circle" data-toggle="modal" data-target="#editRuanganModal" data-val="<?php echo $d->id_ruangan."_". $d->nama_ruangan; ?>" class="my_link">
                    <i class="fas fa-info-circle"></i>
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
       $('#editRuanganModal').on('show.bs.modal', function (event) {
  var myVal = $(event.relatedTarget).data('val');
    var splitter = myVal.split("_");
  $(this).find(".modal-body #id_ruangan").val(splitter[0]);
         $(this).find(".modal-body #nama_ruangan").val(splitter[1]);
});
    </script>
    
    <script>
$(document).ready(function() {
	var max_fields      = 10; //maximum input boxes allowed
	var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
	var add_button      = $(".add_field_button"); //Add button ID
	
	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
			$(wrapper).append('<div><input type="text" class="form-control" name="mytext[]" id="nama_ruangan" placeholder="Nama Ruangan"/><a href="#" class="remove_field">Remove</a></div></div>'); //add input box
		}
	});
	
	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('div').remove(); x--;
	})
});
</script>


</body>

</html>
