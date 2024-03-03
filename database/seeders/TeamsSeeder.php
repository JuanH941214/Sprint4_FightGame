<?php

namespace Database\Seeders;

use App\Models\Teams;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
       // $totalTrainers = count($trainers);

        foreach ($users as $user) {
            Teams::factory()->count(3)->create(['user_id' => $user->id]);       
        }
    }
}
