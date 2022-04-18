<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentQuestionsTable extends Migration
{

    public function up()
    {
        Schema::create('student_questions', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('student_id')->index();

            $table->boolean('disciplinary_punishment_of_turkey')->default(0)->comment('0 = dont have - 1 = have');
            $table->string('what_is_disciplinary_punishment_of_turkey')->nullable();

            $table->boolean('disciplinary_punishment_of_licence')->default(0)->comment('0 = dont have - 1 = have');
            $table->string('what_is_disciplinary_punishment_of_licence')->nullable();

            $table->boolean('deportation_of_turkey')->default(0)->comment('0 = dont have - 1 = have');
            $table->string('what_is_deportation_of_turkey')->nullable();

            $table->boolean('criminal_record')->default(0)->comment('0 = dont have - 1 = have');
            $table->string('what_is_criminal_record')->nullable();

            $table->boolean('living_family_of_turkey')->default(0)->comment('0 = dont have - 1 = have');
            $table->string('who_is_living_family_of_turkey')->nullable();

            $table->text('describe_yourself');
            $table->text('study_appeals_in_your_dream');
            $table->text('what_is_your_pleasure_work');
            $table->text('contributed_work');
            $table->text('most_significant_challenge');

            $table->string('native_language');
            $table->string('languages_you_know');
            $table->string('official_language_of_your_country');


            $table->foreign('student_id')->references('id')->on('students');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_questions');
    }
}
