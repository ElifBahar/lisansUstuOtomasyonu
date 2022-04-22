<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentQuestions extends Model
{
    use HasFactory;
    protected $table = 'student_questions';
    protected $guarded = ['id'] ;
    protected $fillable = [
        'disciplinary_punishment_of_turkey',
        'disciplinary_punishment_of_licence',
        'deportation_of_turkey',
        'criminal_record',
        'living_family_of_turkey',
        'native_language',
        'languages_you_know',
        'official_language_of_your_country'
    ] ;

    public function getStudent(){

        return $this->belongsTo('App\Models\Student', 'student_id' , 'id');

    }
}
