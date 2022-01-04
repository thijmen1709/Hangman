<?php

namespace App\Http\Controllers;

use App\Collectie;
use Illuminate\Http\Request;


class CollectieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allitems= collectie::all()->get();
        return view('collectie' , ['collecties'=> $allitems]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Collectie  $collectie
     * @return \Illuminate\Http\Response
     */
    public function show(Collectie $collectie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Collectie  $collectie
     * @return \Illuminate\Http\Response
     */
    public function edit(Collectie $collectie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Collectie  $collectie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collectie $collectie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Collectie  $collectie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collectie $collectie)
    {
        //
    }
}
