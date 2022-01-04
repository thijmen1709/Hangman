<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/multiplayer.css">
    <title>Document</title>
</head>
<body onload="check()">
<div class="spelers">
    <div class="one">
        Speler 1: <br>
        Foute letters:{{$textone ?? ''}}{{$foutelettersonetxt ?? ''}}
        <br>
        {{$streepjestextone ?? ''}}
        <br>
        {{--        {{$puntenone ?? ''}}--}}
        <br> {{$msgone ?? ''}}
    </div>

    <h2 id = "test">
        {{'Speler' . ' ' . $speler . ' ' . 'is aan de beurt' ??  $msg }}
    </h2>

    <img id="one" src='/img/{{$nrone ?? ''}}.png' alt='blank space'/>
    <div class="two">
        Speler 2: <br>
        Foute letters:{{$texttwo ?? ''}}{{$fouteletterstwotxt ?? ''}}
        <br>
        {{$streepjestexttwo ?? ''}}
        <br>
        {{--        {{$puntentwo ?? ''}}--}}
        <br> {{$msgtwo ?? ''}}
    </div>
    <img id="two" src='/img/{{$nrtwo ?? ''}}.png' alt='blank space'/>
</div>
<form id = "letterone" action="/multicheck"  autocomplete="off" method="post" class="playeronecheck">
    @csrf
    <input class="letter" size="35px" maxlength="1" type="text" name="input" autocomplete="off"
           placeholder="Vul hier een letter in" autofocus required>
    <input class="button" type="submit"  autocomplete="off" value="Go!">
</form>

<div id = "modal">
    <div id = "modal-content"> {{$msg ?? ''}} <br><br><br>
    <a href="/home">Home</a>
        <br><br>
        <a href="/multiplayerreset">Speel opnieuw!</a>
    </div>
</div>

<form id = "reset" action="/multireset" method="post" class="reset">
    @csrf
    <input class="button3" type="submit" name="reset" value="Nieuw spel">
</form>
<div  id = "knop">
<a href="/home">Home</a>
</div>
<form id = "lettertwo" action="/multicheck" autocomplete="off"   method="post" class="playertwocheck">
    @csrf
    <input class="letter" size="35px" maxlength="1" type="text" name="secondinput" autocomplete="off"
           placeholder="Vul hier een letter in" autofocus required>
    <input class="button" type="submit" autocomplete="off" value="Go!">
</form>
</body>
</html>

<script>
    function check() {
        let ended = "<?php echo $ended ?? '' ?>";
        let x = document.getElementById("test");
        let y = document.getElementById("letterone");
        let z = document.getElementById("lettertwo");
        let reset = document.getElementById("reset");
        let modal = document.getElementById("modal");
        if (ended == 1) {
            x.style.display = "none";
            y.style.display = "none";
            z.style.display = "none";
            reset.style.display = "none";
            modal.style.display = "block";
        }
    }
</script>
