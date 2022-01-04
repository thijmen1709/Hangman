<?php

namespace App\Http\Controllers;

use App\Rarity;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class RarityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rarity  $rarity
     * @return \Illuminate\Http\Response
     */
    public function show(Rarity $rarity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rarity  $rarity
     * @return \Illuminate\Http\Response
     */
    public function edit(Rarity $rarity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rarity  $rarity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rarity $rarity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rarity  $rarity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rarity $rarity)
    {
        //
    }
}
