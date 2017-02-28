<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('industry_field')->nullable();
            $table->string('address')->nullable();
            $table->date('foundation_date')->nullable();
            $table->string('current_employees_num')->nullable();
            $table->timestamps();

            $table->integer('company_auth_id')->unsigned()->index();
            $table->foreign('company_auth_id')->references('id')->on('auth_companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_companies');
    }
}
