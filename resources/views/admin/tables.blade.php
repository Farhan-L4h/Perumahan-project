<!DOCTYPE html>
<html lang="en" class="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tables - Admin One Tailwind CSS Admin Dashboard</title>

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
@extends('admin.index')
  @section('content')
  <div id="app">

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

    <section class="section main-section shadow-sm card shadow-md" style="margin-top: 10px; margin-bottom: 10px;">
      <div class="flex justify-between">
        <h1 class="title"><Strong>Data Agent</Strong></h1>
        <a href="/admin/form" class="button green"><span class="mdi mdi-plus"></span> Tambah Property</a>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Image</th>
            <th scope="col">Nama</th>
            <th scope="col">Kategori</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        
        <tbody>
          @foreach($datas as $data)
          <tr>
            <td>{{$data->properties_id}}</td>
            <td><img src="{{ asset('storage/properties/' . $data->image) }}" alt="Image" style="width: 100px; height: auto;"></td>
            <td>{{$data->nama}}</td>
            <td>{{$data->kategori->nama_kategori}}</td>
            <td>
              @if($data->status == 'disewa')
                <button class="button green">Disewa</button>
              @elseif($data->status == 'dijual')
                <button class="button red">Terjual</button>
              @elseif($data->status == 'tersedia')
                <button class="button blue">Tersedia</button>
              @else
                <button class="button red">Tidak Tersedia</button>
              @endif
            </td>
            <td>
              <a href="/admin/properties/edit/{{$data->properties_id}}" class="button blue"><span class="mdi mdi-pencil"></span></a>
              <a href="/admin/properties/delete/{{$data->properties_id}}" class="button red"><span class="mdi mdi-delete-empty"></span></span></a>
              <a href="/admin/properties/show/{{$data->properties_id}}" class="button green"><span class="mdi mdi-eye-circle"></span></span></span></a>
            </td>
          </tr>
          @endforeach
        </tbody>
        <div class="pagination">
          {{ $datas->links('pagination::bootstrap-5') }}
        </div>
      </table>
      @if($datas->isEmpty())
        <div class="card empty">
          <div class="card-content">
            <div>
              <span class="icon large"><i class="mdi mdi-file-document-outline mdi-48px"></i></span>
            </div>
            <p>Data Kosong</p>
            <p class="help">Silakan Masukan data Terlebih dahulu</p>
          </div>
        </div>
      @endif

    </section>

    <!-- agent -->
    <section class="section main-section shadow-sm card shadow-md" style="margin-top: 10px; margin-bottom: 10px;">
      <div class="flex justify-between">
        <h1 class="title"><Strong>Data Agent</Strong></h1>
        <a href="/admin/form" class="button green"><span class="mdi mdi-plus"></span> Tambah Agent</a>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Image</th>
            <th scope="col">Nama</th>
            <th scope="col">Username</th>
            <th scope="col">Contact</th>
            <th scope="col">Company</th>
            <th scope="col">Alamat</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        
        <tbody>
          @foreach($agens as $agen)
          <tr>
            <td>{{$agen->agen_id}}</td>
            <td>
              <img src="{{ $agen->image ? asset('storage/agens/' . $agen->image) : asset('/images/default-user.png') }}" alt="Image" style="width: 50px; height: auto;">
            </td>
            <td>{{$agen->name}}</td>
            <td>{{$agen->username}}</td>
            <td>{{$agen->contact}}</td>
            <td>{{$agen->company}}</td>
            <td>{{$agen->alamat}}</td>
            <td>
              <a href="/admin/agens/edit/{{$agen->agen_id}}" class="button blue"><span class="mdi mdi-pencil" style="padding: 0.5px;"></span></a>
              <a href="/admin/agens/delete/{{$agen->agen_id}}" class="button red"><span class="mdi mdi-delete-empty" style="padding: 0.5px;"></span></span></a>
              <a href="/admin/agens/show/{{$agen->agen_id}}" class="button green"><span class="mdi mdi-eye-circle" style="padding: 0.5px;"></span></span></span></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @if($agens->isEmpty())
        <div class="card empty">
          <div class="card-content">
            <div>
              <span class="icon large"><i class="mdi mdi-emoticon-sad mdi-48px"></i></span>
            </div>
            <p>Nothing's here…</p>
          </div>
        </div>
      @endif

    </section>
    <!-- Kategori-->
     <div style="display: flex; justify-content: start;">
       <section class="section main-section shadow-sm card shadow-md" style="margin-top: 10px; margin-bottom: 10px; margin-right: 10px;">
         <div class="flex justify-between">
           <h1 class="title"><Strong>Data Status</Strong></h1>
           <a href="/admin/form" class="button blue"><span class="mdi mdi-plus"></span> Tambah User</a>
         </div>
         <table class="table table-striped">
           <thead>
             <tr>
               <th scope="col">No</th>
               <th scope="col">Status</th>
               <th scope="col">Action</th>
             </tr>
           </thead>
           
           <tbody>
             @foreach($users as $user)
             <tr>
               <td>{{$user->id}}</td>
               <td>{{$user->name}}</td>
               <td>{{$user->email}}</td>
               <td>{{$user->role}}</td>
               <td>
                 <a href="/admin/users/edit/{{$user->id}}" class="button blue"><span class="mdi mdi-pencil" style="padding: 0.5px;"></span></a>
                 <a href="/admin/users/delete/{{$user->id}}" class="button red"><span class="mdi mdi-delete-empty" style="padding: 0.5px;"></span></span></a>
                 <a href="/admin/users/show/{{$user->id}}" class="button green"><span class="mdi mdi-eye-circle" style="padding: 0.5px;"></span></span></span></a>
               </td>
             </tr>
             @endforeach
           </tbody>
         </table>
         @if($users->isEmpty())
           <div class="card empty">
             <div class="card-content">
               <div>
                 <span class="icon large"><i class="mdi mdi-emoticon-sad mdi-48px"></i></span>
               </div>
               <p>Nothing's here…</p>
             </div>
           </div>
         @endif
   
       </section>

       <section class="section main-section shadow-sm card shadow-md" style="margin-top: 10px; margin-bottom: 10px;">
         <div class="flex justify-between">
           <h1 class="title"><Strong>Data Kategori</Strong></h1>
           <a href="/admin/form" class="button green"><span class="mdi mdi-plus"></span> Tambah Kategori</a>
         </div>
         <table class="table table-striped">
           <thead>
             <tr>
               <th scope="col">No</th>
               <th scope="col">Nama</th>
               <th scope="col">Action</th>
             </tr>
           </thead>
           
           <tbody>
             @foreach($kategoris as $kategori)
             <tr>
               <td>{{$kategori->kategori_id}}</td>
               <td>{{$kategori->nama_kategori}}</td>
               <td>
                 <a href="/admin/kategoris/edit/{{$kategori->kategori_id}}" class="button blue"><span class="mdi mdi-pencil" style="padding: 0.5px;"></span></a>
                 <a href="/admin/kategoris/delete/{{$kategori->kategori_id}}" class="button red"><span class="mdi mdi-delete-empty" style="padding: 0.5px;"></span></span></a>
                 <a href="/admin/kategoris/show/{{$kategori->kategori_id}}" class="button green"><span class="mdi mdi-eye-circle" style="padding: 0.5px;"></span></span></span></a>
               </td>
             </tr>
             @endforeach
           </tbody>
         </table>
         @if($kategoris->isEmpty())
           <div class="card empty">
             <div class="card-content">
               <div>
                 <span class="icon large"><i class="mdi mdi-emoticon-sad mdi-48px"></i></span>
               </div>
               <p>Nothing's here…</p>
             </div>
           </div>
         @endif
   
       </section>
     </div>

    
  </div>

  <!-- Scripts below are for demo only -->
  <script type="text/javascript" src="js/main.min.js?v=1628755089081"></script>

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
  @endsection
</body>

</html>