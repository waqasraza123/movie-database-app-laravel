@extends('layout.master')
@section('page-title', 'Update Movie')
@section('page-header')
    @include('partials.layout.page-header', ['heading' => 'Movies', 'sub' => 'Update Movie'])
@endsection
@section('header')
    <link rel="stylesheet" href="{{asset('/lte/plugins/datepicker/datepicker3.css')}}">
    <link rel="stylesheet" href="{{asset('/lte/plugins/iCheck/all.css')}}">
@endsection
@section('content')

    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            {!! Form::model($movie, ['class' => 'form-horizontal', '@submit.prevent' => 'updateMovie', 'method' => 'PUT', 'files' => true]) !!}
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