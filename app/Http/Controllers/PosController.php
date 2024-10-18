<?php

namespace App\Http\Controllers;

use App\Models\agen;
use App\Models\kategori;
use App\Models\User;
use App\Models\properties;


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
        return view('user/properties');
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
    
    // form property
    public function form()
    {
        $agens = agen::all();
        $kategoris = kategori::all();
        return view('admin.forms', compact('agens', 'kategoris'));
    }

    public function create()
    {
        //
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
            'deskripsi' => 'nullable|string',
            'status' => 'required',
            'luas_bangunan' => 'required',
            'luas_tanah' => 'required',
            'fasilitas' => 'nullable|string',
            'sertifikat' => 'nullable|string',
            'alamat' => 'required|string',
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
            'fasilitas' => $request->fasilitas,
            'alamat' => $request->alamat,
            'kamar_tidur' => $request->kamar_tidur,
            'kamar_mandi' => $request->kamar_mandi,
        ]);

        // Kembalikan response sukses atau redirect
        return redirect()->route('admin.index')->with('success', 'Property berhasil ditambahkan!');
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
    return view('admin.show_pro', compact('property', 'kategoris', 'agens', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit_pro(string $id)
    {
    $property = Properties::findOrFail($id);
    $agens = Agen::all();
    $kategoris = Kategori::all();

    return view('admin.edit_pro', compact('property', 'agens', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete_pro(string $id)
    {
        $property = Properties::findOrFail($id);
        \Illuminate\Support\Facades\Storage::delete('public/properties/' . $property->image);
        $property->delete();
        return redirect()->route('admin.index')->with('success', 'Property berhasil dihapus!');
    }
}
