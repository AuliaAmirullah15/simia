<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Selamat</title>
    <link href="<?php echo base_url('assets/front/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/front/css/font-awesome.min.css'); ?>" rel="stylesheet"> 
    <link href="<?php echo base_url('assets/front/css/main.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/front/css/responsive.css'); ?>" rel="stylesheet">

    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/usu.png'); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url('assets/front/images/ico/apple-touch-icon-144-precomposed.png'); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url('assets/front/images/ico/apple-touch-icon-114-precomposed.png'); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url('assets/front/images/ico/apple-touch-icon-72-precomposed.png'); ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url('assets/front/images/ico/apple-touch-icon-57-precomposed.png'); ?>">
</head><!--/head-->

<body>
    <div class="logo-image">                                
       <a href="index.html"><img class="img-responsive" src="<?php echo base_url('assets/img/usu.png'); ?>" width="120px" height="120px" alt=""> </a> 
    </div>
     <section id="coming-soon">        
         <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">                    
                    <div class="text-center coming-content">
                        <h1>SELAMAT</h1>
                        <p>Laporan yang telah anda laporkan sudah terkirim.Silahkan cek email anda.</p>  
                        <center><a href="<?php echo base_url('Home/index'); ?>"><button class="btn btn-primary">Kembali</button></a></center>
                       
                    </div>                    
                </div>
                <div class="col-sm-12">
                    <div class="time-count">
                        <ul id="countdown">
                            <li class="angle-one">
                                <span class="days time-font">FA</span>
                               
                            </li>
                            <li class="angle-two">
                                <span class="hours time-font">SIL</span>
                         
                            </li>
                            <li class="angle-three">
                                <span class="minutes time-font">KOM</span>
                             
                            </li>                            
                            <li class="angle-four">
                                <span class="seconds time-font">-TI</span>
                              
                            </li>               
                        </ul>   
                    </div>
                </div>
            </div>
        </div>       
    </section>
    <section id="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><i class="fa fa-envelope-o"></i> SUBSCRIBE TO OUR NEWSLETTER</h2>
                            <p>Quis filet mignon proident, laboris venison tri-tip commodo brisket aute ut. Tail salami pork belly, flank ullamco bacon bresaola do beef<br /> laboris venison tri-tip.</p>
                        </div>
                        <div class="col-sm-6 newsletter">
                            <form id="newsletter">
                                <input class="form-control" type="email" name="email"  value="" placeholder="Enter Your email">
                                <i class="fa fa-check"></i>
                            </form>
                            <p>Don't worry we will not use your email for spam</p>
                        </div>    
                    </div>
                </div>     
            </div>
        </div> 
    </section>

    <section id="coming-soon-footer" class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">
                    <p>&copy; Your Company 2014. All Rights Reserved.</p>
                    <p>Designed by <a target="_blank" href="http://www.themeum.com">Themeum</a></p>
                </div>
            </div>
        </div>       
    </section>
    

    <script type="text/javascript" src="<?php echo base_url('assets/front/js/jquery.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/front/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/front/js/coundown-timer.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/front/js/wow.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/front/js/main.js'); ?>"></script>
    <script type="text/javascript">
            //Countdown js
         $("#countdown").countdown({
                date: "10 march 2015 12:00:00",
                format: "on"
            },      
            function() {
                // callback function
        });
    </script>
    
</body>
</html>