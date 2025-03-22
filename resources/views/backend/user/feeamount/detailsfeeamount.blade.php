@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full mt-3">

        <div class="col-12">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Details List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <h4> <strong> Fee Category :  </strong> {{$details['0']['fee_category']['name']}}</h4>

                    <div class="table-responsive">
                        
                        <table id="example1" class="table table-bordered table-striped">
                        
                            <thead class="thead-light">
                                
                                <tr>
                                    <th width="5%">ID</th>
                                    <th>Class Name</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>

                            <div>
                        
                        </div>
                            @foreach ($details as $key=>$detail)
                            <tbody>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$detail['student_class']['name']}}</td>
                                    <td>{{$detail->amount}}</td>
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