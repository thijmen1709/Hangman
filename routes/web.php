<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
        return view('start');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/register', function () {
    return view('register');
});

Route::get('/shop-pack', function () {
    return view('shop-pack');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/redirect', function () {
    return view('redirect');
});

Route::get('/chat', function () {
    return view('chat');
})->middleware('auth');

Route::get('/scoreinvul', function () {
    return view('scoreinvul');
})->middleware('auth');

Route::get('/scorezien', function () {
    return view('scoreshow');
});

Auth::routes();

Route::post('/hangman', 'HangmanController@hangman');

Route::get('/hangman', 'HangmanController@reset');
//Route::get('/scoreshow', 'ScoreController@index');
//Route::get('/scorechange', 'ScoreController@store');
//Route::get('/show', 'ScoreController@show');

Route::get('/hangman', 'HangmanController@reset')->middleware('auth');
Route::get('/scoreshow', 'ScoreController@index')->middleware('auth');
Route::get('/scorechange', 'ScoreController@store')->middleware('auth');
Route::get('/show', 'ScoreController@show')->middleware('auth');

Route::post('/difficulty', 'HangmanController@difficulty');
Route::get('/openpack', 'PackController@random');


Route::get('/results', function () {
    return view('results');
})->middleware('auth');
Route::post('/reset', 'HangmanController@reset');

Route::get('/instellingen', function () {
    return view('instellingen');
});

Route::get('/multiplayer', function () {
    return view('multiplayer');
})->middleware('auth');

Route::get('/highscore', function () {
    return view('scoreshow');
})->middleware('auth');

Route::get('/room/join', function () {
    return view('joinroom');
});

Route::get('/room/create', function () {
    return view('createroom');
});

Route::get('/rooms', function () {
    return view('rooms');
});

Route::get('/multiplayer/play', function () {
    return view('playmulti');
});

Route::get('/multiplayertwo', function () {
    return view('multiplayer2');
});
Route::get('/multiplayertwo', 'MultiplayerController@reset');
Route::post('/multicheck', 'MultiplayerController@playerCheck');
Route::post('/multireset', 'MultiplayerController@reset');
Route::get('/collectie', 'CollectieController@index');

Route::get('/multiplayerreset', 'MultiplayerController@reset');

Route::get('/shop', function () {
    return view('shop');
});

Route::get('/socket', function () {
    return view('socketio');
});
