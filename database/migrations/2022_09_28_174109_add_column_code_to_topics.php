<?php

use App\Models\Topic;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('topics', static function (Blueprint $table) {
            $table->string('code', 6)->index()->after('title');
        });

        foreach (Topic::withTrashed()->get() as $topic) {
            do {
                $code = Str::random(6);
            } while (Topic::where('code', $code)->exists());
            $topic->update(['code' => $code]);
        }

        Schema::table('topics', static function (Blueprint $table) {
            $table->unique('code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('topics', static function (Blueprint $table) {
            $table->dropIndex('topics_code_index');
            $table->dropUnique('topics_code_unique');
            $table->dropColumn('code');
        });
    }
};
