<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;

    protected $table = "references";
    protected $fillable = ['student_id','referencer_name','referencer_email','referencer_title','referencer_university_name','referencer_orcid_number','token','token_at','is_confirmed'];
    protected $guarded = ['id'];

    public function getStudent(){

        return $this->belongsTo('App\Models\Student' , 'student_id' , 'id');

    }
}
