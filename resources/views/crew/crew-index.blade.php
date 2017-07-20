@extends('layout.master')
@section('page-title', 'Crew')
@section('page-header')
    @include('partials.layout.page-header', ['heading' => 'Crew', 'sub' => 'All Crew Members'])
@endsection
@section('content')
    <div class="col-sm-12">
        @include('partials.errors.error')
        @include('partials.errors.success')
        @include('partials.crew.index-data', ['crew' => $crew])
    </div>
@endsection