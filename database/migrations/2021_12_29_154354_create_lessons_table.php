<?php

use App\Models\Lesson;
use App\Models\Topic;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index();
            $table->longText('summary')->nullable();
            $table->longText('examples_of_evidence')->nullable();
            $table->longText('activities')->nullable();
            $table->foreignIdFor(Lesson::class, 'parent_id')->nullable()->constrained('lessons');
            $table->foreignIdFor(Topic::class)->constrained();
            $table->softDeletes();
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
        Schema::dropIfExists('lessons');
    }
}
