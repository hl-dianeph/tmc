<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChannelsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('name');
            $table->integer('type_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->string('avatar');
            $table->text('description');
            $table->string('keywords')->nullable();
            $table->string('og_description')->nullable();
            $table->enum('status', ['draft', 'published', 'declined']);
            $table->integer('members_count')->unsigned()->default(1);
            $table->string('telegram_id');
            $table->string('telegram_type');
            $table->integer('author_id')->unsigned();
            $table->integer('moder_id')->unsigned()->nullable();
            
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('author_id')->references('id')->on('users');
            $table->foreign('moder_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('channels');
    }
}
