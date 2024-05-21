<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Project;
use Faker\Extension\Helper;
use Faker\Generator as Faker ;

class ProjectsTableSeederFaker extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=0; $i < 60 ; $i++) {
            $new_project = new Project();
            $new_project->title = $faker->word(9, true);
            $new_project->slug = $this->createSlug($new_project->title);
            $new_project->href =$faker->url();
            $new_project->type =$faker->word(9, true);
            $new_project->description =$faker->word(9, true);
            $new_project->save();
        }
    }

    private function createSlug($string){
        $slug = Str::slug($string, '-');
        $original_slug = $slug;

        $exist = Project::where('slug', $slug)->first();
        $c = 1;

        while($exist){
            $slug = $original_slug . '-' . $c;
            $exist = Project::where('slug', $slug)->first();
            $c++;
        }

        return $slug;
    }
}
