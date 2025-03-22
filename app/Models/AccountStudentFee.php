<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\StudentSetup;
use App\Models\StudentYear;
use App\Models\User;
use App\Models\FeeCategory;

class AccountStudentFee extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'year_id',
        'class_id',
        'fee_category_id',
        'date',
        'amount',
    ];

    function student(){

        return $this->belongsTo(User::class,'student_id','id');
    }


    function year(){

        return $this->belongsTo(StudentYear::class,'year_id','id');
    }


    function class(){

        return $this->belongsTo(StudentSetup::class,'class_id','id');
    }

    function fee_category(){

        return $this->belongsTo(FeeCategory::class,'fee_category_id','id');
    }
}
