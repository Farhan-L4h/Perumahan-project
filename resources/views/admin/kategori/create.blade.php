<body>

    <div id="app">
        @extends('layouts.admin')
        @section('content')


        <section class="is-title-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <ul>
                    <li>Admin</li>
                    <li>Forms Properties</li>
                </ul>
                <a href="/admin" class="button blue">
                    <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
                    <span>Back</span>
                </a>
            </div>
        </section>



        <section class="section main-section">
            <div class="card mb-6">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-ballot"></i></span>
                        Forms
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
                    <form method="post" action="{{ route('admin.kategori.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="field">
                            <label class="label">Nama Kategori</label>
                            <div class="control icons-left">
                                <input class="input" type="text" name="nama_kategori" placeholder="Nama Kategori">
                                <span class="icon left"><i class="mdi mdi-text"></i></span>
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

    </div>
    @endsection


</body>

</html>