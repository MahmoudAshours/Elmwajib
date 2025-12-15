<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'summary' => $this->faker->paragraph,
            'examples_of_evidence' => $this->faker->paragraph,
            'activities' => $this->faker->paragraph,
            'topic_id' => Topic::factory(),
        ];
    }
}
