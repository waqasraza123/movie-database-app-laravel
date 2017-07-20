@extends('layout.master')
@section('page-title', 'Persons')
@section('page-header')
    @include('partials.layout.page-header', ['heading' => 'Persons', 'sub' => 'All Persons'])
@endsection
@section('content')
    <div class="col-sm-12">
        @include('partials.errors.error')
        @include('partials.errors.success')
        @include('partials.persons.persons-index-data', ['persons' => $persons])
    </div>
@endsection