@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full mt-3">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Change Password</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{route('update.password')}}">
                                @csrf

                                <div class="form-group">
                                    <h5>Current Password <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input id="current_password" type="password" name="current_password" class="form-control">

                                        @error('current_password')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <h5>New Password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input id="password" type="password" name="password" class="form-control">
                                    @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group mt-3">
                                    <h5>Confirm Password <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input id="password_confirmation" type="password" name="password_confirmation" class="form-control">
                                        @error('password_confirmation')
                                        <span>{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="text-xs-right">
                                    <input type="submit" name="submit" id="" value="submit" class="btn btn-rounded btn-success mb-5">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
    </div>
    <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->

</div>
</div>

@endsection()