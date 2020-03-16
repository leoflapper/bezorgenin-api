<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMealsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('meal_category_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('allergens')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('meal_category_id')->references('id')->on('meal_categories');
            $table->foreign('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('meals');
    }
}
