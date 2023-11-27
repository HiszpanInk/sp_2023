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
}
