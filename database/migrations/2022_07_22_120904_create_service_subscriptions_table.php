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
        Schema::create('service_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('service_id')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->enum('status', ['active', 'pending', 'cancel', 'expired'])->default('pending');
            $table->string('payments_status');
            $table->double('monthly_amount', 8, 2);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->date('trial_end_date')->nullable();
            $table->date('next_payment_date')->nullable();
            $table->date('over_payment_date')->nullable();
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('created_by')->references('id')->on('users');

            $table->index('order_id');
            $table->index('service_id');
            $table->index('created_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_subscriptions');
    }
};
