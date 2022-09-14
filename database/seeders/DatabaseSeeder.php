<?php
namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Course;
use App\Models\Level;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder{
    /**
     * Seed the application's database.
     * @return void
     */
    public function run(){
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Storage::deleteDirectory('images/courses');
        Storage::deleteDirectory('images/users');
        Storage::makeDirectory('images/courses');
        Storage::makeDirectory('images/users');
        $this->call([
            RoleSeeder::class,
            LevelSeeder::class,
            CategorySeeder::class,
            UserSeeder::class,
            TeacherSeeder::class,
            CourseSeeder::class,
        ]);
    }
}
