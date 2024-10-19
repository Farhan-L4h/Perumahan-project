@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Agent</h1>
    <form action="{{ route('admin.agents.update', $agent->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image" value="{{ $agent->image }}" required>
        </div>
        
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $agent->name }}" required>
        </div>
        
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $agent->name }}" required>
        </div>
        
        <div class="form-group">
            <label for="contact">Contact</label>
            <input type="text" class="form-control" id="contact" name="contact" value="{{ $agent->contact }}" required>
        </div>
        
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $agent->alamat }}" required>
        </div>

        <div class="form-group">
            <label for="company">Company</label>
            <input type="text" class="form-control" id="company" name="company" value="{{ $agent->company }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Update Agent</button>
    </form>
</div>
@endsection
