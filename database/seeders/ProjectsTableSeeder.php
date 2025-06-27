<?php

namespace Database\Seeders;

use App\Models\Project;
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

        for ($i = 0; $i < 10; $i++) {

            $newProject = new Project();

            $technologies = $faker->randomElements(
                ['HTML', 'CSS', 'JavaScript', 'React', 'Express.js', 'Node.js', 'PHP', 'Laravel', 'MySQL'],
                rand(2, 4)
            );

            $newProject->title = $faker->sentence(3);
            $newProject->description = $faker->paragraph(3);
            $newProject->image = $faker->imageUrl(640, 480, true);
            $newProject->technologies = implode(',', $technologies);
            $newProject->github_url = $faker->url();
            $newProject->site_url = $faker->url();
            $newProject->created_at = $faker->dateTimeBetween('-2 years', 'now');
            $newProject->updated_at = now();

            $newProject->save();
        }
    }
}
