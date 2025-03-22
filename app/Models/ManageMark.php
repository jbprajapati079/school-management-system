<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
class ManageMark extends Model
{
    use HasFactory;

   protected $fillable = [

    'student_id',
    'id_no',
    'class_id',
    'year_id',
    'assign_subject_id',
    'exam_type_id',
    'mark',
    ];

    function student(){

        return $this->belongsTo(User::class,'student_id','id');
    }
}
