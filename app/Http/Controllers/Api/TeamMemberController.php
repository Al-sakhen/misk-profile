<?php

namespace App\Http\Controllers\Api;

use App\Models\TeamMember;
use App\Http\Controllers\Controller;

class TeamMemberController extends Controller
{
    public function index(){
        $team_members = TeamMember::all();
        return response()->json([
            'status' => true,
            'data' => $team_members
        ]);
    }
}
