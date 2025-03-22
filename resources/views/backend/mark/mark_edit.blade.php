@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full mt-3">

        <div class="col-12">
            <div class="col-md-12">
                <div class="box bb-3 border-warning">
                    <div class="box-header">
                        <h4 class="box-title">Student Edit Mark</h4>
                    </div>

                    <form action="{{route('update.mark')}}" method="post">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Student Year <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="student_year_id" id="year_id" required class="form-control">
                                                <option>select year</option>
                                                @foreach ($StudentYear as $year)
                                                <option value="{{$year->id}}">{{$year->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Student Class <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="student_class_id" id="class_id" required class="form-control">
                                                <option>select Class</option>
                                                @foreach ($StudentSetup as $class)
                                                <option value="{{$class->id}}">{{$class->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Student Subject <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="assign_subject_id" id="assign_subject_id" required class="form-control">
                                                <option>select subject</option>

                                            </select>
                                        </div>
                                        @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Exam <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="exam_type_id" id="exam_type_id" required class="form-control">
                                                <option>select Exam</option>
                                                @foreach ($exam_type as $exam)
                                                <option value="{{$exam->id}}">{{$exam->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3" style="padding-top:25px">
                                    <a name="search" class="btn btn-rounded btn-dark" id="search">Search</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="row d-none box-body" id="mark-entry">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id No</th>
                                            <th>Name</th>
                                            <th>Father Name</th>
                                            <th>Gender</th>
                                            <th>Mark</th>
                                        </tr>
                                    </thead>
                                    <tbody id="mark-entry-tr">
                                    </tbody>
                                </table>
                            </div>

                            <input type="submit" name="submit" value="Submit" class="btn btn-round btn-primary">
                        </div>


                        <!-- /.box-body -->
                </div>

                



            </div>
        </div>



        <!-- /.box -->

    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).on('click', '#search', function() {
        var year_id = $('#year_id').val();
        var class_id = $('#class_id').val();
        var assign_subject_id = $('#assign_subject_id').val();
        var exam_type_id = $('#exam_type_id').val();
        $.ajax({
            url: "{{ route('mark.student.geteditmark')}}",
            type: "GET",
            data: {
                'student_year_id': year_id,
                'student_class_id': class_id,
                'assign_subject_id': assign_subject_id,
                'exam_type_id': exam_type_id,
            },
            success: function(data) {
                $('#mark-entry').removeClass('d-none');
                var html = '';
                $.each(data, function(key, v) {
                    html +=

                        '<tr>' +
                        '<td>' + v.student.id_no + '<input type="hidden" name="student_id[]" value="' + v.student_id + '" >  <input type="hidden" name="id_no[]" value="' + v.student.id_no + '"> </td>' +
                        '<td>' + v.student.name + '</td>' +
                        '<td>' + v.student.fathername + '</td>' +
                        '<td>' + v.student.gender + '</td>' +
                        '<td><input type="text" class="form-control form-control-sm" name="mark[]" value="' + v.mark + '"></td>' +
                        '</tr>';

                });
                html = $('#mark-entry-tr').html(html);
            }
        });
    });
</script>

<script>
    $(document).ready(function() {

        $(document).on('change', '#class_id', function() {

            var class_id = $(this).val();

            $.ajax({

                url: "{{route('mark.manage.getsubject')}}",
                type: "GET",
                data: {
                    'student_class_id': class_id
                },
                success: function(data) {
                    var html = '<option value="">select subject</option>'
                    $.each(data, function(key, val) {
                        console.log(val.subject.name);
                        html += '<option value="'+ val.id +'">'+val.subject.name+'</option>'
                    });
                    $('#assign_subject_id').html(html);
                }
            })
        })
    })
</script>
</div>
</div>

@endsection()