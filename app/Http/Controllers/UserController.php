<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Team;
use App\Models\Role;
use App\Models\Day;
use App\Models\Project;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of all users.
     */
    public function index()
    {
        $members = User::paginate(3);
        $teams = Team::all();
        $roles = Role::all();
        $projects = Project::all();
        $days = Day::all();
        return view('members.index', compact(['members', 'teams', 'roles', 'projects', 'days']));
    }


    public function search(Request $request)
    {
        $query = $request->input('search');
        $results = User::search($query)->get();
        $teams = Team::all();
        $roles = Role::all();
        $projects = Project::all();
        $days = Day::all();
        return view('members.templates.searchResults', compact(['results', 'query', 'teams', 'roles', 'projects', 'days']));
    }


    // Update member roles
    public function updateWorkingDays(Request $request, User $user)
    {
        $data = $request->except('_token');
        $user->days()->sync($data);
        return redirect()->back()->with('success', "You have updated {$user->getFullName()}'s  Working days successfully.");
    }

    /*
     Show specified user details
    */
    public function show($id)
    {
        $member = User::findOrFail($id);
        $roles = Role::all();
        $days = Day::all();
        return view('members.page', compact(['member', 'roles', 'days']));
    }
}
