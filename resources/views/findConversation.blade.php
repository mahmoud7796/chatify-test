@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">بحث  </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="height: 50px;margin-bottom: 18px">
                    بحث عن محادثة
                </div>
                <form method="post" action="{{route('conversation.show')}}" style="padding: 15px">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1">اختر الراسل</label>
                            <select name="from_id" class="form-control" id="exampleFormControlSelect1">
                                @forelse($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @empty
                                    <h3>لا يوجد مستخدمين</h3>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect2">اختر المُرسل</label>
                            <select name="to_id" class="form-control" id="exampleFormControlSelect2">
                                @forelse($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                    @empty
                                <h3>لا يوجد مستخدمين</h3>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div style="text-align: center">
                        <button type="submit" class="btn btn-success">عرض المحادثة</button>
                        <div class="btn-group" role="group"
                             aria-label="Basic example">
                            <a href="{{url('admin/home')}}"
                               class="btn btn-danger">العودة</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
