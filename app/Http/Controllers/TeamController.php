<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of all Teams.
     */
    public function index()
    {
        $teams = Team::paginate(2);
        $projects = Project::all();
        $members = User::all();
        return view('teams.index', compact(['teams', 'projects', 'members']));
    }

    /**
     * Show the form for creating a new Team .
     */
    public function create()
    {
        $teams = Team::all();
        return view('admin.addNewProject', compact('teams'));
    }

    /**
     * Store a newly created Team in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => "required|string|max:255",
            'project' => "required",
            'about' => "required| min:6",
        ]);
        $data = $request->all();
        $team = Team::create($data);
        if ($data['project'] !== "null") {
            $project = Project::find($data['project']);
            $project->teams()->save($team);
        }
        return redirect()->back()->with('success', "New team created, good luck... ");
    }

    /**
     * Display the specified Team .
     */
    public function show($id)
    {
        $team = Team::findOrFail($id);

        return view('teams.page', compact('team'));
    }

    /**
     * Update the specified Team  in DB .
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => "required|string|max:255",
            'project' => "required",
            'about' => "required| min:6",

        ]);
        $data = $request->all();
        $team->update($data);
        if ($data['project'] !== "null") {
            $project = Project::find($data['project']);
            //  $project->teams()->save($team);
            $team->project()->associate($project);
            $team->save();
        }
        return redirect()->back()->with('success', " You have updated  {$team->name} details ");
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required',
        ]);
        $query = $request->input('search');
        $results = Team::where('name', 'like', '%' . $query . "%")->get();
        //dd($results[0] instanceof Team);
        $projects = Project::all();
        $members = User::all();
        return view('teams.templates.searchResults', compact(['results', 'query',  'projects', 'members']));
    }

    /**
     * Dissociate member from a team
     *

     */
    public function removeMember(Team $team, User $user)
    {
        $user->team()->dissociate();
        $user->save();
        return redirect()->back()->with('success', " {$user->fname} removed from {$team->name}");
    }

    /**
     * Associate a  member(s) to a team
     *
     */
    public function associateMember(Request $request, Team $team)
    {
        $members = [];
        $data = $request->except('_token');
        foreach ($data as $input) {

            $user = User::find($input);
            if ($user !== null) {
                $members[] = $user;
            }
        };
        $team->members()->saveMany($members);
        return redirect()->back()->with('success', "Team members updated.");
    }
}
