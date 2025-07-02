<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            "Web Development",
            "Mobile App",
            "Data Science",
            "Game Development",
            "Machine Learning"
        ];

        foreach ($types as $type) {
            $newType = new Type();

            $newType->name = $type;

            $newType->save();
        }
    }
}
