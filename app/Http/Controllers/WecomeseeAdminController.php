<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinasi;
use App\Models\Kategori;
use App\Models\ServiceRequest;
use App\Models\Penawaran;
use App\Models\Pengajuan;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Session;

class WecomeseeAdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $jumlah_destinasi = Destinasi::count();
        $data_destinasi = Destinasi::orderBy('id', 'asc')->paginate(0);
        return view('wecomesee_admin.destinasi.index', compact('data_destinasi', 'jumlah_destinasi'));
    }

    public function create(){
        $kategori = Kategori::where('flag', 'LIKE', '%Y%')->pluck('nama', 'id');
        return view('wecomesee_admin.destinasi.create', compact('kategori'));
    }

    public function store(Request $request){

        $this->validate($request, [
            'nama_destinasi' => 'required|string',
            'nama_kelurahan' => 'required|string|max:30',
            'nama_kecamatan' => 'required|string',
            'maps' => 'required|string',
            'alamat' => 'required|string',
            'deskripsi' => 'required|string',
            'deskripsi_singkat' => 'required|string'
        ]);

        $this->validate($request, [
            'foto_slider' => 'required|image|mimes:jpeg,jpg,png,svg',
            'foto_sampul' => 'required|image|mimes:jpeg,jpg,png,svg',
            'foto_child1' => 'required|image|mimes:jpeg,jpg,png,svg',
            'foto_child2' => 'required|image|mimes:jpeg,jpg,png,svg',
            'foto_child3' => 'required|image|mimes:jpeg,jpg,png,svg',
        ]);

        $foto_slider = $request->foto_slider;
        $nama_file1 = time().'fotoslider.'.$foto_slider->getClientOriginalExtension();
        $foto_slider->move('ww/img/', $nama_file1);

        $foto_sampul = $request->foto_sampul;
        $nama_file2 = time().'fotosampul.'.$foto_sampul->getClientOriginalExtension();
        $foto_sampul->move('ww/img/', $nama_file2);

        $foto_child1 = $request->foto_child1;
        $nama_file3 = time().'fotochild1.'.$foto_child1->getClientOriginalExtension();
        $foto_child1->move('ww/img/', $nama_file3);

        $foto_child2 = $request->foto_child2;
        $nama_file4 = time().'fotochild2.'.$foto_child2->getClientOriginalExtension();
        $foto_child2->move('ww/img/', $nama_file4);

        $foto_child3 = $request->foto_child3;
        $nama_file5 = time().'fotochild3.'.$foto_child3->getClientOriginalExtension();
        $foto_child3->move('ww/img/', $nama_file5);

        $data_destinasi = new Destinasi;
        $data_destinasi->nama_destinasi = $request->nama_destinasi;
        $data_destinasi->nama_alias = $request->nama_alias;
        $data_destinasi->nama_kelurahan = $request->nama_kelurahan;
        $data_destinasi->nama_kecamatan = $request->nama_kecamatan;
        $data_destinasi->alamat = $request->alamat;
        $data_destinasi->maps = $request->maps;
        $data_destinasi->nama_kategori = $request->nama_kategori;
        $data_destinasi->deskripsi = $request->deskripsi;
        $data_destinasi->deskripsi_singkat = $request->deskripsi_singkat;
        $data_destinasi->foto_slider = $nama_file1;
        $data_destinasi->foto_sampul = $nama_file2;
        $data_destinasi->foto_child1 = $nama_file3;
        $data_destinasi->foto_child2 = $nama_file4;
        $data_destinasi->foto_child3 = $nama_file5;
        $data_destinasi->range_harga = $request->range_harga;

        $data_destinasi->save();

        Session::flash('flash_message', 'Data destinasi berhasil disimpan');

        return redirect('data_destinasi');
    }

    public function edit($id){
        $data = Destinasi::find($id);
        $kategori = Kategori::pluck('nama', 'id');
        
        return view('wecomesee_admin.destinasi.edit', compact('data', 'kategori'));
    }

    public function update(Request $request, $id){
        $data_destinasi = Destinasi::find($id);

        $this->validate($request, [
            'nama_destinasi' => 'required|string',
            'nama_kelurahan' => 'required|string|max:30',
            'nama_kecamatan' => 'required|string',
            'maps' => 'required|string',
            'alamat' => 'required|string',
            'deskripsi' => 'required|string',
            'deskripsi_singkat' => 'required|string'
        ]);

        if ($request->has('foto_slider')){

            $foto_slider = $request->foto_slider;
            $nama_file1 = time().'fotoslider.'.$foto_slider->getClientOriginalExtension();
            $foto_slider->move('ww/img/', $nama_file1);

            $data_destinasi->foto_slider = $nama_file1;
            $data_destinasi->update();
        }else{
            $data_destinasi->nama_destinasi = $request->nama_destinasi;
            $data_destinasi->nama_alias = $request->nama_alias;
            $data_destinasi->nama_kelurahan = $request->nama_kelurahan;
            $data_destinasi->nama_kecamatan = $request->nama_kecamatan;
            $data_destinasi->alamat = $request->alamat;
            $data_destinasi->maps = $request->maps;
            $data_destinasi->nama_kategori = $request->nama_kategori;
            $data_destinasi->deskripsi = $request->deskripsi;
            $data_destinasi->deskripsi_singkat = $request->deskripsi_singkat;
            $data_destinasi->range_harga = $request->range_harga;
            $data_destinasi->update();
        }

        if ($request->has('foto_sampul')){

            $foto_sampul = $request->foto_sampul;
            $nama_file2 = time().'fotosampul.'.$foto_sampul->getClientOriginalExtension();
            $foto_sampul->move('ww/img/', $nama_file2);

            $data_destinasi->foto_sampul = $nama_file2;
            $data_destinasi->update();
        }else{
            $data_destinasi->nama_destinasi = $request->nama_destinasi;
            $data_destinasi->nama_alias = $request->nama_alias;
            $data_destinasi->nama_kelurahan = $request->nama_kelurahan;
            $data_destinasi->nama_kecamatan = $request->nama_kecamatan;
            $data_destinasi->alamat = $request->alamat;
            $data_destinasi->maps = $request->maps;
            $data_destinasi->nama_kategori = $request->nama_kategori;
            $data_destinasi->deskripsi = $request->deskripsi;
            $data_destinasi->deskripsi_singkat = $request->deskripsi_singkat;
            $data_destinasi->range_harga = $request->range_harga;
            $data_destinasi->update();
        }

        if ($request->has('foto_child1')){

            $foto_child1 = $request->foto_child1;
            $nama_file3 = time().'fotochild1.'.$foto_child1->getClientOriginalExtension();
            $foto_child1->move('ww/img/', $nama_file3);

            $data_destinasi->foto_child1 = $nama_file3;
            $data_destinasi->update();
        }else{
            $data_destinasi->nama_destinasi = $request->nama_destinasi;
            $data_destinasi->nama_alias = $request->nama_alias;
            $data_destinasi->nama_kelurahan = $request->nama_kelurahan;
            $data_destinasi->nama_kecamatan = $request->nama_kecamatan;
            $data_destinasi->alamat = $request->alamat;
            $data_destinasi->maps = $request->maps;
            $data_destinasi->nama_kategori = $request->nama_kategori;
            $data_destinasi->deskripsi = $request->deskripsi;
            $data_destinasi->deskripsi_singkat = $request->deskripsi_singkat;
            $data_destinasi->range_harga = $request->range_harga;
            $data_destinasi->update();
        }

        if ($request->has('foto_child2')){

            $foto_child2 = $request->foto_child2;
            $nama_file4 = time().'fotochild2.'.$foto_child2->getClientOriginalExtension();
            $foto_child2->move('ww/img/', $nama_file4);

            $data_destinasi->foto_child2 = $nama_file4;
            $data_destinasi->update();
        }else{
            $data_destinasi->nama_destinasi = $request->nama_destinasi;
            $data_destinasi->nama_alias = $request->nama_alias;
            $data_destinasi->nama_kelurahan = $request->nama_kelurahan;
            $data_destinasi->nama_kecamatan = $request->nama_kecamatan;
            $data_destinasi->alamat = $request->alamat;
            $data_destinasi->maps = $request->maps;
            $data_destinasi->nama_kategori = $request->nama_kategori;
            $data_destinasi->deskripsi = $request->deskripsi;
            $data_destinasi->deskripsi_singkat = $request->deskripsi_singkat;
            $data_destinasi->range_harga = $request->range_harga;
            $data_destinasi->update();
        }

        if ($request->has('foto_child3')){

            $foto_child3 = $request->foto_child3;
            $nama_file5 = time().'fotochild3.'.$foto_child3->getClientOriginalExtension();
            $foto_child3->move('ww/img/', $nama_file5);

            $data_destinasi->foto_child3 = $nama_file5;
            $data_destinasi->update();
        }else{
            $data_destinasi->nama_destinasi = $request->nama_destinasi;
            $data_destinasi->nama_alias = $request->nama_alias;
            $data_destinasi->nama_kelurahan = $request->nama_kelurahan;
            $data_destinasi->nama_kecamatan = $request->nama_kecamatan;
            $data_destinasi->alamat = $request->alamat;
            $data_destinasi->maps = $request->maps;
            $data_destinasi->nama_kategori = $request->nama_kategori;
            $data_destinasi->deskripsi = $request->deskripsi;
            $data_destinasi->deskripsi_singkat = $request->deskripsi_singkat;
            $data_destinasi->range_harga = $request->range_harga;
            $data_destinasi->update();
        }

        Session::flash('flash_message', 'Data destinasi berhasil diupdate');

        return redirect('data_destinasi');
    }

    public function destroy($id){
        $data_destinasi = Destinasi::find($id);
        $data_destinasi->delete();

        Session::flash('flash_message', 'Data buku berhasil dihapus');
        Session::flash('penting', true);

        return redirect('data_destinasi');
    }

    public function search(Request $request){
        $batas = 5;
        $cari = $request->kata;
        $jumlah_destinasi = Destinasi::count();
        $data_destinasi = Destinasi::where('nama_destinasi', 'like', '%'.$cari.'%')->paginate($batas);
        $no = $batas * ($data_destinasi->currentPage() - 1 );
        return view('wecomesee_admin.destinasi.search', compact('data_destinasi', 'no', 'cari', 'jumlah_destinasi'));
    }

    // KATEGORI

    public function index_kategori(){
        $jumlah_kategori = Kategori::count();
        $data_kategori = Kategori::orderBy('id', 'asc')->paginate(0);
        return view('wecomesee_admin.kategori.index', compact('data_kategori', 'jumlah_kategori'));
    }

    public function create_kategori(){
        return view('wecomesee_admin.kategori.create');
    }

    public function store_kategori(Request $request){

        $this->validate($request, [
            'nama' => 'required|string',
            'flag' => 'required|string'
        ]);

        $data_kategori = new Kategori;
        $data_kategori->nama = $request->nama;
        $data_kategori->flag = $request->flag;
        $data_kategori->save();

        Session::flash('flash_message', 'Data kategori berhasil disimpan');

        return redirect('data_kategori');
    }

    public function edit_kategori($id){
        $data = Kategori::find($id);

        return view('wecomesee_admin.kategori.edit', compact('data'));
    }

    public function update_kategori(Request $request, $id){
        $data_kategori = Kategori::find($id);

        $this->validate($request, [
            'nama' => 'required|string',
            'flag' => 'required|string'
        ]);

        
        $data_kategori->nama = $request->nama;
        $data_kategori->flag = $request->flag;
        $data_kategori->update();

        Session::flash('flash_message', 'Data kategori berhasil diupdate');

        return redirect('data_kategori');
    }

    public function destroy_kategori($id){
        $data_kategori = Kategori::find($id);
        $data_kategori->delete();

        Session::flash('flash_message', 'Data kategori berhasil dihapus');
        Session::flash('penting', true);

        return redirect('data_kategori');
    }

    public function search_kategori(Request $request){
        $batas = 5;
        $cari = $request->kata;
        $jumlah_kategori = Kategori::count();
        $data_kategori = Kategori::where('nama', 'like', '%'.$cari.'%')->paginate($batas);
        $no = $batas * ($data_kategori->currentPage() - 1 );
        return view('wecomesee_admin.kategori.search', compact('data_kategori', 'no', 'cari', 'jumlah_kategori'));
    }

    //REQUEST

    public function index_request(){
        $jumlah_request = ServiceRequest::count();
        $data_request = ServiceRequest::orderBy('id', 'asc')->paginate(0);
        return view('wecomesee_admin.request.index', compact('data_request', 'jumlah_request'));
    }

    public function create_request(){
        return view('wecomesee_admin.request.create');
    }

    public function store_request(Request $request){

        $this->validate($request, [
            'user_id' => 'required|numeric',
            'service' => 'required|string',
            'note' => 'required|string',
            'email' => 'required|string',
            'nomor_telepon' => 'required|string',
            'nama_pemesan' => 'required|string',
            'nama_bank' => 'required|string',
            'no_rekening' => 'required|string',
            'nominal' => 'required|numeric',
        ]);

        $this->validate($request, [
            'bukti_transfer' => 'required|image|mimes:jpeg,jpg,png,svg',
        ]);

        $bukti_transfer = $request->bukti_transfer;
        $nama_file = time().'bukti_transfer.'.$bukti_transfer->getClientOriginalExtension();
        $bukti_transfer->move('ww/img/', $nama_file);

        $data_request = new ServiceRequest;
        $data_request->user_id = $request->user_id;
        $data_request->service = $request->service;
        $data_request->note = $request->note;
        $data_request->flag = 'P';
        $data_request->email = $request->email;
        $data_request->bukti_transfer = $nama_file;
        $data_request->nomor_telepon = $request->nomor_telepon;
        $data_request->nama_pemesan = $request->nama_pemesan;
        $data_request->nama_bank = $request->nama_bank;
        $data_request->no_rekening = $request->no_rekening;
        $data_request->nominal = $request->nominal;
        $data_request->save();

        Session::flash('flash_message', 'Data request berhasil ditambahkan');

        return redirect('data_request');
    }

    public function terima_request($id){
        $data = ServiceRequest::find($id);
        $data->flag = 'Y';
        $data->update();

        return redirect('https://fahimanabila.com/automatic_email/apiRequestEmail/'.$data->email);
    }

    public function tolak_request($id){
        $data = ServiceRequest::find($id);
        $data->flag = 'N';
        $data->update();

        return redirect('data_request');
    }

    public function search_request(Request $request){
        $batas = 5;
        $cari = $request->kata;
        $jumlah_request = ServiceRequest::count();
        $data_request = ServiceRequest::where('nama_pemesan', 'like', '%'.$cari.'%')->paginate($batas);
        $no = $batas * ($data_request->currentPage() - 1 );
        return view('wecomesee_admin.request.search', compact('data_request', 'no', 'cari', 'jumlah_request'));
    }

    //PENAWARAN

    public function index_penawaran(){
        $jumlah_penawaran = Penawaran::count();
        $data_penawaran = Penawaran::orderBy('id', 'asc')->paginate(0);
        return view('wecomesee_admin.penawaran.index', compact('data_penawaran', 'jumlah_penawaran'));
    }

    public function konfirmasi_penawaran($id){
        $data = Penawaran::find($id);
        $data->flag = 'Y';
        $data->update();

        return redirect('data_penawaran');
    }

    public function search_penawaran(Request $request){
        $batas = 5;
        $cari = $request->kata;
        $jumlah_penawaran = Penawaran::count();
        $data_penawaran = Penawaran::where('email', 'like', '%'.$cari.'%')->paginate($batas);
        $no = $batas * ($data_penawaran->currentPage() - 1 );
        return view('wecomesee_admin.penawaran.search', compact('data_penawaran', 'no', 'cari', 'jumlah_penawaran'));
    }
    
    //PENGAJUAN

    public function index_pengajuan(){
        $jumlah_pengajuan = Pengajuan::count();
        $data_pengajuan = Pengajuan::orderBy('id', 'asc')->paginate(5);
        $no = 0;
        return view('wecomesee_admin.pengajuan.index', compact('no','data_pengajuan', 'jumlah_pengajuan'));
    }

    public function konfirmasi_pengajuan($id){
        

        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        $generated_password = implode($pass); //turn the array into a string

        $data = Pengajuan::find($id);
        $data->flag = 'Y';
        $data->update();

        $user = new User;
        $user->name = $data->username;
        $user->email = $data->email;
        $user->password = Hash::make($generated_password);
        $user->level = 'user';
        $user->save();

        return redirect('https://fahimanabila.com/automatic_email/apiEmail/'.$data->email.'/'.$generated_password);
    }

    public function search_pengajuan(Request $request){
        $batas = 5;
        $cari = $request->kata;
        $jumlah_pengajuan = Pengajuan::count();
        $data_pengajuan = Pengajuan::where('email', 'like', '%'.$cari.'%')->paginate($batas);
        $no = $batas * ($data_pengajuan->currentPage() - 1 );
        return view('wecomesee_admin.pengajuan.search', compact('data_pengajuan', 'no', 'cari', 'jumlah_pengajuan'));
    }
}
