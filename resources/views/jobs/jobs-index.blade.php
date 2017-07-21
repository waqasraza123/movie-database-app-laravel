@extends('layout.master')
@section('page-title', 'Jobs')
@section('page-header')
    @include('partials.layout.page-header', ['heading' => 'Jobs', 'sub' => 'All Jobs'])
@endsection
@section('content')
    <div class="col-sm-12">
        @include('partials.errors.error')
        @include('partials.errors.success')
        @include('partials.jobs.index-data', ['jobs' => $jobs])
    </div>
@endsection