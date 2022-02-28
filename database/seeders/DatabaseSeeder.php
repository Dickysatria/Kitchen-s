<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([

            'name' => 'Riyan Dicky Satria',
            'username' => 'Dicky Ganteng',
            'email'=>  'dickysatria62@gmail.com',
            'password'=> bcrypt('12345')

        ]);

        User::factory(4)->create();

        Category::create([
            'name' => 'Fried',
            'slug' => 'fried'
        ]);
        Category::create([
            'name' => 'Boiled',
            'slug' => 'boiled'
        ]);
        Category::create([
            'name' => 'Grilled',
            'slug' => 'grilled'
        ]);

        Post::factory(20)->create();
    }
}
