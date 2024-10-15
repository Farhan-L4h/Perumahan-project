<?php

namespace App\Http\Controllers;

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

    

    public function profile_admin() {
        $users = User::all();
        return view('admin.profile', compact('users'));
    }
    public function table() {
        
        return view('admin.tables');
    }
    public function form() {
        
        return view('admin.forms');
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
        //
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
