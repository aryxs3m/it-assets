<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceTypesTable extends Migration
{
    public function up()
    {
        Schema::create('device_types', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->string('description')->nullable();
            $table->string('icon')->default('fas fa-server');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('device_types');
    }
}
