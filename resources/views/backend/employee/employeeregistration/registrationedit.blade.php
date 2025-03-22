@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full mt-3">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Student</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{route('update.employee.registration',$emp->id)}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Employee Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" class="form-control" value="{{$emp->name}}">
                                                        @error('name')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Email <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="email" class="form-control" value="{{$emp->email}}">
                                                        @error('email')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Contact Number <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="mobile" class="form-control" value="{{$emp->mobile}}">
                                                        @error('mobile')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Gender <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="gender" required class="form-control">
                                                            <option>select gender</option>
                                                            <option value="Male" {{$emp->gender == 'Male' ? 'Selected' : ''}}>Male</option>
                                                            <option value="Female" {{$emp->gender == 'Female' ? 'Selected' : ''}}>Female</option>
                                                        </select>
                                                    </div>
                                                    @error('gender')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Address <span class="text-danger">*</span></h5>
                                                    <textarea name="address" class=" form-control"> {{$emp->address}} </textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Designation<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="designation_id" required class="form-control">
                                                            <option>select designation</option>

                                                            @foreach ($data as $designation)

                                                            <option value="{{$designation->id}}" {{$emp->designation_id == $designation->id ? 'selected' : ''}}>{{$designation->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('designation_id')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Date of Birth <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="date" name="dob" class="form-control" value="{{$emp->dob}}">
                                                        @error('dob')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>joining Date <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="date" name="join_date" class="form-control" value="{{$emp->join_date}}">
                                                        @error('join_date')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Salary <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="salary" class="form-control" value="{{$emp->salary}}">
                                                        @error('salary')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Employee Image <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="image" class="form-control" id="image" value="{{$emp->image}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <img id="showimage" src="{{!empty($emp->image)? url('upload/employee_image/' .$emp->image):url('upload/no_image.jpg/')}}" alt="" style="width:100px; height:100px;border:1px solid #000000">
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