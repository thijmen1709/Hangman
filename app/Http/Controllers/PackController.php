<?php

namespace App\Http\Controllers;

use App\Score;
use App\User;
use App\Collectie;
use App\Item;
use App\Rarity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PackController extends Controller
{
    public function random () {
        $randomitem = Item::all()->random();
        $randomrarity = Rarity::all()->random();
        $itemsave =$this->save($randomitem);

        return view ('openpack' , compact('randomitem','randomrarity' , 'itemsave'));
    }

    public function save ($randomitem) {
        Auth::user()->id;
        $user = User::find(Auth::user()->id); //gemaakt door arjan niet onze fout als je het beter weet ook arjan zeggen graag
        $itemnew = new Collectie();
        $itemnew->user_id =Auth::user()->id;
        $itemnew->item_id = $randomitem->id;
        return $itemnew->save();
        return $itemnew;
        //$itemnew->collectie = $randomitem->id;

//        $user->collecties()->save($randomitem);
    }

}
