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

        Schema::table('teams', function (Blueprint $table) {
            $table->dropColumn('personal_team');
            $table->dropIndex('teams_user_id_index');

            $table->uuid('uuid')->after('id');
            $table->unsignedTinyInteger('is_main')->default(0)->after('uuid');
        });

        Schema::rename('teams', 'projects');

        Schema::table('projects', function (Blueprint $table) {
            $table->index('user_id');
            $table->foreignId('user_id')->nullable()->change();
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
            $table->dropIndex('projects_user_id_index');
            $table->dropUnique('projects_alias_unique');
            $table->dropColumn('alias');
        });

        Schema::rename('projects', 'teams');

        Schema::table('teams', function (Blueprint $table) {
            $table->boolean('personal_team')->after('name');
            $table->index('user_id');
            $table->dropColumn(['uuid','is_main']);
            $table->foreignId('user_id')->nullable(false)->change();
        });
    }
}
