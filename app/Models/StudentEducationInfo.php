<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentEducationInfo extends Model
{
    use HasFactory;

    protected $table = 'student_education_info';
    protected $guarded=['id'];
    protected $fillable=[
        'student_id',
        'graduated_university',
        'graduated_university_country',
        'graduated_university_faculty',
        'graduated_university_department',
        'graduated_date',
        'is_master',
        'bachelor_degree_note_type',
        'bachelor_degree_note_average',
        'language_exam',
        'language_score',
        'real_language_exam_name',
        'language_score_date',
        'sufficiency_score',
        'department_numerical_score',
        'sufficiency_score_date',
        'request_department_of',
        'department_holder_name',
        'master_graduated_university',
        'master_note_average',
        'master_degree_note_type',
        'master_graduated_university_country',
        'master_graduated_university_faculty',
        'master_graduated_university_department',
        'master_graduated_date',

    ];

    public function getStudent(){

        return $this->belongsTo('App\Models\Student','student_id','id');

    }
}
