@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full mt-3">

        <div class="col-12">
            <div class="col-md-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Account Studetn Fee</h3>
                        <a href="{{route('student.fee.add')}}" class="btn btn-rounded btn-primary mb-5" style="float: right;">Add Account Student Fee</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Name</th>
                                        <th>ID No</th>
                                        <th>Year</th>
                                        <th>Class</th>
                                        <th>Fee Type</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                @foreach ($data as $key=>$value)
                                <tbody>
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$value['student']['name']}}</td>
                                        <td>{{$value['student']['id_no']}}</td>
                                        <td>{{$value['year']['name']}}</td>
                                        <td>{{$value['class']['name']}}</td>
                                        <td>{{$value['fee_category']['name']}}</td>
                                        <td>{{$value->amount}}</td>
                                        <td>{{$value->date}}</td>
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