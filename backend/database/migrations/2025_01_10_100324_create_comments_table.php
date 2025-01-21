<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('event_post_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('news_update_id')->nullable()->constrained()->onDelete('cascade');
            $table->enum('comment_type', ['news_update', 'event_post']); // Type of comment
            $table->text('content')->nullable();  // Allow NULL values
            $table->integer('likes')->default(0);
            $table->integer('dislikes')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
