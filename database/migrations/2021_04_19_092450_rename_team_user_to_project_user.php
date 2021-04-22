<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameTeamUserToProjectUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('team_user', function(Blueprint $table) {
            $table->dropUnique('team_user_team_id_user_id_unique');
        });

        Schema::rename('team_user', 'project_user');

        Schema::table('project_user', function(Blueprint $table) {
            $table->renameColumn('team_id', 'project_id');
            $table->foreign('project_id')
                ->references('id')
                ->on('projects');

            $table->unique(['project_id', 'user_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_user', function(Blueprint $table) {
            $table->dropForeign('project_user_project_id_foreign');
            $table->dropUnique('project_user_project_id_user_id_unique');
        });

        Schema::rename('project_user', 'team_user');

        Schema::table('team_user', function(Blueprint $table) {
            $table->renameColumn('project_id', 'team_id');
            $table->foreign('team_id')
                ->references('id')
                ->on('projects');

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->unique(['team_id', 'user_id']);

        });

    }
}
