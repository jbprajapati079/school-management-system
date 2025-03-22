@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full mt-3">

        <div class="col-12">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Assign Subject Details</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <h4> <strong> Student Class :  </strong> {{$data['0']['class']['name']}}</h4>

                    <div class="table-responsive">
                        
                        <table id="example1" class="table table-bordered table-striped">
                        
                            <thead class="thead-light">
                                
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width="19%">Class Name</th>
                                    <th width="19%">Subject Name</th>
                                    <th width="19%">Full Mark</th>
                                    <th width="19%">Pass Mark</th>
                                    <th width="19%">subjective Mark</th>
                                </tr>
                            </thead>

                            <div>
                        
                        </div>
                            @foreach ($data as $key=>$detail)
                            <tbody>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$detail['class']['name']}}</td>
                                    <td>{{$detail['subject']['name']}}</td>
                                    <td>{{$detail->full_mark}}</td>
                                    <td>{{$detail->pass_mark}}</td>
                                    <td>{{$detail->subjective}}</td>
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