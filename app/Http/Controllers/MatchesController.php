<?php

namespace App\Http\Controllers;
use App\Http\Controllers\TeamsController;
use App\Models\Matches;
use App\Models\Teams;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;




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
            'user_id' => 'required',
            'local_id' => 'required|max:255',
            'guest_id' => [
                'required',
                Rule::notIn([$request->input('local_id')]),
            ],
            'date' => 'required',
            'result' => 'required',
            
            
          ]);
          $match=Matches::create($request->all());
          return redirect()->route('fight.get',['id'=> $match->id])
            ->with('success', 'match created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function showMatchTeams()
    {
        $user = auth()->user();
        $isAuthenticated = Auth::check();
        if(!$user){
            return redirect()->route('welcome')->with('error', 'Por favor, inicia sesión para jugar.');
        }
        $userId = $user->id;
        $availableTeams= Teams::all();
        return view('createMatch', compact('availableTeams','userId'));
    
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
        $match = Matches::find($id);
        $match->delete();
        return redirect()->route('allMatches.get')
        ->with('success', 'Post deleted successfully');
    }

    public function show()
    {
        $matches = Matches::all(); 
        return view('/getMatches', ['matches' => $matches]);
    }
    public function showMatch(string $id)
    {
        $match = Matches::with('teamLocal','teamGuest')->find($id); 
        return view('/fight', ['match' => $match]);
    }

    public function determineWinner(Request $request)
    {
        $localPower = intval($request->input('localPower'));
        $guestPower = intval($request->input('guestPower'));
        $localName = $request->input('idLocal');
        $guestName = $request->input('idGuest');

        $localResult=$this->calculateResult($localPower);
        $guestResult=$this->calculateResult($guestPower);
    
      
        if ($localResult>$guestResult){
            $winner=$localResult;
            $winnerName=$localName;   
        }
        elseif($localResult<$guestResult){
            $winner=$guestResult;
            $winnerName=$guestName;  
        }
        else{
            $winner="it's a tie";
        }
        $match=Matches::find($request->input('match_id'));
        $match->result=$winnerName;
        $match->save();
        return view('fight', ['winner' => $winner, 'match'=>$match, 'winnerName'=>$winnerName]);

    }

    public function calculateResult(int $power){
        $probability=(max(1,100-$power));
        $finalPower=rand(-50,$probability);
        return $finalPower;
    }
}
