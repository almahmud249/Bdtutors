<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_classes', function (Blueprint $table) {
            $table->id();
            $table->string('banglaClass')->nullable();
            $table->string('englishClass')->nullable();
            $table->string('language')->nullable();
            $table->string('computer')->nullable();
            $table->string('activities')->nullable();
            $table->string('medium')->nullable();
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
        Schema::dropIfExists('education_classes');
    }
}
