@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full mt-3">

        <div class="col-12">
            <div class="col-md-12">
                <div class="box bb-3 border-warning">
                    <div class="box-header">
                        <h4 class="box-title">Student Search</h4>
                    </div>

                    <form action="{{route('store.roll.generate')}}" method="post">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">
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

                                <div class="col-md-4">
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

                                <div class="col-md-4" style="padding-top:25px">
                                    <a name="search" class="btn btn-rounded btn-dark" id="search">Search</a>
                                </div>
                            </div>
                        </div>
                        <div class="box d-none" id="rolegenerate">
                         
                            <!-- /.box-header -->
                            <div class="row  box-body">
                                <div class="table-responsive">
                                    <table  class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Id No</th>
                                                <th>Name</th>
                                                <th>Father Name</th>
                                                <th>Gender</th>
                                                <th>Role</th>
                                            </tr>
                                        </thead>
                                        <tbody id="role-generate-tr">
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <!-- /.box-body -->
                        </div>
                        
                        <input type="submit" name="submit" class="btn btn-primary" value="Role Generate" style="margin-left: 23px; margin-bottom: 10px">
                    </form>




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
            $.ajax({
                url: "{{ route('student.registration.getstudents')}}",
                type: "GET",
                data: {
                    'student_year_id': year_id,
                    'student_class_id': class_id
                },
                success: function(data) {
                    $('#rolegenerate').removeClass('d-none');
                    var html = '';
                    $.each(data, function(key, v) {
                        html +=

                            '<tr>' +
                            '<td>' + v.student.id_no + '<input type="hidden" name="student_id[]" value="' + v.student_id + '"></td>' +
                            '<td>' + v.student.name + '</td>' +
                            '<td>' + v.student.fathername + '</td>' +
                            '<td>' + v.student.gender + '</td>' +
                            '<td><input type="text" class="form-control form-control-sm" name="role[]" value="' + v.role + '"></td>' +
                            '</tr>';

                    });
                    html = $('#role-generate-tr').html(html);
                }
            });
        });
    </script>
</div>
</div>

@endsection()