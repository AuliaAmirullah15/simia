<?php foreach($crud as $k) { ?>
     <div class="col-sm-12 d-flex align-items-center">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="" width="50px" height="50px">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="col-sm-12 font-weight-bold">
                    <div><?= $k->komentar ?></div>
                    <div class="small text-gray-500"><?= $k->nama_user ?> · <?= $k->waktu ?></div>
                  </div>
                </div><hr>
<?php } ?>