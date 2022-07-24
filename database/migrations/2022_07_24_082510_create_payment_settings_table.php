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
        Schema::create('payment_settings', function (Blueprint $table) {
            $table->id();
            $table->enum('method_type', ['paypal', 'stripe'])->nullable();
            $table->enum('mode', ['live', 'test'])->nullable();
            $table->string('test_public_key')->nullable();
            $table->string('test_secret_key')->nullable();
            $table->string('live_public_key')->nullable();
            $table->string('live_secret_key')->nullable();
            $table->boolean('default_payment')->default(0);
            $table->boolean('status')->default(0);
            $table->enum('display_order', [0, 1])->default(0);
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
        Schema::dropIfExists('payment_settings');
    }
};
