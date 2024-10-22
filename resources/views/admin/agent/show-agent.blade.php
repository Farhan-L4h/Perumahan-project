@extends('layouts.admin')

@section('content')
<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Agen</li>
      <li>Show</li>
    </ul>
  </div>
</section>

<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      SHOW AGENT / <strong>{{ $agent->name }}</strong>
    </h1>
    <a href="/admin/agent" class="button blue">
        <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
        <span>Back</span>
      </a>

  </div>
</section>

<section class="section main-section">
  <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6">

    <div class="card">
      <div class="card-content">
        <div class="image m-0">
          <img src="{{ asset('storage/agens/'.$agent->image) }}" alt="Agent Image" style="width: 100%; height: auto; object-fit: cover;">
        </div>
      </div>
    </div>

    <div class="card">
      <header class="card-header">
        <p class="card-header-title" style="font-size: 30px; font-weight: bold;">
          {{ $agent->name }}
        </p>
      </header>
      <div style="margin-left: 10px;">
        <p class="ml-2 my-1">
          <span class="icon"><i class="mdi mdi-phone"></i></span>
          {{ $agent->contact }}
        </p>

        <div class="card-content">
            <p class="ml-2 my-1">
              <span class="icon"><i class="mdi mdi-map-marker"></i></span>
              {{ $agent->alamat }}
            </p>
            <p class="ml-2 my-1">
              <span class="icon"><i class="mdi mdi-office-building"></i></span>
              {{ $agent->company }}
            </p>
          </div>

        {{-- <div style="margin-left: 10px; margin-top: 10px;">
          <p class="my-1">
            <button class="button">
              Status: {{ $agent->status }}
            </button>
          </p>
        </div> --}}
      </div>
    </div>

  </div>
</section>
@endsection
