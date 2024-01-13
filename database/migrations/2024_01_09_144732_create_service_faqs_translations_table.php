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
        Schema::create('service_faqs_translations', function (Blueprint $table) {
            $table->id();
            $table->longText('question');
            $table->longText('answer');
            $table->string('locale');
            $table->unsignedBigInteger('service_faqs_id');
            $table->foreign('service_faqs_id')->references('id')->on('service_faqs')->cascadeOnDelete();
            $table->unique(['locale' , 'service_faqs_id']);
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
        Schema::dropIfExists('service_faqs_translations');
    }
};
