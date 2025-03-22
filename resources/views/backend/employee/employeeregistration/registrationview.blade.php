@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full mt-3">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Employee List</h3>

                    <a href="{{route('employee.registration.add')}}" class="btn btn-rounded btn-primary mb-5" style="float: right;">Add Employee </a>
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
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Gender</th>
                                    <th>DOB</th>
                                    @if (Auth::user()->role == 'Admin')
                                    <th>code</th>
                                    @endif
                                    <th>Join Date</th>
                                    <th>Salary</th>
                                    <th>Image</th>

                                    <th width="20%">Action</th>
                                </tr>
                            </thead>

                            @foreach ($data as $key=>$value)

                            <tbody>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$value->id_no}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->email }}</td>
                                    <td>{{$value->mobile}}</td>
                                    <td>{{$value->gender}}</td>
                                    <td>{{$value->dob}}</td>

                                    @if (Auth::user()->role == 'Admin')
                                    <td>{{$value->code}}</td>
                                    @endif

                                    <td>{{$value->join_date}}</td>
                                    <td>{{$value->salary}}</td>
                                    <td>
                                        <center> <img src="{{ !empty($value->image)? url('upload/employee_image/' .$value->image):url('upload/no_image.jpg/')}}" alt="" style="width:50px; height:50px;" class="rounded-circle"> </center>
                                    </td>
                                    <td> <a href="{{route('edit.employee.registration',$value->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('details.employee.registration',$value->id)}}" target="_blank" class="btn btn-info">Details</a>
                                    <a href="{{route('delete.employee.registration',$value->id)}}" class="btn btn-danger" id="delete">Delete</a>
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