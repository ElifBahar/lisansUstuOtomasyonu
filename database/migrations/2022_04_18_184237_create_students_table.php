<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name',100);
            $table->string('surname',120);
            $table->dateTime('birthday_date');
            $table->string('mother_name',100);
            $table->string('father_name',100);
            $table->string('passport_no',11)->unique();
            $table->string('tc_no',11)->nullable();
            $table->string('nations',250);
            $table->string('country',250);
            $table->string('state',150)->nullable();
            $table->string('province',150);
            $table->text('phone');
            $table->text('address');
            $table->boolean('status')->comment('active 0 - incative 1')->default('0');
            $table->tinyInteger('isDeleted')->comment('0 not deleted  - 1 deleted' )->default('0');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('students');
    }
}
