<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\ResetPasswordController;
use App\Score;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HangmanController extends Controller
{
    public function difficulty(Request $request)        // Functie voor het selecteren van en veranderen van difficulty.
    {
        $request->session()->put('difficulty', null);       //Reset gelijk alle sessies.
        $request->session()->put('lvl', null);
        $request->session()->put('streepjes', null);
        $request->session()->put('punten', null);
        $request->session()->put('woord', null);
        $request->session()->put('fouteletters', null);
        if ($level = $request->een) {       //Gebruikt de naam van de form om te bepalen welke knop de speler heeft gekozen.
            $difficulty = "✪";
            $lvl = "1";
        }
        if ($level = $request->twee) {
            $difficulty = "✪✪";
            $lvl = "2";
        }
        if ($level = $request->drie) {
            $difficulty = "✪✪✪";
            $lvl = "3";
        }
        $request->session()->put('lvl', $lvl);                      //Zet de levels/difficulty in de sessie.
        $request->session()->put('difficulty', $difficulty);
        echo "<img src='/img/0.png' alt='blank space'/>";

        return view("hangman", ['hi' => '', 'streepjestext' => [], 'difficulty' => $difficulty, 'lvl' => $lvl]);

    }

    public function hangman(Request $request)
    {

        // haal user op
        //haal coins op
        // zet coins + 1
        // sla gebruiker op
        $gok = $request->input;                                         // Dit is de input, de letter die de speler meegeeft via de form.

        $lvl = $request->session()->get('lvl', '2');       //Haalt het level en de difficulty op.
        $difficulty = $request->session()->get('difficulty', 'Onbekend');
        if ($lvl == "1") {
            $difficulty = "✪";
            $woorden = ['hand', 'kat', 'school', 'pruim', 'zon', 'rood', 'auto', 'vlieg', 'raam', 'fles', 'ijs', 'voet', 'tafel', 'mand', 'gat', 'kleur', 'groen', 'fiets', 'vloer', 'muur', 'water', 'kies', 'muis', 'rat', 'les', 'boom', 'laars', 'snel', 'avond', 'appel', 'goed', 'schoen', 'tand', 'stoel', 'jas', 'bad', 'huis', 'vis', 'vaas', 'morgen', 'paard', 'fout', 'sok', 'mat', 'deur', 'tas', 'taart', 'maan', 'geel', 'prijs', 'grond', 'peer', 'broek', 'groot', 'spel'];
        }
        if ($lvl == "3") {
            $difficulty = "✪✪✪";
            $woorden = ['navigatie', 'nieuwjaar', 'xylofoon', 'trompetten', 'bibliotheek', 'weergave', 'corrigeren', 'coderena', 'automatisch', 'systeem', 'zoekopdracht', 'opties', 'cappuccino', 'synoniem', 'projecten', 'luchtzuil', 'hoofdletter', 'magnetisme', 'pannenkoek', 'herstellen', 'playstation', 'zeilboot', 'geschiedenis', 'machinist', 'moederdag', 'focussen', 'controller', 'microfoon', 'download', 'grondlegger', 'faillissement', 'gedempt', 'stofzuiger', 'instrument', 'aangemeld', 'gehaktbal', 'aansprakelijkheidswaardevaststellingsveranderingen' , 'fundamentalattribution  '];
        }
        if ($lvl == "2") {
            $difficulty = "✪✪";
            $woorden = ['cavia', 'krukje', 'tijd', 'fors', 'sambal', 'zuivel', 'kritisch', 'jasje', 'giga', 'dieren', 'lepel', 'picknick', 'quasi', 'verzenden', 'winnaar', 'dextrose', 'vrezen', 'niqaab', 'hierbij', 'quote', 'botox', 'cruciaal', 'zitting', 'cabaret', 'bewogen', 'vrijuit', 'carrière', 'ijverig', 'cake', 'dyslexie', 'uier', 'nihil', 'sausje', 'kuuroord', 'poppetje', 'docent', 'camping', 'schijn', 'kloppen', 'detox', 'boycot', 'cyclus', 'quiz', 'censuur', 'aaibaar', 'chagrijnig', 'fictief', 'chef', 'gering', 'nacht', 'cacao', 'triomf', 'baby', 'ijstijd', 'cruisen', 'ontzeggen', 'quad', 'open', 'turquoise', 'carnaval', 'boxer', 'straks', 'fysiek', 'accu', 'twijg', 'quote', 'gammel', 'flirt', 'futloos', 'vreugde', 'ogen', 'geloof', 'periode', 'volwaardig', 'uitleg', 'stuk', 'volk', 'even', 'stijl', 'val', 'alliantie', 'tocht', 'mooi', 'joggen', 'broek', 'kwik', 'werksfeer', 'vorm', 'nieuw', 'sopraan', 'miljoen', 'inrichting', 'klacht', 'dak', 'echt', 'schikking', 'print', 'oorlog', 'zijraam', 'hyacint'];
        }

        $randomize = rand(0, count($woorden));                               // Kiest een willekeurig getal voor de positie.

        if ($request->session()->has('woord')) {                        // Kijkt of er al een woord in de sessie zit en zet deze in een variabele.
            $woord = $request->session()->get('woord', 'Onbekend');
        } else {                                                             // Als er nog geen woord is gekozen kiest hij een willekeurig woord uit
            $woord = str_split($woorden[$randomize]);                        // De array en verdeelt het in letters en zet deze in een nieuwe array.
        }
        $request->session()->put('woord', $woord);                           //Zet het gekozen woord in de sessie.

        $streepjes = [];                                                     // Lege array met streepjes waar de letters van het woord streepjes zijn.
        foreach ($woord as $letter) {
            array_push($streepjes, "-");
        }
        if ($request->session()->has('streepjes')) {                    // Als er al streepjes in de session staan vervangt hij de array door die uit de session (met geraden letters evt.)
            $streepjes = session('streepjes', 'Onbekend');
        }
        $fouteletters = [];// Lege array met foute letters.

        if ($request->session()->has('punten')) {
            $punten = session('punten', 'Onbekend');
        } else {
            $punten = [];
        }
        if ($request->session()->has('fouteletters')) {                      // Als er al een lijst met foute letters is haalt hij deze op.
            $fouteletters = session('fouteletters', 'Onbekend');
        }
        $double = false;
        for ($i = 0; $i < count($streepjes); $i++) {                             // Gaat door totdat de array $woord is afgelopen, dus de lengte van het woord.
            if ($gok == $streepjes[$i]) {
                $double = true;
            }
        }
        $goed = false;
        for ($i = 0; $i < count($woord); $i++) {                               // Gaat door totdat de array $woord is afgelopen, dus de lengte van het woord.
            if ($gok == $woord[$i]) {                                          //Als de gok overeenkomt met de letter ($woord[$i]) wordt de letter in de streepjes array gezet.
                $streepjes[$i] = $gok;
                $goed = true;
            } else if ($gok != $woord[$i]) {                                   //Maakt een variabele 'fout' aan als het de gok niet in het woord zit, dit is nodig voor later.
                $fout = true;
            }
        }

        if ($goed == true && $double == false) {
            array_push($punten, $gok);
        }
        $score = count($punten);
        $request->session()->put('punten', $punten);
        $request->session()->put('streepjes', $streepjes);                   // Zet de nieuwe streepjes array in de session
        $dubbel = false;                                                     // Var 'dubbel' is automatisch fout.
        for ($i = 0; $i < count($streepjes); $i++) {                         // Gaat door de streepjes en foute letters array, als de letter al daar in zit is het een dubbele letter.
            if ($gok == $streepjes[$i]) {
                $dubbel = true;
            }
        }
        for ($i = 0; $i < count($fouteletters); $i++) {
            if ($gok == $fouteletters[$i]) {
                $dubbel = true;
            }
        }
        if ($fout === true && $dubbel === false) {                          // Als de letter fout is en niet dubbel dan komt hij bij de foute letters.
            array_push($fouteletters, $gok);
        }
        $request->session()->put('fouteletters', $fouteletters);

        $fouteletterstext = "Foute letters:" . implode(",", $fouteletters) . "";    // Maakt de fouteletters array los en maakt er een string van met "," er tussen.
        $nr = count($fouteletters);                                         // Telt hoeveel foute letters er zijn.
        $af = '';                                                           // Als er 8 fout zijn komt het woord in beeld.
        if ($nr === 9) {
            $af = "Dit was het woord: " . implode("", $woord) . "";

        }
        $goedzo = '';                                                       // Als de streepjes hetzelfde zijn als de originele (woord) array dan heb je gewonnen.
        if ($streepjes == $woord) {
            $this->store($score);
            $this->giveCoins($score);
            $goedzo = "Goedzo";
        }

        echo "<img src='/img/$nr.png' alt='galg'/>";                       // Geeft foto weer van nummer (0-9).jpg want de plaatjes zijn ook genummerd.


        return view("hangman", ['goedzo' => $goedzo, 'hi' => $fouteletterstext, 'streepjestext' => $streepjes, 'af' => $af, 'difficulty' => $difficulty, 'score' => $score,'nr'=>$nr]);

    }


    public function reset(Request $request)                                // Reset functie, zet alles in de sessie naar null, de inlog sessie blijft nog wel.
    {
        $reset = $request->reset;
        $request->session()->put('streepjes', null);
        $request->session()->put('punten', null);
        $request->session()->put('woord', null);
        $request->session()->put('fouteletters', null);
        echo "<img src='/img/0.png' alt='blank space'/>";
        return view("hangman", ['goedzo' => '', 'af' => '', 'hi' => '', 'streepjestext' => []]);
    }

    public function store($score)
    {
        $scoreobj = new Score();
        $scoreobj->score = $score;
        Auth::user()->id;
        $user = User::find(Auth::user()->id);
        $user->scores()->save($scoreobj);
    }

    public function giveCoins($score){
        Auth::user()->id;
        $user = User::find(Auth::user()->id);
        $user->coins = $user->coins + $score;
        $user->save();

    }

}
