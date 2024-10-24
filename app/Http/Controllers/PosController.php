<?php

namespace App\Http\Controllers;

use App\Models\agen;
use App\Models\kategori;
use App\Models\contact;
use App\Models\User;
use App\Models\properties;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;

class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = properties::paginate(5);
        return view('user/index', compact('datas'));
    }

    public function property()
    {
        $datas = properties::all();
        return view('user/properties', compact('datas'));
    }

    public function property_single(string $id)
    {
        $data = properties::findOrFail($id);
        $agen = agen::findOrFail($data->agen_id);
        $kategori = kategori::findOrFail($data->kategori_id);
        return view('user/property-single', compact('data', 'agen', 'kategori'));
    }

    public function services()
    {
        return view('user/services');
    }
    public function about()
    {
        return view('user/about');
    }
    public function contact()
    {
        return view('user/contact');
    }

    public function storeContact(Request $request)
    {
        // Validasi input dari request
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255', // Validasi email
            'contact' => 'required|integer|max:12', // Ubah integer menjadi string untuk nomor telepon
            'deskripsi' => 'required|string|max:255',
            // Tambahkan validasi lain jika diperlukan
        ]);
    
        // Simpan data kontak ke dalam database
        Contact::create([
            'user_id' => auth()->id(), // Pastikan pengguna telah terautentikasi
            'username' => $request->username,
            'email' => $request->email,
            'contact' => $request->contact,
            'deskripsi' => $request->deskripsi,
        ]);
    
        // Kembalikan response sukses atau redirect
        return redirect()->route('contact.submit')->with('success', 'Kontak berhasil disimpan!');
    }
    

    public function search(Request $request)
    {
        $query = $request->input('query');
        $datas = properties::where(function ($q) use ($query) {
            $columns = Schema::getColumnListing('properties');
            foreach ($columns as $column) {
                $q->orWhere($column, 'LIKE', "%{$query}%");
            }
        })->get();
        return view('user/properties', compact('datas'));
    }

    //Admin

    public function admin()
    {
        $datas = properties::paginate(10);
        $agens = agen::all();
        $kategoris = kategori::all();
        $users = User::all();
        return view('admin.tables', compact('datas', 'agens', 'kategoris', 'users'));
    }
    public function profile_admin()
    {
        $users = User::all();
        return view('admin.profile', compact('users'));
    }

    public function tables()
    {
        $datas = properties::paginate(10);
        $agens = agen::all();
        $kategoris = kategori::all();
        $users = User::all();
        return view('admin.tables', compact('datas', 'agens', 'kategoris', 'users'));
    }

    // properties
    public function properties()
    {
        $datas = properties::latest()->get();
        $agens = agen::all();
        $kategoris = kategori::all();
        $users = User::all();
        return view('admin.properties.index', compact('datas', 'agens', 'kategoris', 'users'));
    }

    public function form()
    {
        $agens = agen::all();
        $kategoris = kategori::all();
        return view('admin.properties.forms', compact('agens', 'kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari request
        $request->validate([
            'image' => 'required|image',
            'agen_id' => 'required',
            'kategori_id' => 'required',
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'status' => 'required',
            'luas_bangunan' => 'required',
            'luas_tanah' => 'required',
            'fasilitas' => 'nullable|string',
            'sertifikat' => 'nullable|string',
            'alamat' => 'required|string',
            'kota' => 'required|string',
            'tgl_bng' => 'nullable|date',
            'kamar_tidur' => 'nullable|integer',
            'kamar_mandi' => 'nullable|integer',
        ]);

        // Upload gambar
        $imagePath = $request->file('image');
        $imagePath->storeAs('public/properties', $imagePath->hashName());

        // Simpan data ke database
        $property = Properties::create([
            'agen_id' => $request->agen_id,
            'kategori_id' => $request->kategori_id,
            'image' => $imagePath->hashName(),
            'nama' => $request->nama,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
            'luas_bangunan' => $request->luas_bangunan,
            'luas_tanah' => $request->luas_tanah,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'kamar_tidur' => $request->kamar_tidur,
            'kamar_mandi' => $request->kamar_mandi,
        ]);

        // Kembalikan response sukses atau redirect
        return redirect()->route('admin.tables')->with('success', 'Property berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */


    public function show_pro(string $id)
    {
        $property = Properties::findOrFail($id);
        $kategoris = Kategori::all();
        $agens = Agen::all();
        $status = ['disewa', 'dijual', 'tersedia', 'tidak tersedia'];
        return view('admin.properties.show_pro', compact('property', 'kategoris', 'agens', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit_pro(string $id)
    {
        $data = Properties::findOrFail($id);
        $agens = Agen::all();
        $kategoris = Kategori::all();

        return view('admin.properties.edit-pro', compact('data', 'agens', 'kategoris'));
    }

    public function update_pro(Request $request, string $id)
    {
        $property = Properties::findOrFail($id);

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            \Illuminate\Support\Facades\Storage::delete('public/properties/' . $property->image);

            // Upload gambar baru
            $imagePath = $request->file('image');
            $imagePath->storeAs('public/properties', $imagePath->hashName());

            // Update data dengan gambar baru
            $property->update([
                'agen_id' => $request->agen_id,
                'kategori_id' => $request->kategori_id,
                'image' => $imagePath->hashName(),
                'nama' => $request->nama,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
                'status' => $request->status,
                'luas_bangunan' => $request->luas_bangunan,
                'luas_tanah' => $request->luas_tanah,
                'alamat' => $request->alamat,
                'kota' => $request->kota,
                'kamar_tidur' => $request->kamar_tidur,
                'kamar_mandi' => $request->kamar_mandi,
            ]);
        } else {
            // Update data tanpa gambar baru
            $property->update($request->except('image'));
        }

        return redirect()->route('admin.properties.index')->with('success', 'Property berhasil diupdate!');
    }

    public function delete_pro(string $id)
    {
        $property = Properties::findOrFail($id);
        \Illuminate\Support\Facades\Storage::delete('public/properties/' . $property->image);
        $property->delete();
        return redirect()->route('admin.tables')->with('success', 'Property berhasil dihapus!');
    }


    // Agent
    public function agent()
    {
        $agens = agen::all();
        return view('admin.agent.index', compact('agens'));
    }

    public function store_agent(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'name' => 'required|string|max:255',
            'username' => 'required|string',
            'contact' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

// Handling file upload
$imagePath = null; // Inisialisasi variabel untuk gambar

if ($request->hasFile('image')) {
    // Upload gambar
    $imagePath = $request->file('image')->store('public/agens');
}

// Simpan data agen ke dalam database
agen::create([
    'image' => $imagePath ? basename($imagePath) : null, // Simpan nama file gambar
    'name' => $request->name,
    'username' => $request->username,
    'contact' => $request->contact,
    'company' => $request->company,
    'alamat' => $request->alamat,
]);

        return redirect()->route('admin.agent.index')->with('success', 'Agent added successfully.');
    }

    // Method to show the agent form
    public function create()
    {
        return view('admin.agent.create-agent');
    }
    
    public function show_agent(string $id)
    {
        $agent = Agen::findOrFail($id);
        return view('admin.agent.show-agent', compact('agent'));
    }

    public function edit_agent(string $id)
    {
        $agent = Agen::findOrFail($id);
        return view('admin.agent.edit-agent', compact('agent'));
    }

    // public function update(Request $request, $id)
    // {
    //     // Validasi data yang diterima
    //     $request->validate([
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'name' => 'required|string|max:255',
    //         'contact' => 'required|string|max:255',
    //         'alamat' => 'required|string|max:255',
    //         'company' => 'required|string|max:255',
    //     ]);

    //     // Temukan agen berdasarkan ID
    //     $agent = agen::findOrFail($id);

    //     // Jika ada gambar baru yang diunggah, proses unggah gambar
    //     if ($request->hasFile('image')) {
    //         // Hapus gambar lama
    //         \Illuminate\Support\Facades\Storage::delete('public/agens/' . $agent->image);

    //         // Upload gambar baru
    //         $imagePath = $request->file('image');
    //         $imagePath->storeAs('public/properties', $imagePath->hashName());

    //         // Simpan gambar baru dan ambil path-nya
    //         // $imagePath = $request->file('image')->store('images/agens', 'public');
    //         // $agent->image = $imagePath;
    //     }

    //     // Perbarui data agen
    //     $agent->name = $request->name;
    //     $agent->contact = $request->contact;
    //     $agent->alamat = $request->alamat;
    //     $agent->company = $request->company;

    //     // Simpan perubahan
    //     $agent->save();

    //     // Redirect ke halaman yang sesuai dengan pesan sukses
    //     return redirect()->route('admin.agent.index')->with('success', 'Agen berhasil diperbarui!');
    // }

    public function update(Request $request, $id)
{
    // Validasi data yang diterima
    $request->validate([
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'name' => 'required|string|max:255',
        'contact' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'company' => 'required|string|max:255',
    ]);

    // Temukan agen berdasarkan ID
    $agent = agen::findOrFail($id);

    // Jika ada gambar baru yang diunggah, proses unggah gambar
    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($agent->image) {
            \Illuminate\Support\Facades\Storage::delete('public/agens/' . $agent->image);
        }

        // Upload gambar baru dan ambil path-nya
        $imagePath = $request->file('image')->store('public/agens');

        // Simpan nama file gambar baru ke dalam model
        $agent->image = basename($imagePath); // Mengambil hanya nama file
    }

    // Perbarui data agen
    $agent->name = $request->name;
    $agent->contact = $request->contact;
    $agent->alamat = $request->alamat;
    $agent->company = $request->company;

    // Simpan perubahan
    $agent->save();

    // Redirect ke halaman yang sesuai dengan pesan sukses
    return redirect()->route('admin.agent.index')->with('success', 'Agen berhasil diperbarui!');
}


public function delete_agent(string $id)
{
    // Temukan agen berdasarkan ID
    $agent = agen::findOrFail($id);

    // Hapus gambar dari storage jika ada
    if ($agent->image) {
        \Illuminate\Support\Facades\Storage::delete('public/agens/' . $agent->image);
    }

    // Hapus agen
    $agent->delete();

    // Redirect ke daftar agen dengan pesan sukses
    return redirect()->route('admin.agent.index')->with('success', 'Agent berhasil dihapus!');
}


    // Users
    public function users()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function edit_users(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit-user', compact('user'));
    }

    public function update_users(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->level = $request->level;
        $user->save();
        return redirect()->route('admin.users.index')->with('success', 'User berhasil diupdate!');
    }

    public function delete_users(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.users')->with('success', 'User berhasil dihapus!');
    }

    // Kategori
    public function create_kategori()
    {
        return view('admin.kategori.create');
    }

    public function store_kategori(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        return redirect()->route('admin.index')->with('success', 'Kategori berhasil dibuat!');
    }

    public function delete_kategori(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->route('admin.index')->with('success', 'Kategori berhasil dihapus!');
    }

    function update_kategori(Request $request, string $id   )
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        return redirect()->route('admin.index')->with('success', 'Kategori berhasil diupdate!');
    }
}
