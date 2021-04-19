<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameTeamInvitationsToProjectInvitations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('team_invitations', function(Blueprint $table) {
            $table->dropForeign('team_invitations_team_id_foreign');
            $table->dropUnique('team_invitations_team_id_email_unique');
        });

        Schema::rename('team_invitations', 'project_invitations');

        Schema::table('project_invitations', function(Blueprint $table) {
            $table->renameColumn('team_id', 'project_id');
            $table->foreign('project_id')
                ->references('id')
                ->on('projects');
            $table->unique(['project_id', 'email']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('project_invitations', function(Blueprint $table) {
            $table->dropForeign('project_invitations_project_id_foreign');
            $table->dropUnique('project_invitations_project_id_email_unique');
        });

        Schema::rename('project_invitations', 'team_invitations');

        Schema::table('team_invitations', function(Blueprint $table) {
            $table->renameColumn('project_id', 'team_id');
            $table->unique(['team_id', 'email']);
        });
    }
}
