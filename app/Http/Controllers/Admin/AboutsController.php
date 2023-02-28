<?php

namespace App\Http\Controllers\Admin;

use App\Models\Abouts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.about.index");
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
     * @param  \App\Models\Abouts  $abouts
     * @return \Illuminate\Http\Response
     */
    public function show(Abouts $abouts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Abouts  $abouts
     * @return \Illuminate\Http\Response
     */
    public function edit(Abouts $abouts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Abouts  $abouts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Abouts $abouts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Abouts  $abouts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Abouts $abouts)
    {
        //
    }
}
