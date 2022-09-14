<?php
namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder{
    /**
     * Seed the application's database.
     * @return void
     */
    public function run(){

        Role::factory()->create(['name' => 'admin']);
        Role::factory()->create(['name' => 'teacher']);
        Role::factory()->create(['name' => 'student']);
    }
}
