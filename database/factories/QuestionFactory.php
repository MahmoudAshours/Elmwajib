<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $options = $this->faker->sentences(4);
        $correctAnswer = $options[$this->faker->numberBetween(0, 3)];
        $key = array_search($correctAnswer, $options);
        unset($options[$key]);

        return [
            'title' => $this->faker->sentence,
            'options' => $options,
            'correct_answer' => $correctAnswer,
            'lesson_id' => Lesson::factory(),
        ];
    }
}
