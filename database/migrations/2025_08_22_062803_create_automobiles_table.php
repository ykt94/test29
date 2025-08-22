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
        Schema::create('automobiles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('auto_model_id');
            $table->string('name');
            $table->integer('production_year')->nullable();
            $table->integer('mileage')->nullable();
            $table->string('body_color')->nullable();
            $table->foreign('auto_model_id')->references('id')->on('auto_models')->onDelete('restrict');
            $table->index('auto_model_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('automobiles');
    }
};
