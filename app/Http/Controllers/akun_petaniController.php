<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class akun_petaniController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('user')) {
            // Jika ada data pengguna dalam session, ambil informasi pengguna
            $user = $request->session()->get('user');
            $data = $_GET['data'];
            if ($data === 'petani_fasilitator') {
                $tampilkan = User::where('role', 'Fasilitator')->get();
                return view('akun_petani', compact('user','data', 'tampilkan'));
            } else {
                $tampilkan = User::where('username', $data)->first();
                return view('akun_petani', compact('user','data', 'tampilkan'));
            }
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
