<body>
@extends('layouts.admin')
  @section('content')
  <div id="app">

  <section class="is-title-bar">
      <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <ul>
          <li>Admin</li>
          <li>Dashboard</li>
        </ul>
        <a href="/admin" class="button blue">
          <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
          <span>Back</span>
        </a>
      </div>
    </section>

    <section class="section main-section shadow-sm card shadow-md" style="margin-top: 10px; margin-bottom: 10px;">
      <div class="flex justify-between">
        <h1 class="title"><Strong>Data Property</Strong></h1>
        <a href="/admin/form" class="button green"><span class="mdi mdi-plus"></span> Tambah Property</a>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Image</th>
            <th scope="col">Nama</th>
            <th scope="col">Kategori</th>
            <th scope="col">Kota</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        
        <tbody>
          @foreach($datas as $data)
          <tr>
            <td>{{$data->properties_id}}</td>
            <td><img src="{{ asset('storage/properties/' . $data->image) }}" alt="Image" style="width: 50px; height: 50px; object-fit: cover;"></td>
            <td>{{$data->nama}}</td>
            <td>{{$data->kategori->nama_kategori}}</td>
            <td>{{$data->kota}}</td>
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
              <a href="/admin/properties/delete/{{$data->properties_id}}" class="button red" onclick="return confirm('Are you sure you want to delete this property?')"><span class="mdi mdi-delete-empty"></span></span></a>
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
              <a href="/admin/agens/delete/{{$agen->agen_id}}" class="button red" onclick="return confirm('Are you sure you want to delete this agent?')"><span class="mdi mdi-delete-empty" style="padding: 0.5px;"></span></span></a>
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
     <div style="display: flex; justify-content:start;">
       <section class="section main-section shadow-sm card shadow-md" style="margin-top: 10px; margin-bottom: 10px; margin-right: 10px;">
         <div class="flex justify-between">
           <h1 class="title"><Strong>Data User</Strong></h1>
         </div>
         <table class="table table-striped">
           <thead>
             <tr>
               <th scope="col">No</th>
               <th scope="col">Name</th>
               <th scope="col">Email</th>
               <th scope="col">Role</th>
               <th scope="col">Action</th>
             </tr>
           </thead>
           
           <tbody>
             @foreach($users as $user)
             <tr>
               <td>{{$user->id}}</td>
               <td>{{$user->name}}</td>
               <td>{{$user->email}}</td>
               <td>{{$user->level}}</td>
               <td>
                 <a href="/admin/users/edit/{{$user->id}}" class="button blue"><span class="mdi mdi-pencil" style="padding: 0.5px;"></span></a>
                 <a href="/admin/users/delete/{{$user->id}}" class="button red" onclick="return confirm('Are you sure you want to delete this user?')"><span class="mdi mdi-delete-empty" style="padding: 0.5px;"></span></span></a>
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
         <div class="row">
           <h1 class="title"><Strong>Data Kategori</Strong></h1>
           <a href="/admin/kategori/create" class="button green"><span class="mdi mdi-plus"></span> Tambah Kategori</a>
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
                 <a href="/admin/kategori/delete/{{$kategori->kategori_id}}" class="button red" onclick="return confirm('Are you sure you want to delete this category?')"><span class="mdi mdi-delete-empty" style="padding: 0.5px;">
                 </span></span></a>
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