<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventoryitems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id');
            $table->string('item_name');
            $table->string('item_description');
            $table->text('item_comments')->nullable();
            $table->decimal('item_price');
            $table->unsignedInteger('package_units')->nullable();
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
        Schema::dropIfExists('inventoryitems');
    }
}
