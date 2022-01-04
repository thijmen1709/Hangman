<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/instellingen.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa&display=swap" rel="stylesheet">
    <title>Instelingen</title>
</head>
<body>
<div class="title">
<h1>Instellingen</h1>
</div>
<div class="accountinfo">
    <h3>Account Info</h3>
    <h4>Naam: {{ Auth::user()->name }}</h4>
    <h4>Email: {{ Auth::user()->email }}</h4>
    <h4>Gemaakt op: {{ Auth::user()->created_at }}</h4>
</div>
</body>
</html>
