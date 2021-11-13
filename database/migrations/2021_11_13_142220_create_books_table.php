<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('category_id');
            $table->string('title');
            $table->unsignedDecimal('price');
            $table->unsignedDecimal('rating')->nullable();
            $table->unsignedInteger('number_of_pages');
            $table->unsignedInteger('sold_count');
            $table->text('description');
            $table->string('binding_type');
            $table->string('publisher');
            $table->string('language');
            $table->timestamp('reading_time');
            $table->timestamp('publish_date');
            $table->unsignedInteger('stock_level');
            $table->string('photo_path');
            $table->boolean('active');
            $table->timestamps();

            $table->index('author_id');
            $table->index('category_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
