<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('latitude');
            $table->string('longitude');
            $table->integer('number');
            $table->string('city');
            $table->string('state');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('app_addresses');
    }
}
