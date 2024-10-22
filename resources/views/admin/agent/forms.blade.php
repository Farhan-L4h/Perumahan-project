{{-- <body>

    <div id="app">
      @extends('layouts.admin')
      @section('content')
    
      <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
          <ul>
            <li>Admin</li>
            <li>Manage Agents</li>
          </ul>
          <a href="/admin" class="button blue">
            <span class="icon"><i class="mdi mdi-arrow-left"></i></span>
            <span>Back</span>
          </a>
        </div>
      </section>
    
      <section class="section main-section">
        <div class="card mb-6">
          <header class="card-header">
            <p class="card-header-title">
              <span class="icon"><i class="mdi mdi-account"></i></span>
              Agent Form
            </p>
          </header>
          <div class="card-content">
            @if ($errors->any())
            <div class="notification is-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <form method="post" action="{{ route('admin.agents.store') }}" enctype="multipart/form-data">
              @csrf
    
              <div class="field">
                <label class="label">Upload Image</label>
                <div class="control icons-left">
                  <input class="input" type="file" name="image" placeholder="Upload Agent Image">
                  <span class="icon left"><i class="mdi mdi-camera"></i></span>
                </div>
              </div>
    
              <div class="field">
                <label class="label">Name</label>
                <div class="control icons-left">
                  <input class="input" type="text" name="name" placeholder="Agent Name" value="{{ old('name') }}">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
    
              <div class="field">
                <label class="label">Username</label>
                <div class="control icons-left">
                  <input class="input" type="text" name="username" placeholder="Username" value="{{ old('username') }}">
                  <span class="icon left"><i class="mdi mdi-account-box"></i></span>
                </div>
              </div>
    
              <div class="field">
                <label class="label">Contact</label>
                <div class="control icons-left">
                  <input class="input" type="text" name="contact" placeholder="Contact Number" value="{{ old('contact') }}">
                  <span class="icon left"><i class="mdi mdi-phone"></i></span>
                </div>
              </div>
    
              <div class="field">
                <label class="label">Company</label>
                <div class="control icons-left">
                  <input class="input" type="text" name="company" placeholder="Company Name" value="{{ old('company') }}">
                  <span class="icon left"><i class="mdi mdi-office-building"></i></span>
                </div>
              </div>
    
              <div class="field">
                <label class="label">Address</label>
                <div class="control icons-left">
                  <input class="input" type="text" name="address" placeholder="Address" value="{{ old('address') }}">
                  <span class="icon left"><i class="mdi mdi-map-marker"></i></span>
                </div>
              </div>
    
              <hr>
    
              <div class="field grouped">
                <div class="control">
                  <button type="submit" class="button green">Submit</button>
                </div>
                <div class="control">
                  <button type="reset" class="button red">Reset</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </section>
    
      @endsection
    </div>
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
    
    </body>
     --}}