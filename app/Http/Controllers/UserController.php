<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GlobalPages;
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
        // faz validação se o campo está vazio
         $this->validate($req, [
             'email' => 'required',
             'password' => 'required',
         ],[
             'email.required' => 'E-mail é obrigatório',
             'password.required' => 'Senha é obrigatório',
         ]);
        
        //$user = User::where('email', '=', $req->email)->first();

        $email = $req->email;
        $password = $req->password;

        if (Auth::attempt(['email' => $email, 'password' => $password, 'active' => 1])) {
            $req->session()->regenerate();
 
            return redirect()->intended('/home');
        }else{
            return redirect()->back()->with('danger', 'E-mail ou senha inválido!');
        }
    
    }

    public function register(){
        return view('auth.register');
    }

    public function registerAdd(Request $req){
        
        $id = new GlobalPages();
        DB::table('users')->insert([
            'id' => $id->uuid4(),
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'admin' => false,
            'active' => true,
        ]);
        return view('auth/index');
    }

    
}
