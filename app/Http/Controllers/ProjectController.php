<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Team;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the Projects in DB .
     */

    public function index()
    {
        $projects = Project::paginate(3);
        $teams = Team::all();
        return view('projects.index', compact(['projects', 'teams']));
    }

    // Search for projects, return search results
    public function search(Request $request)
    {
        $query = $request->input('search');
        $results = Project::where('name', 'like', '%' . $query . '%')->get();
        $teams = Team::all();
        return view('projects.templates.searchResults', compact(['results', 'query', 'teams']));
    }

    /**
     *
     *  dissociate Team from a project
     */
    public function dissociateTeam(Team $team)
    {
        $team->project()->dissociate();
        $team->save();
        return redirect()->back()->with('info', " you have dissociated {{$team->name}} ");
    }

    /**
     * Store a newly created Project in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'name' => "required|max:255",
            'start_date' => "required|after_or_equal:today",
            'end_date' => "required|after:start_date|after:start_date",
            'about' => "required|max:255",
        ]);

        // get the data from the submitted form
        $data = $request->all();
        $project = Project::create($data);

        // update the belongsto relationship
        if ($data['team'] !== "null") {
            $team = Team::find($data['team']);
            $team->project()->associate($project);
            $team->save();
        }

        return redirect()->back()->with('success', 'Congratulation on your new project');
    }

    /**
     * Update the specified Project in storage.
     */

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => "required|max:255",
            'start_date' => "required|after_or_equal:today",
            'end_date' => "required|after:start_date",
            'about' => "required|max:255",
        ]);
        $data = $request->all();

        $project->update($data);
        if ($data['team'] !== null) {
            $project->teams()->save(Team::find($data['team']));
        }

        return redirect()->back()->with('success', "You have updated  {$project->name} succesfully.");
    }
}
