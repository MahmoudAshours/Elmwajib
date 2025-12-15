<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Question;
use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Call Factory classes.
     *
     */
    public function callFactoryClasses()
    {
        Subject::factory()->has(
            Topic::factory()->count(5)->has(
                Lesson::factory()->count(5)->has(
                    Question::factory()->count(5))
            ))->count(5)->create();
    }

    /**
     * Seed the application's database.
     *
     */
    public function run()
    {
        $this->call(PermissionsSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(CountrySeeder::class);
//        $this->callFactoryClasses();
        $this->statsFile();
    }

    public function statsFile()
    {
        $stats = storage_path('stats/');

        if (!File::exists($stats)) {
            File::makeDirectory($stats);
            File::put($stats . 'book-downloads.json', '{"teacher":0,"student":0}');
        }
    }
}
