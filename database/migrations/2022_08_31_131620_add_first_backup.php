<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        if (File::exists(resource_path('2022-08-31-13-10-28.zip'))) {

            if (!File::exists(storage_path('app/faz-book-backup'))) {
                File::makeDirectory(storage_path('app/faz-book-backup'));
            }

            copy(resource_path('2022-08-31-13-10-28.zip'), storage_path('app/faz-book-backup/2022-08-31-13-10-28.zip'));

        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        //
    }
};
