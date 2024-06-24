<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $Faker): void
    {
       for ($i=0; $i < 10; $i++) { 

        $newProject = new Project();
        $newProject->title = $Faker ->sentence(3);
        $newProject->description = $Faker->paragraph(6);
        $newProject->slug= Str::slug($newProject->title);
        $newProject->status = $Faker->randomElement(['ongoing', 'completed']);
        $newProject->used_technologies= $Faker->randomElement(['HTML', 'CSS', 'JAVASCRIPT','PHP','VUE.JS','LARAVEL']);

        $newProject->save();
        
       }
    }
}
