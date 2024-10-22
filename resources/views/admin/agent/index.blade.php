@extends('layouts.admin')

@section('content')

<section class="is-title-bar">
      <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <ul>
          <li>Admin</li>
          <li>Agents</li>
        </ul>
        <a href="/admin" class="button blue">
          <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
          <span>Back</span>
        </a>
      </div>
    </section>

<section class="section main-section shadow-sm card shadow-md" style="margin-top: 10px; margin-bottom: 10px;">
  <div class="flex justify-between">
    <h1 class="title"><Strong>Data Agent</Strong></h1>
    <a href="/admin/agent/create" class="button green"><span class="mdi mdi-plus"></span> Tambah Agent</a>
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
          <img src="{{ asset('storage/agens/' . $agen->image) }}" alt="Image" style="width: 50px; height: auto;">
        </td>
        <td>{{$agen->name}}</td>
        <td>{{$agen->username}}</td>
        <td>{{$agen->contact}}</td>
        <td>{{$agen->company}}</td>
        <td>{{$agen->alamat}}</td>
        <td>
          <a href="/admin/agent/edit/{{$agen->agen_id}}" class="button blue"><span class="mdi mdi-pencil" style="padding: 0.5px;"></span></a>
          <a href="/admin/agent/delete/{{$agen->agen_id}}" class="button red" onclick="return confirm('Are you sure you want to delete this agent?')"><span class="mdi mdi-delete-empty" style="padding: 0.5px;"></span></span></a>
          <a href="/admin/agent/show/{{$agen->agen_id}}" class="button green"><span class="mdi mdi-eye-circle" style="padding: 0.5px;"></span></span></span></a>
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
@endsection