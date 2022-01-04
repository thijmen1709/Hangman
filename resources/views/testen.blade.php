<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Chat</title>
    <script src="/js/script.js"></script>
    <link rel="stylesheet" href="/css/test.css">
</head>
<body>


<audio id="play">
    <source src="/audio/airhorn.mp3" type="audio/ogg">
    <source src="/audio/wrong.mp3" type="audio/mpeg">
    Audio failed.
</audio>

<button id="myBtn">Open Modal gewonnen</button>
<button id="btn">Open Modal verloren</button>

<div id="modal" class="modal1">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Goedzo! Je hebt x punten behaald!</p>
        <input type="submit" value="Verzend score" id="send">
    </div>
</div>
<div id="modal" class="modal2">
    <div class="modal-content">
        <span class="close1">&times;</span>
        <p>Verloren! Probeer opnieuw!</p>
    </div>
</div>

<script>
    let modal = document.getElementById("modal");
    let query = document.getElementById("send");
    let x = document.getElementById("play");

    // Get the button that opens the modal
    let btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    let span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
        x.play();
    };
    query.onclick = function(){
        modal.style.display = "none";
    };

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };


</script>
</body>
</html>
