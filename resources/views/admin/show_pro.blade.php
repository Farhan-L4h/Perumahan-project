@extends('admin.index')

@section('content')
<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Properties</li>
      <li>show</li>
    </ul>
  </div>
</section>

<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      SHOW PROPERTY/ <strong>{{ $property->nama }}</strong>
    </h1>
    <button class="button light">Button</button>
  </div>
</section>

<section class="section main-section">
  <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6">

    <div class="card">
      <div class="card-content">
        <div class="image m-0">
          <img src="{{ asset('storage/properties/'.$property->image) }}" alt="Property Image" style="width: 100%; height: auto; object-fit: cover;">
        </div>
      </div>
    </div>

    <div class="card">
      <header class="card-header">
        <p class="card-header-title" style="font-size: 30px; font-weight: bold;">
          {{ $property->nama }}
        </p>
      </header>
      <div style="margin-left: 10px;">
        <p class="ml-2 my-1">
          <span class="icon"><i class="mdi mdi-map-marker"></i></span>
          {{ $property->alamat }}
        </p>

        <div class="card-content">
            <p class="ml-2 my-1">
              {{ $property->deskripsi }}
            </p>
          </div>
          
          <div class="card mt-4">
            <header class="card-header flex items-center">
              <img src="{{ $property->agen->image ? asset('storage/agens/'.$property->agen->image) : asset('/images/default-user.png') }}" class="w-1/3 h-auto object-cover" style="width: 30%; height: auto; object-fit: cover;">
              <div class="ml-4">
                <p class="card-header-title">
                  Name: {{ $property->agen->name }}
                </p>
                <div class="card-content text-left">
                  <p>Username: {{ $property->agen->username }}</p>
                  <p>Company: {{ $property->agen->company }}</p>
                  <p>Contact: {{ $property->agen->contact }}</p>
                  <p>Address: {{ $property->agen->alamat }}</p>
                </div>
              </div>
            </header>
          </div>

        <div style="margin-left: 10px; margin-top: 10px; display: flex; justify-content: space-between;">
          <p class="my-1">
            <button class="button {{ $property->status == 'disewa' ? 'green' : ($property->status == 'terjual' ? 'red' : ($property->status == 'tersedia' ? 'blue' : 'red')) }}">
              {{ $property->status }}
            </button>
          </p>
          <p class="ml-2 my-1">
            <span class="icon"><i class="mdi mdi-city"></i></span>
            {{ $property->kota }}
          </p>
          <p class="ml-2 my-1">
            <span class="icon"><i class="mdi mdi-equal-box"></i></span>
            {{ $property->kategori->nama_kategori }}
          </p>


          <p class="ml-2 my-1">
            Rp. {{ $property->harga }}
          </p>
          <p class="ml-2 my-1">
            T :
            {{ $property->luas_tanah }} m<sup>2</sup>
          </p>
          <p class="ml-2 my-1">
            B :
            {{ $property->luas_bangunan }} m<sup>2</sup>
          </p>
          
          
        </div>
      </div>

    </div>
    <!-- <div class="card">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-lock"></i></span>
          Change Password
        </p>
      </header>
      <div class="card-content">
        <form>
          <div class="field">
            <label class="label">Current password</label>
            <div class="control">
              <input type="password" name="password_current" autocomplete="current-password" class="input" required>
            </div>
            <p class="help">Required. Your current password</p>
          </div>
          <hr>
          <div class="field">
            <label class="label">New password</label>
            <div class="control">
              <input type="password" autocomplete="new-password" name="password" class="input" required>
            </div>
            <p class="help">Required. New password</p>
          </div>
          <div class="field">
            <label class="label">Confirm password</label>
            <div class="control">
              <input type="password" autocomplete="new-password" name="password_confirmation" class="input" required>
            </div>
            <p class="help">Required. New password one more time</p>
          </div>
          <hr>
          <div class="field">
            <div class="control">
              <button type="submit" class="button green">
                Submit
              </button>
            </div>
          </div>
        </form>
      </div>
    </div> -->
</section>

@endsection