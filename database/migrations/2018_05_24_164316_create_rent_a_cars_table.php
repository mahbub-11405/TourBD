<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentACarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent_a_cars', function (Blueprint $table) {
            $table->increments('rentId');
            $table->string('rentName');
            $table->string('rentEmail',100);
            $table->string('rentPassword');
            $table->string('contact');
            $table->text('address');
            $table->string('rentImage');
            $table->integer('locationId');
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
        Schema::dropIfExists('rent_a_cars');
    }
}
