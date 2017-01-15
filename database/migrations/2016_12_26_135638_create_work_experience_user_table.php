<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkExperienceUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_experience_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('social_auth_id');
            $table->string('job_title')->nullable();
            $table->string('job_description')->nullable();
            $table->string('company_name')->nullable();
            $table->text('start_date')->nullable();
            $table->text('end_date')->nullable();
            $table->timestamps();

            $table->foreign('social_auth_id')->references('user_id')->on('auth_users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_experience_user');
    }
}
