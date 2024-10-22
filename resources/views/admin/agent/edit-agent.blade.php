{{-- @extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Agent</h1>
    @if ($errors->any())
    <div class="notification is-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('admin.agent.update', $agent->agen_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="field">
            <label class="label">Unggah Foto</label>
            <div class="control icons-left">
                <input class="input" type="file" name="image" placeholder="Unggah Foto" required>
                <span class="icon left"><i class="mdi mdi-camera"></i></span>
            </div>
        </div>

        <div class="field">
            <label class="label">Nama</label>
            <div class="control icons-left">
                <input class="input" type="text" name="name" placeholder="Nama" value="{{ $agent->name }}" required>
                <span class="icon left"><i class="mdi mdi-account"></i></span>
            </div>
        </div>

        <div class="field">
            <label class="label">Kontak</label>
            <div class="control icons-left">
                <input class="input" type="text" name="contact" placeholder="Kontak" value="{{ $agent->contact }}" required>
                <span class="icon left"><i class="mdi mdi-phone"></i></span>
            </div>
        </div>

        <div class="field">
            <label class="label">Alamat</label>
            <div class="control icons-left">
                <input class="input" type="text" name="alamat" placeholder="Alamat" value="{{ $agent->alamat }}" required>
                <span class="icon left"><i class="mdi mdi-map-marker"></i></span>
            </div>
        </div>

        <div class="field">
            <label class="label">Perusahaan</label>
            <div class="control icons-left">
                <input class="input" type="text" name="company" placeholder="Perusahaan" value="{{ $agent->company }}" required>
                <span class="icon left"><i class="mdi mdi-office-building"></i></span>
            </div>
        </div>

        <div class="field grouped">
            <div class="control">
                <button type="submit" class="button green">Perbarui Agen</button>
            </div>
            <div class="control">
                <button type="reset" class="button red">Atur Ulang</button>
            </div>
        </div>
    </form>
</div>
@endsection --}}

@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Agent</h1>
    @if ($errors->any())
    <div class="notification is-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('admin.agent.update', $agent->agen_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="field">
            <label class="label">Unggah Foto</label>
            <div class="control icons-left">
                <input class="input" type="file" name="image" placeholder="Unggah Foto">
                <span class="icon left"><i class="mdi mdi-camera"></i></span>
            </div>
        </div>

        <div class="field">
            <label class="label">Nama</label>
            <div class="control icons-left">
                <input class="input" type="text" name="name" placeholder="Nama" value="{{ $agent->name }}" required>
                <span class="icon left"><i class="mdi mdi-account"></i></span>
            </div>
        </div>

        <div class="field">
            <label class="label">Kontak</label>
            <div class="control icons-left">
                <input class="input" type="text" name="contact" placeholder="Kontak" value="{{ $agent->contact }}" required>
                <span class="icon left"><i class="mdi mdi-phone"></i></span>
            </div>
        </div>

        <div class="field">
            <label class="label">Alamat</label>
            <div class="control icons-left">
                <input class="input" type="text" name="alamat" placeholder="Alamat" value="{{ $agent->alamat }}" required>
                <span class="icon left"><i class="mdi mdi-map-marker"></i></span>
            </div>
        </div>

        <div class="field">
            <label class="label">Perusahaan</label>
            <div class="control icons-left">
                <input class="input" type="text" name="company" placeholder="Perusahaan" value="{{ $agent->company }}" required>
                <span class="icon left"><i class="mdi mdi-office-building"></i></span>
            </div>
        </div>

        <div class="field grouped">
            <div class="control">
                <button type="submit" class="button green">Perbarui Agen</button>
            </div>
            <div class="control">
                <button type="reset" class="button red">Atur Ulang</button>
            </div>
        </div>
    </form>
</div>
@endsection

