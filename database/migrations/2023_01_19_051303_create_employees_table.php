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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('gender')->nullable();
            $table->text('address')->nullable();
            $table->text('image')->nullable();
            $table->string('id_no')->nullable();
            $table->string('dob')->nullable();
            $table->string('code')->nullable();
            $table->string('join_date')->nullable();
            $table->string('designation_id')->nullable();
            $table->string('salary')->nullable();
            $table->string('status')->nullable();
            $table->string('password')->nullable();
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
        Schema::dropIfExists('employees');
    }
};
