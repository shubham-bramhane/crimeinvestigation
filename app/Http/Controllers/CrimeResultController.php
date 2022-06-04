<?php

namespace App\Http\Controllers;

use App\Models\CrimeCase;
use App\Models\CrimeResult;
use Illuminate\Http\Request;

class CrimeResultController extends Controller
{
    public function index()
    {
        $cases = CrimeCase::all();
        return view('admin.result.index', compact('cases'));
    }

    public function create($id)
    {
        $case = CrimeCase::find($id);
        return view('admin.result.create', compact('case'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'suspect_id' => 'required',
            'notes' => 'required',
        ]);

        CrimeResult::create([
            'crime_case_id' => $id,
            'suspect_id' => $request->suspect_id,
            'notes' => $request->notes,
        ]);

        return redirect()->route('admin.result.index');
    }
}
