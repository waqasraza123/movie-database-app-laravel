@extends('layout.master')
@section('page-title')
    'Edit Crew'
@endsection
@section('page-header')
    @include('partials.layout.page-header', ['heading' => 'Crew', 'sub' => 'Edit Crew'])
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

            {!! Form::model($crew, ['class' => 'form-horizontal', 'files' => true,
            'id' => 'create-crew-form', 'url' => route('crew.update', ['id' => $crew->id]), 'method' => 'patch']) !!}
                @include('partials.crew.edit-form')
            {!! Form::close() !!}
        </div>
    </div>

@endsection