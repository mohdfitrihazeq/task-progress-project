<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('lastname', 60);
            $table->string('firstname', 60);
            $table->string('middlename', 60);
            $table->string('address', 120);
            $table->integer('city_id')->unsigned();
            $table->integer('state_id')->unsigned();
            $table->integer('project_id')->unsigned();;
            $table->foreign('city_id')->references('id')->on('city');
            $table->foreign('state_id')->references('id')->on('state');
            $table->foreign('project_id')->references('id')->on('project');
            $table->char('zip', 10);
            $table->integer('age')->unsigned();
            $table->date('birthdate');
            $table->date('date_hired');
            $table->integer('company_id')->unsigned();
            $table->integer('role_id')->unsigned();
            // $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('company');
            $table->foreign('role_id')->references('id')->on('role');
            // $table->foreign('company_id')->references('id')->on('company');
            $table->string('picture', 60);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
