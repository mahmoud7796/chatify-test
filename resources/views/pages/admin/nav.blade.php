<title>روضة عالم الأطفال</title>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="http://cms.children-world.com">روضة عالم الأطفال</a>
    </div>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <ul class="nav navbar-nav navbar-right navbar-top-links">
        <li><a href="http://children-world.com" target="_blank"><i class="fa fa-home fa-fw"></i> زيارة الموقع</a></li>
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
                        <a href="{{ route('profile.show') }}">
                            <button class="btn btn-block btn-link" type="submit">
                                <i class="fa fa-user fa-fw"></i>
                                تعديل البيانات</button>
                        </a>
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
                    <a href="{{ route('admin.home') }}" class="active"><i class="fa fa-dashboard fa-fw"></i> لوحة التحكم</a>
                </li>

                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> الصفوف<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('admin.grade.index') }}">جميع الصفوف</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.grade.create') }}">اضافة صف جديد</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-graduation-cap"></i> الطلاب<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('admin.student.index') }}">جميع الطلاب</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.student.create') }}">اضافة طالب جديد</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->

                    </li>

                    <li>
                        <a href="#"><i class="fa fa-users"></i> المعلمات<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('admin.teacher.index') }}">جميع المعلمات</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.teacher.create') }}">اضافة معلمة جديدة</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-pencil fa-fw"></i></i> الواجبات<span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('admin.homework.index') }}">جميع الواجبات</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.homework.create') }}">اضافة واجب جديد</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{route('admin.schedual.create')}}"><i class="fa fa-table fa-fw"></i> الخطة الاسبوعية</a>
                    </li>


                <li>
                    <a href="{{ route('admin.activity.index') }}"><i class="fa fa-edit fa-fw"></i> نشاطات</a>
                </li>

                    <li>
                        <a href="{{ route('admin.admin.index') }}"><i class="fa fa-user fa-fw"></i> قائمة المستخدمين </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.admin.create') }}"><i class="fa fa-user-plus fa-fw"></i> مدير اضافي </a>
                    </li>
{{--                     <li>--}}
{{--                    <a href="{{ route('messages.index') }}"><i class="fa fa-edit fa-fw"></i> الرسائل</a>--}}
{{--                </li>--}}
{{--                 <li>--}}
{{--                    <a href="{{ route('messages.create') }}"><i class="fa fa-edit fa-fw"></i> رسالة جديدة</a>--}}
{{--                </li>--}}
                <li>
                    <a href="{{ route('users.list') }}"><i class="fa fa-edit fa-fw"></i> إرسال رسالة</a>
                </li>
                <li>
                    <a href="{{ url('chatify') }}"><i class="fa fa-edit fa-fw"></i> المحادثات</a>
                </li>
                <li>
                    <a href="{{ route('find.conversation') }}"><i class="fa fa-edit fa-fw"></i>بحث عن محادثة </a>
                </li>

                <!-- /.nav-second-level -->
            </ul>
        </div>
    </div>
</nav>
