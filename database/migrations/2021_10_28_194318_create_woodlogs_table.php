<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWoodlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('woodlogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id');
            $table->decimal('log_price');
            $table->string('log_owner')->nullable();
            $table->decimal('log_diameter');
            $table->decimal('log_length');
            $table->string('wood_type');
            $table->string('wood_quality');
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
        Schema::dropIfExists('woodlogs');
    }
}
