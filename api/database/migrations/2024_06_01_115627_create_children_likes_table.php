<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('children_likes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('child_id')->unsigned();
            $table->string('like', 255);
            $table->timestamps();

            $table->foreign('child_id')->references('id')->on('childrens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('children_likes');
    }
};
