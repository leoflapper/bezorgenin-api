<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCascadesToCompanyKitchenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_kitchen', function (Blueprint $table) {
            $table->dropForeign('company_kitchen_company_id_foreign');
            $table->dropForeign('company_kitchen_kitchen_id_foreign');
            $table->foreign('kitchen_id')->references('id')->on('kitchens')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_kitchen', function (Blueprint $table) {
            //
        });
    }
}
