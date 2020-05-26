<?php

namespace App\Http\Controllers;

use App\Models\Day;
use Illuminate\Http\Request;

class DayController extends Controller
{

    /**
     * Display a listing of working days 
     */
     
    public function index()
    {
        $days = Day::all();
        return view('days.index', compact('days'));
    }


}