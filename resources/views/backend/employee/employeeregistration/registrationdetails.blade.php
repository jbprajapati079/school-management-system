@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full mt-3">

        <div class="col-12">

            <div class="box">

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <h3>Easy School</h3>
                                <tr>


                                    <td width="30%"> <strong>School Address</strong> </td>
                                    <td>Naroda, Ahmedabad - 382330 </td>
                                </tr>
                                <tr>
                                    <td> <strong>Email ID</strong> </td>
                                    <td>support@gmail.com</td>
                                </tr>
                            </thead>


                        </table>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>

                                    <th width="30%">Employee Details</th>
                                    <th>Employee Data</th>

                                </tr>
                            </thead>


                            <tbody>
                                <tr>
                                    <td>Employee ID</td>
                                    <td>{{$emp->id_no}}</td>
                                </tr>
                               
                                
                                <tr>
                                    <td>Employee name</td>
                                    <td>{{$emp->name}}</td>
                                </tr>
                                
                                <tr>
                                    <td>Contact</td>
                                    <td>{{$emp->mobile}}</td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td>{{$emp->gender}}</td>
                                </tr>
                                <tr>
                                    <td>Addresse</td>
                                    <td>{{$emp->address}}</td>
                                </tr>
                                <tr>
                                    <td>Date Of Birth</td>
                                    <td>{{$emp->dob}}</td>
                                </tr>
                                <tr>
                                    <td>Designation</td>
                                    <td>{{$emp['designation']['name']}}</td>
                                </tr>
                                
                                <tr>
                                    <td>Salary</td>
                                    <td>{{$emp->salary}}</td>
                                </tr>

                                <tr>
                                    <td>Joining Date</td>
                                    <td>{{$emp->join_date}}</td>
                                </tr>

                                

                            </tbody>



                        </table>

                        <i> Print date : {{date("d-m-Y")}} </i>
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