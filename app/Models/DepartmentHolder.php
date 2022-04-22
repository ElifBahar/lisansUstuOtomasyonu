<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentHolder extends Model
{
    use HasFactory;

    protected $table='department_holders';
    protected $guarded = ['id'];
    protected $fillable = ['institute_id','name'];
}
