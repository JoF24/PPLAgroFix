<?php

namespace App\Http\Controllers;

use App\Models\sertifikasi;
use Illuminate\Http\Request;

class sertifikasi_petaniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->session()->has('user')) {
            // Jika ada data pengguna dalam session, ambil informasi pengguna
            $user = $request->session()->get('user');
            $tampilkan = sertifikasi::where('nama_petani', $user->nama)->get();
            return view('sertifikasi_petani', compact('user', 'tampilkan'));
        } else {
            // Jika tidak ada data pengguna dalam session, redirect ke halaman login
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }
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
