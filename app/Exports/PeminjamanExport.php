<?php

namespace App\Exports;
use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PeminjamanExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $search = request('search');
        if ($search) {
            $peminjaman = Peminjaman::with('user', 'buku')->where('tanggal_peminjaman', 'LIKE', '%' . $search . '%')
                ->orWhere('status_peminjaman', 'LIKE', '%' . $search . '%')
                ->orWhere('tanggal_pengembalian', 'LIKE', '%' . $search . '%')
                ->get();
            if(count($peminjaman) == 0){
                $user = User::where('nama', 'LIKE', '%'. $search. '%')->first('id');
                if(!$user){
                    $book = Buku::where('judul', 'LIKE', '%'. $search .'%')->first('id');
                    if($book){
                        $peminjaman = Peminjaman::with('user', 'buku')->where('buku_id', $book['id'])->get();
                    }
                }else{
                    $peminjaman = Peminjaman::with('user', 'buku')->where('user_id', $user['id'])->get();
                }
            }

            // Export search results to Excel
            
        } else {
            $peminjaman = Peminjaman::with('user', 'buku')->get();
        }

        return view('excel.excel', ['peminjaman' => $peminjaman]);
    }
}
