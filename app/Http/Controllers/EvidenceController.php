<?php

namespace App\Http\Controllers;

use App\Models\CaseHistory;
use App\Models\CaseOffice;
use App\Models\Evidence;
use App\Models\Suspect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EvidenceController extends Controller
{
    public function index()
    {
        $cases = CaseOffice::with('crimeCase')->where('user_id', auth()->user()->id)->get();
        return view('officer.evidence.index', compact('cases'));
    }

    public function create($id)
    {
        $suspects = Suspect::where('crime_case_id', $id)->get();
        return view('officer.evidence.create', compact('id', 'suspects'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'suspect_id' => 'required',
            'type' => 'required',
            'notes' => 'required',
            'points' => 'required',
            'evidence' => 'required',
            'image' => 'required|image',
        ]);

        $path = $request->file('image')->store('evidences', 'public');

        Evidence::create([
            'crime_case_id' => $id,
            'suspect_id' => $request->suspect_id,
            'type' => $request->type,
            'notes' => $request->notes,
            'points' => $request->points,
            'evidence' => $request->evidence,
            'image' => $path,
        ]);

        $suspect = Suspect::find($request->suspect_id);

        CaseHistory::create([
            'crime_case_id' => $id,
            'notes' => "Evidence Added : $suspect->name($request->type)",
            'user_id' => auth()->id()
        ]);

        return redirect()->route('officer.evidences.show', $id)->with('success', 'Evidence added successfully');
    }

    public function show($id)
    {
        $evidences = Evidence::where('crime_case_id', $id)->get();
        return view('officer.evidence.show', compact('id', 'evidences'));
    }

    public function edit($id)
    {
        $evidence = Evidence::find($id);
        $suspects = Suspect::where('crime_case_id', $evidence->crime_case_id)->get();
        return view('officer.evidence.edit', compact('evidence', 'suspects'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'suspect_id' => 'required',
            'type' => 'required',
            'notes' => 'required',
            'points' => 'required',
            'evidence' => 'required',
            'image' => 'image',
        ]);

        $evidence = Evidence::find($id);

        $path = $evidence->image;

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($evidence->image);
            $path = $request->file('image')->store('evidences', 'public');
        }

        $evidence->update([
            'suspect_id' => $request->suspect_id,
            'type' => $request->type,
            'notes' => $request->notes,
            'points' => $request->points,
            'evidence' => $request->evidence,
            'image' => $path,
        ]);

        $suspect = Suspect::find($request->suspect_id);

        CaseHistory::create([
            'crime_case_id' => $evidence->crime_case_id,
            'notes' =>  "Evidence Updated : $suspect->name($request->type)",
            'user_id' => auth()->id()
        ]);

        return redirect()->route('officer.evidences.show', $evidence->crime_case_id)->with('success', 'Evidence updated successfully');
    }

    public function destroy($id)
    {
        $evidence = Evidence::find($id);
        Storage::disk('public')->delete($evidence->image);

        CaseHistory::create([
            'crime_case_id' => $evidence->crime_case_id,
            'notes' => 'Evidence Removed : ' . $evidence->suspect->name . "($evidence->type)",
            'user_id' => auth()->id()
        ]);

        $evidence->delete();

        return redirect()->route('officer.evidences.show', $evidence->crime_case_id)->with('success', 'Evidence deleted successfully');
    }
}
