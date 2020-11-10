<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Defnaker;
use Illuminate\Http\Request;

class DefnakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $familycard = DB::table('familycards')->paginate(5);

        
		return view('defnaker.create',compact('familycard'));
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
     * @param  \App\Defnaker  $defnaker
     * @return \Illuminate\Http\Response
     */
    public function show(Defnaker $defnaker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Defnaker  $defnaker
     * @return \Illuminate\Http\Response
     */
    public function edit(Defnaker $defnaker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Defnaker  $defnaker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Defnaker $defnaker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Defnaker  $defnaker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Defnaker $defnaker)
    {
        //
    }
}
