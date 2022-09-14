<?php
namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder{
    /**
     * Seed the application's database.
     * @return void
     */
    public function run(){
        Category::factory(5)->create();
    }
}
