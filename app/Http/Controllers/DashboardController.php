<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\Day;
use App\Models\Role;
use App\Models\Team;
use App\Models\User;
use App\Models\Project;
use App\Charts\DashboardChart;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PasswordUpdateRequest;

class DashboardController extends Controller
{

    /*
    Redirect user to his own dashboard
    Logged user cannot access other user's dashboards
     */
    public function getDashboard(User $user)
    {
        $this->authorize('accessDashBoard', $user);
        $labels = [];
        $data = [];
        $morales = $user->morales;
        if ($morales->count()) {
            foreach ($morales as $moral) {
                $labels[] = $moral->created_at->format('D d-m-y');
                $data[] = $moral->value;
            }
        }

        $chart = new DashboardChart();
        $chart->labels =  $labels;
        $chart->dataset('morales', 'line', $data);
        $chart->color = "red";
        return view('dashboard.Account.dashboard', compact('user', 'chart'));
    }

    /*
    Read  the logged user's  data in the dashboard
     */

    public function getUserData(User $user)
    {
        $this->authorize('accessDashBoard', $user);
        $member = $user;
        $teams = Team::all();
        $roles = Role::all();
        $projects = Project::all();
        $members = User::paginate(1);
        $days = Day::all();
        return view('dashboard.Account.userData', compact(['user', 'member', 'projects', 'teams', 'members', 'roles', 'days']));
    }

    /*
    Get the new standup form in the dashboard
     */

    public function getnewStandupForm()
    {
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();
        $lastWorkingDay = Auth::user()->lastWorkingDay(Auth::user());
        $nextWorkingDay = Auth::user()->nextWorkingDay(Auth::user());
        Carbon::yesterday()->Format('D d-m-Y');
        $user = Auth::user();
        return view('dashboard.Account.newStandup', compact(['user', 'lastWorkingDay', 'nextWorkingDay', 'today', 'yesterday']));
    }

    public function getReportedIssues(User $user)
    {
        $issues = $user->issues;
        return view('dashboard.Account.issues', compact(['user', 'issues']));
    }


    public function editPassword(User $user)
    {
        return view('dashboard.Account.updatePassword', compact('user'));
    }

    public function updatePassword(PasswordUpdateRequest $request, User $user)
    {
        $user->update([
            'password' => Hash::make($request->input('password')),
        ]);
        return redirect()->back()->with('success', 'Password successfully updated');
    }
}
