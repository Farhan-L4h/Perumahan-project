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
      SH
    </h1>
    <button class="button light">Button</button>
  </div>
</section>

  <section class="section main-section">
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6">

    <div class="card">
        <header class="card-header">
          <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-image"></i></span>
            Property Image
          </p>
        </header>
        <div class="card-content">
          <div class="image m-0">
            <img src="{{ asset('storage/properties/'.$property->image) }}" alt="John Doe" style="width: 100%; height: auto; object-fit: cover;">
          </div>
          <hr>

          <!-- <div class="field">
            <label class="label">Name</label>
            <div class="control">
              <input type="text" readonly value="John Doe" class="input is-static">
            </div>
          </div> 

          <hr>

          <div class="field">
            <label class="label">E-mail</label>
            <div class="control">
              <input type="text" readonly value="user@example.com" class="input is-static">
            </div>
          </div> -->

        </div>
      </div>

      <div class="card">
        <header class="card-header">
          <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-home"></i></span>
            Property Detail
          </p>
        </header>
        <div class="card-content">
          <form>
        
            <div class="field">
              <label class="label">Nama Property</label>
              <div class="field-body">
                <div class="field">
                  <div class="control">
                    <input type="text" value="{{ $property->nama }}" class="input" disabled>
                  </div>   
                </div>
              </div>
            </div>
            <div class="field">
              <label class="label">Kategori Property</label>
              <div class="field-body">
                <div class="field">
                  <div class="control">
                    <input type="text" value="{{ $property->kategori->nama_kategori }}" class="input" disabled>
                  </div>
                </div>
              </div>
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
      </div>
      
    </div>
    <div class="card">
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
    </div>
  </section>

@endsection