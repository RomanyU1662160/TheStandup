<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\Project;
use App\Models\Role;
use App\Models\Team;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }


    public function createProject()
    {
        $teams = Team::all();
        $projects = Project::all();
        return view('admin.addNewProject', compact(['teams', 'projects']));
    }


    public function createTeam()
    {
        $projects = Project::all();

        return view('admin.addNewTeam', compact(['projects']));
    }


    public function getAllProjects()
    {
        $projects = Project::paginate(2);
        $teams = Team::all();
        $members = User::all();
        $roles = Role::all();
        return view('admin.allProjects', compact(['projects', 'teams', 'members', 'roles']));
    }



    public function getAllTeams()
    {
        $teams = Team::paginate(2);
        $projects = Project::all();
        $roles = Role::all();
        $members = User::all();
        return view('admin.allTeams', compact(['teams', 'projects', 'members', 'roles']));
    }


    public function getAllMembers()
    {
        $teams = Team::all();
        $roles = Role::all();
        $projects = Project::all();
        $members = User::paginate(3);
        $days = Day::all();
        return view('admin.allMembers', compact(['projects', 'teams', 'members', 'roles', 'days']));
    }


    public function updateRoles(Request $request, User $user)
    {
        $data = $request->except('_token');
        $user->roles()->sync($data);
        $user->save();
        return redirect()->back()->with('success', "You have updated roles successfully.");
    }


    public function AssignMemeberToTeam(Request $request, User $user)
    {

        $request->validate([
            'team' => 'required',
        ]);

        $team = Team::find($request->input('team'));
        $user->team()->associate($team);
        $user->save();
        return redirect()->back()->with('success', "You have added {$user->getFullName()} the team  successfully.");
    }


    public function updateWorkingDays(Request $request, User $user)
    {
        $data = $request->except('_token');
        $user->days()->sync($data);
        $user->save();
        return redirect()->back()->with('success', "You have updated {$user->getFullName()}'s  Working days successfully.");
    }


    public function removeUser(User $user)
    {
        DB::table('users')->where('id', $user->id)->delete();
        return redirect()->route('admin.allMembers')->with('success', " User Account Deleted");
    }
}
