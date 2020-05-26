<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Morale;
use App\Models\Standup;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StandupController extends Controller
{
    /**
     * Display a listing of the Standups.
     */
    public function index()
    {
        $standups = Standup::paginate(4);
        return view('standups.index', compact('standups'));
    }

    /**
     * Show the form for creating a new Standup.
     */
    public function create()
    {
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();
        $lastWorkingDay = Auth::user()->lastWorkingDay(Auth::user());
        $nextWorkingDay = Auth::user()->nextWorkingDay(Auth::user());
        Carbon::yesterday()->Format('D d-m-Y');
        return view('standups.newStandUp', compact('lastWorkingDay', 'nextWorkingDay', 'today', 'yesterday'));
    }

    /**
     * Store a newly created Standup in DB.
     */
    public function store(Request $request)
    {
        $today = Carbon::today()->Format('D d-m-Y');
        $yesterday = Carbon::yesterday()->Format('D d-m-Y');
        $request->validate([
            'yesterday' => 'required |min:3|max:255',
            'today' => 'required|min:3| max:255',
            'issues' => 'present|max:255',
            'morale' => 'required',
        ]);
        $standup = new Standup([
            'yesterday_update' => $request->input('yesterday'),
            'today_update' => $request->input('today'),
        ]);
        if ($request->input('issues') != null) {

            $issue = new Issue([
                'title' => $request->input('issues'),
            ]);
            Auth::user()->issues()->save($issue);
        }
        $morale = new Morale([
            'value' => $request->input('morale'),
        ]);


        Auth::user()->morales()->save($morale);
        Auth::user()->standups()->save($standup);
        return redirect()->back()->with('success', 'You have updated your daily standup.');
    }
}
