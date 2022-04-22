<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcements extends Model
{
    use HasFactory;
    protected $table='announcements';
    protected $guarded = ['id'];
    protected $fillable = ['name','announcement_type','status','created_at','updated_at','title','content','release_date','due_date', 'institute'];
}
