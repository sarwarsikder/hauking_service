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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
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

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');

            $table->timestamps();

            $table->index('created_by');
            $table->index('updated_by');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
};
