<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('references', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->index();
            $table->string('referencer_name',150);
            $table->string('referencer_email',100);
            $table->string('referencer_title',30);
            $table->string('referencer_university_name',255);
            /* $table->string('referencer_orcid_number',19); */
            $table->string('token')->nullable();
            $table->dateTime('token_at')->nullable();
            $table->tinyInteger('is_confirmed')->default(0)->comment('0 not confirmed, 1 sended mail, 2 confirmed');
            $table->timestamps();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('references');
    }
}
