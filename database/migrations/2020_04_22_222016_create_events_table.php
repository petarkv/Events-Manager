<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('event_id');
            $table->string('title');
            $table->text('event_description');
            $table->string('place_name');
            $table->string('place_address');
            $table->dateTime('start_event');
            $table->dateTime('end_event');
            $table->double('ticket_price');
            $table->string('www_address');
            $table->string('latitude');
            $table->string('longitude');
            $table->unsignedInteger('id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('city_id');
            $table->foreign('id')->references('id')->on('users')->onDelete('no action');
            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('no action');
            $table->foreign('city_id')->references('city_id')->on('cities')->onDelete('no action');
            $table->tinyInteger('is_active');
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
        Schema::dropIfExists('events');
    }
}
