@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full mt-3">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Form Validation</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{route('profile.update')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>User gender <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="gender" id="select" required class="form-control">
                                                    <option value="Male" {{$userdata->gender == 'Male' ? 'selected' : ""}}>Male</option>
                                                    <option value="Female" {{$userdata->gender == 'Female' ? 'selected' : ""}}>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>User Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" value="{{$userdata->name}}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>User Email <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" value="{{$userdata->email}}" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>User Mobile <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="mobile" value="{{$userdata->mobile}}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>User Address <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="address" value="{{$userdata->address}}" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>User Image <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="image" class="form-control" id="image" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="controls">
                                                <img id="showimage" src="{{ !empty($user->image)? url('upload/user_image/' .$user->image):url('upload/no_image.jpg/')}}" alt="" style="width:100px; height:100px;border:1px solid #000000;">
                                            </div>
                                        </div>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        $('#image').change(function(e) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#showimage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection()