<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/test.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<table class="highscore">
    <caption>Highscores:</caption>
    @foreach($scores as $score)
    <tr>
        <th>{{ $score->score}}</th>
        <th>{{ $score->user->name }}</th>
    </tr>
   @endforeach
</table>


</body>
</html>

<style>
    table {
        border-radius: 0 0 10px 10px;
        height: 200px;
        width: 500px;
        border-spacing: 5px;
        border: 2px solid #19466b;
        background-color: #1b4b72;
        font-family: Comfortaa;
        margin-right: auto;
        margin-left: auto;
    }
    tr{
        height: 20px;
    }
    th{
        font-size: 16pt;
    }
    caption{
        border: 2px solid #19466b;
        background-color: #1b4b72;
        border-radius: 10px 10px 0 0;
        font-family: Comfortaa;
        height: 15%;
        font-size: 17pt;
        font-weight: 800;
    }


</style>
