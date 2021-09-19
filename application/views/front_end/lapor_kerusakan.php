<!DOCTYPE html>
<html lang="en">
    <!-- Head -->
    <?php $this->load->view('front_end/main_template/head') ?>
    <style>
        /* Style the form */

     
/* Style the input fields */
input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}
        
        #warning {
            color: red;
        }

         #warning1 {
            color: red;
        }
/* Mark the active step: */
.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
        
        .portfolio-wrapper{
            border: solid 5px black;
            padding:5px;
        }
    </style>
<body>
	 <?php $this->load->view('front_end/main_template/header') ?>
    <!--/#header-->

   <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Formulir Laporan</h1>
                            <p>Silahkan lapor di sini.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#page-breadcrumb-->



    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <img src="<?php echo base_url('assets/front/images/home/under.png'); ?>" class="img-responsive inline" alt="">
                </div>
               
                <div class="col-md-12 col-sm-12">
                    <div class="contact-form bottom">
                        <form id="regForm" name="contact-form" method="post" action="<?php echo base_url().'Home/tambah_laporan_kerusakan';?>" enctype="multipart/form-data">
                            
                          
                            <input type="hidden" name="status" value="<?= $section ?>">
                            
                            <div class="tab"><h2>Identitas Diri</h2>
                            <div class="form-group">
                                <input type="text" name="nama_pelapor" class="form-control" required="required" placeholder="Nama Pelapor" oninput="this.className =''">
                            </div>
                                
                                <?php if($section == 'dosen') { ?>
                                     <div class="form-group">
                                        <input type="text" name="nim_nip_pekerjaan" class="form-control" placeholder="NIDN" oninput="this.className =''">
                                    </div>
                                <?php } else if($section == 'mahasiswa') { ?>
                                    <div class="form-group">
                                        <input type="text" name="nim_nip_pekerjaan" class="form-control" placeholder="NIM" oninput="this.className =''">
                                    </div>
                                <?php } else if($section == 'pegawai') { ?>
                                     <div class="form-group">
                                        <input type="text" name="nim_nip_pekerjaan" class="form-control" placeholder="NIP" oninput="this.className =''">
                                    </div>
                                <?php } else { ?>
                                    <div class="form-group">
                                        <input type="text" name="nim_nip_pekerjaan" class="form-control" placeholder="Pekerjaan" oninput="this.className =''">
                                    </div>
                                <?php } ?>
                                
                            <div class="form-group">
                                <input type="email" onchange="ValidateEmail(this.value)" name="email" class="form-control" required="required" placeholder="Email" oninput="this.className =''">
                                <span id="warning1"></span>
                            </div>
                                
                            <div class="form-group">
                                <input type="text" name="alamat" class="form-control" required="required" placeholder="Alamat" oninput="this.className =''">
                            </div>
                            
                            </div>
                            
                            
                            
                             <div class="tab"><h2>Laporan</h2>
                             <div class="form-group">
                                <textarea name="deskripsi" oninput="this.className =''" rows="4" cols="50" class="form-control" required="required" placeholder="Deskripsi"></textarea>
                                 <span id="warning"></span>
                            </div>
                                 
                                 
                            <div class="form-group">
                                <h5>Jenis Laporan:</h5>
                                 <select name="jenis_laporan" id="jenis_laporan" class="form-control">
                                    <option value="akademik">Akademik, Kemahasiswaan dan Kealumnian</option>
                                    <option value="aset">Pengelolaan Aset, Keuangan dan SDM</option>
                                    <option value="penelitian">Penelitian, Pengabdian Masyarakat dan Kerjasama</option>
                                </select>
                            </div>
                                 
                                 <div class="form-group">
                                     <h5>Upload <?= $jenis_file ?></h5>
                                    <input type="file" name="foto" class="form-control" onchange="readURL(this);" >
                                 </div>
                                 
                                 <div class="form-group">
                                    <img id="blah" src="<?php echo base_url('assets/img/blank-user.jpg'); ?>" alt="your image" width="200px" height="200px"/>
                                 </div>
                                 
                                 <div class="form-group">
                                <h5>Tingkat Kerahasiaan:</h5>
                                 <select name="tingkat_kerahasiaan" id="tingkat_kerahasiaan" class="form-control">
                                    <option value="umum">Umum</option>
                                    <option value="rahasia">Rahasia</option>
                                </select>
                            </div>
                                 
                                 <div class="form-group">
                                 Notes: 
                                     <ul>
                                        <li><b>Umum</b> : Laporan dapat dilihat oleh pegawai bagian bersangkutan dan Wakil Dekan bersangkutan</li>
                                         <li><b>Rahasia</b> : Laporan hanya dapat dilihat oleh Wakil Dekan bersangkutan</li>
                                     </ul>
                                 </div>
                            </div>
                            
                           
                            
            
                            
                            <div style="overflow:auto;">
  <div style="float:right; margin-top: 20px;">
    <button class="btn btn-info" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
    <button class="btn btn-info" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
  </div>
</div>
                            
                            <div style="text-align:center;margin-top:40px;">
  <span class="step"></span>
  <span class="step"></span>
 
</div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="copyright-text text-center">
                        <p>&copy; Your Company 2014. All Rights Reserved.</p>
                        <p>Designed by <a target="_blank" href="http://www.themeum.com">Themeum</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->

    <script type="text/javascript" src="<?php echo base_url('assets/front/js/jquery.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/front/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/front/js/lightbox.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/front/js/wow.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/front/js/main.js'); ?>"></script> 
    <script type="text/javascript" src="<?php echo base_url('assets/js/image-picker-master/image-picker/image-picker.js'); ?>"></script>
    <script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    confirm("Apakah Data Yang Anda Masukkan Sudah Valid?");
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, z, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
    z = x[currentTab].getElementsByTagName("textarea");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
    
    for (i = 0;  i < z.length; i++) {
    // If a field is empty...
    if (z[i].value == "") {
      // add an "invalid" class to the field:
      z[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
        document.getElementById("warning").innerHTML = "Deskripsi tidak boleh kosong!";
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}
    
    </script>
    
    <script>
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
    
    <script>
   function ValidateEmail(inputText)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(inputText.match(mailformat))
{
document.email.focus();
return true;
}
else
{
//alert("You have entered an invalid email address!");
     document.getElementById("warning1").innerHTML = "Email tidak valid!";
document.email.focus();
return false;
}
}
    </script>
    
   
</body>
</html>
