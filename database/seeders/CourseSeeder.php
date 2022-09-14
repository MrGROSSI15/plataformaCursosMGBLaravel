<?php
namespace Database\Seeders;

use App\Models\Course;
use App\Models\Goal;
use App\Models\Requirement;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder{
    /**
     * Seed the application's database.
     * @return void
     */
    public function run(){

        Course::factory(50)->create()
            ->each(function(Course $c){
                $c->goals()->saveMany(Goal::factory(2)->create());
                $c->requirements()->saveMany(Requirement::factory(4)->create());
            });
    }
}
