<?php

namespace App\Http\Controllers;

use App\Models\CaseHistory;
use App\Models\CaseOffice;
use App\Models\CrimeCase;
use Illuminate\Http\Request;

class CaseHistoryController extends Controller
{
    public function index()
    {
        $cases = CaseOffice::with('crimeCase')->where('user_id', auth()->user()->id)->get();
        return view('officer.history.index', compact('cases'));
    }

    public function adminIndex()
    {
        $cases = CrimeCase::all();
        return view('admin.history.index', compact('cases'));
    }

    public function show($id)
    {
        $histories = CaseHistory::with('user')->where('crime_case_id', $id)->get();
        return view('officer.history.show', compact('histories'));
    }

    public function adminShow($id)
    {
        $histories = CaseHistory::with('user')->where('crime_case_id', $id)->get();
        return view('admin.history.show', compact('histories'));
    }
}
