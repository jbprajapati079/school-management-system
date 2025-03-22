@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full mt-3">

        <div class="col-12">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Student Group List</h3>

                    <a href="{{route('add.student.group')}}" class="btn btn-rounded btn-primary mb-5" style="float: right;">Add Student Group</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">ID</th>
                                    <th>Name</th>
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>

                            @foreach ($data as $key=>$group)

                            <tbody>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$group->name}}</td>
                                    <td> <a href="{{route('edit.student.group',$group->id)}}" class="btn btn-info">Edit</a> 
                                        <a href="{{route('delete.student.group',$group->id)}}" class="btn btn-danger" id="delete">Delete</a>
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