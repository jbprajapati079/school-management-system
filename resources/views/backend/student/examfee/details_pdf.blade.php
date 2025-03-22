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
                        $registrationfee = App\models\FeeAmount::where('fee_category_id','1')->where('class_id',$data->student_class_id)->first();
                        $originalfee = $registrationfee->amount;
                        $discount = $data['dicount']['discount'];
                        $discounttablefee = $discount/100*$originalfee;
                        $finalfee = (float)$originalfee-(float)$discounttablefee;
                        @endphp
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>

                                    <th width="30%">Student Details</th>
                                    <th>Student Data</th>

                                </tr>
                            </thead>


                            <tbody>
                                <tr>
                                    <td>Student ID</td>
                                    <td>{{$data['student']['id_no']}}</td>
                                </tr>

                                <tr>
                                    <td>Student Roll No</td>
                                    <td>{{$data->role}}</td>
                                </tr>

                                <tr>
                                    <td>Student Name</td>
                                    <td>{{$data['student']['name']}}</td>
                                </tr>

                                <tr>
                                    <td>Gender</td>
                                    <td>{{$data['student']['gender']}}</td>
                                </tr>
                                <tr>
                                    <td>Class</td>
                                    <td>{{$data['student_class']['name']}}</td>
                                </tr>
                                <tr>
                                    <td>Group</td>
                                    <td>{{$data['student_group']['name']}}</td>
                                </tr>
                                <tr>
                                    <td>Shift</td>
                                    <td>{{$data['student_shift']['name']}}</td>
                                </tr>
                                <tr>
                                    <td>Year</td>
                                    <td>{{$data['student_year']['name']}}</td>
                                </tr>
                                <tr>
                                    <td>Exam Fee</td>
                                    <td>{{$registrationfee->amount}} ₹</td>
                                </tr>

                                <tr>
                                    <td>Discount Fee</td>
                                    <td>{{$discount}} % </td>
                                </tr>

                                <tr>
                                    <td>Final Pay Fee {{$ExamType}}</td>
                                    <td>{{$finalfee}} ₹</td>
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