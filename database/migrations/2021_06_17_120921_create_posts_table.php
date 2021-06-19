<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->text('content');
            $table->string('post_image')->nullable()->default('images/profile_ph.png');
            // $table->unsignedBigInteger('category_id')->nullable();

            // $table->foreign('category_id')->references('id')->on('categories')->nullOnDelete();
            // $table->foreignId('category_id')->nullable()->constrained("categories")->onDelete('set null');
            // $table->unsignedBigInteger('user_id');

            // $table->foreign('create_user_id')->references('id')->on('users');
            $table->foreignId('create_user_id')->constrained('users');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
