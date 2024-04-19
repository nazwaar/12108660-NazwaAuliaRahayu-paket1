<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Buku;
use Session;

class UserController extends Controller
{
     // tampilan untuk halamaan layouts
     public function home(){
        return view('layouts.master');
    }

    public function petugas(){
        return view('petugas.dashboard-petugas');
    }

    public function peminjam()
    {
        return view('peminjam.dashboard-page');
    }

    // tampilan dashboard admin
    public function adminPage(){
        $buku = Buku::all();
        return view('admin.admin-page', compact('buku'));
    }

    // tampilan create account petugas
    public function createPetugas(){
        return view('petugas.create-petugas');
    }

    public function storePetugas(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
            'alamat' => 'required|string',
            'role' => 'required|in:admin,petugas,peminjam',
        ]);
        User::create([
            'nama' => $validatedData['nama'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'alamat' => $validatedData['alamat'],
            'role' => $validatedData['role'],
        ]);

       return redirect()->route('indexDataPetugas');
    }

    public function updatePetugas(Request $request, $user_id)
    {
        User::where('user_id', $user_id)->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'role' => $request->role,
        ]);

       return redirect()->route('indexDataPetugas');
    }

    public function editPetugas($user_id){
        $data = User::get();
        $data = User::where('id', $user_id)->first();
        return view('petugas.edit-petugas', ['data' => $data]);
    }

    public function deletePetugas($user_id){
        User::where('id', $user_id)->Delete();
        return redirect(route('indexDataPetugas'));
    }

    public function indexDataPetugas(){

        $data = User::all();

        return view('petugas.data-petugas', compact('data'));
    }
}
