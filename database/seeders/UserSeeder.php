<?php
namespace Database\Seeders;

use App\Models\Role;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder{
    /**
     * Seed the application's database.
     * @return void
     */
    public function run(){

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
    }
}
