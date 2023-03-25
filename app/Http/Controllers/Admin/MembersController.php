<?php

namespace App\Http\Controllers\Admin;

use App\Models\Members;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Members::all();
        return view('admin.members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.members.create');
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
            "member_name" => "required",
            "image" => "required|image|mimes:png,jpg,jpeg,svg|max:2048",
            "role" => "required",
            "motto" => "required",
        ]);

        $imageName = $request->file('image')->hashName();
        $request->image->move(public_path('images/members'), $imageName);
        $data = Members::create([
            'member_name' => $request->post('member_name'),
            'image' => $imageName,
            'role' => $request->post('role'),
            'motto' => $request->post('motto'),
        ]);

        if ($data->save()) {
            return redirect()->route('members.index')
                ->with('success', 'Add Member has successfully');
        } else {
            return redirect()->route('members.create')
                ->with('failed', 'Add Member has failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Members  $members
     * @return \Illuminate\Http\Response
     */
    public function show($members)
    {
        $member = Members::find($members);
        return view('admin.members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Members  $members
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Members::find($id);
        return view('admin.members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Members  $members
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "member_name" => "required",
            "motto" => "required",
            "image" => "image|mimes:png,jpg,jpeg,svg|max:2048",
            "role" => "required",
        ]);

        $data = Members::find($id);

        if ($request->image == null) {
        } else {
            $image_file = public_path('images/members') . $data->image;
            if (File::exists($image_file)) {
                File::delete($image_file);
            }

            $imageName = $request->file('image')->hashName();
            $request->image->move(public_path('images'), $imageName);
            $data->image = $imageName;
        }

        $data->member_name = $request->member_name;
        $data->motto = $request->motto;
        $data->role = $request->role;

        if ($data->update()) {
            return redirect()->route('members.index')
                ->with('success', 'Edit Product has successfully');
        } else {
            return redirect()->route('members.edit')
                ->with('failed', 'Edit Product has failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Members  $members
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Members::find($id);
        $image_file = public_path('images/members/') . $data->image;
        if (File::exists($image_file)) {
            File::delete($image_file);
        }
        $data->delete();
        return redirect()->route('members.index')
            ->with('success', 'Member has deleted');;
    }
}
