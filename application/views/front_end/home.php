<!DOCTYPE html>
<html lang="en">
    <!-- Head -->
    <?php $this->load->view('front_end/main_template/head') ?>
<body>
	 <?php $this->load->view('front_end/main_template/header') ?>
    <!--/#header-->

    <section id="home-slider">
        <div class="container">
            <div class="row">
                <div class="main-slider">
                    <div class="slide-text">
                        <h1>Fasilitas Rusak?</h1>
                        <p>Mari peduli aset Fakultas kita karena aset Fakultas adalah milik kita bersama.</p>
                        <a href="<?php echo base_url('Home/lapor_kerusakan'); ?>" class="btn btn-common">Lapor Disini</a>
                    </div>
                    <img src="<?php echo base_url('assets/front/images/home/slider/hill.png'); ?>" class="slider-hill" alt="slider image">
                    <img src="<?php echo base_url('assets/front/images/home/slider/house.png'); ?>" class="slider-house" alt="slider image">
                    <img src="<?php echo base_url('assets/front/images/home/slider/sun.png'); ?>" class="slider-sun" alt="slider image">
                    <img src="<?php echo base_url('assets/front/images/home/slider/birds1.png'); ?>" class="slider-birds1" alt="slider image">
                    <img src="<?php echo base_url('assets/front/images/home/slider/birds2.png'); ?>" class="slider-birds2" alt="slider image">
                </div>
            </div>
        </div>
        <div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div>
    </section>
    <!--/#home-slider-->

   
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center bottom-separator">
                    <img src="images/home/under.png" class="img-responsive inline" alt="">
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="testimonial bottom">
                        <h2>Testimonial</h2>
                        <div class="media">
                            <div class="pull-left">
                                <a href="#"><img src="<?php echo base_url('assets/front/icon/002-teacher.png'); ?>" alt="" height="120px" width="120px"></a>
                            </div>
                            <div class="media-body">
                                <blockquote>Mari laporkan keperluan ataupun keluhan anda</blockquote>
                            </div>
                         </div>
                        <div class="media">
                            <div class="pull-left">
                                <a href="#"><img src="<?php echo base_url('assets/front/icon/018-gamer.png'); ?>" alt="" height="120px" width="120px"></a>
                            </div>
                            <div class="media-body">
                                <blockquote>Kami melayani laporan dan keluhan anda.</blockquote>
                            </div>
                        </div>   
                    </div> 
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="contact-info bottom">
                        <h2>Contacts</h2>
                        <address>
                        E-mail: <a href="mailto:someone@example.com">email@email.com</a> <br> 
                        Phone: +1 (123) 456 7890 <br> 
                        Fax: +1 (123) 456 7891 <br> 
                        </address>

                        <h2>Address</h2>
                        <address>
                        Unit C2, St.Vincent's Trading Est., <br> 
                        Feeder Road, <br> 
                        Bristol, BS2 0UY <br> 
                        United Kingdom <br> 
                        </address>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="contact-form bottom">
                        <h2>Send a message</h2>
                        <form id="main-contact-form" name="contact-form" method="post" action="sendemail.php">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" required="required" placeholder="Email Id">
                            </div>
                            <div class="form-group">
                                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your text here"></textarea>
                            </div>                        
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-submit" value="Submit">
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

    <?php $this->load->view('front_end/main_template/javascript') ?>   
</body>
</html>
