<?php
namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Level;
use App\Models\Role;
use App\Models\Student;
use App\Models\Teacher;
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
        Storage::deleteDirectory('courses');
        Storage::deleteDirectory('users');
        Storage::makeDirectory('courses');
        Storage::makeDirectory('users');
        Role::factory()->create(['name' => 'admin']);
        Role::factory()->create(['name' => 'teacher']);
        Role::factory()->create(['name' => 'student']);
        User::factory()->create([
            'name'     => 'admin',
            'email'    => 'admin@gmail.com',
            'password' => bcrypt('secret'),
            'role_id'  => Role::ADMIN
        ])
            ->each(function(User $u){
                Student::factory()->create(['user_id' => $u->id]);
        });

        User::factory(50)->create()
            ->each(function(User $u){
                Student::factory()->create(['user_id' => $u->id]);
            });

        User::factory(10)->create()
            ->each(function(User $u){
                Student::factory()->create(['user_id' => $u->id]);
                Teacher::factory()->create(['user_id' => $u->id]);
            });

        Level::factory()->create(['name' => 'Beginner']);
        Level::factory()->create(['name' => 'Intermediate']);
        Level::factory()->create(['name' => 'Advanced']);

        Category::factory(5)->create();

    }
}
