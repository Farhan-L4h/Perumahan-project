@extends('layouts.admin')

@section('content')

<section class="is-title-bar">
      <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <ul>
          <li>Admin</li>
          <li>Properties</li>
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
              <a href="/admin/properties/delete/{{$data->properties_id}}" onclick="return confirm('Are you sure you want to delete this property?')" class="button red"><span class="mdi mdi-delete-empty"></span></span></a>
              <a href="/admin/properties/show/{{$data->properties_id}}" class="button green"><span class="mdi mdi-eye-circle"></span></span></span></a>
            </td>
          </tr>
          @endforeach
        </tbody>
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

@endsection
