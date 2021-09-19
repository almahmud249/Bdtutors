<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutionRelatedInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tution_related_infos', function (Blueprint $table) {
            $table->id();
            $table->string('qualification')->nullable();
            $table->string('currentStatus')->nullable();
            $table->string('dayPerW')->nullable();
            $table->string('salary')->nullable();
            $table->string('place_area')->nullable();
            $table->string('tutoring_approach')->nullable();
            $table->string('learning_place')->nullable();
            $table->string('user_id')->nullable();
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
        Schema::dropIfExists('tution_related_infos');
    }
}
