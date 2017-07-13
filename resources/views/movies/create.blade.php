@extends('layout.master')
@section('page-title', 'Add a Movie')
@section('page-header')
    @include('partials.layout.page-header', ['heading' => 'Movies', 'sub' => 'Add a Movie'])
@endsection
@section('header')
    <link rel="stylesheet" href="{{asset('/lte/plugins/datepicker/datepicker3.css')}}">
    <link rel="stylesheet" href="{{asset('/lte/plugins/iCheck/all.css')}}">
@endsection
@section('content')

    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            {!! Form::open(['class' => 'form-horizontal', '@submit.prevent' => 'createMovie', 'files' => true,
            '@keydown' => 'errors.clear($event.target.name)']) !!}
                @include('partials.movies.form')
            {!! Form::close() !!}
        </div>
    </div>

@endsection
@section('footer')
    <script src="{{asset('/lte/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('/lte/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('/lte/plugins/iCheck/icheck.min.js')}}"></script>
@endsection