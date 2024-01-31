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
        Schema::create('project_style_translations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('locale');
            $table->unsignedBigInteger('project_style_id');
            $table->foreign('project_style_id')->references('id')->on('project_styles')->cascadeOnDelete();
            $table->unique(['locale', 'project_style_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_style_translations');
    }
};