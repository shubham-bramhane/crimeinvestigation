<?php

namespace App\Http\Controllers;

use App\Models\CrimeCase;
use App\Models\Suspect;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // $token = JWTAuth::attempt(auth()->user());
        // dd($token);
        return redirect()->route('admin.cases.index');
        // return view('admin.index');
    }

    public function predictIndex()
    {
        $cases = CrimeCase::all();
        return view('admin.predict.index', compact('cases'));
    }

    public function predictShow($id)
    {
        $case = CrimeCase::with('suspects.evidence')->find($id);

        $suspect_id = null;
        $hightest_point = 0;

        foreach ($case->suspects as $suspect) {
            $points = $suspect->evidence->sum('points');

            // iterate through the evidence and get the highest points
            if ($points > $hightest_point) {
                $hightest_point = $points;
                $suspect_id = $suspect->id;
            }
        }

        $suspect = Suspect::with('evidence')->find($suspect_id);

        if (isset($suspect)) {
            return view('admin.predict.show', compact('case', 'suspect'));
        } else {
            return back()->with('error', 'No Evidence found');
        }
    }
}
