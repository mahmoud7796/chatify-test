@extends('layouts.app')

@section('content')
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">تعديل الصفحة الشخصية</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="panel panel-default">
                        <div class="panel-heading ">
                            تعديل الصفحة الشخصية
                        </div>
                        <div class="panel-body ">
                            <div class="row ">
                                <div class="col-lg-6 pull-right">
                                    <form name="add-homework" action="{{ route('profile.update') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group @error('name') has-error @enderror">
                                            <label class="control-label" for="name">الإسم</label>
                                            <input id="subject" name="name" class="form-control"
                                                value="{{$user->name}}" placeholder="اكتب هنا ..">
                                            @error('name')
                                                <p class="help-block text-danger" role="alert">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                        <div class="form-group @error('email') has-error @enderror">
                                            <label class="control-label" for="email">رقم الهوية</label>
                                            <input id="email" value="{{$user->email}}" name="email" class="form-control" placeholder="اكتب هنا ..">
                                            @error('email')
                                                <p class="help-block text-danger" role="alert">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                        <div class="form-group @error('password') has-error @enderror">
                                            <label class="control-label" for="password">الباسورد</label>
                                            <input name="password" type="text" class="form-control"
                                                value="" placeholder="اكتب هنا ..">
                                            @error('password')
                                                <p class="help-block text-danger" role="alert">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-success">تحديث البيانات</button>

                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->

                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection
