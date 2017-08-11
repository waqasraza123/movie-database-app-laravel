@extends('layout.master')
@section('page-title')
    Edit {{$person->name}}
@endsection
@section('page-header')
    @include('partials.layout.page-header', ['heading' => $person->name, 'sub' => 'Edit Person Details!'])
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
            @include('partials.persons.edit-person-form', ['person' => $person])
        </div>
    </div>
@endsection
