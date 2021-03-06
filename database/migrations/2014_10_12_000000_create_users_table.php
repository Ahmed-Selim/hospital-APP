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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('profile_picture')->nullable();
            $table->enum('gender', ['Male', 'Female']);

            $table->unsignedBigInteger('role_id')->default(3);
            $table->foreign('role_id')->references('id')->on('user_roles')->onDelete('cascade');

            $table->unsignedBigInteger('doctor_spec_id')->nullable();
            $table->foreign('doctor_spec_id')->references('id')->on('specializations')->onDelete('cascade');

            $table->string('doctor_licence_no')->nullable();

            $table->text('bio')->nullable();
            
            $table->rememberToken();
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
