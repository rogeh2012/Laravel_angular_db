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
        Schema::create('instagram_details', function (Blueprint $table) {
            $table->unsignedBigInteger('campaign_id');
            $table->integer('ig_posts_imgs')->nullable();
            $table->integer('ig_posts_vids')->nullable();
            $table->integer('ig_stories_imgs')->nullable();
            $table->integer('ig_stories_vids')->nullable();
            $table->integer('ig_reels')->nullable();
            $table->integer('ig_reel_duration')->nullable();
            $table->string('ig_hashtags', 500)->nullable();
            $table->string('ig_tags', 500)->nullable();
            $table->timestamps();
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instagram_details');
    }
};
