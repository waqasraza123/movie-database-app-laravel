@extends('layout.master')
@section('page-title', 'Cast')
@section('page-header')
    @include('partials.layout.page-header', ['heading' => 'Cast', 'sub' => 'All Cast Members'])
@endsection
@section('content')
    <div class="col-sm-12">
        @include('partials.errors.error')
        @include('partials.errors.success')
        @include('partials.cast.index-data', ['cast' => $cast])
    </div>
@endsection