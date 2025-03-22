@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full mt-3">

        <div class="col-12">
            <div class="col-md-12">
                <div class="box bb-3 border-warning">
                    <div class="box-header">
                        <h4 class="box-title">Employee Monthly Salary</h4>
                    </div>

                    <form>
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Date <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="date" id="date" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6" style="padding-top:25px">
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
            let date = $('#date').val();

            $.ajax({
                url: "{{ route('employee.monthly.getsalary')}}",
                type: "get",
                data: {
                    'date': date,
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