<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationNodeUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_node_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('social_auth_id');
            $table->string('education_name')->nullable();
            $table->string('education_field')->nullable();
            $table->text('graduation_date')->nullable();
            $table->string('grade')->nullable();
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
        Schema::dropIfExists('education_node_user');
    }
}
