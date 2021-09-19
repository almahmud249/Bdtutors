<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestTutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_tutors', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("area");
            $table->string("medium");
            $table->string("class");
            $table->string("subject");
            $table->string("school");
            $table->string("days");
            $table->string("studentGenders");
            $table->string("salery");
            $table->string("tutorGenders");
            $table->string("address");
            $table->string("email");
            $table->string("phone");
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
        Schema::dropIfExists('request_tutors');
    }
}
