@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">لوحة تحكم المدير</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row rtl">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-fw fa-5x"  >&#xf0c0</i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $count->get('teachers') }}</div>
                                    <div>عدد المعلمات</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin.teacher.index') }}">
                            <div class="panel-footer">
                                <span class="pull-right">عرض التفاصيل</span>
                                <span class="pull-left"><i class="fa fa-arrow-circle-left"></i></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-lg-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
<i class="fa fa-fw fa-5x" aria-hidden="true" title="Copy to use mortar-board">&#xf19d</i>                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $count->get('students') }}</div>
                                    <div>عدد الطلاب</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin.student.index') }}">
                            <div class="panel-footer">
                                <span class="pull-right">عرض التفاصيل</span>
                                <span class="pull-left"><i class="fa fa-arrow-circle-left"></i></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-sitemap fa-fw fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $count->get('grades') }}</div>
                                    <div>عدد الصفوف</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin.grade.index') }}">
                            <div class="panel-footer">
                                <span class="pull-right">عرض التفاصيل</span>
                                <span class="pull-left"><i class="fa fa-arrow-circle-left"></i></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            الخطة الأسبوعية - يوم <b>{{ today()->translatedFormat('l') }}</b> الموافق
                            <b>{{ now()->format('d-m-Y') }}</b>
                        </div>
                        <div class="panel-body">
                            @if ($scheduals->count() > 0)
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <td>الصف</td>
                                        <td>مفاهيم لغوية</td>
                                        <td>مفاهيم حسابية</td>
                                        <td>التربية الاسلامية</td>
                                        <td>القرآن الكريم</td>
                                        <td>العلوم</td>
                                        <td>اللغة الانجليزية</td>
                                    </thead>
                                    <tbody>
                                        @foreach ($scheduals as $schedual)
                                            <tr>
                                                <td>{{ $schedual->grade->name }}</td>
                                                <td>{{ $schedual->subject1 }}</td>
                                                <td>{{ $schedual->subject2 }}</td>
                                                <td>{{ $schedual->subject3 }}</td>
                                                <td>{{ $schedual->subject4 }}</td>
                                                <td>{{ $schedual->subject5 }}</td>
                                                <td>{{ $schedual->subject6 }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                            لا يوجد برنامج تعليمي لليوم الحالي.
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6"></div>
                <div class="col-lg-6"></div>
            </div>
        </div>
    </div>
@endsection
