@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full mt-3">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Student Grade</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{route('update.grade',$data->id)}}">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Grade Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="grade_name" class="form-control" value="{{$data->grade_name}}">
                                                        @error('name')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Grade Point <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="grade_point" class="form-control" value="{{$data->grade_point}}">
                                                        @error('name')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Start Mark <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="start_mark" class="form-control" value="{{$data->start_mark}}">
                                                        @error('name')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>End Mark <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="end_mark" class="form-control" value="{{$data->end_mark}}">
                                                        @error('name')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Start Point<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="start_point" class="form-control" value="{{$data->start_point}}">
                                                        @error('name')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>End Point<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="end_point" class="form-control" value="{{$data->end_point}}">
                                                        @error('name')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Remark <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="remark" class="form-control" value="{{$data->remark}}">
                                                        @error('name')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" name="submit" id="" value="Update" class="btn btn-rounded btn-success mb-5">
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