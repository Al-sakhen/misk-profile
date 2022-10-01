<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\TeamMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\dashboard\team_members\storeTeamMemberRequest;
use App\Http\Requests\dashboard\team_members\updateTeamMemberRequest;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team_members = TeamMember::all();
        return view('dashboard.team.index', compact('team_members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeTeamMemberRequest $request)
    {
        $path = null;
        if($request->hasFile('image')){
            $path = $request->file('image')->store('images/team_members' , 'public');
        }
        TeamMember::create([
            'name'          => $request->name,
            'position'      => $request->position,
            'image'         => $path,
            'description'   => $request->description,
        ]);

        return redirect()->route('dashboard.team-members.index')->with(['status' => 'success', 'message' => 'Team Member Added Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function show(TeamMember $teamMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function edit(TeamMember $teamMember)
    {
        return view('dashboard.team.edit', compact('teamMember'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function update(updateTeamMemberRequest $request, TeamMember $teamMember)
    {
        if($request->hasFile('image')){
            if($teamMember->image){
                Storage::disk('public')->delete($teamMember->image);
            }

            $path = $request->file('image')->store('images/team_members' , 'public');
        }

        $teamMember->update([
            'name'          => $request->name,
            'position'      => $request->position,
            'image'         => $path ?? $teamMember->image,
            'description'   => $request->description,
        ]);

        return redirect()->route('dashboard.team-members.index')->with(['status' => 'success', 'message' => 'Team Member Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeamMember $teamMember)
    {
        $teamMember->delete();

        if($teamMember->image && Storage::disk('public')->exists($teamMember->image)) {
            Storage::disk('public')->delete($teamMember->image);
        }

        return redirect()->route('dashboard.team-members.index')->with(['status' => 'success', 'message' => 'Team Member Deleted Successfully']);
    }
}
