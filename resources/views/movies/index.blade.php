@extends('layout.master')
@section('page-title', 'Movies')
@section('page-header')
    @include('partials.layout.page-header', ['heading' => 'Movies', 'sub' => 'All Movies'])
@endsection
@section('content')
    <div class="col-sm-12">
        @include('partials.movies.index-data', ['movies' => $movies])
    </div>
@endsection