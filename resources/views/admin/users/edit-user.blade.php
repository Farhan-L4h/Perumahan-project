@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="card-title">Edit Agent</h1>
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name" class="label">Name</label>
            <input type="text" class="input" id="name" name="name" value="{{ $user->name }}" disabled >
        </div>
        
        <div class="form-group">
            <label for="level" class="label">Role</label>
            <select class="input" id="level" name="level" required>
                <option value="admin" {{ $user->level == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ $user->level == 'user' ? 'selected' : '' }}>User</option>
            </select>
        </div>
        
        <button type="submit" class="button blue" style="margin-top: 10px;">Update Agent</button>
    </form>
</div>
@endsection
