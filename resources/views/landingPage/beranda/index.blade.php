@extends('landingPage.base')

@section('header')
    <div class="container">
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
                {{-- <a href="#about" class="btn-scroll" data-role="smoothscroll"><span class="mai-arrow-down"></span></a> --}}
            </div>
        </div>
@endsection

@section('article')
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
                <img src="{{ asset('assets-lp/img/blog/blog-1.jpg') }}" alt="">
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
                <img src="{{ asset('assets-lp/img/blog/blog-2.jpg') }}" alt="">
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
                <img src="{{ asset('assets-lp/img/blog/blog-3.jpg') }}" alt="">
              </div>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="#">Source of Content Inspiration</a></h5>
              <div class="post-date">Posted on <a href="#">27 Jan 2020</a></div>
            </div>
          </div>
        </div>

        <div class="col-12 mt-4 text-center wow fadeInUp">
          <a href="blog.html" class="btn btn-primary">View More</a>
        </div>
      </div>
    </div>
  </div>
@endsection