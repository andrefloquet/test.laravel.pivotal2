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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('podcast_id')->constrained()->cascadeOnDelete();
            //$table->unsignedBigInteger('podcast_id');
            $table->string('name');
            $table->string('email');
            $table->text('body');
            $table->timestamps();

            // TODO: Check why it is not working
            //$table->unique(['podcast_id','name', 'email', 'body']);

            //$table->foreignId('podcast_id')->references('id')->on('podcasts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
