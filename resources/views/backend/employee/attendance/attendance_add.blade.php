@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full mt-3">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Employee Attendance </h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{route('store.employee.attendance')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5> Attendance Date <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="date" name="date" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">SL No</th>
                                                <th rowspan="2">Employee</th>
                                                <th colspan="3">Attendance</th>

                                            </tr>
                                            <tr>
                                                <td width="10%">Present</td>
                                                <td width="10%">Leave</td>
                                                <td>Absent</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach ($emp as $key=>$value)
                                            <tr id="div{{$value->id}}">
                                                <input type="hidden" name="employee_id[]" value="{{$value->id}}">
                                                <td>{{$key+1}}</td>
                                                <td>{{$value->name}}</td>
                                                <td colspan="3">
                                                    <div>
                                                        <input class="form-check-input" type="radio" name="attendance_status{{$key}}" value="Present" id="present{{$key}}" checked="checked">
                                                        <label class="form-check-label" for="present{{$key}}">Present</label>

                                                        <input class="form-check-input" type="radio" name="attendance_status{{$key}}" value="Leave" id="leave{{$key}}">
                                                        <label class="form-check-label" for="leave{{$key}}">Leave</label>

                                                        <input class="form-check-input" type="radio" name="attendance_status{{$key}}" value="Absent" id="absent{{$key}}">
                                                        <label class="form-check-label" for="absent{{$key}}">Absent</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    
                                    </table>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" name="submit" id="" value="submit" class="btn btn-rounded btn-success mb-5">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
    </div>
    <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->

</div>
</div>
@endsection()