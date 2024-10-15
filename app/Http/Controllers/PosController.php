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
        $datas = properties::all();
        return view('admin.tables', compact('datas'));
    }
    public function profile_admin()
    {
        $users = User::all();
        return view('admin.profile', compact('users')); // Pastikan 'users' sudah didefinisikan
    }
    public function tables()
    {
        $datas = properties::all();
        return view('admin.tables', compact('datas'));
    }
    public function form()
    {
        $agens = agen::all();
        $kategoris = kategori::all();
        return view('admin.forms', compact('agens', 'kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
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
            'agen_id' => 'required|exists:agens,agen_id',  // Pastikan agen_id ada di tabel agens
            'kategori_id' => 'required|exists:kategoris,id',  // Pastikan kategori_id ada di tabel kategoris
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file image
            'name' => 'required|string|max:255',
            'harga' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'status' => 'required',
        ]);

        // Upload gambar
        $imagePath = $request->file('image')->store('images/properties', 'public');

        // Simpan data ke database
        $property = Properties::create([
            'agen_id' => $request->agen_id,
            'kategori_id' => $request->kategori_id,
            'image' => $imagePath,
            'name' => $request->nama,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
        ]);

        // Kembalikan response sukses atau redirect
        return redirect()->route('admin.index')->with('success', 'Property berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
