<?php

namespace App\Http\Controllers\Admin;

use App\Models\Missions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mission = Missions::first();
        return view('admin.mission.index', compact('mission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mission.create');
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
            'mission_title' => 'required',
            'mission_description' => 'required|min:20',
        ]);

        $data = Missions::create([
            'mission_title' => $request->mission_title,
            'mission_description' => $request->mission_description,
        ]);

        // dd($request->mission_description);
        if ($data->save()) {
            return redirect()->route('mission.index')
                ->with('success', "Mission has been created");
        } else {
            return redirect()->route('mission.create')
                ->with('failed', "Mission has been failed to create");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Missions  $missions
     * @return \Illuminate\Http\Response
     */
    public function show(Missions $missions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Missions  $missions
     * @return \Illuminate\Http\Response
     */
    public function edit(Missions $missions)
    {
        $data = Missions::first();
        return view('admin.mission.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Missions  $missions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Missions $missions)
    {
        $this->validate($request, [
            'mission_title' => 'required',
            'mission_description' => 'required|min:20',
        ]);

        $data = Missions::first();

        $data->mission_title = $request->mission_title;
        $data->mission_description = $request->mission_description;

        if ($data->update()) {
            return redirect()->route('mission.index')
                ->with('success', "Mission has been created");
        } else {
            return redirect()->route('mission.create')
                ->with('failed', "Mission has been failed to create");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Missions  $missions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Missions $missions)
    {
        //
    }
}
