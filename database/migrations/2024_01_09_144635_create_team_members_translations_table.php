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
        Schema::create('team_member_translations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title_position');
            $table->text('cover_letter')->nullable();
            $table->longText('personal_details')->nullable();
            $table->string('locale');
            $table->unsignedBigInteger('team_member_id');
            $table->foreign('team_member_id')->references('id')->on('team_members')->cascadeOnDelete();
            $table->unique(['locale' , 'team_member_id']);
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
        Schema::dropIfExists('team_members_translations');
    }
};
