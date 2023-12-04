<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function FinaliseOrder() {
        $produkty = json_decode(json_encode(DB::table('produkty')->get(), true));
        $table_content = "";
        $toPay = 0;
        foreach(session('basket') as $row) {
            $toPay += $produkty[$row['product'] - 1]->cena * $row['ammount'];
            $table_content .= "<tr><td><a href='" . route("product", ['id' => $produkty[$row['product'] - 1]->id_produktu]) . "'>" . $produkty[$row['product'] - 1]->nazwa . "</a></td>";
            $table_content .= "<td>" . $row['ammount'] . "</td></tr>";
        }
        $toPay = number_format($toPay, 2);
        return view('finalizacja_zamowienia', ['zawartosc_tabeli' => $table_content, 'cena' => $toPay]);
    }

    public function createOrder(Request $request) {
        $id_user = (DB::table('uzytkownicy')->where('login', session('user'))->first())->id;
        if($request->payment == 'cash') {
            $platnosc = 'gotowka';
            $status = 2;
        } else if ($request->payment == 'transfer') {
            $platnosc = 'przelew';
            $status = 1;
        }

        $id = DB::table('zamowienia')->insertGetId(['id_zu' => $id_user, 'platnosc' => $platnosc, 'dostawa' => $request->delivery, 'status' => $status]);
        foreach(session('basket') as $row) {
            DB::table('zamowieniewp')->insert(['id_zawartoscizamowienia' => $id, 'ilosc_produktow' => $row['ammount'], 'id_produktow' => $row['product']]);
        }
        session(['basket' => array()]);
        return redirect('/');
    }
    public function showOrders() {
        $id_user = (DB::table('uzytkownicy')->where('login', session('user'))->first())->id;
        $zamowienia = array();
        foreach(DB::table('zamowienia')->where('id_zu', $id_user)->get() as $record) {
            $zamowienia[] =  ['tekst' => 'Zamówienie nr  ' . $record->id_zamowienia, 'id' => $record->id_zamowienia, 'status' => $record->status];
        }
        return view('zamowienia', ['zamowienia' => $zamowienia]);
    }
    public function viewOrder(string $id) {
        $produkty_tabela = json_decode(json_encode(DB::table('produkty')->get(), true));
        $zamowienie = DB::table('zamowienia')->where('id_zamowienia', $id)->first();
        $produkty = array();
        $kwota = 0;
        foreach(DB::table('zamowieniewp')->where('id_zawartoscizamowienia', $id)->get() as $record) {
            $produkty[] =  ['id' => $record->id_produktow, 'nazwa' => $produkty_tabela[$record->id_produktow - 1]->nazwa, 'ilosc' => $record->ilosc_produktow];
            $kwota += $record->ilosc_produktow * ($produkty_tabela[$record->id_produktow - 1])->cena;
        }

        return view('zamowienie', ['id' => $id, 'status' => $zamowienie->status, 'dostawa' => $zamowienie->dostawa, 'platnosc' => $zamowienie->platnosc, 'kwota' => number_format($kwota, 2), 'produkty' => $produkty]);
    }
}
