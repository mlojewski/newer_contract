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
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->string('featured_title');
            $table->text('featured_content');
            $table->string('top_sports_title');
            $table->text('top_sports_content');
            $table->string('partners_title');
            $table->text('partners_content');
            $table->string('top_countries_title');
            $table->text('top_countries_content');
            $table->string('blog_title');
            $table->text('blog_content');
            $table->string('dual_title');
            $table->text('dual_content');
            $table->string('pricing_title');
            $table->text('pricing_content');
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
        Schema::dropIfExists('homes');
    }
};
