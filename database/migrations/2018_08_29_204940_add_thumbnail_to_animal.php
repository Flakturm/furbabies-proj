<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddThumbnailToAnimal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shelter_animals', function (Blueprint $table) {
            $table->string('thumb_file')->nullable()->after('album_file');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shelter_animals', function (Blueprint $table) {
            $table->dropColumn('thumb_file');
        });
    }
}
