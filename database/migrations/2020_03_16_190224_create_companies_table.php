<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompaniesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('address_id')->unsigned();
            $table->decimal('delivery_costs', 16, 4);
            $table->decimal('min_order_amount', 16, 4);
            $table->string('email');
            $table->string('telephone', 100);
            $table->string('iban');
            $table->string('kvk');
            $table->string('vat_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('address_id')->references('id')->on('addresses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('companies');
    }
}
