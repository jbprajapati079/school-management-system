@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full mt-3">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Fee Amount</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{route('store.fee.amount')}}">
                                @csrf


                                <div class="row">
                                    <div class="col-12">
                                        <div class="add_item">
                                            <div class="form-group">
                                                <h5>Fee Category <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="fee_category_id" class="form-control">
                                                        <option value="Admin">select fee category</option>

                                                        @foreach ($feecategories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <h5>Student Class <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="class_id[]" required class="form-control">
                                                                <option value="Admin">select class</option>

                                                                @foreach ($class as $value)
                                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <h5>Amount<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="amount[]" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-2" style="padding-top:27px">
                                                    <span class="btn btn-success addeventmore"> <i class="fa fa-plus-circle"></i> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="text-xs-right">
                                        <input type="submit" name="submit" id="" value="submit" class="btn btn-rounded btn-success mb-5">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </section>


    </div>
    <!-- /.box -->


    <!-- /.content -->
</div>
<!-- /.row -->
<!-- /.content -->

<div style="visibility:hidden;">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
            <div class="form-row">
                <div class="col-md-5">
                    <div class="form-group">
                        <h5>Student Class <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="class_id[]" required class="form-control">
                                <option value="Admin">select class</option>

                                @foreach ($class as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <h5>Amount<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="amount[]" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="col-md-2" style="padding-top:27px">
                    <span class="btn btn-success addeventmore"> <i class="fa fa-plus-circle"></i> </span>
                    <span class="btn btn-success deleteeventmore"> <i class="fa fa-minus-circle"></i> </span>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        let counter = 0;
        $(document).on('click', '.addeventmore', function(e) {

            let whole_extra_item_add = $('#whole_extra_item_add').html();
            $(this).closest('.add_item').append(whole_extra_item_add);
            counter++;
        });
        $(document).on('click', '.deleteeventmore', function(e) {
            $(this).closest('.delete_whole_extra_item_add').remove();
            counter -= 1
        });
    })
</script>
@endsection()