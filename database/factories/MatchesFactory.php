<?php

namespace Database\Factories;

use App\Models\Matches;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Matches>
 */
class MatchesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model=Matches::class;
    public function definition(): array
    {
        $userId = DB::table('users')->inRandomOrder()->value('id');
        $teamLocal = DB::table('teams')->inRandomOrder()->value('id');
        $teamGuest = DB::table('teams')->inRandomOrder()->where('id','!=', $teamLocal)->value('id');
        


        return [
            
            'user_id' =>$userId,
            'local_id'=>$teamLocal,
            'guest_id'=>$teamGuest,
            'date'=>fake()->date(),
            'result' => fake()->randomElement([$teamGuest,$teamLocal]),

        ];
    }
}
