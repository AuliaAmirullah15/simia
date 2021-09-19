<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('front_end_v/main_template/head') ?>
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
<!--
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
-->

        <div class="container">
          <div class="row align-items-center">
            <div class="col-12 hero-text-image" style="padding-top: 70px;">
              <div class="row">
                    <div class="col-lg-12">
                        <center><h1 data-aos="fade-right">Selamat! Laporan Anda Telah Terkirim!</h1>
                            <p class="mb-5" data-aos="fade-right" data-aos-delay="200">Terima kasih sudah melaporkan keluhan anda. Cek email anda sekarang. </p>
                        </center><br>
                        <center> <p data-aos="fade-right" data-aos-delay="200" data-aos-offset="-500"><a href="<?php echo base_url('Home/index'); ?>"
                      class="btn btn-outline-white">Kembali</a></p></center>
                        
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

</body>

</html>
