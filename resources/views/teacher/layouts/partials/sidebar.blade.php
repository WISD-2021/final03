<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('teacher.dashboard.index') }}">管理後台</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 管理員 <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="nav-link" href="{{ route('logout') }}" style="font-size:15px;color: #6b7280"
                       onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                        Log out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="active">
                <a href="{{ route('teacher.dashboard.index') }}"><i class="fa fa-fw fa-dashboard"></i> 主控台</a>
            </li>
            <li>
                <a href="{{ route('teacher.courses.index') }}"><i class="fa fa-fw fa-edit"></i> 課程管理</a>
            </li>
            <li class="dropdown">
                <?php
                session_start();
                $course= DB::table('courses')->orderBy('id','ASC')->get();
                $teacher= DB::table('teachers')->where('user_id',auth()->user()->id)->orderBy('id','ASC')->get();?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 作業管理 <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    @foreach($course as $courses)
                        @foreach($teacher as $teachers)
                            @if($courses->teacher_id == $teachers->id)
                                <form  method="GET" action='{{ route('teacher.homeworks.index'), $courses->id}}' style="display: inline">
                                    <li class="mb-1">
                                        <?php
                                            echo "<input name='course_id' value='".$courses->id."' hidden>";
                                        ?>
                                            <button class="btn btn-outline-dark" type="submit" style="width:225px;height:30px;">{{$courses->name}}</button>
                                        <!--<a href="{{ route('teacher.homeworks.index'), $courses->id}}">{{$courses->name}}</a>-->
                                    </li>
                                </form>
                            @endif
                        @endforeach
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
