@extends('layouts.admin')

@section('content')

<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <ul>
            <li>Admin</li>
            <li>Contact</li>
            <li>Show</li>
        </ul>
        <a href="/admin/contact" class="button blue">
            <span class="icon"><i class="mdi mdi-arrow-left"></i></span>
            <span>Back</span>
        </a>
    </div>
</section>

<section class="section main-section shadow-sm card shadow-md" style="margin-top: 10px; margin-bottom: 10px;">
    <div class="card-content">
        <h1 class="title">Contact Details</h1>
        <div class="field">
            <label class="label">Username</label>
            <div class="control">
                <input class="input" type="text" value="{{ $contact->username }}" readonly>
            </div>
        </div>
        <div class="field">
            <label class="label">Email</label>
            <div class="control">
                <input class="input" type="email" value="{{ $contact->email }}" readonly>
            </div>
        </div>
        <div class="field">
            <label class="label">Contact</label>
            <div class="control">
                <input class="input" type="text" value="{{ $contact->contact }}" readonly>
            </div>
        </div>
        <div class="field">
            <label class="label">Description</label>
            <div class="control">
                <textarea class="textarea" readonly>{{ $contact->deskripsi }}</textarea>
            </div>
        </div>
    </div>
</section>


@endsection
