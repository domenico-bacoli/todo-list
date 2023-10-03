<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use Illuminate\Support\Str;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++) {
            $todo = new Todo();

            $todo->title = $faker->sentence(2);
            $todo->note = $faker->sentence(10);
            $todo->expiration_date = $faker->date();
            $todo->is_completed = false;
            $todo->slug = Str::slug($todo->title, '-');

            $todo->save();
        };
    }
}
