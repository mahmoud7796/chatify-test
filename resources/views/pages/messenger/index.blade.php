@extends('layouts.app')

@section('content')
    @include('pages.messenger.partials.flash')

    @each('pages.messenger.partials.thread', $threads, 'thread', 'pages.messenger.partials.no-threads')
@stop
