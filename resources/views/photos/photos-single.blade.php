@extends('layout.master')
@section('page-title', 'Photos')
@section('page-header')
    @include('partials.layout.page-header', ['heading' => 'Photos', 'sub' => 'Edit Photo'])
@endsection
@section('content')
    <div class="col-sm-6 col-sm-offset-3">
        @include('partials.errors.error')
        @include('partials.errors.success')
        <div style="margin-bottom: 20px">
            <img src="{{$p->photo}}" width="100%">
        </div>
        {!! Form::open(['class' => 'form-horizontal', 'files' => true,
        'id' => 'add-photos-form', 'url' => route('photos.update', ['id' => $p->id]), 'method' => 'patch']) !!}
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="tags" class="col-sm-2 control-label">Tags</label>

                    <div class="col-sm-10">
                        {!! Form::select('tags[]', $keywords, $keywordsSelect, ['class' => 'form-control', 'id' => 'photo-tags',
                        'required' => true, 'multiple' => true]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label for="tags" class="col-sm-2 control-label">Tag Movie</label>

                    <div class="col-sm-10">
                        {!! Form::select('movie_id', $movies, $movieSelected, ['class' => 'form-control', 'id' => 'movie',
                        'required' => true]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label for="tags" class="col-sm-2 control-label">Tag Actors</label>

                    <div class="col-sm-10">
                        {!! Form::select('actors[]', $actors, $actorsSelected, ['class' => 'form-control', 'id' => 'actors',
                        'required' => true, 'multiple' => true]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-3">
                        {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection