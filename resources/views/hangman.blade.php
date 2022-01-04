<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/hangman.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa&display=swap" rel="stylesheet">
    <title>Singleplayer</title>
</head>
<body class="hangman-body">
<div class="header">
    <a href="/home">
    <div class="home">
        <p>Home</p>
    </div>
    </a>
</div>
<div class="fout">
    <h1 class="score">{{ $score ?? '' }} Punten</h1>
    <h1 class="h1">{{$hi}}</h1>
</div>
<h2 class="h2">@foreach($streepjestext as $streep)
        {{$streep}}

    @endforeach</h2>
<div>
    <h2 class="h2">
        {{$af ?? ''}}
        {{$goedzo ?? ''}}
    </h2>
</div>
<div class="forms">
    <body class="body2">

    <form action="/hangman" autocomplete="off" method="post" class="galgkut">
        @csrf
        <input class="letter" size="35px" maxlength="1" type="text" name="input" autocomplete="off"
               placeholder="Vul hier een letter in" autofocus required>
        <input class="button" type="submit" autocomplete="off" value="Go!">
    </form>
    <form class="center" action="/reset" method="post" class="reset">
        @csrf
        <input class="button3" type="submit" name="reset" value="Nieuw spel">
    </form>
    <p class="difficulty">Moeilijkheidsgraad:{{$difficulty ?? '✪✪'}}</p>
    <div class="difficulty2">
        <form method="post" action="/difficulty">
            @csrf
            <input class="button" type="submit" value="✪" name="een">
        </form>
        <form method="post" action="/difficulty">
            @csrf
            <input class="button" type="submit" value="✪✪" name="twee">
        </form>
        <form method="post" action="/difficulty">
            @csrf
            <input class="button" type="submit" value="✪✪✪" name="drie">
        </form>
    </div>
    </body>
</div>
</body>
</html>
