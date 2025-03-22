@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full mt-3">

        <div class="col-12">
            <div class="col-md-12">
                <div class="box bb-3 border-warning">
                    <div class="box-header">
                        <h4 class="box-title">Student Search</h4>
                    </div>

                    <form action="{{route('search.student')}}">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Student Year <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="student_year_id" required class="form-control">
                                                <option>select year</option>
                                                @foreach ($StudentYear as $year)
                                                <option value="{{$year->id}}" {{(@$firstyeardata ==$year->id)? "selected" : ""}}>{{$year->name}}</option>
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
                                                <option>select Class</option>
                                                @foreach ($StudentSetup as $class)
                                                <option value="{{$class->id}}" {{(@$firstclassdata ==$class->id)? "selected" : ""}}>{{$class->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4" style="padding-top:25px">
                                <input class="btn btn-rounded btn-dark mb-5" type="submit" name="search" value="Search">
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            @if (!@$search)
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Student List</h3>

                    <a href="{{route('add.registration.student')}}" class="btn btn-rounded btn-primary mb-5" style="float: right;">Add Student </a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">ID</th>
                                    <th>Name</th>
                                    <th>Id No</th>
                                    <th>Role</th>
                                    <th>Mobile</th>
                                    <th>gender</th>
                                    <th>image</th>
                                    <th>dob</th>

                                    @if (Auth::user()->role == 'Admin')
                                    <th>code</th>
                                    @endif

                                    <th>Class</th>
                                    <th>Year</th>
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>

                            @foreach ($data as $key=>$value)

             
                            <tbody>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$value['student']['name']}}</td>
                                    <td>{{$value['student']['id_no']}}</td>
                                    <td>{{$value->role}}</td>
                                    <td>{{$value['student']['mobile']}}</td>
                                    <td>{{$value['student']['gender']}}</td>
                                    <td>
                                        <center> <img src="{{ !empty($value['student']['image'])? url('upload/student_image/' .$value['student']['image']):url('upload/no_image.jpg/')}}" alt="" style="width:50px; height:50px;" class="rounded-circle"> </center>
                                    </td>
                                    <td>{{$value['student']['dob']}}</td>
                                    <td>{{$value['student']['code']}}</td>
                                    <td>{{$value['student_class']['name']}}</td>
                                    <td>{{$value['student_year']['name']}}</td>
                                    <td> <a href="{{route('edit.student.registration',$value->student_id)}}" class="btn btn-primary">Edit</a>
                                        <a href="{{route('promot.student.registration',$value->student_id)}}" class="btn btn-secondary">Promot</a>
                                        <a href="{{route('detail.student.registration',$value->student_id)}}" class="btn btn-info">Details</a>
                                    </td>
                                </tr>

                            </tbody>

                            @endforeach

                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            @else
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Student List</h3>

                    <a href="{{route('add.registration.student')}}" class="btn btn-rounded btn-primary mb-5" style="float: right;">Add Student </a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">ID</th>
                                    <th>Name</th>
                                    <th>Id No</th>
                                    <th>Role</th>
                                    <th>Mobile</th>
                                    <th>gender</th>
                                    <th>image</th>
                                    <th>dob</th>

                                    @if (Auth::user()->role == 'Admin')
                                    <th>code</th>
                                    @endif

                                    <th>Class</th>
                                    <th>Year</th>
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>

                            @foreach ($data as $key=>$value)

                            <tbody>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$value['student']['name']}}</td>
                                    <td>{{$value['student']['id_no']}}</td>
                                    <td></td>
                                    <td>{{$value['student']['mobile']}}</td>
                                    <td>{{$value['student']['gender']}}</td>
                                    <td>
                                        <center> <img src="{{ !empty($value['student']['image'])? url('upload/student_image/' .$value['student']['image']):url('upload/no_image.jpg/')}}" alt="" style="width:50px; height:50px;" class="rounded-circle"> </center>
                                    </td>
                                    <td>{{$value['student']['dob']}}</td>
                                    <td>{{$value['student']['code']}}</td>
                                    <td>{{$value['student_class']['name']}}</td>
                                    <td>{{$value['student_year']['name']}}</td>
                                    <td> <a href="{{route('edit.student.registration',$value->student_class_id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('promot.student.registration',$value->student_id)}}" class="btn btn-secondary">Promot</a>
                                    <a href="{{route('detail.student.registration',$value->student_id)}}" class="btn btn-info">Details</a>
                                    </td>
                                </tr>

                            </tbody>

                            @endforeach

                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            @endif
            
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