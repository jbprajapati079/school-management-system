@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full mt-3">

        <div class="col-12">
            <div class="col-md-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Employee Salary Detalis</h3>
                    </div>

                    <div class="box-header with-border">
                        <p><strong>Employee Name </strong> : {{$emp->name}}</p>
                        <p> <strong>Employee ID No</strong>  : {{$emp->id_no}}</p>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                    
                                        <th>Sl No</th>
                                        <th>Previous Salary</th>
                                        <th>Increment Salary</th>
                                        <th>Present Salary</th>
                                        <th>Effected Date</th>
                                    </tr>
                                </thead>

                                @foreach ($salary as $key=>$value)

                                <tbody>
                                    <tr>
                          
                                        <td>{{$key+1}}</td>
                                        <td>{{$value->previous_salary}}</td>
                                        <td>{{$value->increment_salary}}</td>
                                        <td>{{$value->present_salary}}</td>
                                        <td>{{$value->effected_salary}}</td>
                                        
                                    </tr>

                                </tbody>

                                @endforeach

                            </table>
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