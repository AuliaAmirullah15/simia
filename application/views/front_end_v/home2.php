<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('front_end_v/main_template/head') ?>
    
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
  height: 5px;
  width: 5px;
  margin: 0 30px 30px 0;
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
  background-color: white;
    opacity: 1;
}
        
        .portfolio-wrapper{
            border: solid 5px black;
            padding:5px;
        }
         
         .container-header{
             max-width: 840px;
         }
         
         
         
         form .drag{
  width: 100%;
  height: 100%;
  text-align: center;
  line-height: 50px;
  color: #000000;
  font-family: Arial;
}
form .foto, form .bukti{
  position: absolute;
  margin: 0;
  padding: 0;
  width: 100%;
  outline: none;
  opacity: 0;
    text-align: center;
    float: center;
}
         
         form .drag-file{
             top: 50%;
  left: 50%;
  
  width: 100%;
  height: 60px;
  border: 4px dashed #000;
}
         
         .site-section1
         {
             padding: 30rem 0;
         }
         
         textarea{
             border: none;
    overflow: auto;
    outline: none;

    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;

    resize: none; /*remove the resize handle on the bottom right*/
             width: 100%;
         }
    </style>
</head>

<body>

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icofont-close js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">

          <div class="col-6 col-lg-2">
            <h1 class="mb-0 site-logo"><a href="index.html" class="mb-0"><img src="<?php echo base_url('assets/front_end/img/lapor.png'); ?>" alt="Image" class="phone-1" width="140px" height="70px"></a></h1>
          </div>

          <div class="col-12 col-md-10 d-none d-lg-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active"><a href="<?php echo base_url('Home/index'); ?>" class="nav-link">Home</a></li>
                <li class="active"><a href="#" class="nav-link">Tentang Lapor</a></li>
                <li><a href="<?php echo base_url('Home/login'); ?>" class="nav-link">Masuk</a></li>
                
              </ul>
            </nav>
          </div>


          <div class="col-6 d-inline-block d-lg-none ml-md-0 py-3" style="position: relative; top: 3px;">

            <a href="#" class="burger site-menu-toggle js-menu-toggle" data-toggle="collapse"
              data-target="#main-navbar">
              <span></span>
            </a>
          </div>

        </div>
      </div>

    </header>


    <main id="main">
      <div class="hero-section">
        <div class="wave">

          <svg width="100%" height="355px" viewBox="0 0 1920 355" version="1.1" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
                <path
                  d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,757 L1017.15166,757 L0,757 L0,439.134243 Z"
                  id="Path"></path>
              </g>
            </g>
          </svg>

        </div>

        <div class="container container-header">
          <div class="row align-items-center">
            <div class="col-12 hero-text-image" style="padding-top: 140px;">
              <div class="row">
                    <div class="col-lg-12">
                        <center><h2 style="color: white; font-weight: bold; letter-spacing: 3px;" data-aos="fade-right">Layanan Aspirasi dan Pengaduan Online Fasilkom TI USU</h2>
                            <p class="mb-5" data-aos="fade-right" data-aos-delay="200">Sampaikan laporan Anda ke bagian yang berwenang</p></center>
                        <hr width="100px" color="white" style="height: 3px;" class="mb-5" data-aos="fade-right" data-aos-delay="280">
                        
                        <div class="col-lg-12 shadow p-3 mb-5 bg-white">
                            <form id="regForm" name="contact-form" method="post" action="<?php echo base_url().'Home/tambah_laporan_kerusakan';?>" enctype="multipart/form-data">
                            
                          
                            <input type="hidden" name="status" value="<?= $section ?>">
                            
                            <div class="tab">
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
                                <input type="text" name="alamat" class="form-control" required="required" placeholder="Alamat" oninput="this.className =''">
                            </div>
                            
                                </div>
                                
                            <div class="tab">
                                
                            <div class="form-group">
                                <input type="text" name="no_tlp" class="form-control" required="required" placeholder="Nomor Hp/Telp" oninput="this.className =''">
                            </div>
                                
                            <div class="form-group">
                                <input type="email" onchange="ValidateEmail(this.value)" name="email" class="form-control" required="required" placeholder="Email" oninput="this.className =''">
                                <span id="warning1"></span>
                            </div>
                                
                            <div class="form-group drag-file">
                                    <input type="file" name="foto" class="foto form-control" onchange="readURL(this);" >
                                    <p class="drag foto-paragraph">Upload <?= $jenis_file ?> disini dengan mengklik area ini.</p>
                                 </div> 
                            
                            
                                <div class="form-group">
                                    <img id="blah" src="<?php echo base_url('assets/img/blank-user.jpg'); ?>" alt="your image" width="200px" height="200px"/>
                                 </div>
                            </div>
                            
                            
                             <div class="tab">
                             <div class="form-group">
                                <textarea name="deskripsi" oninput="this.className =''" rows="4" cols="50" class="form-control" required="required" placeholder="Tulis laporan Anda" style="border: none"></textarea>
                                 <span id="warning"></span>
                            </div>
                                 
                                 
                            <div class="form-group">
                                <h6>Jenis Laporan:</h6>
                                 <select name="jenis_laporan" id="jenis_laporan" class="form-control">
                                    <option value="akademik">Akademik, Kemahasiswaan dan Kealumnian</option>
                                    <option value="aset">Pengelolaan Aset, Keuangan dan SDM</option>
                                    <option value="penelitian">Penelitian, Pengabdian Masyarakat dan Kerjasama</option>
                                </select>
                            </div>
                                 
                                 <div class="form-group drag-file">
                                    <input type="file" name="bukti" class="bukti form-control" onchange="readBukti(this);" >
                                    <p class="drag bukti-paragraph">Upload bukti disini dengan mengklik area ini.</p>
                                 </div> 
                                 
                                 <div class="form-group">
                                    <img id="blah2" src="<?php echo base_url('assets/img/blank-user.jpg'); ?>" alt="your image" width="200px" height="200px"/>
                                 </div>
                                 
                                 <div class="form-group">
                                <h6>Tingkat Kerahasiaan:</h6>
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
                            
                           
                            
            
                            <hr>
                            <div style="overflow:auto;">
  <div style="float:right; margin-top: 20px;">
    <button class="btn btn-info" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
    <button class="btn btn-info" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
  </div>
</div>
                            
       
                                
                                
<!-- /.Horizontal Steppers -->
                        </form>
                        </div>
                        
                                             <div style="text-align:center;margin-top:40px;">
  <span class="step">
      <div class="row align-items-center">
          <img style="margin-top: -15px" src="<?php echo base_url('assets/front_end/img/user.png'); ?>" width="30px" height="30px"></div></span>
  <span class="step"> <div class="row align-items-center">
          <img style="margin-top: -15px" src="<?php echo base_url('assets/front_end/img/card.png'); ?>" width="30px" height="30px"></div></span>
   <span class="step"> <div class="row align-items-center">
          <img style="margin-top: -15px" src="<?php echo base_url('assets/front_end/img/message.png'); ?>" width="30px" height="30px"></div></span>
 
</div>
                  
                  </div>
                </div>
              </div>
              
            <div class="col-12 hero-text-image">
                 <div class="row">
                    <div class="col-lg-12 text-center">
                       
                    </div>
                </div>
<!--
              <div class="row">
               
                <div class="col-lg-12 iphone-wrap">
                  <img src="img/phone_1.png" alt="Image" class="phone-1" data-aos="fade-right">
                  <img src="img/phone_2.png" alt="Image" class="phone-2" data-aos="fade-right" data-aos-delay="200">
                </div>
              </div>
-->
            </div>
          </div>
        </div>

        </div>


    </main>
    
  </div> <!-- .site-wrap -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url('assets/front_end/vendor/jquery/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/front_end/vendor/jquery/jquery-migrate.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/front_end/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/front_end/vendor/easing/easing.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/front_end/vendor/php-email-form/validate.js'); ?>"></script>
  <script src="<?php echo base_url('assets/front_end/vendor/sticky/sticky.js'); ?>"></script>
  <script src="<?php echo base_url('assets/front_end/vendor/aos/aos.js'); ?>"></script>
  <script src="<?php echo base_url('assets/front_end/vendor/owlcarousel/owl.carousel.min.js'); ?>"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url('assets/front_end/js/main.js'); ?>"></script>
    
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
        
        function readBukti(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah2')
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
        
        $(document).ready(function(){
  $('.foto').change(function () {
    $('.foto-paragraph').text(this.files.length + " file berhasil dipilih");
  });
});
        
          $(document).ready(function(){
  $('.bukti').change(function () {
    $('.bukti-paragraph').text(this.files.length + " file berhasil dipilih");
  });
});
    </script>

</body>

</html>
