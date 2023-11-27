<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductsDisplayController extends Controller
{
    //
    public function DisplayProducts() {
        $produkty = DB::table('produkty')->get();
        $pozycja_w_rzedzie = 0;
        $tabela_produktow = "";
        foreach($produkty as $produkt) {
            if($pozycja_w_rzedzie == 0) {
                $tabela_produktow .= "<tr>";
            } else if($pozycja_w_rzedzie == 3) {
                $tabela_produktow .= "</tr>";
                $pozycja_w_rzedzie = 0;
            }
            $tabela_produktow .= "<td>";
            $tabela_produktow .= "<b><a href='" . route("product", ['id' => $produkt->id_produktu]) . "'>" . $produkt->nazwa . "</a></b>";
            $tabela_produktow .= "<br><img src='" . asset('/images/' . $produkt->obraz) . "' alt='" . $produkt->nazwa . "'>";
            $tabela_produktow .= "<br>" . $produkt->cena . " PLN";
            $tabela_produktow .= "</td>";

            $pozycja_w_rzedzie += 1;
        }
        return view("produkty", ['zawartosc_tabeli' => $tabela_produktow]);
    }
    public function DisplayProduct(string $id) {
        $produkt = DB::table('produkty')->where('id_produktu', $id)->first();
        $nazwakategorii = DB::table('typy_produktow')->where('id_typu_produktu', $produkt->id_tp)->first()->typ_produktu;
        return view("produkt", ['id_produktu' => $produkt->id_produktu, 'nazwa' => $produkt->nazwa, 'opis' => $produkt->opis, 'obraz' => $produkt->obraz, 'cena' => $produkt->cena, 'kategoria' => $nazwakategorii]);
    }
}
