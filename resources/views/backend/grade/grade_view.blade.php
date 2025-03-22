@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full mt-3">

        <div class="col-12">
            <div class="col-md-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Student Grade List</h3>
                        <a href="{{route('add.grade')}}" class="btn btn-rounded btn-primary mb-5" style="float: right;">Add Student Grade</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Grade Name</th>
                                        <th>Grade Point</th>
                                        <th>Start Mark</th>
                                        <th>End Mark</th>
                                        <th>Point Range</th>
                                        <th>Remark</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @foreach ($data as $key=>$value)
                                <tbody>
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$value->grade_name}}</td>
                                        <td>{{$value->grade_point}}</td>
                                        <td>{{$value->start_mark}}</td>
                                        <td>{{$value->end_mark}}</td>
                                        <td>{{$value->start_point}} - {{$value->end_point}}</td>
                                        <td>{{$value->remark}}</td>

                                        <td> <a title="employee leave edit"  href="{{route('edit.grade',$value->id)}}" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i>
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