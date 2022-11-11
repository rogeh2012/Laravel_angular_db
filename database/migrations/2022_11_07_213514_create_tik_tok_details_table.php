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
        Schema::create('tik_tok_details', function (Blueprint $table) {
            $table->unsignedBigInteger('campaign_id')->n;
            $table->integer('tt_posts_imgs');
            $table->integer('tt_posts_vids');
            $table->integer('tt_stories_imgs');
            $table->integer('tt_stories_vids');
            $table->integer('tt_vids');
            $table->integer('tt_vids_duration');
            $table->string('tt_hashtags', 500);
            $table->string('tt_tags', 500);
            $table->timestamps();
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tiktok_details');
    }
};
