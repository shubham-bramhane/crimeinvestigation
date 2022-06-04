<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OfficerController extends Controller
{
    public function OfficerIndex()
    {
        return redirect()->route('officer.suspects.index');
        // return view('officer.index');
    }

    public function index()
    {
        $officers = User::where('is_admin', false)->get();
        return view('admin.addOfficer.index', compact('officers'));
    }

    public function create()
    {
        return view('admin.addOfficer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required|digits:10',
            'address' => 'required',
            'area' => 'required',
            'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $request->profile_pic->store('profile_pics', 'public');

        // generate random password for the user

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'area' => $request->area,
            'profile_pic' => $path,
            'is_admin' => false,
            'password' => bcrypt('1234567890'),
        ]);

        return redirect()->route('admin.officer.index')->with('success', 'Officer added successfully');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.addOfficer.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required|digits:10',
            'address' => 'required',
            'area' => 'required',
            'profile_pic' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = User::find($id);

        if ($request->hasFile('profile_pic')) {
            if ($user->profile_pic) {
                Storage::disk('public')->delete($user->profile_pic);
            }
            $path = $request->profile_pic->store('profile_pics', 'public');
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'area' => $request->area,
            'profile_pic' => $path ?? $user->profile_pic,
        ]);

        return redirect()->route('admin.officer.index')->with('success', 'Officer updated successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->profile_pic) {
            Storage::disk('public')->delete($user->profile_pic);
        }

        $user->delete();

        return redirect()->route('admin.officer.index')->with('success', 'Officer deleted successfully');
    }
}
