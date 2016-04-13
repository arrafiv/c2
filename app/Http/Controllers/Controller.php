<?php

namespace App\Http\Controllers;
require '../vendor/autoload.php';
use SSO\SSO;
use DB;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function loginredirect()
    {
        SSO::authenticate();
        if (true){
            return view('action.home');
        }
    }
    public function logout()
    {
        SSO::logout();
        return view('login');
    }

    public function createizin(Request $kegiatan)
    {
        //$input = Input::all();
            // $data = array (
            // 'namakegiatan' => Input::get('namakegiatan'),
            // 'penyelenggara' => Input::get('penyelenggara'),
            // 'tglmulai' => Input::get('tglmulai'),
            // 'tglselesai' => Input::get('tglselesai'),
            // 'desckegiatan' => Input::get('desckegiatan'),
            // 'email' => Input::get('email'),
            // 'telepon' => Input::get('telepon'),
            // );

        $bol = SSO::authenticate();
        $user = SSO::getUser();
        $usernameSSO  = $user->username;
        $input = $kegiatan->all();
        $nama_kegiatan=$input['nama'];
        $penyelenggara=$input['penyelenggara'];
        $tanggal_mulai_kegiatan=$input['tanggal_mulai_kegiatan'];
        $tanggal_selesai_kegiatan=$input['tanggal_selesai_kegiatan'];
        $deskripsi=$input['deskripsi'];
        $email=$input['email'];
        $telepon=$input['no_hp'];

        // $validasi = array(
        //     'nama_kegiatan' => 'required|min:5',
        //     'penyelenggara' => 'required',
        //     'tanggal_mulai_kegiatan' => 'required',
        //     'tanggal_selesai_kegiatan' => 'required',
        //     'deskripsi' => 'required',
        // );

        // $pesan = array (

        //     )

        // $validasi = Validator::make($input, $aturan, $pesan);

        // if($validasi-> fails()) {
        //     return Redirect::back()->withErrors($validasi)->withInput();
        // }

        DB::table('kegiatans')->insert(['nama_kegiatan' => $nama_kegiatan, 'penyelenggara' => $penyelenggara, 'tanggal_mulai_kegiatan' => $tanggal_mulai_kegiatan, 'tanggal_selesai_kegiatan' => $tanggal_selesai_kegiatan, 'deskripsi' => $deskripsi, 'email' => $email, 'no_hp' => $telepon, 'username' => $usernameSSO, 'status' => "Belum Diproses"]); //terusin
        return view ('action/pengajuanijin/create');
    }

    public function getCreateIzin() 
    {
        return view ('action/pengajuanijin/create');
    }
    
}