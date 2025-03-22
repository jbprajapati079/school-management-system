<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\setup\StudentClasssController;
use App\Http\Controllers\backend\setup\StudentYearController;
use App\Http\Controllers\backend\setup\StudentGroupController;
use App\Http\Controllers\backend\setup\StudentShiftController;
use App\Http\Controllers\backend\setup\FeeCategoryController;
use App\Http\Controllers\backend\setup\FeeAmountController;
use App\Http\Controllers\backend\setup\ExamTypeController;
use App\Http\Controllers\backend\setup\StudentSubjectController;
use App\Http\Controllers\backend\setup\AssignSubjectController;
use App\Http\Controllers\backend\setup\DesignationController;
use App\Http\Controllers\backend\student\RegistrationController;
use App\Http\Controllers\backend\student\StudentLeaveController;
use App\Http\Controllers\backend\student\StudentAttendanceController;
use App\Http\Controllers\backend\student\RolegenerateController;
use App\Http\Controllers\backend\student\RegistrationFeeController;
use App\Http\Controllers\backend\student\MonthlyFeeController;
use App\Http\Controllers\backend\employee\EmployeeController;
use App\Http\Controllers\backend\employee\EmployeeSalaryController;
use App\Http\Controllers\backend\employee\EmployeeLeaveController;
use App\Http\Controllers\backend\employee\EmployeeAttendanceController;
use App\Http\Controllers\backend\employee\EmployeeMonthlySalaryController;
use App\Http\Controllers\backend\mark\ManageMarkController;
use App\Http\Controllers\backend\mark\GradeController;
use App\Http\Controllers\backend\account\StudentFeeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin.index');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


Route::group(['middleware' => 'auth'],function(){
// manage user
Route::controller(UserController::class)->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('view', 'viewuser')->name('view.user');
        Route::get('add', 'adduser')->name('add.user');
        Route::post('store', 'storeuser')->name('store.user');
        Route::get('edit/{id}', 'edituser')->name('edit.user');
        Route::post('update/{id}', 'updateuser')->name('update.user');
        Route::get('delete/{id}', 'deleteuser')->name('delete.user');
    });
});

// manage Profile
Route::controller(ProfileController::class)->group(function () {
    Route::prefix('profile')->group(function () {
        Route::get('view', 'profileview')->name('profile.view');
        Route::get('edit', 'profileedit')->name('profile.edit');
        Route::post('update', 'profileupdate')->name('profile.update');
        Route::get('change/password', 'profilechangepassword')->name('change.password');
        Route::post('update/password', 'profileupdatepassword')->name('update.password');
    });
});

// Setup managament 
Route::controller(StudentClasssController::class)->group(function () {
    //student class routes
    Route::prefix('setup')->group(function () {
        Route::get('student/class/view', 'studentclassview')->name('student.class.view');
        Route::get('add/student/class', 'addstudentclass')->name('add.student.class');
        Route::post('store/student/class', 'storestudentclass')->name('store.student.class');
        Route::get('edit/student/class/{id}', 'editstudentclass')->name('edit.student.class');
        Route::post('update/student/class/{id}', 'updatestudentclass')->name('update.student.class');
        Route::get('delete/student/class/{id}', 'deletestudentclass')->name('delete.student.class');

        //student year routes
        Route::get('student/class/view', 'studentclassview')->name('student.class.view');
    });
});

//student year routes
Route::controller(StudentYearController::class)->group(function () {
    Route::prefix('setup')->group(function () {
        Route::get('student/year/view', 'studentyearview')->name('student.year.view');
        Route::get('add/student/year', 'addstudentyear')->name('add.student.year');
        Route::post('store/student/year', 'storestudentyear')->name('store.student.year');
        Route::get('edit/student/year/{id}', 'editstudentyear')->name('edit.student.year');
        Route::post('update/student/year/{id}', 'updatestudentyear')->name('update.student.year');
        Route::get('delete/student/year/{id}', 'deletestudentyear')->name('delete.student.year');
    });
});

//student Grop routes
Route::controller(StudentGroupController::class)->group(function () {
    Route::prefix('setup')->group(function () {
        Route::get('student/group/view', 'studentgroupview')->name('student.group.view');
        Route::get('add/student/group', 'addstudentgroup')->name('add.student.group');
        Route::post('store/student/group', 'storestudentgroup')->name('store.student.group');
        Route::get('edit/student/group/{id}', 'editstudentgroup')->name('edit.student.group');
        Route::post('update/student/group/{id}', 'updatestudentgroup')->name('update.student.group');
        Route::get('delete/student/group/{id}', 'deletestudentgroup')->name('delete.student.group');
    });
});

//student Shift routes
Route::controller(StudentShiftController::class)->group(function () {
    Route::prefix('setup')->group(function () {
        Route::get('student/shift/view', 'studentshiftview')->name('student.shift.view');
        Route::get('add/student/shift', 'addstudentshift')->name('add.student.shift');
        Route::post('store/student/shift', 'storestudentshift')->name('store.student.shift');
        Route::get('edit/student/shift/{id}', 'editstudentshift')->name('edit.student.shift');
        Route::post('update/student/shift/{id}', 'updatestudentshift')->name('update.student.shift');
        Route::get('delete/student/shift/{id}', 'deletestudentshift')->name('delete.student.shift');
    });
});

//fee category routes
Route::controller(FeeCategoryController::class)->group(function () {
    Route::prefix('setup')->group(function () {
        Route::get('fee/category/view', 'feecategoryview')->name('fee.category.view');
        Route::get('add/fee/category', 'addfeecategory')->name('add.fee.category');
        Route::post('store/fee/category', 'storefeecategory')->name('store.fee.category');
        Route::get('edit/fee/category/{id}', 'editfeecategory')->name('edit.fee.category');
        Route::post('update/fee/category/{id}', 'updatefeecategory')->name('update.fee.category');
        Route::get('delete/fee/category/{id}', 'deletefeecategory')->name('delete.fee.category');
    });
});

//fee amaount routes
Route::controller(FeeAmountController::class)->group(function () {
    Route::prefix('setup')->group(function () {
        Route::get('fee/amount/view', 'feeamountview')->name('fee.amount.view');
        Route::get('add/fee/amount', 'addfeeamount')->name('add.fee.amount');
        Route::post('store/fee/amount', 'storefeeamount')->name('store.fee.amount');
        Route::get('edit/fee/amount/{fee_category_id}', 'editfeeamount')->name('edit.fee.amount');
        Route::post('update/fee/amount/{fee_category_id}', 'updatefeeamount')->name('update.fee.amount');
        Route::get('details/fee/amount/{fee_category_id}', 'detailsfeeamount')->name('details.fee.amount');

    });
});

//Exam type routes
Route::controller(ExamTypeController::class)->group(function () {
    Route::prefix('setup')->group(function () {
        Route::get('exam/type/view', 'examtypeview')->name('exam.type.view');
        Route::get('add/exam/type', 'addexamtype')->name('add.exam.type');
        Route::post('store/exam/type', 'storeexamtype')->name('store.exam.type');
        Route::get('edit/exam/type/{id}', 'editexamtype')->name('edit.exam.type');
        Route::post('update/exam/type/{id}', 'updateexamtype')->name('update.exam.type');
        Route::get('delete/exam/type/{id}', 'deleteexamtype')->name('delete.exam.type');
    });
});

//Student Subject routes
Route::controller(StudentSubjectController::class)->group(function () {
    Route::prefix('setup')->group(function () {
        Route::get('student/subject/view', 'studentsubjectview')->name('student.subject.view');
        Route::get('student/subject/add', 'studentsubjectadd')->name('add.student.subject');
        Route::post('student/subject/store', 'studentsubjectstore')->name('store.student.subject');
        Route::get('student/subject/edit/{id}', 'studentsubjectedit')->name('edit.student.subject');
        Route::post('student/subject/update/{id}', 'studentsubjectupdate')->name('update.student.subject');
        Route::get('student/subject/delete/{id}', 'studentsubjectdelete')->name('delete.student.subject');
    });
});

//Assign Subject routes
Route::controller(AssignSubjectController::class)->group(function () {
    Route::prefix('setup')->group(function () {
        Route::get('assign/subject/view', 'assignsubjectview')->name('assign.subject.view');
        Route::get('assign/subject/add', 'assignsubjectadd')->name('add.assign.subject');
        Route::post('assign/subject/store', 'assignsubjectstore')->name('store.assign.subject');
        Route::get('assign/subject/edit/{class_id}', 'assignsubjectedit')->name('edit.assign.subject');
        Route::post('assign/subject/update/{class_id}', 'assignsubjectupdate')->name('update.assign.subject');
        Route::get('assign/subject/details/{class_id}', 'assignsubjectdetails')->name('details.assign.subject');
    });
});

//Designation routes
Route::controller(DesignationController::class)->group(function () {
    Route::prefix('setup')->group(function () {
        Route::get('designation/view', 'designationview')->name('designation.view');
        Route::get('designation/add', 'designationadd')->name('add.designation');
        Route::post('designation/store', 'designationstore')->name('store.designation');
        Route::get('designation/edit/{id}', 'designationedit')->name('edit.designation');
        Route::post('designation/update/{id}', 'designationupdate')->name('update.designation');
        Route::get('designation/delete/{id}', 'designationdelete')->name('delete.designation');
    });
});


//Designation routes
Route::controller(RegistrationController::class)->group(function () {
    Route::prefix('student')->group(function () {
        Route::get('registration/view', 'registrationview')->name('student.registration.view');
        Route::get('registration/add', 'registrationadd')->name('add.registration.student');
        Route::post('registration/store', 'registrationstore')->name('store.student.registration');
        Route::get('search', 'serachstudent')->name('search.student');
        Route::get('registration/edit/{student_id}', 'registrationedit')->name('edit.student.registration');
        Route::post('registration/update/{student_id}', 'registrationupdate')->name('update.student.registration');
        Route::get('registration/promot/{student_id}', 'registrationpromot')->name('promot.student.registration');
        Route::post('registration/update/promot/{student_id}', 'registrationupdatepromot')->name('update.promot.student.registration');
        Route::get('registration/detail/{student_id}', 'registrationdetail')->name('detail.student.registration');
    });
});

//Leave generate routes
Route::controller(StudentLeaveController::class)->group(function () {
    Route::prefix('student')->group(function () {
        Route::get('leave/view', 'leaveview')->name('student.leave.view');
        Route::get('leave/add', 'studentleaveadd')->name('add.student.leave');
        Route::post('leave/store', 'studentleavestore')->name('store.student.leave');
        Route::get('leave/edit/{id}', 'studentleaveedit')->name('edit.student.leave');
        Route::post('leave/update/{id}', 'studentleaveupdate')->name('update.student.leave');
        Route::get('leave/delete/{id}', 'studentleavedelete')->name('delete.student.leave');
    });
});

//Roll generate routes
Route::controller(RolegenerateController::class)->group(function () {
    Route::prefix('student')->group(function () {
        Route::get('role/generate/view', 'rolegenerateview')->name('role.generate.view');
        Route::get('registration/getstudents', 'getstudents')->name('student.registration.getstudents');
        Route::post('store/roll/generate', 'storerollgenerate')->name('store.roll.generate');
    });
});

//Registration Fee routes
Route::controller(RegistrationFeeController::class)->group(function () {
    Route::prefix('student')->group(function () {
        Route::get('registration/fee/view', 'registrationfeeview')->name('registration.fee.view');
        Route::get('registration/fee/getstudents', 'getstudents')->name('registration.fee.getstudents');
        Route::get('registration/fee/details', 'feedetails')->name('student.registration.fee.details');
    });
});

//monthly Fee routes
Route::controller(MonthlyFeeController::class)->group(function () {
    Route::prefix('student')->group(function () {
        Route::get('monthly/fee/view', 'monthlyfeeview')->name('monthly.fee.view');
        Route::get('monthly/fee/getstudents', 'getstudents')->name('monthly.fee.getstudents');
        Route::get('monthly/fee/details', 'feedetails')->name('student.monthly.fee.details');


    });
});

//monthly Fee routes
Route::controller(ExamFeeController::class)->group(function () {
    Route::prefix('student')->group(function () {
        Route::get('exam/fee/view', 'examfeeview')->name('exam.fee.view');
        Route::get('exam/fee/getstudents', 'getstudents')->name('exam.fee.getstudents');
        Route::get('exam/fee/details', 'feedetails')->name('student.exam.fee.details');


    });
});

//Employee Registration routes
Route::controller(EmployeeController::class)->group(function () {
    Route::prefix('employee')->group(function () {
        Route::get('registration/view', 'registrationview')->name('employee.registration.view');
        Route::get('registration/add', 'registrationadd')->name('employee.registration.add');
        Route::post('registration/store', 'registrationstore')->name('store.employee.registration');
        Route::get('registration/edit/{id}', 'registrationedit')->name('edit.employee.registration');
        Route::post('registration/update/{id}', 'registrationupdate')->name('update.employee.registration');
        Route::get('registration/delete/{id}', 'registrationdelete')->name('delete.employee.registration');
        Route::get('registration/details/{id}', 'registrationdetails')->name('details.employee.registration');

    });
});


//Employee Salary routes
Route::controller(EmployeeSalaryController::class)->group(function () {
    Route::prefix('employee')->group(function () {
        Route::get('salary/view', 'salaryview')->name('employee.salary.view');
        Route::get('salary/increment/{id}', 'salaryincrement')->name('increment.employee.salary');
        Route::post('salary/store/{id}', 'salarystore')->name('store.employee.salary');
        Route::get('salary/details/{id}', 'salarydetails')->name('details.employee.salary');
        Route::get('salary/delete/{id}', 'salarydelete')->name('delete.employee.salary');
    });
});

Route::controller(EmployeeLeaveController::class)->group(function () {
    Route::prefix('employee')->group(function () {
        Route::get('leave/view', 'leaveview')->name('employee.leave.view');
        Route::get('leave/add', 'employee_leave_add')->name('add.employee.leave');
        Route::post('leave/store', 'employee_leave_store')->name('store.employee.leave');
        Route::get('leave/edit/{id}', 'employee_leave_edit')->name('edit.employee.leave');
        Route::post('leave/update/{id}', 'employee_leave_update')->name('update.employee.leave');
        Route::get('leave/delete/{id}', 'employee_leave_delete')->name('delete.employee.leave');

    });
});

Route::controller(EmployeeAttendanceController::class)->group(function () {
    Route::prefix('employee')->group(function () {
        Route::get('attendance/view', 'attendance_view')->name('employee.attendance.view');
        Route::get('attendance/add', 'attendance_add')->name('add.employee.attendance');
        Route::post('attendance/store', 'attendance_store')->name('store.employee.attendance');
        Route::get('attendance/edit/{date}', 'attendance_edit')->name('edit.employee.attendance');
        Route::post('attendance/update/{date}', 'attendance_update')->name('update.employee.attendance');
        Route::get('attendance/detail/{date}', 'attendance_detail')->name('detail.employee.attendance');

    });
});

Route::controller(EmployeeMonthlySalaryController::class)->group(function () {
    Route::prefix('employee')->group(function () {
        Route::get('monthly/salary/view', 'monthly_salary_view')->name('employee.monthly.salary.view');
        Route::get('monthly/getsalary', 'getsalary')->name('employee.monthly.getsalary');
        Route::get('monthly/salary/details/{employee_id}', 'monthly_salary_details')->name('employee.monthly.salary.details');

    });
});

// Manage Mark Route
Route::controller(ManageMarkController::class)->group(function () {
    Route::prefix('mark')->group(function () {
        Route::get('manage/add', 'mark_add')->name('mark.manage.add');
        Route::get('manage/getsubject', 'mark_getsubject')->name('mark.manage.getsubject');
        Route::get('manage/getstudents', 'mark_getstudents')->name('mark.student.getstudents');
        Route::post('manage/store', 'mark_store')->name('store.mark');
        Route::get('manage/edit', 'mark_edit')->name('mark.manage.edit');
        Route::get('student/edit/geteditmark', 'geteditmark')->name('mark.student.geteditmark');
        Route::post('update', 'updateMark')->name('update.mark');


    });
});

// Geade Route
Route::controller(GradeController::class)->group(function () {
    Route::prefix('mark')->group(function () {
        Route::get('grade/view', 'grade_view')->name('mark.grade.view');
        Route::get('grade/add', 'grade_add')->name('add.grade');
        Route::post('grade/store', 'grade_store')->name('store.grade');
        Route::get('grade/edit/{id}', 'grade_edit')->name('edit.grade');
        Route::post('grade/update/{id}', 'grade_update')->name('update.grade');


    });
});

// Account Management Route
Route::controller(StudentFeeController::class)->group(function () {
    Route::prefix('account')->group(function () {
        Route::get('student/fee/view', 'student_fee_view')->name('student.fee.view');
        Route::get('student/fee/add', 'student_fee_add')->name('student.fee.add');
        Route::get('student/fee/getstudent', 'student_fee_getstudent')->name('account.fee.getstudent');
        Route::post('student/fee/store', 'student_fee_store')->name('account.fee.store');


    });
});

});

