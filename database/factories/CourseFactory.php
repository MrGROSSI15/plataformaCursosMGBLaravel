<?php
namespace Database\Factories;

use App\Models\Category;
use App\Models\Course;
use App\Models\Level;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory{
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    public function definition(){
        $name   = fake()->name();
        $status = fake()->randomElement([Course::PUBLISHED, Course::PENDING, Course::REJECTED]);
        return [
            'teacher_id'  => Teacher::all()->random()->id(),
            'category_id' => Category::all()->random()->id(),
            'level_id' => Level::all()->random()->id(),
            'name' => $name,
            'slug' => str_getcsv($name, '-'),
            'description' => fake()->paragraph,
            'picture' => fake()->image(storage_path(). '/app/images/courses','600', '550', 'business', 'false'),
            'status' => $status,
            'previous_approved' => !($status !== Course::PUBLISHED),
            'previous_rejected' => $status === Course::REJECTED

        ];
    }
}
