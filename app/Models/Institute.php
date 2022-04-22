<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    use HasFactory;

    protected $table='institutes';
    protected $guarded = ['id'];
    protected $fillable = ['institute'];
}
