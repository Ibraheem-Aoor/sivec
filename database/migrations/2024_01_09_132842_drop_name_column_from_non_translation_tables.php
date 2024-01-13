<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /**
         * New Update To Enable Translated Models. deprecate name columns fro origin tables
         * and use only translations columns.
         * date:2023/1/9
         */
        Schema::table('service_categories', function (Blueprint $table) {
            $table->dropColumn('name');
        });
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('details');
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('features');
            $table->dropColumn('basic_info');
            $table->dropColumn('challenge');
            $table->dropColumn('result');
        });
        Schema::table('project_categories', function (Blueprint $table) {
            $table->dropColumn('name');
        });
        Schema::table('image_categories', function (Blueprint $table) {
            $table->dropColumn('name');
        });
        Schema::table('team_members', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('title_position');
            $table->dropColumn('cover_letter');
            $table->dropColumn('personal_details');
        });
        Schema::table('blog_categories', function (Blueprint $table) {
            $table->dropColumn('name');
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('content');
            $table->dropColumn('quote');
            $table->dropColumn('quoute_auother');
        });
        
        Schema::rename('posts' , 'blog_posts');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('non_translation_tables', function (Blueprint $table) {
            //
        });
    }
};
