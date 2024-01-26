<?php

namespace App\Http\Controllers;
use App\Http\Controllers\TeamsController;
use App\Models\Matches;
use App\Models\Teams;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;



class MatchesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $teams = Matches::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   //dd($request->all());
        $request->validate([
            'local_id' => 'required|max:255',
            'guest_id' => [
                'required',
                Rule::notIn([$request->input('local_team_id')]),
            ],
            'date' => 'required',
            'result' => 'required',
            
            
          ]);
          Matches::create($request->all());
          return redirect()->route('allMatches.get')
            ->with('success', 'match created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function showMatchTeams()
    {
        $availableTeams= Teams::all();
        return view('createMatch', compact('availableTeams'));
    

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

    public function show()
    {
        $matches = Matches::all(); 
        return view('/getMatches', ['matches' => $matches]);
    }
}
