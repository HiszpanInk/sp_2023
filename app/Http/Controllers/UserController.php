<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    //
    public function register(Request $request) {
        if(!(empty($request->username) || empty($request->email) || empty($request->password) || empty($request->password_repeat))) {
            if($request->password == $request->password_repeat) {
                DB::table('uzytkownicy')->insert([
                    'login' => $request->username,
                    'email' => $request->email,
                    'haslo' => password_hash($request->password, PASSWORD_DEFAULT),
                ]);
                return redirect('/login');
            } else {
                return view("error", ['content' => "Źle powtórzone hasło!"]);
            }
        } else {
            return view("error", ['content' => "Nie wypełniono wszystkich pól!"]);
        }
    }
    public function login(Request $request) {
        if(!(empty($request->username) || empty($request->password))) {
            $user = DB::table('uzytkownicy')->where('login', $request->username)->first();
            if($user != false) {
                if(password_verify($request->password, $user->haslo)) {
                    session(['user' => $user->login]);
                    return redirect('/');
                }
            } 
            return view("error", ['content' => "Błędne dane logowania"]);
        } else {
            return view("error", ['content' => "Nie wypełniono wszystkich pól!"]);
        }
    }
    public function logout() {
        session()->flush();
        return redirect('/login');
    }
}
