@extends('layout.master')
@section('page-title')
    'Edit Cast'
@endsection
@section('page-header')
    @include('partials.layout.page-header', ['heading' => 'Cast', 'sub' => 'Edit Cast'])
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

            {!! Form::model($cast, ['class' => 'form-horizontal', 'files' => true,
            'id' => 'create-cast-form', 'url' => route('cast.update', ['id' => $cast->id]), 'method' => 'patch']) !!}
                @include('partials.cast.edit-form')
            {!! Form::close() !!}
        </div>
    </div>

@endsection