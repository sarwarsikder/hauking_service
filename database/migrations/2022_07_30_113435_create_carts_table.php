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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('session_id')->nullable();

            $table->unsignedBigInteger('service_id')->nullable();
            $table->unsignedBigInteger('order_id')->nullable();

            $table->string('service_name');
            $table->json('subscription_type');
            $table->integer('trial_period');
            $table->json('hawkin_scale');
            $table->json('data_fields');
            $table->json('default_value_day');
            $table->json('default_value_night');
            $table->json('default_value_booster');
            $table->string('default_special_feq');
            $table->string('service_image_url');
            $table->boolean('status')->default(0);

            $table->foreign('user_id')->references('id')->on('users');

            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('order_id')->references('id')->on('orders');


            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

            $table->index('user_id');


            $table->index('service_id');
            $table->index('order_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
};
