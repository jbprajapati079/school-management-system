<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Employee;
use App\Models\EmployeeLeavePurpose;
class EmployeeLeave extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'employee_id',  
        'leave_purpose_id',
        'start_date',
        'end_date',
    ];

    function employee(){
        
        try {
            
            return $this->belongsTo(Employee::class,'employee_id','id');
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function employee_leave_purpose(){
        try {
            return $this->belongsTo(EmployeeLeavePurpose::class,'leave_purpose_id','id');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
