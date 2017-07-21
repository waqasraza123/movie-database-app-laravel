@extends('layout.master')
@section('page-title')
    'Edit Job'
@endsection
@section('page-header')
    @include('partials.layout.page-header', ['heading' => 'Jobs', 'sub' => 'Edit Jobs'])
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

            {!! Form::model($job, ['class' => 'form-horizontal', 'files' => true,
            'id' => 'create-jobs-form', 'url' => route('jobs.update', ['id' => $job->id]), 'method' => 'patch']) !!}
                @include('partials.jobs.edit-form')
            {!! Form::close() !!}
        </div>
    </div>

@endsection