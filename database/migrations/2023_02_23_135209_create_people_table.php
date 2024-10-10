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
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('residence')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('video_url')->nullable();
            $table->string('fb_url')->nullable();
            $table->string('ig_url')->nullable();
            $table->string('sport_additional')->nullable();
            $table->text('career')->nullable();
            $table->text('achievements')->nullable();
            $table->text('billing_address')->nullable();
            $table->string("tax_id")->nullable();
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
