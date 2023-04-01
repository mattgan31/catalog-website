<?php

namespace App\Http\Controllers\Admin;

use App\Models\Missions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        // Validator
        $validator = $this->validateMissionData($request);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create
        $data = $this->createNewMission($request);

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
        $mission = Missions::first();
        return view('admin.mission.edit', compact('mission'));
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
        // Validator
        $validator = $this->validateMissionData($request);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Update
        $mission = Missions::first();

        $mission->update([
            'mission_title' => $request->mission_title,
            'mission_description' => $request->mission_description,
        ]);

        if ($mission->wasChanged()) {
            return redirect()->route('mission.index')
                ->with('success', "Mission has been created");
        }
        return redirect()->back()
            ->with('failed', "Mission has been failed to create")->withInput();
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

    private function validateMissionData($request)
    {
        $rules = [
            'mission_title' => 'required',
            'mission_description' => 'required|min:20',
        ];

        $messages = [
            "mission_title.required" => "Judul Mission harus diisi",
            "mission_description.required" => "Deskripsi Mission harus diisi",
            "mission_description.min" => "Deskripsi minimal memiliki 20 karakter"
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        return $validator;
    }

    private function createNewMission($request)
    {
        return Missions::create([
            'mission_title' => $request->mission_title,
            'mission_description' => $request->mission_description,
        ]);
    }
}
