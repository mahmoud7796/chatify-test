@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">المستخدمين </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="height: 50px">
                    المستخدمين
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
                    <div class="container mt-3 mb-4">
                        <div class="col-lg-12 mt-4 mt-lg-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="user-dashboard-info-box table-responsive mb-0 bg-white p-4 shadow-sm">
                                        <table class="table manage-candidates-top mb-0">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th class="text-center">الحالة</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($users as $user)
                                            <tr class="candidates-list">
                                                <td class="title">
                                                    <div class="thumb">
                                                        <img class="img-fluid rounded" src="{{asset('user.png')}}" alt="">
                                                    </div>
                                                    <div class="candidate-list-details" style="margin-right: 15px">
                                                        <div class="candidate-list-info">
                                                            <div class="candidate-list-title">
                                                                <h5 class="mb-0"><a href="{{url('chatify/'.$user->id)}}"><strong style="font-size: 20px">@if(Auth::id()==$user->id) أنا @else {{$user->name}} @endif</strong> </a></h5>
                                                            </div>
                                                            <div class="candidate-list-title">
                                                                <h5 class="mb-0">@if($user->role==0)مدير @elseif($user->role==1)مُعلم @elseif($user->role==2)طالب @endif</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="candidate-list-favourite-time text-center">
                                                    <span class="btn btn-{{$user->active_status==1 ? 'success' : 'danger'  }}">{{ $user->active_status==1 ? "نشط الآن" : "غير نشط" }}</span>
                                                </td>
                                            </tr>
                                            @empty
                                            <h3>لا يوجد مستخدمين</h3>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
