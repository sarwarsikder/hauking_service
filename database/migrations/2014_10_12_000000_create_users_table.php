<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();

            $table->string('primary_address');
            $table->string('secondary_address')->nullable();

            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('country')->nullable();

            $table->string('phone')->nullable();
            $table->string('stripe_customer_id')->nullable();


            $table->enum('role', ['user', 'admin'])->default('user');
            $table->boolean('status')->default(0);
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
            $table->boolean('trail_used')->default(0);
            $table->timestamp('email_verified_at')->nullable();


            $table->string('password');
            $table->string('user_profile')->nullable();
            $table->unsignedBigInteger('timezone_id')->nullable();// nullable is not use here in future
            // $table->foreign('timezone_id')->references('id')->on('timezones'); // it will be use next
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

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
