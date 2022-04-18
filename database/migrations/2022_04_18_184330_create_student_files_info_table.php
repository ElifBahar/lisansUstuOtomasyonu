<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentFilesInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_files_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->string('image',255);
            $table->string('passport_file',255);
            $table->string('identity_file',255);
            $table->string('diploma_file',255);
            $table->string('diploma_translate_file',255);
            $table->string('transcript_file',255);
            $table->string('transcript_translate_file',255);
            $table->string('yds_file',255);
            $table->string('sufficiency_file',255)->nullable();
            $table->string('turkish_level_file_institution',150)->nullable();
            $table->string('turkish_level_file')->nullable();
            $table->string('language_level', 3);
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
        Schema::dropIfExists('student_files_info');
    }
}
