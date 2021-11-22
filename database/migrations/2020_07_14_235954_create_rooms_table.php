<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('resource_id');
            $table->string('title');
            $table->unsignedBigInteger('price');
            $table->unsignedTinyInteger('allowed_person');
            $table->unsignedTinyInteger('total_rooms');
            $table->unsignedBigInteger('bed_type');
            $table->unsignedBigInteger('total_bed');
            $table->longText('description');
            $table->boolean('is_active')->default(0);
            $table->timestamps();

            $table->foreign('resource_id')->references('id')->on('resources');
            $table->foreign('bed_type')->references('id')->on('bed_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
