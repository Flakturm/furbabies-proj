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
            $table->enum('kind', ['dog', 'cat', 'other']);
            $table->enum('sex', ['m', 'f', 'n']);
            $table->enum('bodytype', ['mini', 'small', 'medium', 'big', 'other']);
            $table->string('colour');
            $table->enum('age', ['child', 'adult', 'other']);
            $table->enum('sterilisation', ['t', 'f', 'n']);
            $table->enum('bacterin', ['t', 'f', 'n']);
            $table->string('foundplace')->nullable();
            $table->string('title')->nullable();
            $table->enum('status', ['none', 'open', 'apdopted', 'other', 'dead']);
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
