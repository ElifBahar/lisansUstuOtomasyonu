<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentFilesInfo extends Model
{
    use HasFactory;

    protected $table = 'student_files_info';
    protected $guarded = ['id'];
    protected $fillable=[
        'yok_menthor_file',
        'student_id',
        'image',
        'passport_file',
        'identity_file',
        'diploma_file',
        'diploma_translate_file',
        'transcript_file',
        'transcript_translate_file',
        'yds_file',
        'sufficiency_file',
        'turkish_level_file_institution',
        'turkish_level_file',
        'language_level',
    ];

    function getStudent(){

        return $this -> belongsTo('App\Models\Students','student_id','id');

    }
}
