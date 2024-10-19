<?php

namespace App\Http\Controllers;

use App\Models\agen;
use App\Models\kategori;
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
        $datas = properties::all();
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
        return redirect()->route('admin.properties.tables')->with('success', 'Property berhasil dihapus!');
    }


    // Agent
    public function agent()
    {
        $agens = agen::all();
        return view('admin.agent.index', compact('agens'));
    }

    public function show_agent(string $id)
    {
        $agent = Agen::findOrFail($id);
        return view('admin.agent.show_agent', compact('agent'));
    }

    public function edit_agent(string $id)
    {
        $agent = Agen::findOrFail($id);
        return view('admin.agent.edit_agent', compact('agent'));
    }

    public function delete_agent(string $id)
    {
        $agent = Agen::findOrFail($id);
        $agent->delete();
        return redirect()->route('admin.agent.agent')->with('success', 'Agent berhasil dihapus!');
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
}
