<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StudentSetup;
use App\Models\StudentSubject;
class AssignSubject extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'subject_id',
        'full_mark',
        'pass_mark',
        'subjective',
    ];


    public function class(){

        return $this->belongsTo(StudentSetup::class, 'class_id','id');
    }

    public function subject(){

        return $this->belongsTo(StudentSubject::class, 'subject_id','id');
    }
}
