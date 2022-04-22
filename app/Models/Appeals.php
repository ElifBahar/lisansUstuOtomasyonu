<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appeals extends Model
{
    use HasFactory;
    protected $table='appeals';
    protected $guarded = ['id'];

    public function student(){

        return $this->belongsTo('App\Models\Student','student_id','id');

    }

    public function announcements(){

        return $this->belongsTo('App\Models\Announcements','announcements_id', 'id');

    }
}
