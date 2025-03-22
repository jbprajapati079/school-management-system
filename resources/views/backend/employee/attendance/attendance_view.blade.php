@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full mt-3">

        <div class="col-12">
            <div class="col-md-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Employee Attendance List</h3>
                        <a href="{{route('add.employee.attendance')}}" class="btn btn-rounded btn-primary mb-5" style="float: right;">Add Employee Attendance</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">SL No</th>
                                        <th>Date</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                @foreach ($data as $key=>$value)
                                <tbody>
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{ date('d-m-Y',strtotime($value->date))}}</td>

                                        <td> <a title="employee attendance edit"  href="{{route('edit.employee.attendance',$value->date)}}" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>
                                            
                                            <a title="employee attendance detail" href="{{route('detail.employee.attendance',$value->date)}}" class="btn btn-warning"><i class="fa fa-info-circle " aria-hidden="true"></i>
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