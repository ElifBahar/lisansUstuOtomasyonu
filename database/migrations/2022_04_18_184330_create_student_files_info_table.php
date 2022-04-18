<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentEducationInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_education_info', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('student_id');

            $table->string('graduated_university', 255);
            $table->string('graduated_university_country', 255);
            $table->string('graduated_university_faculty', 255);
            $table->string('graduated_university_department', 255);
            $table->dateTime('graduated_date');

            $table->boolean('is_master')->default(false);
            $table->string('bachelor_degree_note_type', 20);
            $table->string('master_degree_note_type', 20)->nullable();
            $table->float('bachelor_degree_note_average', 7, 2);
            $table->float('master_note_average', 5, 2)->nullable();

            $table->string('master_graduated_university', 255)->nullable();
            $table->string('master_graduated_university_country', 255)->nullable();
            $table->string('master_graduated_university_faculty', 255)->nullable();
            $table->string('master_graduated_university_department', 255)->nullable();
            $table->dateTime('master_graduated_date')->nullable();

            $table->string('language_exam', 255);
            $table->tinyInteger('language_score');
            $table->date('language_score_date');

            $table->string('sufficiency_score', 255);
            $table->integer('department_numerical_score');
            $table->dateTime('sufficiency_score_date');
            $table->string('request_department_of', 255);
            $table->index('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
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
        Schema::dropIfExists('student_education_info');
    }
}
