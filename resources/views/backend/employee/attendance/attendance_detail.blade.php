@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full mt-3">

        <div class="col-12">
            <div class="col-md-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Employee Attendance Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table  class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">SL No</th>
                                        <th width="">Name</th>
                                        <th width="">ID No</th>
                                        <th>Date</th>
                                        <th width="">Attendance</th>
                                    </tr>
                                </thead>
                                @foreach ($data as $key=>$value)
                                <tbody>
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$value['employee']['name']}}</td>
                                        <td>{{$value['employee']['id_no']}}</td>
                                        <td>{{ date('d-m-Y',strtotime($value->date))}}</td>
                                        <td>{{ $value->attendance_status}}</td>
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