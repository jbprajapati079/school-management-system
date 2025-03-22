@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp


<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="{{route('dashboard')}}">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
                        <h3><b>Bharat</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{$route == '/dashboard'?'active':''}}">
                <a href="{{route('dashboard')}}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            
            <li class="treeview {{$prefix == '/user'?'active':''}} ">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Manage User</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('view.user')}}"><i class="ti-more"></i>View user</a></li>
                    <li><a href="{{route('add.user')}}"><i class="ti-more"></i>Add user</a></li>
                </ul>
            </li>
            
            

            <li class="treeview {{$prefix == '/profile'?'active':''}}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Manage Profile</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('profile.view')}}"><i class="ti-more"></i>Profile View</a></li>
                    <li><a href="{{route('change.password')}}"><i class="ti-more"></i>Change Password</a></li>
                </ul>
            </li>

            <li class="treeview {{$prefix == '/setup'?'active':''}}">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Setup Managament</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('student.class.view')}}"><i class="ti-more"></i>Student Class</a></li>
                    <li><a href="{{route('student.year.view')}}"><i class="ti-more"></i>Student Year</a></li>
                    <li><a href="{{route('student.group.view')}}"><i class="ti-more"></i>Student Group</a></li>
                    <li><a href="{{route('student.shift.view')}}"><i class="ti-more"></i>Student Shift</a></li>
                    <li><a href="{{route('fee.category.view')}}"><i class="ti-more"></i>Fee Category</a></li>
                    <li><a href="{{route('fee.amount.view')}}"><i class="ti-more"></i>Fee Amount</a></li>
                    <li><a href="{{route('exam.type.view')}}"><i class="ti-more"></i>Exam Type</a></li>
                    <li><a href="{{route('student.subject.view')}}"><i class="ti-more"></i>Student Subject</a></li>
                    <li><a href="{{route('assign.subject.view')}}"><i class="ti-more"></i>Assign Subject</a></li>
                    <li><a href="{{route('designation.view')}}"><i class="ti-more"></i>Designation</a></li>
                </ul>
            </li>

            <li class="treeview {{$prefix == '/setup'?'active':''}}">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Student Managament</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('student.registration.view')}}"><i class="ti-more"></i>Student Registration</a></li>
                    <li><a href="{{route('role.generate.view')}}"><i class="ti-more"></i> Roll Generate</a></li>
                    <li><a href="{{route('student.leave.view')}}"><i class="ti-more"></i>Student Leave</a></li>
                    <li><a href="{{route('registration.fee.view')}}"><i class="ti-more"></i> Registration Fee</a></li>
                    <li><a href="{{route('monthly.fee.view')}}"><i class="ti-more"></i> Monthly Fee</a></li>
                    <li><a href="{{route('exam.fee.view')}}"><i class="ti-more"></i> Exam Fee</a></li>
                </ul>
            </li>

            <li class="treeview {{$prefix == '/employee'?'active':''}}">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Employee Managament</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('employee.registration.view')}}"><i class="ti-more"></i>Employee Registration</a></li>
                    <li><a href="{{route('employee.salary.view')}}"><i class="ti-more"></i>Employee Salary</a></li>
                    <li><a href="{{route('employee.leave.view')}}"><i class="ti-more"></i>Employee Leave</a></li>
                    <li><a href="{{route('employee.attendance.view')}}"><i class="ti-more"></i>Employee Attendance</a></li>
                    <li><a href="{{route('employee.monthly.salary.view')}}"><i class="ti-more"></i>Employee Monthly Salary</a></li>
                </ul>
            </li>

            <li class="treeview {{$prefix == '/mark'?'active':''}}">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Student Mark</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{$route == 'mark.manage.add'?'active':''}}"><a href="{{route('mark.manage.add')}}"><i class="ti-more"></i>Add Mark</a></li>
                    <li class="{{$route == 'mark.manage.edit'?'active':''}}"><a href="{{route('mark.manage.edit')}}"><i class="ti-more"></i>Edit Mark</a></li>
                    <li class="{{$route == 'mark.grade.view'?'active':''}}"><a href="{{route('mark.grade.view')}}"><i class="ti-more"></i>Studetn Grade</a></li>
                </ul>
            </li>


            <li class="treeview {{$prefix == '/account'?'active':''}}">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Account management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{$route == 'student.fee.view'?'active':''}}"><a href="{{route('student.fee.view')}}"><i class="ti-more"></i>Student Fee</a></li>
                </ul>
            </li>

            <li class="header nav-small-cap">User Interface</li>

            

        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>