<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinasi;
use App\Models\Kategori;
use App\Models\Penawaran;
use App\Models\ServiceRequest;

use Session;

class WecomeseeAPIController extends Controller
{
    public function destinasi(){
        return response()->json([
            'message'   => 'success',
            'data'      => Destinasi::all()
        ], 200);
    }

    public function detail($id){
        return response()->json([
            'message'   => 'success',
            'data'      => Destinasi::find($id)
        ], 200);
    }

    public function rekomendasi($id){
        $collection = Destinasi::select('nama_kategori')->where('id', $id)->get();
        $koleksi = $collection->toArray();
        $kategori = $koleksi[0]['nama_kategori'];
        $result = Destinasi::all()->where('nama_kategori', '=', ''.$kategori.'')->where('id', '!=', $id);
        return response()->json([
            'message'   => 'success',
            'data'      => $result
        ], 200);
    }

    public function kategori(){
        return response()->json([
            'message'   => 'success',
            'data'      => Kategori::all()
        ], 200);
    }

    public function penawaran(){
        return response()->json([
            'message'   => 'success',
            'data'      => Penawaran::all()
        ], 200);
    }

    public function service(){
        return response()->json([
            'message'   => 'success',
            'data'      => ServiceRequest::all()
        ], 200);
    }

    public function filter(string $kecamatan, string $kategori)
    {
        if($kategori == ''){
            $kategori = NULL;
        }

        $hasil = Destinasi::where('nama_kecamatan', $kecamatan)->orWhere('nama_kategori', $kategori)->get();
        $koleksi = $hasil->toArray();

          
        return response()->json([
            'message'   => 'success',
            'data'      => $koleksi
        ], 200);
    }

    public function search(string $destinasi)
    {
        if($destinasi == ''){
            $destinasi = NULL;
        }

        $hasil = Destinasi::where('nama_destinasi', $destinasi)->orWhere('nama_kategori', $destinasi)->get();
        $koleksi = $hasil->toArray();

          
        return response()->json([
            'message'   => 'success',
            'data'      => $koleksi
        ], 200);
    }

    public function search_kategori(string $destinasi)
    {
        if($destinasi == ''){
            $destinasi = NULL;
        }

        $hasil = Destinasi::where('nama_kategori', $destinasi)->get();
        $koleksi = $hasil->toArray();

          
        return response()->json([
            'message'   => 'success',
            'data'      => $koleksi
        ], 200);
    }

    public function search_kecamatan(string $destinasi)
    {
        if($destinasi == ''){
            $destinasi = NULL;
        }

        $hasil = Destinasi::where('nama_kecamatan', $destinasi)->get();
        $koleksi = $hasil->toArray();

          
        return response()->json([
            'message'   => 'success',
            'data'      => $koleksi
        ], 200);
    }
}
