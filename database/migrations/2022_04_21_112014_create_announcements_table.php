<?php

use App\Helpers\Enums;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->enum('announcement_type',[Enums::DOCTORATE_ENGLISH,Enums::DOCTORATE_TURKISH,Enums::GRADUATE_ENGLISH,Enums::GRADUATE_TURKISH]);
            //doktora ingilizce doktora turkce yl ingilizce yl turkce
            $table->tinyInteger('status');
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
        Schema::dropIfExists('announcements');
    }
}
