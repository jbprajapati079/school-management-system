@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full mt-3">

        <div class="col-12">

            <div class="box">

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <h3>Easy School</h3>
                                <tr>


                                    <td width="30%"> <strong>School Address</strong> </td>
                                    <td>Naroda, Ahmedabad - 382330 </td>
                                </tr>
                                <tr>
                                    <td> <strong>Email ID</strong> </td>
                                    <td>support@gmail.com</td>
                                </tr>
                            </thead>


                        </table>

                        @php
                        $date = date("Y-m", strtotime($data[0]->date));

                        if ($date != '') {
                        $where[] = ['date', 'like', $date . '%'];
                        }
                        $total_attendance = App\Models\EmployeeAttendance::with('employee')->where($where)->where('employee_id', $data[0]->employee_id)->get();
                        $absent = count($total_attendance->where('attendance_status', 'Absent'));
                        $salary = (float)$data[0]['employee']['salary'];
                        $perdaysalary = (float)$salary / 30;
                        $totalsalaryminus = (float)$absent * (float)$perdaysalary;
                        $totalsalary = (float)$salary - (float)$totalsalaryminus;
                        @endphp
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>

                                    <th width="30%">Employee Salary Details</th>
                                    <th>Employee Data</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Employee ID</td>
                                    <td>{{$data[0]['employee']['id_no']}}</td>
                                </tr>
                            
                                <tr>
                                    <td>Employee Name</td>
                                    <td>{{$data[0]['employee']['name']}}</td>
                                </tr>

                                <tr>
                                    <td>Basic Salary</td>
                                    <td>{{$data[0]['employee']['salary']}}</td>
                                </tr>

                                <tr>
                                    <td>Absent This Month</td>
                                    <td>{{$absent}}</td>
                                </tr>
                                <tr>
                                    <td>Total Month Salary</td>
                                    <td>{{$totalsalary}}</td>
                                </tr>
                            </tbody>



                        </table>

                        <i> Print date : {{date("d-m-Y")}} </i>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->

</div>
</div>

@endsection()