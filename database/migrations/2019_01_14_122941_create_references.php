<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roles_users', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories');
        });
        Schema::table('posts_images', function (Blueprint $table) {
            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('image_id')->references('id')->on('images');
        });
        Schema::table('images', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('categories');
        });
        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('references');
    }
}
