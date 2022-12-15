  <title>روضة عالم الأطفال</title>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.php">روضة عالم الأطفال</a>
    </div>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <ul class="nav navbar-nav navbar-right navbar-top-links">
        <li><a href="http://children-world.com/" target="_blank"><i class="fa fa-home fa-fw"></i> زيارة الموقع</a></li>
    </ul>

    <ul class="nav navbar-left navbar-top-links">
      

        @auth
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>
                    {{ Auth::user()->name }}
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu bg-dark dropdown-user">
                    <li>
                        <a>
                            <form action="{{ route('logout') }}" method="POST">
                                @CSRF
                                <button class="btn btn-block btn-link" type="submit">
                                    <i class="fa fa-sign-out fa-fw"></i>
                                    خروج</button>
                            </form>
                        </a>
                    </li>
                </ul>
            </li>
        @endauth
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse ">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{ route('student.home') }}" class="active"><i class="fa fa-dashboard fa-fw"></i> لوحة التحكم</a>
                </li>

                <li>
                    <a href="{{ route('student.homework.index') }}"><i class="fa fa-pencil fa-fw"></i></i> الواجبات<span
                            class="fa arrow"></span></a>
                </li>

                <li>
                    <a href="{{ route('student.schedual.create') }}"><i class="fa fa-table fa-fw"></i> الخطة الاسبوعية</a>
                </li>

                <li>
                    <a href="{{ route('student.activity.index') }}"><i class="fa fa-edit fa-fw"></i> نشاطات</a>
                </li>
                <!-- /.nav-second-level -->
            </ul>
        </div>
    </div>
</nav>
  <script src="js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/startmin.js"></script>
