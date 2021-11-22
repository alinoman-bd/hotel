<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug');
            $table->string('name');
            $table->unsignedBigInteger('user_id');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('image')->nullable();
            $table->mediumText('short_title');
            $table->mediumText('nearest_locations');
            $table->mediumText('address');
            $table->mediumInteger('number_of_rooms');
            $table->mediumInteger('number_of_people');
            $table->longText('description');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('lake_id');
            $table->unsignedBigInteger('river_id');
            $table->unsignedBigInteger('sea_id');
            $table->float('min_price');
            $table->float('max_price');
            $table->float('total_min_price');
            $table->float('total_max_price');
            $table->unsignedBigInteger('price_type_id');
            $table->unsignedBigInteger('season_id');
            $table->unsignedBigInteger('payment_type_id');

            $table->integer('is_active')->default(1);
            $table->unsignedBigInteger('package_id');

            $table->float('distance_from_lake')->nullable();
            $table->float('distance_from_river')->nullable();
            $table->float('distance_from_sea')->nullable();
            $table->mediumText('contact_person')->nullable();
            $table->mediumText('note')->nullable();
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('locations');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('lake_id')->references('id')->on('lakes');
            $table->foreign('river_id')->references('id')->on('rivers');
            $table->foreign('sea_id')->references('id')->on('seas');

            $table->foreign('price_type_id')->references('id')->on('price_types');
            $table->foreign('season_id')->references('id')->on('seasons');
            $table->foreign('payment_type_id')->references('id')->on('payment_types');
            $table->foreign('package_id')->references('id')->on('packages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resources');
    }
}
