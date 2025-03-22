<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\StudentGroup;
use App\Models\StudentLeavePurpose;
use App\Models\StudentSetup;
use App\Models\StudentYear;
class StudentLeave extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'student_leave_id',
        'student_class',
        'student_group',
        'student_year',
        'start_date',
        'end_date',
    ];

    function student(){
        return $this->belongsTo(User::class, 'student_id','id');
    }

    function group(){
        return $this->belongsTo(StudentGroup::class, 'student_group','id');
    }

    function year(){
        return $this->belongsTo(StudentYear::class, 'student_year','id');
    }

    function class(){
        return $this->belongsTo(StudentSetup::class, 'student_class','id');
    }

    function leave_purpose(){
        return $this->belongsTo(StudentLeavePurpose::class, 'student_leave_id','id');
    }
}
