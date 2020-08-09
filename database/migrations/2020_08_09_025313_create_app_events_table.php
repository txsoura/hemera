<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->datetime('start');
            $table->datetime('end');
            $table->enum('type', ['free', 'paid']);
            $table->decimal('price')->nullable();
            $table->string('img')->nullable();
            $table->integer('category_id')->unsigned();
            $table->integer('address_id')->unsigned();
            $table->integer('merchant_id')->unsigned();
            $table->timestamps();

            // $table->foreign('category_id')->references('id')->on('app_categories')->onDelete('cascade');
            // $table->foreign('address_id')->references('id')->on('app_addresses')->onDelete('cascade');
            // $table->foreign('merchant_id')->references('id')->on('app_merchants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('app_events');
    }
}
