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
        Schema::create('ai_daily_report_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('child_daily_record_id')->unsigned();
            $table->text('comment')->nullable();
            $table->timestamps();
            
            $table->foreign('child_daily_record_id')->references('id')->on('child_daily_records')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ai_daily_report_comments');
    }
};
