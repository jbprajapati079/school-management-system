@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full mt-3">

        <div class="col-12">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">User list</h3>

                    <a href="{{route('add.user')}}" class="btn btn-rounded btn-primary mb-5" style="float: right;">Add User</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">ID</th>
                                    <th>Role</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Code</th>
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>

                            @foreach ($alluser as $key=>$value)

                            <tbody>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$value->role}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->email}}</td>
                                    <td>{{$value->code}}</td>
                                    <td> <a href="{{route('edit.user',$value->id)}}" class="btn btn-info">Edit</a> 
                                        <a href="{{route('delete.user',$value->id)}}" class="btn btn-danger" id="delete">Delete</a>
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