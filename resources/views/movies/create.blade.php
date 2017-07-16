@extends('layout.master')
@section('page-title')
    'Add a Movie'
@endsection
@section('page-header')
    @include('partials.layout.page-header', ['heading' => 'Movies', 'sub' => 'Add a Movie'])
@endsection
@section('header')
    <link rel="stylesheet" href="{{asset('/lte/plugins/datepicker/datepicker3.css')}}">
    <link rel="stylesheet" href="{{asset('/lte/plugins/iCheck/all.css')}}">
@endsection
@section('content')

    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            @include('partials.errors.error')
            @include('partials.errors.success')

            {!! Form::open(['class' => 'form-horizontal', 'files' => true,
            'id' => 'create-movie-form', 'url' => route('movies.store'), 'method' => 'post']) !!}
                @include('partials.movies.form')
            {!! Form::close() !!}
        </div>
    </div>

@endsection