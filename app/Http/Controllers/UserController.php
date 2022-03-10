<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GlobalPages;
use App\Models\Users;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return view('auth.index');
    }

    public function authenticate(Request $req)
    {
         $credentials = $req->validate([
             'email' => ['required', 'email'],
             'password' => ['required'],
         ]);
        
        $user = Users::where('email', '=', $req->email)->first();

        $email = $req->email;
        $password = $req->password;

        if (Auth::attempt(['email' => $email, 'password' => $password, 'active' => 1])) {
            dd('loguei');
        }else{
            dd('NÃO', (Auth::attempt(['email' => $email, 'password' => $password])));
        }
 
    
    }

    public function register(){
        return view('auth.register');
    }

    public function registerAdd(Request $req){
        
        if($req->admin == null){
            $admin = true;
        }else{
            $admin = false;
        }
        //dd($req, $admin);

        $id = new GlobalPages();
        
        DB::table('users')->insert([
            'id' => $id->uuid4(),
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'admin' => $admin,
            'active' => true,
        ]);
        return view('auth/index');
    }

    
}
