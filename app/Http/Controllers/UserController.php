<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

use App\Models\JenisKelamin;

use App\Models\DataPeminjam;

use App\Models\Pengajuan;

use Session;

use Storage;

class UserController extends Controller
{
    public function __construct(){
    }
    
    protected function index(){
        $this->middleware('auth');
        $this->middleware('admin');
        $batas = 10;
        $jumlah_user = User::count();
        $user = User::orderBy('id', 'asc')->paginate($batas);
        $no = 0;
        return view('user.index', compact('user', 'no', 'jumlah_user'));
    }

    protected function create(){
        $this->middleware('auth');
        $this->middleware('admin');
        return view('user.create');
    }

    public function send_register(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = 'peminjam';
        $user->save();

        return redirect('login_user');
    }

    public function pengajuan(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'identitas_ktp' => ['required', 'string', 'max:16'],
            'kota_domisili' => ['required', 'string']
        ]);

        $a = new Pengajuan;
        $a->username = $request->name;
        $a->email = $request->email;
        $a->identitas_ktp = $request->identitas_ktp;
        $a->kota_domisili = $request->kota_domisili;
        $a->save();

        Session::flash('flash_message', 'Pengajuan terkirim! Email akan masuk setelah Admin mengkonfirmasi pengajuanmu');

        return redirect('register_user');
    }

    public function store(Request $request){
        
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->save();
    
        Session::flash('flash_message', 'Data user berhasil disimpan');
        return redirect('data_user');
        
    }

    public function edit($id){
        $this->middleware('auth');
        $this->middleware('admin');
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id){

        $user = User::find($id);
        if ($request->has('password')){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->level = $request->level;
            $user->password = Hash::make($request->password);
            $user->update();
        }else{
            $user->name = $request->name;
            $user->email = $request->email;
            $user->level = $request->level;
            $user->update();
        }

        Session::flash('flash_message', 'Data user berhasil diedit');
        return redirect('data_user');
    }

    public function destroy($id){
        
        $user = User::find($id);
        $user->delete();

        Session::flash('flash_message', 'Data user berhasil dihapus');
        Session::flash('penting', true);

        return redirect('data_user');
    }

    public function search(Request $request){
        $batas = 5;
        $cari = $request->kata;
        $jumlah_user = User::count();
        $user = User::where('name', 'like', '%'.$cari.'%')->paginate($batas);
        $no = $batas * ($user->currentPage() - 1 );
        return view('data_user.search', compact('user', 'no', 'cari', 'jumlah_user'));
    }
}
