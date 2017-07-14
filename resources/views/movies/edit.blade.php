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
            @include('partials.errors.error')
            @include('partials.errors.success')

            {!! Form::model($movie, ['class' => 'form-horizontal',
            'id' => 'update-movie-form', 'files' => true,
            'method' => 'PATCH', 'url' => route('movies.update', ['id' => $movie->id])]) !!}
                @include('partials.movies.edit-form', ['movie' => $movie])
            {!! Form::close() !!}
        </div>
    </div>

@endsection
@section('footer')
    <script src="{{asset('/lte/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('/lte/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="{{asset('/lte/plugins/iCheck/icheck.min.js')}}"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js"></script>
@endsection