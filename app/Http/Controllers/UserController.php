<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    //
    public function register(Request $request) {
        if(!((empty($request->username) || empty($request->email) || empty($request->password) || empty($request->password_repeat)))) {
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
                    session(['basket' => array()]);
                    return redirect('/');
                }
            } 
            return view("error", ['content' => "Błędne dane logowania"]);
        } else {
            return view("error", ['content' => "Nie wypełniono wszystkich pól!"]);
        }
    }

    
    public function delete_account_page() {
        $previousURL = explode('/', url()->previous()); 
        if($previousURL[array_key_last($previousURL)] == "user") {
            return view("delete");
        } else {
            return redirect('/user');
        }
    }
    public function delete_account() {
        $user = session('user');
        DB::table('uzytkownicy')->where('login', $user)->delete();
        session()->flush();
        return redirect('/login');
    }

    public function change_password(Request $request) {
        error_log(empty($request->actual_password));
        error_log(empty($request->password));
        error_log(empty($request->password_repeat));
        if(!(empty($request->actual_password) || empty($request->password) || empty($request->password_repeat))) {
            if($request->password == $request->password_repeat) {
                if(password_verify($request->actual_password, (DB::table('uzytkownicy')->where('login', session('user'))->first())->haslo)) {
                    DB::table('uzytkownicy')->where('login', session('user'))->update(['haslo' => password_hash($request->password, PASSWORD_DEFAULT)]);
                }
            } else {
                return view("error", ['content' => "Źle powtórzone hasło!"]);
            }
        } else {
            return view("error", ['content' => "Nie wypełniono wszystkich pól!"]);
        }
        return redirect('/user');
    }

    public function logout() {
        session()->flush();
        return redirect('/login');
    }
}
