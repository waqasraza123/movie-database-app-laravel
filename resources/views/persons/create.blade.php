@extends('layout.master')
@section('page-title')
    Add Persons
@endsection
@section('page-header')
    @include('partials.layout.page-header', ['heading' => 'Persons', 'sub' => 'Add a Person'])
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
            @include('partials.persons.create-person-form')
        </div>
    </div>

@endsection