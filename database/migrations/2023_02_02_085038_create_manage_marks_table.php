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
        Schema::create('manage_marks', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id')->nullable();
            $table->integer('id_no')->nullable();
            $table->integer('class_id')->nullable();
            $table->integer('year_id')->nullable();
            $table->integer('assign_subject_id')->nullable();
            $table->integer('exam_type_id')->nullable();
            $table->double('mark')->nullable();
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
        Schema::dropIfExists('manage_marks');
    }
};
