@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">المحادثة </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="height: 50px">
                    المحادثة
                </div>
                <div class="page-content page-container" id="page-content">
                    <div class="padding">
                        <div class="row container d-flex justify-content-center">
                            <div class="col-md-12">
                                <div class="card card-bordered">
                                    <div class="ps-container ps-theme-default ps-active-y" id="chat-content" style="overflow-y: scroll !important; height:400px !important;">
                                       @forelse($conversations as $conversation)
                                            <div style="width: 40%" class="media media-chat @if($conversation->from_id!=$from) media-chat-reverse @endif">
                                            <img class="avatar" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="...">
                                            <h5><strong>{{\App\User::whereId($conversation->from_id)->first()->name}}</strong></h5><br>
                                            <div class="media-body" style="width: 100%">
                                                <p>{{$conversation->body}}</p>
                                                <p class="meta" style="color: gray"><time>{{$conversation->created_at->diffForHumans()}}</time></p>
                                            </div>
                                        </div>
                                        @empty
                                           <h3 style="color: gray">لا توجد رسائل</h3>
                                        @endforelse
                                        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 0px; right: 2px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 2px;"></div></div></div>
                                    <div style="text-align: center">
                                        <div class="btn-group" role="group"
                                             aria-label="Basic example">
                                            <a href="{{url('users/find/conversation')}}"
                                               class="btn btn-danger">العودة</a>
                                        </div>
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
