<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>AMI | POLITEKNIK NEGERI SUBANG</title>

    <link rel="stylesheet" href="{{ asset('assets-lp/css/maicons.css') }}">

    <link rel="stylesheet" href="{{ asset('assets-lp/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('assets-lp/vendor/animate/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('assets-lp/css/theme.css') }}">

</head>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>
        @include('landingPage.navbar')

        {{-- <div class="container">
            <div class="page-banner home-banner">
                <div class="row align-items-center flex-wrap-reverse h-100">
                    <div class="col-md-6 py-5 wow fadeInLeft">
                        <h1 class="mb-4">Let's Check and Optimize your website!</h1>
                        <p class="text-lg text-grey mb-5">Ignite the most powerfull growth engine you have ever built
                            for your company</p>
                        <a href="#" class="btn btn-primary btn-split">Watch Video <div class="fab"><span
                                    class="mai-play"></span></div></a>
                    </div>
                    <div class="col-md-6 py-5 wow zoomIn">
                        <div class="img-fluid text-center">
                            <img src="{{ asset('assets-lp/img/banner_image_1.svg') }}" alt="">
                        </div>
                    </div>
                </div>
                <a href="#about" class="btn-scroll" data-role="smoothscroll"><span class="mai-arrow-down"></span></a>
            </div>
        </div> --}}
        @yield('header')
    </header>
    @yield('content')
    @yield('article')

    {{-- <div class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card-service wow fadeInUp">
                        <div class="header">
                            <img src="{{ asset('assets-lp/img/services/service-1.svg') }}" alt="">
                        </div>
                        <div class="body">
                            <h5 class="text-secondary">SEO Consultancy</h5>
                            <p>We help you define your SEO objective & develop a realistic strategy with you</p>
                            <a href="service.html" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card-service wow fadeInUp">
                        <div class="header">
                            <img src="{{ asset('assets-lp/img/services/service-1.svg') }}" alt="">
                        </div>
                        <div class="body">
                            <h5 class="text-secondary">SEO Consultancy</h5>
                            <p>We help you define your SEO objective & develop a realistic strategy with you</p>
                            <a href="service.html" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card-service wow fadeInUp">
                        <div class="header">
                            <img src="{{ asset('assets-lp/img/services/service-1.svg') }}" alt="">
                        </div>
                        <div class="body">
                            <h5 class="text-secondary">SEO Consultancy</h5>
                            <p>We help you define your SEO objective & develop a realistic strategy with you</p>
                            <a href="service.html" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card-service wow fadeInUp">
                        <div class="header">
                            <img src="{{ asset('assets-lp/img/services/service-2.svg') }}" alt="">
                        </div>
                        <div class="body">
                            <h5 class="text-secondary">Content Marketing</h5>
                            <p>We help you define your SEO objective & develop a realistic strategy with you</p>
                            <a href="service.html" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card-service wow fadeInUp">
                        <div class="header">
                            <img src="{{ asset('assets-lp/img/services/service-3.svg') }}" alt="">
                        </div>
                        <div class="body">
                            <h5 class="text-secondary">Keyword Research</h5>
                            <p>We help you define your SEO objective & develop a realistic strategy with you</p>
                            <a href="service.html" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .container -->
    </div> <!-- .page-section -->

    <div class="page-section" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 py-3 wow fadeInUp">
                    <span class="subhead">About us</span>
                    <h2 class="title-section">The number #1 SEO Service Company</h2>
                    <div class="divider"></div>

                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
                        ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                    <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren.</p>
                    <a href="about.html" class="btn btn-primary mt-3">Read More</a>
                </div>
                <div class="col-lg-6 py-3 wow fadeInRight">
                    <div class="img-fluid py-3 text-center">
                        <img src="{{ asset('assets-lp/img/about_frame.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div> <!-- .container -->
    </div> <!-- .page-section -->

    <div class="page-section bg-light">
        <div class="container">
            <div class="text-center wow fadeInUp">
                <div class="subhead">Our services</div>
                <h2 class="title-section">How SEO Team Can Help</h2>
                <div class="divider mx-auto"></div>
            </div>

            <div class="row">
                <div class="col-sm-6 col-lg-4 col-xl-3 py-3 wow zoomIn">
                    <div class="features">
                        <div class="header mb-3">
                            <span class="mai-business"></span>
                        </div>
                        <h5>OnSite SEO</h5>
                        <p>We analyse your website's structure, internal architecture & other key</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 py-3 wow zoomIn">
                    <div class="features">
                        <div class="header mb-3">
                            <span class="mai-business"></span>
                        </div>
                        <h5>OnSite SEO</h5>
                        <p>We analyse your website's structure, internal architecture & other key</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 py-3 wow zoomIn">
                    <div class="features">
                        <div class="header mb-3">
                            <span class="mai-business"></span>
                        </div>
                        <h5>OnSite SEO</h5>
                        <p>We analyse your website's structure, internal architecture & other key</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 py-3 wow zoomIn">
                    <div class="features">
                        <div class="header mb-3">
                            <span class="mai-business"></span>
                        </div>
                        <h5>OnSite SEO</h5>
                        <p>We analyse your website's structure, internal architecture & other key</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 py-3 wow zoomIn">
                    <div class="features">
                        <div class="header mb-3">
                            <span class="mai-business"></span>
                        </div>
                        <h5>OnSite SEO</h5>
                        <p>We analyse your website's structure, internal architecture & other key</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 py-3 wow zoomIn">
                    <div class="features">
                        <div class="header mb-3">
                            <span class="mai-business"></span>
                        </div>
                        <h5>OnSite SEO</h5>
                        <p>We analyse your website's structure, internal architecture & other key</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 py-3 wow zoomIn">
                    <div class="features">
                        <div class="header mb-3">
                            <span class="mai-business"></span>
                        </div>
                        <h5>OnSite SEO</h5>
                        <p>We analyse your website's structure, internal architecture & other key</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 py-3 wow zoomIn">
                    <div class="features">
                        <div class="header mb-3">
                            <span class="mai-business"></span>
                        </div>
                        <h5>OnSite SEO</h5>
                        <p>We analyse your website's structure, internal architecture & other key</p>
                    </div>
                </div>
            </div>

        </div> <!-- .container -->
    </div> <!-- .page-section -->


    <!-- Banner info -->
    <div class="page-section banner-info">
        <div class="wrap bg-image" style="background-image: url(../assets-lp/img/bg_pattern.svg);">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 py-3 pr-lg-5 wow fadeInUp">
                        <h2 class="title-section">SEO to Improve Brand <br> Visibility</h2>
                        <div class="divider"></div>
                        <p>We're an experienced and talented team of passionate consultants who breathe with search
                            engine marketing.</p>

                        <ul class="theme-list theme-list-light text-white">
                            <li>
                                <div class="h5">Visi</div>
                                <p>Pada tahun 2030 menjadi salah satu Program Studi terbaik di Bidang Manajemen Informatika secara nasional untuk mendukung perkembangan industri</p>
                            </li>
                            <li>
                                <div class="h5">Misi</div>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                    tempor</p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 py-3 wow fadeInRight">
                        <div class="img-fluid text-center">
                            <img src="../assets-lp/img/banner_image_2.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .wrap -->
    </div> <!-- .page-section -->

    <!-- Blog -->
      <div class="page-section">
        <div class="container">
            <div class="text-center wow fadeInUp">
                <div class="subhead">Our Blog</div>
                <h2 class="title-section">Read Latest News</h2>
                <div class="divider mx-auto"></div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-4 py-3 wow fadeInUp">
                    <div class="card-blog">
                        <div class="header">
                            <div class="post-thumb">
                                <img src="../assets-lp/img/blog/blog-1.jpg" alt="">
                            </div>
                        </div>
                        <div class="body">
                            <h5 class="post-title"><a href="#">Source of Content Inspiration</a></h5>
                            <div class="post-date">Posted on <a href="#">27 Jan 2020</a></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 py-3 wow fadeInUp">
                    <div class="card-blog">
                        <div class="header">
                            <div class="post-thumb">
                                <img src="../assets-lp/img/blog/blog-2.jpg" alt="">
                            </div>
                        </div>
                        <div class="body">
                            <h5 class="post-title"><a href="#">Source of Content Inspiration</a></h5>
                            <div class="post-date">Posted on <a href="#">27 Jan 2020</a></div>
                        </div>
                    </div>
                </div>

                      <div class="col-lg-4 py-3 wow fadeInUp">
                        <div class="card-blog">
                          <div class="header">
                            <div class="post-thumb">
                                <img src="../assets-lp/img/blog/blog-3.jpg" alt="">
                            </div>
                          </div>
                          <div class="body">
                            <h5 class="post-title"><a href="#">Source of Content Inspiration</a></h5>
                            <div class="post-date">Posted on <a href="#">27 Jan 2020</a></div>
                          </div>
                        </div>
                <     /div>

                <div class="col-12 mt-4 text-center wow fadeInUp">
                    <a href="blog.html" class="btn btn-primary">View More</a>
                </div>
            </div>
        </div>
      </div> --}}
    <footer class="page-footer bg-image" style="background-image: url(../assets-lp/img/world_pattern.svg);">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-3 py-3">
                    <h3>P4MP</h3>
                    <p>Pusat Pengembangan Pembelajaran dan Penjaminan Mutu Pendidikan (P4MP) Politeknik Negeri Subang.</p>

                    <div class="social-media-button">
                        <a href="https://www.facebook.com/polsubofficial/"><span class="mai-logo-facebook-f"></span></a>
                        <a href="https://twitter.com/polsubofficial"><span class="mai-logo-twitter"></span></a>
                        {{-- <a href="#"><span class="mai-logo-google-plus-g"></span></a> --}}
                        <a href="https://www.instagram.com/politekniknegerisubang/"><span class="mai-logo-instagram"></span></a>
                        <a href="https://www.youtube.com/c/PoliteknikNegeriSubang"><span class="mai-logo-youtube"></span></a>
                    </div>
                </div>
                {{-- <div class="col-lg-3 py-3">
                    <h5>Company</h5>
                    <ul class="footer-menu">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Career</a></li>
                        <li><a href="#">Advertise</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Help & Support</a></li>
                    </ul>
                </div> --}}
                <div class="col-lg-3 py-3">
                    <h5>Kontak</h5>
                    <p>Jl. Brigjen Katamso No. 37 (Belakang RSUD Subang), Dangdeur, Kec. Subang, Kabupaten Subang, Jawa Barat 41211</p>
                    <a href="#" class="footer-link">(0260) 417648</a>
                    <a href="#" class="footer-link">info@polsub.ac.id</a>
                </div>
                {{-- <div class="col-lg-3 py-3">
                    <h5>Newsletter</h5>
                    <p>Get updates, news or events on your mail.</p>
                    <form action="#">
                        <input type="text" class="form-control" placeholder="Enter your email..">
                        <button type="submit" class="btn btn-success btn-block mt-2">Subscribe</button>
                    </form>
                </div> --}}
            </div>

            <p class="text-center" id="copyright">Copyright &copy; {{ date('Y') }}. Politeknik Negeri Subang</p>
        </div>
    </footer>

    <script src="{{ asset('assets-lp/js/jquery-3.5.1.min.js') }}"></script>

    <script src="{{ asset('assets-lp/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets-lp/js/google-maps.js') }}"></script>

    <script src="{{ asset('assets-lp/vendor/wow/wow.min.js') }}"></script>

    <script src="{{ asset('assets-lp/js/theme.js') }}"></script>

</body>

</html>
