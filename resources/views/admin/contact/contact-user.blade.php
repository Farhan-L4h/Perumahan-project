@extends('layouts.admin')

@section('content')

<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <ul>
        <li>Admin</li>
        <li>Contact</li>
    </ul>
    <a href="/admin" class="button blue">
        <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
        <span>Back</span>
    </a>
</div>
</section>

<section class="section main-section shadow-sm card shadow-md" style="margin-top: 10px; margin-bottom: 10px;">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Contact</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($datas as $data)
            <tr>
                <td>{{$data->contact_id}}</td>
                <td>{{$data->username}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->contact}}</td>
                <td>{{$data->deskripsi}}</td>
                <td>
                    <!-- <a href="/admin/contact/delete/{{$data->contact_id}}" class="button red" onclick="return confirm('Are you sure you want to delete this contact?')"><span class="mdi mdi-delete-empty"></span></a>
                    <a href="/admin/contact/show/{{$data->contact_id}}" class="button green"><span class="mdi mdi-eye-circle"></span></a> -->
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