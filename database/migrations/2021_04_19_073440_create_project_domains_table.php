<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_domains', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('project_id')->nullable()->constrained();
            $table->string('domain')->unique();
            $table->unsignedTinyInteger('is_ssl')->default(0);
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
        Schema::dropIfExists('project_domains');
    }
}
