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
                    <form method="post" action="{{ route('admin.properties.update', $data->properties_id) }}" enctype="multipart/form-data">
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
                            <label class="label">Judul Properti</label>
                            <div class="control icons-left">
                                <input class="input" type="text" name="nama" placeholder="Judul Properti" value="{{ $data->nama }}">
                                <span class="icon left"><i class="mdi mdi-text"></i></span>
                            </div>
                        </div>

                        <div class="flex">

                            <div class="field" style="margin-right: 10px; width: 15%;">
                                <label class="label">Agen</label>
                                <div class="control">
                                    <div class="select">
                                        <select name="agen_id">
                                            @foreach($agens as $agen)
                                            <option value="{{ $agen->agen_id }}" {{ $data->agen_id == $agen->agen_id ? 'selected' : '' }}>{{ $agen->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="field" style="margin-right: 10px; width: 15%;">
                                <label class="label">Kategori</label>
                                <div class="control">
                                    <div class="select">
                                        <select name="kategori_id">
                                            @foreach($kategoris as $kategori)
                                            <option value="{{ $kategori->kategori_id }}" {{ $data->kategori_id == $kategori->kategori_id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="field" style="margin-right: 10px; width: 15%;">
                                <label class="label">Status</label>
                                <div class="control">
                                    <div class="select">
                                        <select name="status">
                                            <option value="disewa" {{ $data->status == 'disewa' ? 'selected' : '' }}>Disewa</option>
                                            <option value="dijual" {{ $data->status == 'dijual' ? 'selected' : '' }}>Dijual</option>
                                            <option value="tersedia" {{ $data->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                                            <option value="tidak tersedia" {{ $data->status == 'tidak tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="field" style="margin-right: 10px;">
                                <label class="label">Luas Tanah</label>
                                <div class="control icons-left">
                                    <input class="input" type="text" name="luas_tanah" placeholder="Luas Tanah" value="{{ $data->luas_tanah }}">
                                    <span class="icon left"><i class="mdi mdi-ruler"></i></span>
                                </div>
                            </div>

                            <div class="field" style="margin-right: 10px;">
                                <label class="label">Luas Bangunan</label>
                                <div class="control icons-left">
                                    <input class="input" type="text" name="luas_bangunan" placeholder="Luas Bangunan" value="{{ $data->luas_bangunan }}">
                                    <span class="icon left"><i class="mdi mdi-ruler"></i></span>
                                </div>
                            </div>


                            <div class="field" style="margin-right: 10px;">
                                <label class="label">Kota</label>
                                <div class="control icons-left">
                                    <input class="input" type="text" name="kota" placeholder="Masukkan nama kota" value="{{$data->kota}}">
                                    <span class="icon left"><i class="mdi mdi-home-modern"></i></span>
                                </div>
                            </div>

                            <div class="field" style="margin-right: 10px;">
                                <label class="label">Kamar Tidur</label>
                                <div class="control icons-left">
                                    <input class="input" type="number" name="kamar_tidur" placeholder="Kamar Tidur" value="{{ $data->kamar_tidur }}">
                                    <span class="icon left"><i class="mdi mdi-bed"></i></span>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Kamar Mandi</label>
                                <div class="control icons-left">
                                    <input class="input" type="number" name="kamar_mandi" placeholder="Kamar Mandi" value="{{ $data->kamar_mandi }}">
                                    <span class="icon left"><i class="mdi mdi-shower"></i></span>
                                </div>
                            </div>

                        </div>

                        <div class="field">
                            <label class="label">Harga</label>
                            <div class="control icons-left">
                                <input class="input" type="number" name="harga" placeholder="Harga" value="{{ $data->harga }}">
                                <span class="icon left"><i class="mdi mdi-tag"></i></span>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Alamat</label>
                            <div class="control icons-left">
                                <input class="input" type="text" name="alamat" placeholder="Alamat" value="{{ $data->alamat }}">
                                <span class="icon left"><i class="mdi mdi-map-marker"></i></span>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Deskripsi</label>
                            <div class="control">
                                <textarea class="textarea" placeholder="Deskripsi" name="deskripsi">{{ $data->deskripsi }}</textarea>
                            </div>
                        </div>


                        <hr>

                        <div class="field grouped">
                            <div class="control">
                                <button type="submit" class="button green">Kirim</button>
                            </div>
                            <div class="control">
                                <button type="reset" class="button red">Atur Ulang</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

    </div>

    @endsection

    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '658339141622648');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=658339141622648&ev=PageView&noscript=1" /></noscript>

    <!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">

</body>

</html>