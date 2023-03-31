<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInfo extends Model
{
    use HasFactory;

    protected $table = 'studentinfo';
    
    protected $fillable = [
        'idNo',
        'firstName',
        'middleName',
        'lastName',
        'suffix',
        'course',
        'year',
        'birthDate',
        'gender',
    ];
}
