<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MultiplayerController extends Controller
{

    public function startGame(Request $request)
    {
        $playerone = "0";
        $playertwo = "0";
        $woorden = ['navigatie', 'nieuwjaar', 'xylofoon', 'trompetten', 'bibliotheek', 'weergave', 'corrigeren', 'coderena', 'automatisch', 'systeem', 'zoekopdracht', 'opties', 'cappuccino', 'synoniem', 'projecten', 'luchtzuil', 'hoofdletter', 'magnetisme', 'pannenkoek', 'herstellen', 'playstation', 'zeilboot', 'geschiedenis', 'machinist', 'moederdag', 'focussen', 'controller', 'microfoon', 'download', 'grondlegger', 'faillissement', 'gedempt', 'stofzuiger', 'instrument', 'aangemeld', 'gehaktbal', 'aansprakelijkheidswaardevaststellingsveranderingen'];
        $randomize = rand(0, count($woorden) - 1);
        $randomize2 = rand(0, count($woorden) - 1);
        $woordplayerone = str_split($woorden[$randomize]);
        $woordplayertwo = str_split($woorden[$randomize2]);
        $request->session()->put('woordplayerone', $woordplayerone);
        $request->session()->put('woordplayertwo', $woordplayertwo);
        $streepjesone = [];
        $streepjestwo = [];
        foreach ($woordplayerone as $letter) {
            array_push($streepjesone, "-");
        }
        foreach ($woordplayertwo as $letter) {
            array_push($streepjestwo, "-");
        }
        $streepjestextone = implode("", $streepjesone);
        $streepjestexttwo = implode("", $streepjestwo);
        $starter = rand(1, 2);
        $nrone = 0;
        $nrtwo = 0;
        $request->session()->put('streepjesone', $streepjesone);
        $request->session()->put('streepjestwo', $streepjestwo);
        $speler = "$starter";
        return view("multiplayertwo", ['speler' => $speler, 'playerone' => $playerone, 'playertwo' => $playertwo, 'streepjestextone' => $streepjestextone, 'streepjestexttwo' => $streepjestexttwo, 'woordplayerone' => $woordplayerone, 'woordplayertwo' => $woordplayertwo, 'nrone' => $nrone, 'nrtwo' => $nrtwo]);
    }


    public function playerCheck(Request $request)
    {
        $woordplayertwo = $request->session()->get('woordplayertwo', 'Onbekend');
        $woordplayerone = $request->session()->get('woordplayerone', 'Onbekend');
        if ($gok = $request->input) {
            $player = "1";
            $gok = $request->input;
            $woord = $woordplayerone;
            $streepjesone = [];
            $streepjesone = $request->session()->get('streepjesone', 'Onbekend');
            $foutelettersone = [];
            $foutelettersone = $request->session()->get('foutelettersone');
            $streepjestextone = implode("", $streepjesone);
            $fouteletters = $foutelettersone;
            $request->session()->put('streepjes', $streepjesone);
            $puntenone = $request->session()->get('puntenone', 0);
            $streepjes = $streepjesone;
            $request->session()->put('streepjesone', $streepjesone);
        } else if ($gok = $request->secondinput) {
            $player = "2";
            $gok = $request->secondinput;
            $woord = $woordplayertwo;
            $streepjestwo = [];
            $streepjestwo = $request->session()->get('streepjestwo', 'Onbekend');
            $fouteletterstwo = [];
            if ($request->session()->has('fouteletterstwo')) {
                $fouteletterstwo = $request->session()->get('fouteletterstwo');
            }
            $fouteletters = $fouteletterstwo;
            $streepjestexttwo = implode("", $streepjestwo);
            $request->session()->put('streepjestwo', $streepjestwo);
            $streepjes = $streepjestwo;
            $puntentwo = $request->session()->get('puntentwo', 0);
        }
        $speler = $player;
        $request->session()->put('woord', $woord);
        $request->session()->put('gok', $gok);
        $request->session()->put('player', $player);
        return $this->multiCheck($request);
    }


    public function multiCheck(Request $request)
    {
        $streepjesone = $request->session()->get('streepjesone', 'Onbekend');
        $streepjestwo = $request->session()->get('streepjestwo', 'Onbekend');
        $player = $request->session()->get('player', 'Onbekend');
        $gok = $request->session()->get('gok', 'Onbekend');
        $woord = $request->session()->get('woord', 'Onbekend');
        $fouteletterstwo = [];
        if ($request->session()->has('fouteletterstwo')) {
            $fouteletterstwo = $request->session()->get('fouteletterstwo', []);
        }
        $foutelettersone = [];
        if ($request->session()->has('foutelettersone')) {
            $foutelettersone = $request->session()->get('foutelettersone');
        }
        $puntenone = $request->session()->get('puntenone', 0);
        $puntentwo = $request->session()->get('puntentwo', 0);
        $dubbel = false;
        $fout = true;

        for ($i = 0; $i < count($woord); $i++) {
            if ($player === "1" && $gok === $woord[$i]) {
                $streepjesone[$i] = $gok;
                $fout = false;
                $request->session()->put('streepjesone', $streepjesone);
                $streepjesone = $request->session()->get('streepjesone');
            }
            if ($player == "2" && $gok == $woord[$i]) {
                $streepjestwo[$i] = $gok;
                $fout = false;
                $request->session()->put('streepjestwo', $streepjestwo);
                $streepjestwo = $request->session()->get('streepjestwo');
            } else if ($gok != $woord[$i]) {                                   //Maakt een variabele 'fout' aan als het de gok niet in het woord zit, dit is nodig voor later.
                $fout = true;
            }
        }
        if ($player == "1") {
            for ($i = 0; $i < count($streepjesone); $i++) {                             // Gaat door totdat de array $woord is afgelopen, dus de lengte van het woord.
                if ($gok == $streepjesone[$i]) {
                    $dubbel = true;
                }
            }
            for ($i = 0; $i < count($foutelettersone); $i++) {                             // Gaat door totdat de array $woord is afgelopen, dus de lengte van het woord.
                if ($gok == $foutelettersone[$i]) {
                    $dubbel = true;
                }
            }
            $streepjestext = implode("", $streepjesone);
        }
        if ($player == "2") {
            for ($i = 0; $i < count($streepjestwo); $i++) {                             // Gaat door totdat de array $woord is afgelopen, dus de lengte van het woord.
                if ($gok == $streepjestwo[$i]) {
                    $dubbel = true;
                }
            }
            for ($i = 0; $i < count($fouteletterstwo); $i++) {                             // Gaat door totdat de array $woord is afgelopen, dus de lengte van het woord.
                if ($gok == $fouteletterstwo[$i]) {
                    $dubbel = true;
                }
            }
            $streepjestext = implode("", $streepjestwo);
        }
        if ($fout == false && $dubbel == false) {
            if ($player == "1") {
                $puntenone++;
                $request->session()->put('puntenone', $puntenone);
            }
            if ($player == "2") {
                $puntentwo++;
                $request->session()->put('puntentwo', $puntentwo);
            }
        }
        if ($fout == true && $dubbel == false) {
            if ($player == "1") {
                array_push($foutelettersone, $gok);
                $request->session()->put('foutelettersone', $foutelettersone);
            } elseif ($player == "2") {
                array_push($fouteletterstwo, $gok);
                $request->session()->put('fouteletterstwo', $fouteletterstwo);
            }
        }
        $msg = '';
        $msgone = '';
        $msgtwo = '';
        $textone = "";
        $texttwo = "";

        if ($request->session()->has('fouteletterstwo')) {
            $texttwo = implode(",", $fouteletterstwo) . ",";
            $nrtwo = count($fouteletterstwo);
        } else {
            $fouteletterstwo = '';
            $nrtwo = 0;
        }

        if ($request->session()->has('foutelettersone')) {
            $textone = implode(",", $foutelettersone) . ",";
            $nrone = count($foutelettersone);
        } else {
            $foutelettersone = '';
            $nrone = 0;
        }
        $ended = false;
        if ($player == "1") {
            if ($nrone == 9) {
                $msgone = "Dit was het woord: " . implode("", $woord) . "";
                $this->endGame($request);
            }
            if ($streepjesone == $woord) {
                $msg = "Speler 1 heeft gewonnen!";
                $msgtwo = "Dit was het woord: " . implode("", $request->session()->get('woordplayertwo')) . "";
                $this->endGame($request);
            }

        } elseif ($player == "2") {
            if ($nrtwo == 9) {
                $msgtwo = "Dit was het woord: " . implode("", $woord) . "";
                $this->endGame($request);
            }
            if ($streepjestwo == $woord) {
                $msg = "Speler 2 heeft gewonnen!";
                $msgone = "Dit was het woord: " . implode("", $request->session()->get('woordplayerone')) . "";
                $this->endGame($request);
            }
        }

        $ended = $request->session()->get('ended');
        $streepjestexttwo = implode("", $streepjestwo);
        $streepjestextone = implode("", $streepjesone);

        $request->session()->put('streepjes', null);
        $request->session()->put('woord', null);
        $request->session()->put('gok', null);
        $this->switchPlayer($request);
        $speler = $request->session()->get('player');
        return view("multiplayertwo", ['ended' => $ended, 'puntenone' => $puntenone, 'puntentwo' => $puntentwo, 'speler' => $speler, 'nrone' => $nrone, 'nrtwo' => $nrtwo, 'msgone' => $msgone, 'msgtwo' => $msgtwo, 'msg' => $msg, 'textone' => $textone, 'texttwo' => $texttwo, 'streepjestextone' => $streepjestextone, 'streepjestexttwo' => $streepjestexttwo]);
    }


    public function switchPlayer(Request $request)
    {
        $player = $request->session()->get('player');
        if ($player == '1') {
            $player = '2';
        } else {
            $player = '1';
        }
        $request->session()->put('player', $player);
    }


    public function reset(Request $request)                                // Reset functie, zet alles in de sessie naar null, de inlog sessie blijft nog wel.
    {
        $reset = $request->reset;
        $request->session()->put('streepjesone', null);
        $request->session()->put('foutelettersone', null);
        $request->session()->put('fouteletterstwo', null);
        $request->session()->put('puntentwo', null);
        $request->session()->put('puntenone', null);
        $request->session()->put('streepjestwo', null);
        $request->session()->put('fouteletters', null);
        $request->session()->put('player', null);
        $request->session()->put('ended', null);
        $request->session()->put('woordplayerone', null);
        $request->session()->put('woordplayertwo', null);

        $nrone = "0";
        $nrtwo = "0";
        $speler = rand(1, 2);
        $this->startGame($request);
        return view("multiplayertwo", ['speler' => $speler, 'nrone' => $nrone, 'nrtwo' => $nrtwo, 'fouteletters' => '', 'streepjestext' => '']);
    }


    private function endGame(Request $request)
    {
        $ended = $request->session()->get('ended', 'false');
        $ended = true;
        $request->session()->put('ended', $ended);
        return $ended;
    }


}

