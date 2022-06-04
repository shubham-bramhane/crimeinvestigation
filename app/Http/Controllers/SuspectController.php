<?php

namespace App\Http\Controllers;

use App\Models\CaseHistory;
use App\Models\CaseOffice;
use App\Models\CrimeCase;
use App\Models\Suspect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuspectController extends Controller
{
    public function index()
    {
        $cases = CaseOffice::with('crimeCase')->where('user_id', auth()->user()->id)->get();
        return view('officer.suspects.index', compact('cases'));
    }

    public function AdminIndex($id)
    {
        $suspects = Suspect::where('crime_case_id', $id)->get();
        return view('admin.suspect.index', compact('suspects'));
    }

    public function create($id)
    {
        return view('officer.suspects.create', compact('id'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required|unique:suspects|digits:10',
            'address' => 'nullable',
            'relation' => 'nullable',
            'notes' => 'nullable',
            'profile_pic' => 'required|image',
        ]);

        $path = $request->file('profile_pic')->store('suspects', 'public');

        CrimeCase::find($id)->suspects()->create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'relation' => $request->relation,
            'notes' => $request->notes,
            'profile_pic' => $path,
        ]);

        CaseHistory::create([
            'crime_case_id' => $id,
            'notes' => 'Suspect Added : ' . $request->name,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('officer.suspects.show', $request->crime_case_id)->with('success', 'Suspect added successfully');
    }

    public function show($id)
    {
        $suspects = Suspect::where('crime_case_id', $id)->get();
        return view('officer.suspects.show', compact('id', 'suspects'));
    }

    public function edit($id)
    {
        $suspect = Suspect::find($id);
        return view('officer.suspects.edit', compact('suspect'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required|digits:10',
            'address' => 'nullable',
            'relation' => 'nullable',
            'notes' => 'nullable',
            'profile_pic' => 'nullable|image',
        ]);

        $suspect = Suspect::find($id);

        $path = $suspect->profile_pic;

        if ($request->hasFile('profile_pic')) {
            Storage::disk('public')->delete($suspect->profile_pic);
            $path = $request->file('profile_pic')->store('suspects', 'public');
        }

        $suspect->update([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'relation' => $request->relation,
            'notes' => $request->notes,
            'profile_pic' => $path,
        ]);

        CaseHistory::create([
            'crime_case_id' => $suspect->crime_case_id,
            'notes' => 'Suspect Updated : ' . $request->name,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('officer.suspects.show', $suspect->crime_case_id)->with('success', 'Suspect updated successfully');
    }

    public function destroy($id)
    {
        $suspect = Suspect::find($id);
        Storage::disk('public')->delete($suspect->profile_pic);

        CaseHistory::create([
            'crime_case_id' => $suspect->crime_case_id,
            'notes' => 'Suspect Removed : ' . $suspect->name,
            'user_id' => auth()->id()
        ]);

        $suspect->delete();
        return redirect()->route('officer.suspects.show', $suspect->crime_case_id)->with('success', 'Suspect deleted successfully');
    }
}
