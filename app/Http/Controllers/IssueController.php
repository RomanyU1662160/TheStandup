<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\Support\Facades\Auth;

class IssueController extends Controller
{

    // toggle the status of the reported issues
    public function toggleStatus(Issue $issue)
    {
        $user = Auth::user();
        $issue->update([
            'status' => !$issue->status,
            'solved_by' => $user->id,
        ]);

        $issues = $user->issues;
        return redirect()->back()->with('success', ' Issue status updated')->with(['user' => $user, 'issues' => $issues]);
    }

    // delete  an issue

    public function destroy(Issue $issue)
    {
        $user = Auth::user();

        $issue->delete();
        $issues = $user->issues;
        return redirect()->back()->with('info', ' Issue Deleted')->with(['user' => $user, 'issues' => $issues]);

    }

}