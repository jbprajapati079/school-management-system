<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_students', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id')->nullable();
            $table->integer('student_class_id')->nullable();
            $table->integer('student_group_id')->nullable();
            $table->integer('student_shift_id')->nullable();
            $table->integer('student_year_id')->nullable();
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
        Schema::dropIfExists('assign_students');
    }
};
