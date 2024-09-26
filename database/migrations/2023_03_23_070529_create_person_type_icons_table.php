<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_type_icons', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->unsignedBigInteger('person_type_id');
            $table->foreign('person_type_id')->references('id')->on('person_types');
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
        Schema::dropIfExists('person_type_icons');
    }
};
