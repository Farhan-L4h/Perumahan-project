<!DOCTYPE html>
<html lang="en" class="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Forms - Admin One Tailwind CSS Admin Dashboard</title>

  <!-- Tailwind is included -->
  <link rel="stylesheet" href="{{ asset('admin-one/dist/css/main.css?v=1628755089081') }}">

  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png" />
  <link rel="mask-icon" href="safari-pinned-tab.svg" color="#00b4b6" />

  <meta name="description" content="Admin One - free Tailwind dashboard">

  <meta property="og:url" content="https://justboil.github.io/admin-one-tailwind/">
  <meta property="og:site_name" content="JustBoil.me">
  <meta property="og:title" content="Admin One HTML">
  <meta property="og:description" content="Admin One - free Tailwind dashboard">
  <meta property="og:image" content="https://justboil.me/images/one-tailwind/repository-preview-hi-res.png">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="1920">
  <meta property="og:image:height" content="960">

  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:title" content="Admin One HTML">
  <meta property="twitter:description" content="Admin One - free Tailwind dashboard">
  <meta property="twitter:image:src" content="https://justboil.me/images/one-tailwind/repository-preview-hi-res.png">
  <meta property="twitter:image:width" content="1920">
  <meta property="twitter:image:height" content="960">

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130795909-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-130795909-1');
  </script>

</head>

<body>

  <div id="app">
    @extends('admin.index')
    @section('content')
    <nav id="navbar-main" class="navbar is-fixed-top">
      <div class="navbar-brand">
        <a class="navbar-item mobile-aside-button">
          <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
        </a>
        <div class="navbar-item">
          <div class="control"><input placeholder="Search everywhere..." class="input"></div>
        </div>
      </div>
      <div class="navbar-brand is-right">
        <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
          <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
        </a>
      </div>
      <div class="navbar-menu" id="navbar-menu">
        <div class="navbar-end">
          <div class="navbar-item dropdown has-divider">
            <a class="navbar-link">
              <span class="icon"><i class="mdi mdi-menu"></i></span>
              <span>Sample Menu</span>
              <span class="icon">
                <i class="mdi mdi-chevron-down"></i>
              </span>
            </a>
            <div class="navbar-dropdown">
              <a href="profile.html" class="navbar-item">
                <span class="icon"><i class="mdi mdi-account"></i></span>
                <span>My Profile</span>
              </a>
              <a class="navbar-item">
                <span class="icon"><i class="mdi mdi-settings"></i></span>
                <span>Settings</span>
              </a>
              <a class="navbar-item">
                <span class="icon"><i class="mdi mdi-email"></i></span>
                <span>Messages</span>
              </a>
              <hr class="navbar-divider">
              <a class="navbar-item">
                <span class="icon"><i class="mdi mdi-logout"></i></span>
                <span>Log Out</span>
              </a>
            </div>
          </div>
          <div class="navbar-item dropdown has-divider has-user-avatar">
            <a class="navbar-link">
              <div class="user-avatar">
                <img src="https://avatars.dicebear.com/v2/initials/john-doe.svg" alt="John Doe" class="rounded-full">
              </div>
              <div class="is-user-name"><span>John Doe</span></div>
              <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
            </a>
            <div class="navbar-dropdown">
              <a href="/admin/profile" class="navbar-item">
                <span class="icon"><i class="mdi mdi-account"></i></span>
                <span>My Profile</span>
              </a>
              <a class="navbar-item">
                <span class="icon"><i class="mdi mdi-settings"></i></span>
                <span>Settings</span>
              </a>
              <a class="navbar-item">
                <span class="icon"><i class="mdi mdi-email"></i></span>
                <span>Messages</span>
              </a>
              <hr class="navbar-divider">
              <a class="navbar-item">
                <span class="icon"><i class="mdi mdi-logout"></i></span>
                <span>Log Out</span>
              </a>
            </div>
          </div>
          <a href="https://justboil.me/tailwind-admin-templates" class="navbar-item has-divider desktop-icon-only">
            <span class="icon"><i class="mdi mdi-help-circle-outline"></i></span>
            <span>About</span>
          </a>
          <a href="https://github.com/justboil/admin-one-tailwind" class="navbar-item has-divider desktop-icon-only">
            <span class="icon"><i class="mdi mdi-github-circle"></i></span>
            <span>GitHub</span>
          </a>
          <a title="Log out" class="navbar-item desktop-icon-only">
            <span class="icon"><i class="mdi mdi-logout"></i></span>
            <span>Log out</span>
          </a>
        </div>
      </div>
    </nav>

    <section class="is-title-bar">
      <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <ul>
          <li>Admin</li>
          <li>Forms Properties</li>
        </ul>
        <a href="/admin" class="button blue">
          <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
          <span>Back</span>
        </a>
      </div>
    </section>

   

    <section class="section main-section">
      <div class="card mb-6">
        <header class="card-header">
          <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-ballot"></i></span>
            Forms
          </p>
        </header>
        <div class="card-content">
          @if ($errors->any())
              <div class="notification is-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <form method="post" action="{{ route('admin.properties.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="field">
              <label class="label">Upload Foto</label>
              <div class="control icons-left">
                <input class="input" type="file" name="image" placeholder="Upload Foto">
                <span class="icon left"><i class="mdi mdi-camera"></i></span>
              </div>
            </div>

            <div class="field">
              <label class="label">Agen</label>
              <div class="control icons-left">
                <div class="select">
                  <select name="agen_id">
                    @foreach($agens as $agen)
                    <option value="{{ $agen->agen_id }}">{{ $agen->name }}</option>
                    @endforeach
                  </select>
                </div>
                <span class="icon left"><i class="mdi mdi-account-box"></i></span>
              </div>
            </div>

            <div class="field">
              <label class="label">Kategori</label>
              <div class="control icons-left">
                <div class="select">
                  <select name="kategori_id">
                    <option selected>Select</option>
                    @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->kategori_id }}">{{ $kategori->nama_kategori }}</option>
                    @endforeach
                  </select>
                </div>
                <span class="icon left"><i class="mdi mdi-archive"></i></span>
              </div>
            </div>

            <div class="field">
              <label class="label">Judul Properti</label>
              <div class="control icons-left">
                <input class="input" type="text" name="nama" placeholder="Judul Properti">
                <span class="icon left"><i class="mdi mdi-text"></i></span>
              </div>
            </div>

            <div class="field">
              <label class="label">Harga</label>
              <div class="control icons-left">
                <input class="input" type="number" name="harga" placeholder="Harga">
                <span class="icon left"><i class="mdi mdi-tag"></i></span>
              </div>
            </div>

            <div class="field">
              <label class="label">Deskripsi</label>
              <div class="control">
                <textarea class="textarea" placeholder="Deskripsi" name="deskripsi"></textarea>
              </div>
            </div>

            <div class="field">
              <label class="label">Status</label>
              <div class="control icons-left">
                <div class="select">
                  <select name="status">
                    <option value="disewa">Disewa</option>
                    <option value="dijual">Dijual</option>
                    <option value="tersedia">Tersedia</option>
                    <option value="tidak tersedia">Tidak Tersedia</option>
                  </select>
                </div>
                <span class="icon left"><i class="mdi mdi-file-document"></i></span>
              </div>
            </div>
            
            <div class="field">
              <label class="label">Luas Tanah</label>
              <div class="control icons-left">
                <input class="input" type="text" name="luas_tanah" placeholder="Luas Tanah">
                <span class="icon left"><i class="mdi mdi-ruler"></i></span>
              </div>
            </div>
            
            <div class="field">
              <label class="label">Luas Bangunan</label>
              <div class="control icons-left">
                <input class="input" type="text" name="luas_bangunan" placeholder="Luas Bangunan">
                <span class="icon left"><i class="mdi mdi-ruler"></i></span>
              </div>
            </div>


            <div class="field">
              <label class="label">Fasilitas</label>
              <div class="control icons-left">
                <input class="input" type="text" name="fasilitas" placeholder="Fasilitas">
                <span class="icon left"><i class="mdi mdi-home-modern"></i></span>
              </div>
            </div>

            <div class="field">
              <label class="label">Alamat</label>
              <div class="control icons-left">
                <input class="input" type="text" name="alamat" placeholder="Alamat">
                <span class="icon left"><i class="mdi mdi-map-marker"></i></span>
              </div>
            </div>

            <div class="field">
              <label class="label">Kamar Tidur</label>
              <div class="control icons-left">
                <input class="input" type="number" name="kamar_tidur" placeholder="Kamar Tidur">
                <span class="icon left"><i class="mdi mdi-bed"></i></span>
              </div>
            </div>

            <div class="field">
              <label class="label">Kamar Mandi</label>
              <div class="control icons-left">
                <input class="input" type="number" name="kamar_mandi" placeholder="Kamar Mandi">
                <span class="icon left"><i class="mdi mdi-shower"></i></span>
              </div>
            </div>

            <hr>

            <div class="field grouped">
              <div class="control">
                <button type="submit" class="button green">Submit</button>
              </div>
              <div class="control">
                <button type="reset" class="button red">Reset</button>
              </div>
            </div>
          </form>

        </div>
      </div>

  </div>

  @endsection

  <script>
    ! function(f, b, e, v, n, t, s) {
      if (f.fbq) return;
      n = f.fbq = function() {
        n.callMethod ?
          n.callMethod.apply(n, arguments) : n.queue.push(arguments)
      };
      if (!f._fbq) f._fbq = n;
      n.push = n;
      n.loaded = !0;
      n.version = '2.0';
      n.queue = [];
      t = b.createElement(e);
      t.async = !0;
      t.src = v;
      s = b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
      'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '658339141622648');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=658339141622648&ev=PageView&noscript=1" /></noscript>

  <!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">

</body>

</html>
