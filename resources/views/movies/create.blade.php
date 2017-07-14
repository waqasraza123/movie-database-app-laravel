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
            {!! Form::open(['class' => 'form-horizontal', '@submit.prevent' => 'form.createMovie', 'files' => true,
            '@keydown' => 'form.errors.clear($event.target.name)', 'id' => 'create-movie-form']) !!}
                @include('partials.movies.form')
            {!! Form::close() !!}
        </div>
    </div>

@endsection
@section('footer')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="{{asset('/lte/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('/lte/plugins/iCheck/icheck.min.js')}}"></script>
@endsection