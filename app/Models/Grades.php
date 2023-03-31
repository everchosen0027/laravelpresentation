<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    use HasFactory;

    protected $table = 'grades';
    
    protected $fillable = [
        'sNo',
        'esNo',
        'prelim',
        'midterm',
        'finals',
        'remarks',
    ];
}
