@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full mt-3">

        <div class="col-12">
            <div class="col-md-12">
                <div class="box bb-3 border-warning">
                    <div class="box-header">
                        <h4 class="box-title">Student Monthly Fee</h4>
                    </div>

                    <form>
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Month <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="month" id="month" required class="form-control">
                                                <option>select month</option>
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

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

                                <div class="col-md-3" style="padding-top:25px">
                                    <a name="search" class="btn btn-rounded btn-dark" id="search">Search</a>
                                </div>
                            </div>
                        </div>
                        <div class="box">

                            <!-- /.box-header -->
                            <div class="row  box-body" id="DocumentResults">
                                <div class="table-responsive ">

                                    <script id="document-template" type="text/x-handlebars-template">
                                        <table  class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        @{{{thsource}}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @{{#each this}}
                                                    <tr>
                                                    @{{{tdsource}}}

                                                    </tr>
                                                    @{{/each}}
                                                </tbody>
                                            </table>
                                        </script>

                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js"></script>
    <script type="text/javascript">
        $(document).on('click', '#search', function() {
            let year_id = $('#year_id').val();
            let class_id = $('#class_id').val();
            let month = $('#month').val();

            console.log(year_id, '========>year_id');
            console.log(class_id, '========>year_id');
            $.ajax({
                url: "{{ route('monthly.fee.getstudents')}}",
                type: "get",
                data: {
                    'student_year_id': year_id,
                    'student_class_id': class_id,
                    'month': month,
                },
                beforeSend: function() {},
                success: function(data) {
                    let source = $("#document-template").html();
                    let template = Handlebars.compile(source);
                    let html = template(data);
                    $('#DocumentResults').html(html);
                    $('[data-toggle="tooltip"]').tooltip();
                }
            });
        });
    </script>
</div>
</div>

@endsection()