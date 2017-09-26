@extends('layout.master')
@section('page-title')
    'Add a Post'
@endsection
@section('page-header')
    @include('partials.layout.page-header', ['heading' => 'Blog Posts', 'sub' => 'Add a Post'])
@endsection
@section('header')
    <link rel="stylesheet" href="{{asset('/lte/plugins/datepicker/datepicker3.css')}}">
    <!-- include summernote css/js-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
@endsection
@section('content')

    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            @include('partials.errors.error')
            @include('partials.errors.success')

            {!! Form::open(['class' => 'form-horizontal', 'files' => true,
            'id' => 'create-posts-form', 'url' => route('posts.store'), 'method' => 'post']) !!}
            @include('partials.blog.blog-create-partial')
            {!! Form::close() !!}
        </div>
    </div>

@endsection
@section('footer')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>

@endsection