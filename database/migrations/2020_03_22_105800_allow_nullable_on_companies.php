<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AllowNullableOnCompanies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('name')->nullable()->change();
            $table->string('slug')->nullable()->change();
            $table->string('image_url')->nullable()->change();
            $table->string('first_name')->nullable()->change();
            $table->string('last_name')->nullable()->change();
            $table->decimal('delivery_costs', 16, 4)->nullable()->change();
            $table->decimal('min_order_amount', 16, 4)->nullable()->change();
            $table->string('telephone')->nullable()->change();
            $table->string('iban')->nullable()->change();
            $table->string('kvk')->nullable()->change();
            $table->string('vat_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
