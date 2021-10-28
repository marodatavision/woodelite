<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSquaretimbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('squaretimbers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('woodlog_id');
            $table->decimal('timber_price');
            $table->decimal('timber_height');
            $table->decimal('timber_width');
            $table->decimal('timber_length');
            $table->string('timber_quality')->nullable();
            $table->decimal('timber_moisture')->nullable();
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
        Schema::dropIfExists('squaretimbers');
    }
}
