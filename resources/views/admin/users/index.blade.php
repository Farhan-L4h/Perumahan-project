@extends('layouts.admin')

@section('content')   

<section class="is-title-bar">
      <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <ul>
          <li>Admin</li>
          <li>User</li>
        </ul>
        <a href="/admin" class="button blue">
          <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
          <span>Back</span>
        </a>
      </div>
    </section>

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
                    <a href="/admin/users/delete/{{$user->id}}" onclick="return confirm('Are you sure you want to delete this user?')" class="button red"><span class="mdi mdi-delete-empty" style="padding: 0.5px;"></span></span></a>
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

@endsection