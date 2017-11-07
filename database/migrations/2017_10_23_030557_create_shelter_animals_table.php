<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShelterAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shelter_animals', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('animal_id')->unsigned()->unique();
            $table->string('subid');
            $table->integer('shelter_pkid')->unsigned();
            $table->string('place')->nullable();
            $table->string('kind');
            $table->string('gender');
            $table->string('bodytype');
            $table->string('colour');
            $table->string('age');
            $table->string('sterilization');
            $table->string('bacterin');
            $table->string('foundplace')->nullable();
            $table->string('title')->nullable();
            $table->string('status');
            $table->text('remark')->nullable();
            $table->text('caption')->nullable();
            $table->date('opendate');
            $table->date('closeddate');
            $table->dateTime('update');
            $table->dateTime('createtime');
            $table->string('album_file')->nullable();
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
        Schema::dropIfExists('shelter_animals');
    }
}
