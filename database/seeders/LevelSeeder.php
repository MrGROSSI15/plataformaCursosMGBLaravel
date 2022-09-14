<?php
namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder{
    /**
     * Seed the application's database.
     * @return void
     */
    public function run(){

        Level::factory()->create(['name' => 'Beginner']);
        Level::factory()->create(['name' => 'Intermediate']);
        Level::factory()->create(['name' => 'Advanced']);
    }
}
