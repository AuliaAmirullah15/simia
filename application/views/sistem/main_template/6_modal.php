 <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Beneran kamu mau logout?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Logout" kalau kamu ingin mengakhiri session. </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url('Home/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>


<!--   Edit Modal-->
  <div class="modal fade" id="editStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah benar laporan ini sudah diberikan solusinya?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            
             <form method="post" action="<?php echo base_url().'Inventarisasi/edit_status_laporan';?>">
            <input type="hidden" name="id_laporan" id="id_laporan" value=""/>
            Pilih "Ya" jika laporan ditanggapi. </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-primary">Ya</button>
            </form>
        </div>
      </div>
    </div>
  </div>

<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">              
      <div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <img src="" class="imagepreview" style="width: 100%;" >
      </div>
    </div>
  </div>
</div>

<!-- Logout Modal-->
  <div class="modal fade" id="sumberDanaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Sumber Dana</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        
            <form method="post" action="<?php echo base_url().'Inventarisasi/tambah_sumber_dana';?>">
                <div class="form-group">
                    <div class="col-sm-12">
            <input type="text" class="form-control" name="sumber_dana" id="sumber_dana" placeholder="Sumber Dana" required/>
                    </div></div>
            
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
      </div>
    </div>
  </div>

<!-- Logout Modal-->
  <div class="modal fade" id="editSDModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Sumber Dana</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        
            <form method="post" action="<?php echo base_url().'Inventarisasi/edit_sumber_dana';?>">
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="hidden" class="form-control" name="id_sumber_dana1" id="id_sumber_dana1" placeholder="ID Sumber Dana" required/>
            <input type="text" class="form-control" name="sumber_dana1" id="sumber_dana1" placeholder="Sumber Dana" required/>
                    </div></div>
            
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
      </div>
    </div>
  </div>

<!-- ADM Peserta Kegiatan Modal-->
  <div class="modal fade" id="pesertaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Peserta Undangan</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        
            <form method="post" action="<?php echo base_url().'Administrasi/tambah_peserta_kegiatan';?>">
                <div class="form-group">
                    <div class="col-sm-12">
            <input type="text" class="form-control" name="nama_peserta" id="nama_peserta" placeholder="Nama Peserta" required/>
                    </div></div>
            
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
      </div>
    </div>
  </div>

<!-- Logout Modal-->
  <div class="modal fade" id="editRuanganModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Ruangan</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        
            <form method="post" action="<?php echo base_url().'Inventarisasi/edit_ruangan';?>">
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="hidden" class="form-control" name="id_ruangan" id="id_ruangan" placeholder="ID Ruangan" required/>
            <input type="text" class="form-control" name="nama_ruangan" id="nama_ruangan" placeholder="Nama Ruangan" required/>
                    </div></div>
            
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
      </div>
    </div>
  </div>

<!-- Logout Modal-->
  <div class="modal fade" id="tambahRuanganModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Ruangan</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        
            <form method="post" action="<?php echo base_url('Inventarisasi/tambah_ruangan'); ?>">
                <div class="form-group">
                    <div class="col-sm-12">
                        
                        
                        <div class="input_fields_wrap">
                        <input type="button" value="+ Tambah Data" class="btn btn-primary add_field_button">
                <div><input type="text" class="form-control" name="mytext[]" id="nama_ruangan" placeholder="Nama Ruangan"/></div>
                        </div>
                        
                        
                    </div></div>
            
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
      </div>
    </div>
  </div>
