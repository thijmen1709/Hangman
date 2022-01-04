@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="ingelogd">
                            <h1>Je bent ingelogd als {{ Auth::user()->name }}</h1>
                        </div>
                        <div class="knoppen">
                            <a href="/hangman">Singleplayer</a>
                            <a href="/multiplayer">Multiplayer</a>
                            <a href="http://127.0.0.1:3000/">Chat</a>
                            <a href="/scoreshow">Highscore</a>
                            <a href="/shop">Shop</a>
                            <a href="/instellingen">Instellingen</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

