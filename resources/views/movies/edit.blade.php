@extends('layout.master')
@section('page-title')
    'Update Movie'
@endsection
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
            <br>
            <div class="row">
                <div class="col-sm-2">
                    <a class="btn btn-primary" href="{{route('movies.create')}}">Add Movie</a>
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#cast-modal">Add Cast</button>
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#crew-modal">Add Crew</button>
                </div>
                <div class="col-sm-2">
                    <button id="add-photos-button" type="button" class="btn btn-help" data-toggle="modal" data-target="#photos-modal">Add Photos</button>
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#crew-modal">Add Videos</button>
                </div>
            </div>
            <br>
            {!! Form::model($movie, ['class' => 'form-horizontal',
            'id' => 'update-movie-form', 'files' => true,
            'method' => 'PATCH', 'url' => route('movies.update', ['id' => $movie->id])]) !!}
                @include('partials.movies.edit-form', ['movie' => $movie])
            {!! Form::close() !!}
        </div>
    </div>
    <div id="cast-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Add Cast</h4>
                </div>
                <div class="modal-body">
                {!! Form::open(['class' => 'form-horizontal', 'files' => true,
        'id' => 'create-cast-form', 'url' => route('cast.store'), 'method' => 'post']) !!}
                        @include('partials.cast.create-form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="crew-modal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Crew</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['class' => 'form-horizontal', 'files' => true,
            'id' => 'create-crew-form', 'url' => route('crew.store'), 'method' => 'post']) !!}
                        @include('partials.crew.create-form')
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
    @include('partials.movies.photos.add')
@endsection
