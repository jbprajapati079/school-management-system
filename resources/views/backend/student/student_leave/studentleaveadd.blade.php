@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full mt-3">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Student leave </h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{route('store.student.leave')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5> Student Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="student_id" required="" class="form-control">
                                                    <option>select employee</option>

                                                   @foreach ($user as $value)
                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                                   @endforeach
                                                </select>
                                                @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Class<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="student_class" required="" class="form-control">
                                                    <option>select employee</option>

                                                    @foreach ($class as $value)
                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                                   @endforeach
                                                </select>
                                                @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Group <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                            <select name="student_group" required="" class="form-control">
                                                    <option>select employee</option>

                                                    @foreach ($group as $value)
                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                                   @endforeach
                                                </select>
                                                @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Year<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="student_year" required="" class="form-control">
                                                    <option>select employee</option>
                                                    @foreach ($year as $value)
                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                                   @endforeach
                                                </select>
                                                @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Start Date <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="date" name="start_date" class="form-control">
                                                @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Leave Purpose<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                            <input type="text" name="student_leave_id" class="form-control">
                                                @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>End Date <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="date" name="end_date" class="form-control">
                                                @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
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