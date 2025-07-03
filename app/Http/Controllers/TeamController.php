<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('admin.teams.index', compact('teams'));
    }

    public function create()
    {
        return view('admin.teams.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'instagram' => 'nullable',
        ]);

        $path = $request->file('image')?->store('team', 'public');

        Team::create([
            'name' => $request->name,
            'position' => $request->position,
            'description' => $request->description,
            'image' => $path,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
        ]);

        return redirect()->route('teams.index')->with('success', 'Data Team berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('admin.teams.edit', compact('team'));
    }

    public function update(Request $request, $id)
    {
        $team = Team::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'instagram' => 'nullable',
        ]);

        $data = $request->only(['name', 'position', 'description', 'facebook', 'twitter', 'instagram']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('team', 'public');
        }

        $team->update($data);

        return redirect()->route('teams.index')->with('success', 'Data Team berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();

        return redirect()->route('teams.index')->with('success', 'Data Team berhasil dihapus!');
    }

    public function showTeam()
{
    $teams = \App\Models\Team::all();
    return view('front-end.team', compact('teams'));
}

}
