<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- SITE TITTLE -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- PLUGINS CSS STYLE -->
        <!-- Bootstrap -->
        <link href="{{ asset('index/plugins/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
        <!-- themify icon -->

        <link href="{{ asset('index/plugins/themify-icons/themify-icons.css') }}" rel="stylesheet">
        <!-- Slick Carousel -->

        <link href="{{ asset('index/plugins/slick/slick.css') }}" rel="stylesheet">
        <!-- Slick Carousel Theme -->

        <link href="{{ asset('index/plugins/slick/slick-theme.css') }}" rel="stylesheet">


        <!-- CUSTOM CSS -->
        <link href="{{ asset('index/css/style.css') }}" rel="stylesheet">


        <!-- FAVICON -->
        <link href="<?php echo url('/'); ?>/images/favicon.png" rel="shortcut icon">
        
<script type="text/javascript">
    alert('Referral User is Invalid. Please contact your Sponsor.');
</script>


    </head>



    <body class="body-wrapper">


        <nav class="navbar main-nav fixed-top navbar-expand-sm" style="background: #4a28ba !important;">
            <div class="container">
                <a class="navbar-brand" href="<?php echo url('/'); ?>"><img src="<?php echo url('/'); ?>/images/logo-front.png" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="ti-menu text-white"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <strong><a class="nav-link scrollTo" href="#home">Home</a></strong>
                        </li>
                        <li class="nav-item">
                            <strong><a class="nav-link scrollTo" href="#about">About</a></strong>
                        </li>
                        <li class="nav-item">
                            <strong><a class="nav-link scrollTo" href="#earn">How to Earn</a></strong>
                        </li>

                        <li class="nav-item">
                            <strong><a class="nav-link scrollTo" href="#contact">Contact</a></strong>
                        </li>
                        <li class="nav-item">
                            <strong><a class="nav-link scrollTo" href="<?php echo url('/'); ?>/login">Login</a></strong>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--=====================================
        =            Homepage Banner            =
        ======================================-->

        <section class="banner bg-1" id="home" style="padding: 160px 0 100px !important;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <!-- Contents -->
                        <div class="content-block">
                             <h3 class="mb-3" style="color: #FFF !important;">Make Money Online</h3>
                              <h3 class="mb-3" style="color: #FFF !important;">By Sharing Your Links</h3>

                            <!-- App Badge -->
                            <div class="app-badge">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- App Image -->
                        <div class="image-block">
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--====  End of Homepage Banner  ====-->

        <!--===========================
        =            About            =
        ============================-->

        <section class="about section bg-2" id="about" style="height: 788px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 align-self-center text-center">
                        <!-- Image Content -->

                    </div>
                    <div class="col-lg-12 col-md-12 m-md-auto align-self-center ml-auto">
                        <div class="about-block">
                            <!-- About 02 -->
                            <div class="about-item active" style="background: #4323aa !important;">
                                <div class="icon">
                                    <i class="ti-panel"></i>
                                </div>
                                <div class="content">
                                    <h5> About Us</h5>
                                    <p>eBIYAHE is your partner to grow your business - a dynamic organization which can contribute reliable travel technology
services to Travel Agencies through our easy-to-use, efficient and effective platform. <br> <br>
eBIYAHE is an Online Travel & Tours Solutions Provider, which integrates and also customizes on a single window Platform
a wide array of travel products ranging from Domestic and International Air Tickets, Ferries, Transport Buses, Worldwide
Hotel and Tours Content, Travel Insurance, Mobile Recharge, and other products and services, with real-time accounting
and sales reports in a secured access-controlled environment. <br> <br>
Partner Travel Agents can be guaranteed a reliable platform which maximizes the efficient use of company time and
resources for service delivery as well as reducing tedious effort in product development.
Travel Agents and Tour Operators can now streamline their business process and achieve growth in Sales and Revenue as
well.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--====  End of About  ====-->

        <!--====  End of Promo Video  ====-->

        <!--===================================
        =            Pricing Table            =
        ====================================-->

        <section class="pricing section bg-shape" id="earn" style="background: #4323aa !important">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title mb-4">
                            <h2 class="mb-3" style="color: #FFF !important;">How to Earn</h2>
                            <p style="color: #FFF !important;">Demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee idea of
                                denouncing pleasure and praising</p>
                        </div>
                        
                        <div class="container">

                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <!-- Pricing Table -->
                                    <div class="pricing-table text-center">	
                                        <!-- Title -->
                                        <div class="title">	
                                            <img class="img-fluid" src="<?php echo url('/'); ?>/images/package.jpg" alt="app-screen">
                                        </div>
                                        <!-- Price Tag -->
                                        <!-- Price Tag -->
                                        <div class="price">	
                                            <p><span>Buy Package</span></p>
                                        </div><!-- Features -->
                                        <ul class="feature-list">
                                            <li>Avail our Business packages</li>
                                        </ul>
                                        <!-- Take Action -->

                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <!-- Pricing Table -->
                                    <div class="pricing-table featured text-center">	
                                        <!-- Title -->
                                        <div class="title">	
                                            <img class="img-fluid" src="<?php echo url('/'); ?>/images/refer.jpg" alt="app-screen">
                                        </div>
                                        <!-- Price Tag -->
                                        <!-- Price Tag -->
                                        <div class="price">	
                                            <p><span>Refer</span></p>
                                        </div><!-- Features -->
                                        <ul class="feature-list">
                                            <li>Share your referral link to friends</li>
                                        </ul>
                                        <!-- Take Action -->
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 m-md-auto">
                                    <!-- Pricing Table -->
                                    <div class="pricing-table text-center">	
                                        <!-- Title -->
                                        <div class="title">	
                                            <img class="img-fluid" src="<?php echo url('/'); ?>/images/earn.jpg" alt="app-screen">
                                        </div>
                                        <!-- Price Tag -->
                                        <!-- Price Tag -->
                                        <div class="price">	
                                            <p><span>Earn</span></p>
                                        </div><!-- Features -->
                                        <ul class="feature-list">
                                            <li>Avail our Business packages</li>
                                        </ul>
                                        <!-- Take Action -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                    </section>

                    <section class="section cta-subscribe" id="contact">
                        <div class="container">
                            <div class="row bg-elipse-red">
                                
                                <div class="col-lg-4">
                                     <div class="description">
                           <br><br>
                                    <h5>Hi-Way Tipolo Arcade 5<br> Mandaue City 6014</h5> <br>
                                      <h5>Email: monewaze@gmail.com </h5> <br>
                                      <h5>Phone: (032) 232 6428 </h5> <br> 
                                     </div>
                                </div>
                                
                                <div class="col-lg-8 align-self-center">
                                    <div class="content">
                                        <div class="mb-4">
                                            <h2>Contact Us</h2>
                                        </div>
                                        <div class="description">
                                            <p>Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within a matter of hours to help you.</p>
                                        </div>
                                        <form action="#">
                                            <div class="input-group">
                                                <input type="text" name="name" class="form-control" placeholder="Your Name">
                                                
                                            </div>
                                            <br>
                                            <div class="input-group">
                                                <input type="email" name="email"  class="form-control" placeholder="Your Email">
                                             
                                            </div>
                                              <br>
                                            <div class="input-group">
                                                <input type="text" name="message"  class="form-control" placeholder="Your Message">
                                               
                                            </div>
                                              <br>
                                             <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </section>

                    <!--============================
                    =            Footer            =
                    =============================-->

                    <footer class="footer-main" style="background: #4323aa !important;">>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 mr-auto">
                                    <div class="footer-logo">
                                        <img src="<?php echo url('/'); ?>/images/logo-front.png" alt="footer-logo">
                                    </div>
                                    <div class="copyright">
                                        <p>© 2021 eBiyahe Affiliate All Rights Reserved.
                                           
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-6 text-lg-right">
                                    <!-- Social Icons -->
                                    <ul class="social-icons list-inline">
                                        <li class="list-inline-item">
                                            <a target="_blank" href="https://facebook.com/themefisher"><i class="text-primary ti-facebook"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a target="_blank" href="https://twitter.com/themefisher"><i class="text-primary ti-twitter-alt"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a target="_blank" href="https://github.com/themefisher"><i class="text-primary ti-linkedin"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a target="_blank" href="https://instagram.com/themefisher"><i class="text-primary ti-instagram"></i></a>
                                        </li>
                                    </ul>
                                    <!-- Footer Links -->
                                    <ul class="footer-links list-inline">
                                        <li class="list-inline-item">
                                            <a class="scrollTo" href="#about">ABOUT</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="scrollTo" href="#team">TEAM</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="scrollTo" href="#contact">CONTACT</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </footer>


                    <!-- JAVASCRIPTS -->

                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBI14J_PNWVd-m0gnUBkjmhoQyNyd7nllA" async defer></script>
                    <script src="{{ asset('index/plugins/jquery/jquery.js') }}" defer></script>
                    <script src="{{ asset('index/plugins/bootstrap/bootstrap.min.js') }}" defer></script>
                    <script src="{{ asset('index/plugins/slick/slick.min.js') }}" defer></script>
                    <script src="{{ asset('index/js/custom.js') }}" defer></script>


                    </body>

                    </html>


                    <style>

                        .mdain-nav {
                            /* background: #7d71d3 !important; */
                            /* box-shadow: 0px 3px 10px 0px rgba(0, 0, 0, 0.1) !important; */
                        }

                    </style>