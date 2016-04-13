<?php

namespace App\Http\Controllers;
require '../vendor/autoload.php';
use SSO\SSO;
use App\users;
use DB;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function loginredirect()
    {
        $bol = SSO::authenticate();
        $user = SSO::getUser();
        $usernameSSO  = $user->username;
        $nameSSO  = $user->name;
        $roleSSO  = $user->role;
        
        $result = DB::table('users')->where('username', '=', $usernameSSO)->count();
        
        if ($bol == true){
            if($result == 0)
            {
                $newUser = new users;
                $newUser->username = $usernameSSO;
                $newUser->nama = $nameSSO;
                $newUser->role = $roleSSO;
                $newUser->save();
            }
            return view('action.home');
        }
    }
    
    public function logout()
    {
        SSO::logout();
        return view('login');
    }

    public function getdaftarizin()
    {
        $daftarizin = DB::table('kegiatans')->get();
        return view('action.pengajuanijin.daftarizin', compact('daftarizin'));
    }
    
    
    
}