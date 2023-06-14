<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_information', function (Blueprint $table) {
            $table->id();
            $table->string("name", 50)->nullable();
            $table->string("father_name", 50)->nullable();
            $table->string("mother_name", 50)->nullable();
            $table->string("family_name", 50)->nullable();
            $table->string("identity_no", 50)->nullable()->unique();
            $table->string("serial_no", 50)->nullable()->unique();
            $table->string("birth_date", 50)->nullable();
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
        Schema::dropIfExists('user_information');
    }
}
