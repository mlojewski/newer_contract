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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('residence');
            $table->string('birth_date');
            $table->string('video_url')->nullable();
            $table->string('fb_url')->nullable();
            $table->string('ig_url')->nullable();
            $table->string('sport_additional')->nullable();
            $table->text('career');
            $table->text('achievements');
            $table->text('billing_address');
            $table->string("tax_id");
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
        Schema::dropIfExists('people');
    }
};
