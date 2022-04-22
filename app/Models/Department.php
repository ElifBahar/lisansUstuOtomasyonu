<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table='institute_departments';
    protected $guarded = ['id'];
    protected $fillable = ['institute_id','department_name'];
}
