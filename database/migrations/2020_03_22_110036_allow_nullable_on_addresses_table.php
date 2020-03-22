<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AllowNullableOnAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->string('street')->nullable()->change();
            $table->integer('housenumber')->nullable()->change();
            $table->string('postcode', 100)->nullable()->change();
            $table->string('city')->nullable()->change();
            $table->string('country_id', 2)->default('NL')->change();
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
