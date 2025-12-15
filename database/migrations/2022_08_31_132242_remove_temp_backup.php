<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\File;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (File::exists(storage_path('app/faz-book-backup/2022-08-31-13-10-28.zip'))) {
            unlink(storage_path('app/faz-book-backup/2022-08-31-13-10-28.zip'));
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
