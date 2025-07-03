<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        // prendo tutte le tecnologie
        $technologies = Technology::all();

        for ($i = 0; $i < 10; $i++) {

            $newProject = new Project();

            $newProject->title = $faker->sentence(3);
            $newProject->type_id = rand(1, 5);
            $newProject->description = $faker->paragraph(3);
            $newProject->image = $faker->imageUrl(640, 480, true);
            $newProject->github_url = $faker->url();
            $newProject->site_url = $faker->url();
            $newProject->created_at = $faker->dateTimeBetween('-2 years', 'now');
            $newProject->updated_at = now();

            $newProject->save();

            // scelgo casualmente da 2 a 4 tecnologie estraendo una lista di ID
            $randomTechnologies = $technologies->random(rand(2, 4))->pluck('id');

            // associo le tecnologie casuali al progetto
            $newProject->technologies()->attach($randomTechnologies);
        }
    }
}
