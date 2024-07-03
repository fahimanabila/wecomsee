<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Peminjaman;
use App\Models\DataPeminjam;
use App\Models\DataBuku;

use Session;

class PeminjamanController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $jumlah_peminjaman = Peminjaman::count();
        $data_peminjaman = Peminjaman::orderBy('id', 'asc')->paginate(5);
        $no = 0;
        return view('peminjaman.index', compact('data_peminjaman', 'jumlah_peminjaman'));
    }

    public function create(){
        $list_data_peminjam = DataPeminjam::pluck('nama_peminjam', 'id');
        $list_data_buku = DataBuku::pluck('judul_buku', 'id');
        return view('peminjaman.create', compact('list_data_peminjam', 'list_data_buku'));
    }

    public function store( Request $request){
        $this->validate($request, [
            'kode_transaksi' => 'required|string',
            'id_peminjam' => 'required|int',
            'id_buku' => 'required|int',
            'tgl_peminjaman' => 'required|date',
            'tgl_pengembalian' => 'required|date'
        ]);

        $p = new Peminjaman;
        $p->kode_transaksi = $request->kode_transaksi;
        $p->id_peminjam = $request->id_peminjam;
        $p->id_buku = $request->id_buku;
        $p->tgl_peminjaman = $request->tgl_peminjaman;
        $p->tgl_pengembalian = $request->tgl_pengembalian;
        $p->save();

        Session::flash('flash_message', 'Data transaksi peminjaman berhasil disimpan');

        return redirect('peminjaman');
    }

    public function detail_peminjam($id){
        $halaman = 'data_peminjams';
        $data_peminjam = DataPeminjam::findOrFail($id);
        return view('peminjaman.detail_peminjam', compact('halaman', 'data_peminjam'));
    }

    public function detail_buku($id){
        $halaman = 'data_buku';
        $data_buku = DataBuku::findOrFail($id);
        return view('peminjaman.detail_buku', compact('halaman', 'data_buku'));
    }

    public function search(Request $request){
        $batas = 5;
        $cari = $request->kata;
        $jumlah_peminjaman = Peminjaman::count();
        $data_peminjaman = Peminjaman::where('kode_transaksi', 'like', '%'.$cari.'%')->paginate($batas);
        $no = $batas * ($data_peminjaman->currentPage() - 1 );
        return view('peminjaman.search', compact('data_peminjaman', 'no', 'cari', 'jumlah_peminjaman'));
    }
}
