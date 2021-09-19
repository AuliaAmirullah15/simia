<?php $this->load->view('sistem/main_template/1_head') ?>

<?php if($inventaris != NULL) 
{
    foreach($inventaris as $inv)
    {
        $id_inventaris = $inv->id_inventaris;
        $nama_barang = $inv->nama_barang;
        $id_sumber_dana = $inv->id_sumber_dana;
        $tahun_pendanaan = $inv->tahun_pendanaan;
        $lokasi = $inv->lokasi;
        $kondisi = $inv->kondisi;
    }
}

if($tindakan != NULL)
{
    foreach($tindakan as $t)
    {
        $tindakannya = $t->tindakan;
    }
}
?>
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
                  <h6 class="m-0 font-weight-bold text-primary">Form Asset</h6>
                </div>
                
                <div class="card-body">
                    
                    <form class="form-horizontal form-validate floating-label" method="post" action="<?php echo base_url().'Inventarisasi/tambah_data';?>" enctype="multipart/form-data">
                        
                        
                       
                            <input type='hidden' name='id_inventaris' value='<?php if($inventaris != NULL) {echo $id_inventaris;} else {echo 'NULL';} ?>'>
                       
                <div class="form-group">
                    <label><span>Nama Asset</span></label>
                  <input type="text" name="nama_barang" class="form-control form-control-user" id="nama_barang" placeholder="Nama Asset" value="<?php if($inventaris != NULL){ echo $nama_barang;} echo set_value('nama_barang'); ?>" required="required">
                    <?php echo form_error('nama_barang'); ?>
                </div>  
                    
                <div class="form-group">
                    <label><span>Sumber Dana</span></label>
                    <select class="form-control form-control-user" name="sumber_dana" id="sumberDana" placeholder="Sumber Dana">
                        
                        <?php foreach($sumber_dana as $sd){ ?>
                            <option value="<?= $sd->id_sumber_dana ?>" <?php if($inventaris != NULL){ if($sd->id_sumber_dana == $id_sumber_dana) {echo "selected='selected'";}} ?>><?= $sd->sumber_dana ?></option>
                        <?php } ?>
                    </select>
               
                </div> 
                    
                <div class="form-group">
                    <label><span>Tahun Pendanaan</span></label>
                   <input type="number" name="tahun_pendanaan" class="form-control form-control-user" id="tahunPendanaan" placeholder="0000" value="<?php if($inventaris != NULL){ echo $tahun_pendanaan;} echo set_value('tahun_pendanaan'); ?>" required="required">
                    <?php echo form_error('tahun_pendanaan'); ?>
                </div>  
                
                <div class="form-group">
                    <label><span>Lokasi</span></label>
                      <select class="form-control form-control-user" name="lokasi" id="lokasi" placeholder="Lokasi">
                    <?php foreach($lokasi as $sd){ ?>
                            <option value="<?= $sd->id_ruangan ?>" <?php if($inventaris != NULL){ if($sd->id_ruangan == $lokasi) {echo "selected='selected'";}} ?>><?= $sd->nama_ruangan ?></option>
                        <?php } ?>
                    </select>
                </div>
                 
                <div class="form-group">
                    <label><span>Kondisi</span></label>
                    <select class="form-control form-control-user" name="kondisi" id="kondisi" placeholder="Kondisi">
                        <option value="baik" <?php if($inventaris != NULL){ if($kondisi == 'baik') {echo "selected='selected'";}} ?>>Baik</option>
                        <option value="rusak" <?php if($inventaris != NULL){ if($kondisi == 'rusak') {echo "selected='selected'";}} ?>>Rusak</option>
                    </select>
                </div>
                    
                <div class="form-group">
                   <textarea class="form-control form-control-user" name="tindakan" id="tindakan" cols="50" rows="4" placeholder="Tulis tindakan disini! Kolom ini aktif bila kondisi asset rusak." value="<?php echo set_value('tindakan'); ?>" <?php if($tindakan == NULL) { echo'disabled'; } ?>><?php if($tindakan != NULL) { echo $tindakannya; }  ?></textarea> 
                    <?php echo form_error('tindakan'); ?>
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
