<?php

use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_user', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Lesson::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->unique(['user_id', 'lesson_id']);
            $table->boolean('completed')->default(false);
            $table->float('score')->default(0);
            $table->boolean('passed')->default(false);
            $table->integer('attempts')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lesson_user');
    }
}
