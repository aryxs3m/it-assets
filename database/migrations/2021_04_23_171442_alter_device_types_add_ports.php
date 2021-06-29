<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDeviceTypesAddPorts extends Migration
{
    public function up()
    {
        Schema::table('device_types', function (Blueprint $table) {
            $table->integer('ports')->default(0);
        });
    }

    public function down()
    {
        Schema::table('device_types', function (Blueprint $table) {
            $table->removeColumn('ports');
        });
    }
}
