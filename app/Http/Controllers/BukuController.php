<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('buku.buku');
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
        $request->validate([
        'judul'=> 'required|string',
        'penulis'=> 'required|string',
        'penerbit'=> 'required|string',
        'tahun_terbit'=> 'required|integer',
        'kategori_id'=> 'required|exists:kategoris, id',
        'cover'=> 'required|image|mimes:jpeg, jpg, png, gift',
        ]);

        $cover = $request->file('cover');

        $imgName = time().rand().'.'.$cover->extension();
        if(!file_exists(public_path('/cover'.$cover->getClientOriginalName()))){
            $destinationPath =  public_path('/cover');
            $cover->move($destinationPath, $imgName);
            $uploaded = $imgName;
        }else {
            $uploaded = $cover->getClientOriginalName();
        }

        $kategori_id = $request->kategori_id ?? null;

        if ($request->has('kategori_id')) {
            $kategori_id = $request->kategori_id;
        } else {
            // Jika 'kategori_id' tidak disertakan, Anda dapat menetapkan nilai default atau menangani kasus ini sesuai kebutuhan Anda
            $kategori_id = null; // Atau nilai default lainnya
        }

        Buku::create([
        'judul' => $request->judul,
        'penulis'=> $request->penulis,
        'penerbit'=> $request->penerbit,
        'tahun_terbit'=> $request->tahun_terbit,
        'kategori_id'=> $request->kategori_id,
        'cover'=> $request->cover,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        //
    }
}
