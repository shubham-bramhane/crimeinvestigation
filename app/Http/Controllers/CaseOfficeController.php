<?php

namespace App\Http\Controllers;

use App\Models\CaseHistory;
use App\Models\CaseOffice;
use App\Models\CrimeCase;
use App\Models\User;
use Illuminate\Http\Request;

class CaseOfficeController extends Controller
{
    public function index()
    {
        $cases = CrimeCase::all();
        return view('admin.addOfficerToCase.index', compact('cases'));
    }

    public function create($id)
    {
        $caseOfficers = CaseOffice::where('crime_case_id', $id)->pluck('user_id');
        $officers = User::where('is_admin', false)->whereNotIn('id', $caseOfficers)->get();
        return view('admin.addOfficerToCase.create', compact('id', 'officers'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'officer' => 'required|exists:users,id'
        ]);

        $caseOffice = new CaseOffice();
        $caseOffice->user_id = $request->officer;
        $caseOffice->crime_case_id = $id;
        $caseOffice->save();

        CaseHistory::create([
            'crime_case_id' => $id,
            'notes' => 'New Officer Added : ' . User::find($request->officer)->name,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('admin.cases.index');
    }
}
