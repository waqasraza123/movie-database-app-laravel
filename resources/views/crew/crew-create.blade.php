@extends('layout.master')
@section('page-title')
    'Add Crew'
@endsection
@section('page-header')
    @include('partials.layout.page-header', ['heading' => 'Crew', 'sub' => 'Add a Crew Member'])
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
            'id' => 'create-crew-form', 'url' => route('crew.store'), 'method' => 'post']) !!}
                @include('partials.crew.create-form')
            {!! Form::close() !!}
        </div>
    </div>

@endsection