<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->string('description');
            $table->string('ip');

            $table->bigInteger('type_id');
            $table->bigInteger('position_id');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('devices');
    }
}
