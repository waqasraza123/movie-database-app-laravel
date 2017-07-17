@extends('layout.master')
@section('page-title')
    @if($personType == 'cast') {{'Add Cast Members'}} @endif
@endsection
@section('page-header')
    @include('partials.layout.page-header', ['heading' => $personType, 'sub' => 'Add a member'])
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
            @if($personType == 'cast')
                @include('partials.persons.cast.create-form')
            @endif
        </div>
    </div>

@endsection