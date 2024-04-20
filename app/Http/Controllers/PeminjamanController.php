<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Exports\PeminjamanExport;
// use App\Imports\PeminjamExport;
use App\Models\Peminjaman;
use App\Models\User;
use App\Models\Buku;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class PeminjamanController extends Controller
{
    public function indexBuku()
    {
        $buku = Buku::all();
        return view('peminjam.book-peminjam', compact('buku'));
    }

    public function borrowBook(Request $request, Buku $buku)
    {
        $request->validate([
            'buku_id' => 'required|exists:bukus,id',
        ]);

        if (auth()->check()) {
            Peminjaman::updateOrCreate([
                'user_id' => auth()->id(),
                'buku_id' => $buku->id,
                'tanggal_peminjaman' => now(),
                'tanggal_pengembalian' => now(),
                'status_peminjaman' => 'dipinjam',
            ]);

            return redirect()->back()->with('success', 'Buku berhasil dipinjam.');
        }

        return redirect('/login')->with('accessError', 'Anda harus login terlebih dahulu.');
    }

    public function pengembalian($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        if ($peminjaman->status_peminjaman == 'dipinjam') {
            $batasWaktu = now()->addDays();

            // if (now()->gt($batasWaktu)) {
            //     return redirect()->back()->with('error', 'Maaf, batas waktu pengembalian telah terlampaui.');
            // }
            if (now()->gt($batasWaktu)) {
                // Set session error dengan pesan yang sesuai
                session()->flash('error_' . $id, 'Maaf, batas waktu pengembalian telah terlampaui.');
                return redirect()->back();
            }

            $peminjaman->status_peminjaman = 'sudah dikembalikan';
            $peminjaman->tanggal_pengembalian = now();
            $peminjaman->save();

            return redirect()->back()->with('success', 'Buku berhasil dikembalikan.');
        } else {
            return redirect()->back()->with('error', 'Buku sudah dikembalikan sebelumnya.');
        }
    }

    public function showPeminjaman(Request $request, Buku $buku)
    {
        // $peminjaman = Peminjaman::all();
        // $namecategory = Categories::all();

        if ($request->has('search')) {
            $peminjaman = Peminjaman::where('tanggal_peminjaman', 'LIKE', '%' . $request->search . '%')
                ->orWhere('status_peminjaman', 'LIKE', '%' . $request->search . '%')
                ->orWhere('tanggal_pengembalian', 'LIKE', '%' . $request->search . '%')
                ->get();
            if(count($peminjaman) == 0){
                $user = User::where('nama', 'LIKE', '%'. $request->search. '%')->first('id');
                if(!$user){
                    $book = Buku::where('judul', 'LIKE', '%'. $request->search .'%')->first('id');
                    if($book){
                        $peminjaman = Peminjaman::where('buku_id', $book['id'])->get();
                    }
                }else{
                    $peminjaman = Peminjaman::where('user_id', $user['id'])->get();
                }
            }

            // Export search results to Excel
            
        } else {
            $peminjaman = Peminjaman::all();
        }
        return view('admin.data-laporan', compact('peminjaman'));
        // return view('admin.data-laporan', compact('peminjaman'));
    }

    public function pinjamExcel() 
    {
        // return Excel::download(new BookExport, 'book-list.xlsx');
        return Excel::download(new PeminjamanExport, 'peminjaman.xlsx');
    } 

    public function dataPeminjaman()
    {
        $riwayatPeminjaman = Peminjaman::all();
        return view('peminjam.riwayat-peminjam', compact('riwayatPeminjaman'));
    }

    public function previewPDF(Request $request)
    {
        $keyword = $request->input('keyword');
        $peminjaman = Peminjaman::whereHas('user', function ($query) use ($keyword) {
            $query->where('username', 'like', "%$keyword%");
        })->orWhereHas('buku', function ($query) use ($keyword) {
            $query->where('judul', 'like', "%$keyword%");
        })->orWhere('tanggal_peminjaman', 'like', "%$keyword%")
            ->orWhere('tanggal_pengembalian', 'like', "%$keyword%")
            ->orWhere('status_peminjaman', 'like', "%$keyword%")
            ->get();

        $html = view('admin.data-laporan', compact('peminjaman'))->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return $dompdf->stream('laporan_peminjaman.pdf');
    }
}