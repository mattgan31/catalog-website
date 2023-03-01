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
        $about = Abouts::first();
        return view("admin.about.index", compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.about.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'about_title' => 'required',
            'about_description' => 'required|min:20'
        ]);

        $data = Abouts::create([
            'about_title' => $request->about_title,
            'about_description' => $request->about_description,
        ]);

        if ($data->save()) {
            return redirect()->route('about.index')
                ->with('success', "About has been created");
        } else {
            return redirect()->route('about.create')
                ->with('failed', "About has been failed to create");
        }
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
        $data = Abouts::first();
        return view('admin.about.edit', compact('data'));
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
        $this->validate($request, [
            'about_title' => 'required',
            'about_description' => 'required|min:20'
        ]);

        $data = Abouts::first();

        $data->about_title = $request->about_title;
        $data->about_description = $request->about_description;

        if ($data->update()) {
            return redirect()->route('about.index')
                ->with('success', "About has been created");
        } else {
            return redirect()->route('about.edit')
                ->with('failed', "About has been failed to update");
        }
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
