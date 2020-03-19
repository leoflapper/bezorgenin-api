<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number', 100);
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('company_id')->unsigned();
            $table->string('street');
            $table->integer('housenumber');
            $table->string('housenumber_addition', 100)->nullable();
            $table->string('postcode', 100);
            $table->string('city');
            $table->string('country_id', 2);
            $table->string('email');
            $table->string('telephone', 100);
            $table->decimal('subtotal', 16, 4)->default(0);
            $table->decimal('tax', 16, 4)->default(0);
            $table->decimal('shipping_price', 16, 4)->default(0);
            $table->decimal('total_price', 16, 4)->default(0);
            $table->text('note');
            $table->timestamps();
            $table->softDeletes();
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
        Schema::drop('orders');
    }
}
