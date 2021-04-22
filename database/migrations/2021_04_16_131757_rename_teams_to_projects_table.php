<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameTeamsToProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::rename('teams', 'projects');

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('personal_team');
            $table->renameIndex('teams_user_id_index', 'projects_user_id_index');

            $table->uuid('uuid')->after('id');
            $table->foreignId('user_id')->nullable()->change();
            $table->unsignedTinyInteger('is_main')->default(0)->after('uuid');
            $table->string('alias')->unique()->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropUnique('projects_alias_unique');
            $table->dropColumn(['uuid','alias','is_main']);
            $table->renameIndex('projects_user_id_index', 'teams_user_id_index');
            $table->foreignId('user_id')->nullable(false)->change();
            $table->boolean('personal_team')->after('name');
        });

        Schema::rename('projects', 'teams');
    }
}
