@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full mt-3">

        <div class="col-12">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Fee Category List</h3>

                    <a href="{{route('add.fee.category')}}" class="btn btn-rounded btn-primary mb-5" style="float: right;">Add Fee Category</a>
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

                            @foreach ($data as $key=>$feecategory)

                            <tbody>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$feecategory->name}}</td>
                                    <td> <a href="{{route('edit.fee.category',$feecategory->id)}}" class="btn btn-info">Edit</a> 
                                        <a href="{{route('delete.fee.category',$feecategory->id)}}" class="btn btn-danger" id="delete">Delete</a>
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