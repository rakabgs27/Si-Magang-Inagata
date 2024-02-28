<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $profile = Profile::where('user_id', $userId)->first();
        return view('profile.index')->with(['profile' => $profile]);
    }

    public function create()
    {
        return view('profiles.create');

    }

    public function store(ProfileRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('profile', 'public');
        }
        Profile::create($data);
        return redirect()->route('profiles.index');
    }

    public function show(Profile $profile)
    {
        return view('profiles.show', compact('profile'));
    }

    public function edit(Profile $profile)
    {
        return view('profiles.edit', compact('profile'));
    }

    public function update(ProfileRequest $request, Profile $profile)
    {
        $data = $request->validated();
        if ($request->hasFile('foto')) {
            if ($profile->foto && Storage::disk('public')->exists($profile->foto)) {
                Storage::disk('public')->delete($profile->foto);
            }
            $data['foto'] = $request->file('foto')->store('profile', 'public');
        }
        $profile->update($data);
        return redirect()->route('profile.index');
    }

    public function destroy(Profile $profile)
    {
        Storage::disk('public')->delete($profile->foto);
        $profile->delete();
        return redirect()->route('profiles.index');
    }
}
