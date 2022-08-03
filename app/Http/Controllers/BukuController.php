<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataBuku;

class BukuController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    protected function index(){
        $batas = 5;
        $jumlah_buku = DataBuku::count();
        $data_buku = DataBuku::orderBy('id', 'asc')->simplepaginate($batas);
        $no = 0;
        return view('buku.index', compact('data_buku', 'no', 'jumlah_buku'));
    }

    protected function create(){
        $list_buku = DataBuku::pluck('judul_buku', 'id');
        return view('buku.create', compact('list_buku'));
    }

    public function store(Request $request){
        $buku = new Databuku;
        $buku->kode_buku = $request->kode_buku;
        $buku->judul_buku = $request->judul_buku;
        $buku->jumlah_halaman = $request->jumlah_halaman;
        $buku->ISBN = $request->ISBN;
        $buku->pengarang = $request->pengarang;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->save();

        
        return redirect('buku');
    }

    public function edit($id){
        $buku = DataBuku::find($id);
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, $id){
        $buku = DataBuku::find($id);

        $buku->kode_buku = $request->kode_buku;
        $buku->judul_buku = $request->judul_buku;
        $buku->jumlah_halaman = $request->jumlah_halaman;
        $buku->ISBN = $request->ISBN;
        $buku->pengarang = $request->pengarang;
        $buku->tahun_terbit = $request->tahun_terbit;
        $user->update();

        return redirect('buku');
    }

    public function destroy($id){
        $buku = DataBuku::find($id);
        $buku->delete();
        return redirect('buku');
    }
}