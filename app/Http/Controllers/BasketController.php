<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BasketController extends Controller
{
    //
    public function AddToBasket(string $id, Request $request) {
        $currentBasket = session('basket');
        $wasAdded = false;
        for($i = 0; $i < count($currentBasket); $i++) {
            if($currentBasket[$i]['product'] == $id) {
                $currentBasket[$i]['ammount'] += $request->ammount;
                $wasAdded = True;
            }
        }
        if(!$wasAdded) {
            array_push($currentBasket, ["product" => $id, "ammount" => $request->ammount]);
        }
        
        session(['basket' => $currentBasket]);
        return redirect("/products");
    }
    public function ShowBasket() {
        $produkty = json_decode(json_encode(DB::table('produkty')->get(), true));
        $table_content = "";
        foreach(session('basket') as $row) {
            $table_content .= "<tr><td><a href='" . route("product", ['id' => $produkty[$row['product'] - 1]->id_produktu]) . "'>" . $produkty[$row['product'] - 1]->nazwa . "</a></td>";
            $table_content .= "<td>" . $row['ammount'] . "</td></tr>";
        }
        return view('koszyk', ['zawartosc_tabeli' => $table_content]);
    }
}
