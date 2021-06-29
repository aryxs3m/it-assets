<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDevicesAddManufacturer extends Migration
{
    public function up()
    {
        Schema::table('devices', function (Blueprint $table) {
            $table->bigInteger('product_id')->nullable();
        });
    }

    public function down()
    {
        Schema::table('devices', function (Blueprint $table) {
            $table->removeColumn('product_id');
        });
    }
}
