<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogs', function (Blueprint $table) {
            $table->id();
             $table->string('name')->unique();
             $table->unsignedInteger("qty_per_bulk")->default(1);
             $table->double("qty_in_stock")->default(0);
             $table->integer("low_stock_qty")->default(0);
            $table->string('catalog_type');
            $table->string('description')->default("");
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
        Schema::dropIfExists('catalogs');
    }
}
