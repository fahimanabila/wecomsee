<?php

namespace App\Http\Controllers;
use App\Models\Destinasi;
use App\Models\Penawaran;
use App\Models\ServiceRequest;


use Illuminate\Http\Request;
use GuzzleHttp\Client;

use Session;

class WecomeseeController extends Controller
{
    public function __construct(){
        // $this->middleware('auth');
    }

    public function index(){

        return view('wecomesee/index');
    }

    public function welcome(){
        return view('wecomesee/index');
    }

    public function login(){
        return view('wecomesee/login');
    }

    public function register(){
        return view('wecomesee/register');
    }

    public function forgot_password(){
        return view('wecomesee/forgot_password');
    }

    public function filter(){
        return view('wecomesee/filter');
    }

    public function detail($id){
        return view('wecomesee/detail', compact('id'));
    }

    public function service(){
        return view('wecomesee/service');
    }

    public function penawaran(Request $request){

        $this->validate($request, [
            'email' => 'required|string',
            'nomor_telepon' => 'required|numeric',
            'nama_lengkap' => 'required|string'
        ]);

        $data_kategori = new Penawaran;
        $data_kategori->email = $request->email;
        $data_kategori->nomor_telepon = $request->nomor_telepon;
        $data_kategori->nama_lengkap = $request->nama_lengkap;
        $data_kategori->timestamp = date('Y-m-d H:i:s');
        $data_kategori->save();

        Session::flash('flash_message', 'Penawaran berhasil terkirim! Tunggu balasan Admin ya!');

        return redirect('/#narahubung');
    }

    public function penawaran2(Request $request){

        $this->validate($request, [
            'email' => 'required|string',
            'nomor_telepon' => 'required|numeric',
            'nama_lengkap' => 'required|string'
        ]);

        $id = $request->id_detail;

        $data_kategori = new Penawaran;
        $data_kategori->email = $request->email;
        $data_kategori->nomor_telepon = $request->nomor_telepon;
        $data_kategori->nama_lengkap = $request->nama_lengkap;
        $data_kategori->timestamp = date('Y-m-d H:i:s');
        $data_kategori->save();

        Session::flash('flash_message', 'Penawaran berhasil terkirim! Tunggu balasan Admin ya!');

        return redirect('detail/'.$id);
    }

    public function submit_service(Request $request){

        $this->validate($request, [
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

        Session::flash('flash_message', 'Request berhasil ditambahkan, mohon tunggu ya!');

        return redirect('service');
    }

    
}
