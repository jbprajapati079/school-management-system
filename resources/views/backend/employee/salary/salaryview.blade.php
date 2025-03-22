@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full mt-3">

        <div class="col-12">
            <div class="col-md-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Employee Salary List</h3>
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
                                        <th>Join Date</th>
                                        <th>Salary</th>
                                        <th>Image</th>

                                        <th>Action</th>
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
                                        <td>{{date("d-m-Y", strtotime($value->dob))}}</td>
                                        <td>{{date("d-m-Y", strtotime($value->join_date)) }}</td>
                                        <td>{{$value->salary}}</td>
                                        <td>
                                            <center> <img src="{{ !empty($value->image)? url('upload/employee_image/' .$value->image):url('upload/no_image.jpg/')}}" alt="" style="width:50px; height:50px;" class="rounded-circle"> </center>
                                        </td>
                                        <td> <a title="salary increment"  href="{{route('increment.employee.salary',$value->id)}}" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                            </a>
                                            <a  title="salary details" href="{{route('details.employee.salary',$value->id)}}" target="_blank" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                            <a title="employee delete" href="{{route('delete.employee.salary',$value->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash" aria-hidden="true"></i>
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