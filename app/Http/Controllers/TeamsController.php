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
    //dd($request->all());

    $request->validate([
      'name' => 'required|max:255',
      'power' => 'required|integer',
      'trainer' => 'required',
      'fighter_image' => 'required'
    ], [
      'name.required' => "please enter your figther's name",
      'power.required' => "Please set your fighter's power.",
      'trainer.required' => 'please enter your name',
      'fighter_image.required' => 'please select one of the figthers'

    ]);
    $power = intval($request->input('power'));
    //dd($request->all());
    Teams::create([
      'name' => $request->input('name'),
      'power' => $power,
      'trainer' => $request->input('trainer'),
      'fighter_image' => $request->input('fighter_image'),
    ]);

    // Teams::create($request->all());
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

   // public function showNoview()
    //{
      //$teams = Teams::all(); 
      //return view('/createMatch', ['teams' => $teams]);
    //}


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
      //dd($request->all());
        $request->validate([
            'name' => 'required|max:255',
            'trainer' => 'required',
            'power' => 'required',
          ],[
            'name.required' => "please enter your figther's name",
            'power.required' => "Please set your fighter's power.",
            'trainer.required' => 'please enter your name',  
          ]);
          $team = Teams::find($id);
          $team->update($request->all());
          return redirect()->route('welcome')
            ->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
      //dd('Reached TeamsController@destroy');
      $figther= Teams::find($id);
      if($figther){
        $figther->delete();
        return redirect()->route('teams.show');
      }
      else{
        return('figther not found');
      }
      
    }

    public function edit($id)
  {
    $team = Teams::find($id);
    return view('/editTeam', compact('team'));
  }
}
