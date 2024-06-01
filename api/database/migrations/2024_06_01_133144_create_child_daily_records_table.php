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
        Schema::create('child_daily_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('child_id')->unsigned();
            $table->tinyInteger('health_status')->nullable(false);
            $table->decimal('body_temperature', 4, 2)->nullable();
            $table->tinyInteger('stool_count')->nullable();
            $table->boolean('morning_medication_taken')->nullable();
            $table->boolean('afternoon_medication_taken')->nullable();
            $table->boolean('evening_medication_taken')->nullable();
            $table->boolean('bedtime_medication_taken')->nullable();
            $table->text('new_ability')->nullable();
            $table->text('comment')->nullable();
            $table->string('image', 255)->nullable();
            $table->timestamps();

            $table->foreign('child_id')->references('id')->on('childrens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('child_daily_records');
    }
};
