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
        Schema::create('language_settings', function (Blueprint $table) {
            $table->id();
            $table->string('language_name')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('default')->default(0);
            $table->boolean('status')->nullable(0);
            $table->integer('display_order')->nullable(0);
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
        Schema::dropIfExists('language_settings');
    }
};
