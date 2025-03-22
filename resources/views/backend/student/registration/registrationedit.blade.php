@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full mt-3">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Student</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{route('update.student.registration',$data->student_id)}}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Student Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" class="form-control" value="{{$data['student']['name']}}">
                                                        @error('name')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Father Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="fathername" class="form-control" value="{{$data['student']['fathername']}}">
                                                        @error('name')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Mother Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="mothername" class="form-control" value="{{$data['student']['mothername']}}">
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
                                                    <h5>Contact Number <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="mobile" class="form-control" value="{{$data['student']['mobile']}}">
                                                        @error('name')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Address <span class="text-danger">*</span></h5>
                                                    <textarea name="address" class=" form-control">{{$data['student']['address']}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Gender <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="gender" required class="form-control">
                                                            <option>select gender</option>
                                                            <option value="Male" {{($data['student']['gender'] == 'Male')? 'selected' : ''}}>Male</option>
                                                            <option value="Female" {{($data['student']['gender'] == 'Female')? 'selected' : ''}}>Female</option>
                                                        </select>
                                                    </div>
                                                    @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Religion <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="religion" class="form-control" value="{{$data['student']['religion']}}">
                                                        @error('name')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Date of Birth <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="date" name="dob" class="form-control" value="{{$data['student']['dob']}}">
                                                        @error('name')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Discount <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="discount" class="form-control" value="{{$data['dicount']['discount']}}">
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
                                                    <h5>Student Year <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="student_year_id" required class="form-control">
                                                            <option>select year</option>
                                                            @foreach ($StudentYear as $year)
                                                            <option value="{{$year->id}}" {{($data->student_year_id == $year->id) ? 'selected' : ''}}>{{$year->name}}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                    @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Student Class <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="student_class_id" required class="form-control">
                                                            <option>select class</option>
                                                            @foreach ($StudentSetup as $class)
                                                            <option value="{{$class->id}}" {{($data->student_class_id == $class->id) ? 'selected' : ''}}>{{$class->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Student Group <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="student_group_id" required class="form-control">
                                                            <option>select group</option>
                                                            @foreach ($StudentGroup as $group)
                                                            <option value="{{$group->id}}" {{($data->student_group_id == $group->id) ? 'selected' : ''}}>{{$group->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Student Shift <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="student_shift_id" required class="form-control">
                                                            <option>select shift</option>
                                                            @foreach ($StudentShift as $shift)
                                                            <option value="{{$shift->id}}" {{($data->student_shift_id == $shift->id) ? 'selected' : ''}}>{{$shift->name}}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                    @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>User Image <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="image" class="form-control" id="image">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <img id="showimage" src="{{!empty($data['student']['image'])? url('upload/student_image/' .$data['student']['image']):url('upload/no_image.jpg/')}}" alt="" style="width:100px; height:100px;border:1px solid #000000">
                                                        
                                                    </div>
                                                </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        $('#image').change(function(e) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#showimage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection()