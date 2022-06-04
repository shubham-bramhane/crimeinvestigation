<?php

namespace App\Http\Controllers;

use App\Models\CaseOffice;
use App\Models\CrimeCase;
use App\Models\User;
use Illuminate\Http\Request;

class CrimeCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cases = CrimeCase::all();
        return view('admin.addCase.index', compact('cases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $officers = User::where('is_admin', false)->get();
        return view('admin.addCase.create', compact('officers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'case_name' => 'required',
            'officer_id' => 'required',
            'notes' => 'required',
        ]);

        $case = CrimeCase::create([
            'case_name' => $request->case_name,
            'notes' => $request->notes,
        ]);

        CaseOffice::create([
            'crime_case_id' => $case->id,
            'user_id' => $request->officer_id,
        ]);

        return redirect()->route('admin.cases.index')->with('success', 'Case added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $case = CrimeCase::find($id);
        $caseO = CaseOffice::where('crime_case_id', $id)->first();
        $officers = User::where('is_admin', false)->get();
        return view('admin.addCase.edit', compact('case', 'officers', 'caseO'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'case_name' => 'required',
            'notes' => 'required',
        ]);

        $case = CrimeCase::find($id);

        $case->update([
            'case_name' => $request->case_name,
            'notes' => $request->notes,
        ]);

        return redirect()->route('admin.cases.index')->with('success', 'Case updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $case = CrimeCase::find($id);
        $case->delete();

        return redirect()->route('admin.cases.index')->with('success', 'Case deleted successfully');
    }
}
