<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table='students';
    protected $guarded = ['id'];
    protected $fillable=['user_id','name','surname','birthday_date','mother_name','father_name','passport_no','nations','country','province','phone','address','tc_no','state' , 'isDeleted','institute'];

    public function getEducationInfo(){

        return $this->hasOne('App\Models\StudentEducationInfo' , 'student_id' , 'id');

    }

    public function getFileInfo(){

        return $this->hasOne('App\Models\StudentFilesInfo' , 'student_id' , 'id');

    }

    public function getReference(){

        return $this->hasMany('App\Models\Reference' , 'student_id' , 'id');

    }

    public function getStudentQuestions(){

        return $this->hasOne('App\Models\studentQuestions' , 'student_id' , 'id');

    }

    public function getUser(){

        return $this->hasOne('App\Models\User' , 'user_id' , 'id');

    }

    public function getAppeal(){
        return $this->hasMany('App\Models\Appeals','student_id','id');
    }
}
