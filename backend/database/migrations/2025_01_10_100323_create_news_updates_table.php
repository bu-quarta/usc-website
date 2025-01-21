<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_updates', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // title of the news/update
            $table->string('slug')->unique(); // slug for the news-update
            $table->text('description'); // content of the news/update
            $table->timestamp('publish_date')->useCurrent(); // publish date (defaults to current timestamp)
            $table->string('image_path')->nullable(); // path to the image
            $table->enum('status', ['published', 'draft'])->default('draft'); // status of the news/update
            $table->timestamps(); // created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_updates');
    }
}
