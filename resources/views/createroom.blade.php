<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="/js/socketio-client.js"></script>
</head>
<body>

<form action="">
    <h4>Game Mode:</h4>
    <select name="gamemode" form="gamemode">
        <option value="1vs1">1 VS 1</option>
        <option value="partymode">Party Mode</option>
    </select>
    <h4>Room Name:  (alleen bij party mode)</h4>
    <input type="text" placeholder="Room Name">
    <br>
    <h4>Make Room:</h4>
    <input type="submit" value="Check Room Name ">
</form>
<br>
<div class='GameButtons'>
    <button class='createGame' placeholder="Create Game"/>Create Game</button>
</div>


</body>
</html>
