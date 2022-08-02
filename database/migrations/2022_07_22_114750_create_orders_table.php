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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->enum('payment_status', ['pending', 'processing', 'cancel', 'complete'])->nullable();
            $table->enum('payment_method', ['stripe', 'paypal']);
            $table->string('payment_type');
            $table->double('tax', 8, 2);
            $table->string('payment_token')->nullable();
            $table->string('payment_url');
            $table->double('total_amount', 8, 2);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('coupon_id')->references('id')->on('coupons');
            $table->index('user_id');
            // $table->index('coupon_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
