@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full mt-3">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Assign Subject</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{route('update.assign.subject',$AssignSubject[0]->class_id)}}">
                                @csrf


                                <div class="row">
                                    <div class="col-12">
                                        <div class="add_item">
                                            <div class="form-group">
                                                <h5>Edit Assign Subject <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="class_id" class="form-control">
                                                        <option value="Admin">select class</option>

                                                        @foreach ($StudentSetup as $class)
                                                        <option value="{{$class->id}}" {{($AssignSubject['0']->class_id == $class->id ? 'selected' : '')}}>{{$class->name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>


                                            @foreach ($AssignSubject as $assign_subject)
                                            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <h5>Student Subject <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <select name="subject_id[]" required class="form-control">
                                                                    <option value="Admin">select subject</option>

                                                                    @foreach ($StudentSubject as $subject)
                                                                    <option value="{{$subject->id}}" {{($assign_subject->subject_id == $subject->id ?'selected' : '')}}>{{$subject->name}}</option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <h5>Full Mark<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="number" name="full_mark[]" value="{{$assign_subject->full_mark}}" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <h5>Pass Mark<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="number" name="pass_mark[]" value="{{$assign_subject->pass_mark}}" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <h5>subjective Mark<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="number" name="subjective[]" value="{{$assign_subject->subjective}}" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-3" style="padding-top:27px">
                                                        <span class="btn btn-success addeventmore"> <i class="fa fa-plus-circle"></i> </span>
                                                        <span class="btn btn-danger deleteeventmore"> <i class="fa fa-minus-circle"></i> </span>
                                                    </div>
                                                </div>
                                            </div>

                                            @endforeach

                                        </div>
                                    </div>


                                    <div class="text-xs-right">
                                        <input type="submit" name="submit" id="" value="Update" class="btn btn-rounded btn-success mb-5">
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
                <div class="col-3">
                    <div class="form-group">
                        <h5>Student Subject <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="subject_id[]" required class="form-control">
                                <option value="Admin">select subject</option>

                                @foreach ($StudentSubject as $subject)
                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-2">
                    <div class="form-group">
                        <h5>Full Mark<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="full_mark[]" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="col-2">
                    <div class="form-group">
                        <h5>Pass Mark<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="pass_mark[]" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="col-2">
                    <div class="form-group">
                        <h5>subjective<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="subjective[]" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="col-3" style="padding-top:27px">
                    <span class="btn btn-success addeventmore"> <i class="fa fa-plus-circle"></i> </span>
                    <span class="btn btn-danger deleteeventmore"> <i class="fa fa-minus-circle"></i> </span>
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