<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuider extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_guider', function (Blueprint $table) {
            $table->increments('id');
            $table->string('guider_name', 100);
            $table->boolean('guider_gender');
            $table->string('guider_address', 200);
            // $table->integer('guider_phone', 11);
            $table->boolean('guider_status');
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
        Schema::dropIfExists('travel_guider');
    }
}
