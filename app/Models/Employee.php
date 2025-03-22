<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Designation;
class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'gender',
        'address',
        'image',
        'id_no',
        'dob',
        'code',
        'join_date',
        'designation_id',
        'salary',
        'status',
        'password',
    ];

    public function designation(){

        return $this->belongsTo(Designation::class,'designation_id','id');
    }
}

