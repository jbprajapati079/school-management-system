@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full mt-3">

        <div class="col-12">
            <div class="col-md-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Employee Leave List</h3>
                        <a href="{{route('add.employee.leave')}}" class="btn btn-rounded btn-primary mb-5" style="float: right;">Add Employee Leave</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Id No</th>
                                        <th>Name</th>
                                        <th>Purpose</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @foreach ($employee_leave as $key=>$value)
                                <tbody>
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$value['employee']['id_no']}}</td>
                                        <td>{{$value['employee']['name']}}</td>
                                        <td>{{$value['employee_leave_purpose']['name']}}</td>
                                        <td>{{ date('d-m-Y',strtotime($value->start_date))}}</td>
                                        <td>{{date('d-m-Y',strtotime($value->end_date))}}</td>

                                        <td> <a title="employee leave edit"  href="{{route('edit.employee.leave',$value->id)}}" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>
                                            
                                            <a title="employee leave delete" href="{{route('delete.employee.leave',$value->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </td>
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