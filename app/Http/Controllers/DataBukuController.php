<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataBuku;

use Session;

class DataBukuController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $jumlah_buku = DataBuku::count();
        $data_buku = DataBuku::orderBy('id', 'asc')->paginate(5);
        $no = 0;
        return view('data_buku.index', compact('data_buku', 'jumlah_buku', 'no'));
    }

    public function create(){
        return view('data_buku.create');
    }

    public function store(Request $request){

        $this->validate($request, [
            'kode_buku' => 'required|string',
            'judul_buku' => 'required|string|max:30',
            'isbn' => 'required|string'
        ]);

        $data_buku = new DataBuku;
        $data_buku->kode_buku = $request->kode_buku;
        $data_buku->judul_buku = $request->judul_buku;
        $data_buku->jumlah_halaman = $request->jumlah_halaman;
        $data_buku->isbn = $request->isbn;
        $data_buku->pengarang = $request->pengarang;
        $data_buku->tahun_penerbit = $request->tahun_penerbit;
        $data_buku->save();

        Session::flash('flash_message', 'Data buku berhasil disimpan');

        return redirect('data_buku');
    }

    public function edit($id){
        $buku = DataBuku::find($id);
        
        return view('data_buku.edit', compact('buku'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'kode_buku' => 'required|string',
            'judul_buku' => 'required|string|max:30',
            'isbn' => 'required|string'
        ]);

        $data_buku = DataBuku::find($id);
        $data_buku->kode_buku = $request->kode_buku;
        $data_buku->judul_buku = $request->judul_buku;
        $data_buku->jumlah_halaman = $request->jumlah_halaman;
        $data_buku->isbn = $request->isbn;
        $data_buku->pengarang = $request->pengarang;
        $data_buku->tahun_penerbit = $request->tahun_penerbit;
        $data_buku->update();

        Session::flash('flash_message', 'Data buku berhasil diupdate');

        return redirect('data_buku');
    }

    public function destroy($id){
        $data_buku = DataBuku::find($id);
        $data_buku->delete();

        Session::flash('flash_message', 'Data buku berhasil dihapus');
        Session::flash('penting', true);

        return redirect('data_buku');
    }

    public function search(Request $request){
        $batas = 5;
        $cari = $request->kata;
        $jumlah_buku = DataBuku::count();
        $data_buku = DataBuku::where('judul_buku', 'like', '%'.$cari.'%')->paginate($batas);
        $no = $batas * ($data_buku->currentPage() - 1 );
        return view('data_buku.search', compact('data_buku', 'no', 'cari', 'jumlah_buku'));
    }
}
