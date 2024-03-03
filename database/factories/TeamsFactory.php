<?php

namespace Database\Factories;

use App\Models\Teams;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Random;
use Illuminate\Support\Facades\File;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teams>
 */
class TeamsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Teams::class;
    public function definition(): array
    {
        $userName = DB::table('users')->inRandomOrder()->value('name');
        $userId = DB::table('users')->inRandomOrder()->value('id');

        $imageFiles = File::files(public_path('images'));
        $randomImage = $this->faker->randomElement($imageFiles);




        return [
            'name' => fake()->name(),
            'trainer' => $userName,
            'power' => fake()->numberBetween(0,100),
            'fighter_image' => $randomImage->getFilename(),
            'user_id' =>$userId,
        ];
    }
}
