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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('usertype');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mobile');
            $table->string('gender');
            $table->text('address');
            $table->text('image');
            $table->string('fathername');
            $table->string('mothername');
            $table->string('religion');
            $table->string('id_no');
            $table->string('dob');
            $table->string('code');
            $table->string('role');
            $table->string('join_date');
            $table->string('designation_id');
            $table->string('salary');
            $table->string('status');
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
        Schema::dropIfExists('users');
    }
};
