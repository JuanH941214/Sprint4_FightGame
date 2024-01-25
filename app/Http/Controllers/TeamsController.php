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
    //return view('/', compact('teams'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      //  dd($request->all());

        /*$request->validate([
            'name' => 'required|max:255',
            'players' => 'required',
            'trainer' => 'required'
          ]);*/
          Teams::create($request->all());
          return redirect()->route('welcome')
            ->with('success', 'Team created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $teams = Teams::all(); 
        return view('/getTeams', ['teams' => $teams]);
    }

    public function showNoview()
    {
      $teams = Teams::all(); 
      return view('/createMatch', ['teams' => $teams]);
    }


    public function showTeam(string $id)
    {
      $post = Teams::find($id);
      return view('posts.show', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
          ]);
          $team = Teams::find($id);
          $team->update($request->all());
          return redirect()->route('welcome')
            ->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function edit($id)
  {
    $team = Teams::find($id);
    return view('/editTeam', compact('team'));
  }
}
