<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="author" content="Untree.co" />
  <link rel="shortcut icon" href="{{ asset('favicon.png') }}" />

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap5" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
    rel="stylesheet" />

  <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css') }}" />

  <link rel="stylesheet" href="{{ asset('css/tiny-slider.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/aos.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

  <title>
    Property &mdash; Free Bootstrap 5 Website Template by Untree.co
  </title>
</head>

<body>
  <div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close">
        <span class="icofont-close js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>

  @include('layouts.nav')

  <div
    class="hero page-inner overlay"
    style="background-image: url('{{ asset('storage/properties/'.$data->image) }}')">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-9 text-center mt-5">
          <h1 class="heading" data-aos="fade-up">
            {{$data->nama}}
          </h1>

          <nav
            aria-label="breadcrumb"
            data-aos="fade-up"
            data-aos-delay="200">
            <ol class="breadcrumb text-center justify-content-center">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item">
                <a href="/property">Properties</a>
              </li>
              <li
                class="breadcrumb-item active text-white-50"
                aria-current="page">
                {{$data->nama}}
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <div class="section">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-7">
          <div class="img-property-slide-wrap">
            <div class="img-property-slide">
              <img src="{{ asset('storage/properties/'.$data->image) }}" alt="Image" class="img-fluid" />
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Detail</h5>
            </div>
            <div class="card-body">
              <p class="card-text"><i class="icon-map-marker"></i> Alamat: {{$data->alamat}}</p>
              <p class="card-text"><i class="icon-map-marker"></i> Kota: {{$data->kota}}</p>
              <p class="card-text"><i class="icon-money"></i> Harga: Rp {{$data->harga}}</p>
              <p class="card-text"><i class="icon-area-chart"></i> Luas Bangunan: {{$data->luas_bangunan}} m²</p>
              <p class="card-text"><i class="icon-area-chart"></i> Luas Tanah: {{$data->luas_tanah}} m²</p>
              <p class="card-text"><i class="icon-bed"></i> Kamar Tidur: {{$data->kamar_tidur}}</p>
              <p class="card-text"><i class="icon-bath"></i> Kamar Mandi: {{$data->kamar_mandi}}</p>
            </div>
          </div>

        </div>
        <div class="col-lg-4">
          <h2 class="heading text-primary">{{$data->nama}}</h2>
          <p class="meta">{{$data->alamat}}, {{$data->kota}}</p>
          <p class="text-black-50">
            {{$data->deskripsi}}
          </p>

          <div class="d-block agent-box p-5">
            <div class="img mb-4">
              <img
                src="{{ asset('images/person_2-min.jpg') }}"
                alt="Image"
                class="img-fluid" />
            </div>
            <div class="text">
              <h3 class="mb-0">{{$data->agen->name}}</h3>
              <div class="meta mb-3">
                <i class="icon-building"></i> {{$data->agen->company}},
                <i class="icon-map-marker"></i> {{$data->agen->alamat}},
                <i class="icon-phone"></i> {{$data->agen->contact}}
              </div>
              <p class="help">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur atque molestias, commodi vitae quos repudiandae, expedita ad nostrum delectus, ex officiis unde blanditiis nemo laboriosam quod veniam ut earum! Quisquam?
              </p>
              <ul class="list-unstyled social dark-hover d-flex">
                <li class="me-1">
                  <a href="#"><span class="icon-instagram"></span></a>
                </li>
                <li class="me-1">
                  <a href="#"><span class="icon-twitter"></span></a>
                </li>
                <li class="me-1">
                  <a href="#"><span class="icon-facebook"></span></a>
                </li>
                <li class="me-1">
                  <a href="#"><span class="icon-linkedin"></span></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="widget">
            <h3>Contact</h3>
            <address>43 Raymouth Rd. Baltemoer, London 3910</address>
            <ul class="list-unstyled links">
              <li><a href="tel://11234567890">+1(123)-456-7890</a></li>
              <li><a href="tel://11234567890">+1(123)-456-7890</a></li>
              <li>
                <a href="mailto:info@mydomain.com">info@mydomain.com</a>
              </li>
            </ul>
          </div>
          <!-- /.widget -->
        </div>
        <!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <div class="widget">
            <h3>Sources</h3>
            <ul class="list-unstyled float-start links">
              <li><a href="#">About us</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Vision</a></li>
              <li><a href="#">Mission</a></li>
              <li><a href="#">Terms</a></li>
              <li><a href="#">Privacy</a></li>
            </ul>
            <ul class="list-unstyled float-start links">
              <li><a href="#">Partners</a></li>
              <li><a href="#">Business</a></li>
              <li><a href="#">Careers</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">FAQ</a></li>
              <li><a href="#">Creative</a></li>
            </ul>
          </div>
          <!-- /.widget -->
        </div>
        <!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <div class="widget">
            <h3>Links</h3>
            <ul class="list-unstyled links">
              <li><a href="#">Our Vision</a></li>
              <li><a href="#">About us</a></li>
              <li><a href="#">Contact us</a></li>
            </ul>

            <ul class="list-unstyled social">
              <li>
                <a href="#"><span class="icon-instagram"></span></a>
              </li>
              <li>
                <a href="#"><span class="icon-twitter"></span></a>
              </li>
              <li>
                <a href="#"><span class="icon-facebook"></span></a>
              </li>
              <li>
                <a href="#"><span class="icon-linkedin"></span></a>
              </li>
              <li>
                <a href="#"><span class="icon-pinterest"></span></a>
              </li>
              <li>
                <a href="#"><span class="icon-dribbble"></span></a>
              </li>
            </ul>
          </div>
          <!-- /.widget -->
        </div>
        <!-- /.col-lg-4 -->
      </div>
      <!-- /.row -->

      <div class="row mt-5">
        <div class="col-12 text-center">
          <!-- 
              **==========
              NOTE: 
              Please don't remove this copyright link unless you buy the license here https://untree.co/license/  
              **==========
            -->

          <p>
            Copyright &copy;
            <script>
              document.write(new Date().getFullYear());
            </script>
            . All Rights Reserved. &mdash; Designed with love by
            <a href="https://untree.co">Untree.co</a>
            <!-- License information: https://untree.co/license/ -->
          </p>
          <div>
            Distributed by
            <a href="https://themewagon.com/" target="_blank">themewagon</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container -->
  </div>
  <!-- /.site-footer -->

  <!-- Preloader -->
  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>

  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/tiny-slider.js') }}"></script>
  <script src="{{ asset('js/aos.js') }}"></script>
  <script src="{{ asset('js/navbar.js') }}"></script>
  <script src="{{ asset('js/counter.js') }}"></script>
  <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>