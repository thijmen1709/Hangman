<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>Singleplayer</title>
</head>
<body>
Galgje
<form action="/hangman" autocomplete="off" method="post" class="galg">
    @csrf
    <input class="letter" type="text" name="input" autocomplete="off" placeholder="Vul hier een letter in" required>
    <input class="button" type="submit" autocomplete="off" value="Go!">
</form>
<form action="/singleplayer" method="post" >
    @csrf
    <input type="submit" name="reset" value="Reset">
</form>
</body>
</html>
