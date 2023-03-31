<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrolledSubjects extends Model
{
    use HasFactory;

    protected $table = 'enrolled_subjects';
    
    protected $fillable = [
        'subjectCode',
        'description',
        'units',
        'schedule',
    ];
}
