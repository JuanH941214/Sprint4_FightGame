<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teams;


class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $teams = Teams::all();
    return view('welcome.blade.php', compact('teams'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'players' => 'required',
            'trainer' => 'required'
          ]);
          Teams::create($request->all());
          return redirect()->route('welcome.blade.php')
            ->with('success', 'Team created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
