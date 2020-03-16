<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyKitchenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_kitchen', function (Blueprint $table) {
            $table->id();
            $table->integer('kitchen_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->foreign('kitchen_id')->references('id')->on('kitchens');
            $table->foreign('company_id')->references('id')->on('companies');
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
        Schema::dropIfExists('company_kitchens');
    }
}
