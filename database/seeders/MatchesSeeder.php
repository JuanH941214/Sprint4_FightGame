<?php

namespace Database\Seeders;

use App\Models\Matches;
use App\Models\Teams;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatchesSeeder extends Seeder
{
    /*

    private function getidentificationNumber($user){
        
    }*/
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        $users = User::all();
       
       // $totalTrainers = count($trainers);
       foreach($users as $user){
        $teams = Teams::where('user_id', $user->id)->get();
        foreach ($teams as $team) {
            Matches::factory()->count(3)->create([
                'user_id' => $user->id,
                'local_id' => $team->id,
                'guest_id' => $this->getRandomId($teams,$team->id),
                'result' => rand(0, 1) == 0 ? $team->id : $this->getRandomId($teams, $team->id),
            ]);
        }         
       }
       
        
    }

    private function getRandomId($teams,$excludesTeamId){
        $filteresTeams=$teams->where('id','!=',$excludesTeamId);
        return $filteresTeams->random()->id;

    }
}
