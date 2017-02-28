<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('skill_name');
            $table->string('skill_type');
            $table->timestamps();

        });

        Schema::create('skill_social_auth', function (Blueprint $table) {
            $table->increments('id');
            $table->string('social_auth_id')->index();
            $table->foreign('social_auth_id')->references('user_id')->on('auth_users')->onDelete('cascade');

            $table->integer('skill_id')->unsigned()->index();
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');

            $table->integer('level_id')->unsigned()->index()->nullable();
            $table->foreign('level_id')->references('id')->on('level_skill')->onDelete('cascade');

            $table->string('working_years')->nullable();
            $table->timestamps();

        });

        Schema::create('auth_company_skill' , function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_auth_id')->unsigned()->index();
            $table->foreign('company_auth_id')->references('id')->on('auth_companies')->onDelete('cascade');

            $table->integer('skill_id')->unsigned()->index();
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');

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
        Schema::dropIfExists('skills');
        Schema::dropIfExists('skill_social_auth');
        Schema::dropIfExists('auth_company_skill');
    }
}
