@section('content')

    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
        @include('partials.errors.error')
        @include('partials.errors.success')

        {!! Form::model($video, ['class' => 'form-horizontal', 'files' => true,
        'id' => 'edit-videos-form', 'url' => route('video.update', ['id' => $video->id]), 'method' => 'PUT']) !!}
        <!-- Horizontal Form -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Fill the Form.</h3>
                </div>

                <div class="box-body">

                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Title</label>

                        <div class="col-sm-10">
                            {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title',
                            'required' => true]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Video Thumbnail</label>

                        <div class="col-sm-10">
                            {!! Form::file('thumb', ['class' => 'form-control', 'id' => 'thumb',
                            'required' => false]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="type" class="col-sm-2 control-label">Type</label>

                        <div class="col-sm-10">
                            {!! Form::select('type', ['Trailer' => 'Trailer', 'Clip' => 'Clip', 'Behind the Scenes' => 'Behind the Scenes'], null, ['class' => 'form-control', 'id' => 'video-type',
                            'required' => true]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type" class="col-sm-2 control-label">Select Movie</label>

                        <div class="col-sm-10">
                            {!! Form::select('movie_id', $movies, $video->movie_id, ['class' => 'form-control', 'id' => 'movie-id',
                            'required' => true]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type" class="col-sm-2 control-label">Select Actors</label>

                        <div class="col-sm-10">
                            {!! Form::select('actors', $actors, $actorsSelected, ['class' => 'form-control', 'id' => 'actors',
                            'required' => true, 'multiple' => true]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="text" class="col-sm-2 control-label">Text</label>

                        <div class="col-sm-10">
                            {!! Form::textarea('text', null, ['class' => 'form-control', 'id' => 'text']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="quality" class="col-sm-2 control-label">Quality</label>

                        <div class="col-sm-10">
                            {!! Form::select('quality', [
                            'HD 720p' => 'HD 720p',
                            'HD 1080p' => 'HD 1080p',
                            'SD' => 'SD']
                            , null, ['class' => 'form-control', 'id' => 'job-id',
                            'required' => true]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="video_url" class="col-sm-2 control-label">Video Url</label>

                        <div class="col-sm-10">
                            {!! Form::text('video_url', null, ['class' => 'form-control', 'id' => 'video-url']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="video_embed" class="col-sm-2 control-label">Video Embed</label>

                        <div class="col-sm-10">
                            {!! Form::textarea('video_embed', null, ['class' => 'form-control', 'id' => 'video-embed']) !!}
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right store-video-button">Update</button>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
            {!! Form::close() !!}
        </div>
    </div>

@endsection
@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="{{asset('/lte/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('/lte/plugins/iCheck/icheck.min.js')}}"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js"></script>
@endsection
@extends('layout.master')
@section('page-title')
    'Edit Video'
@endsection
@section('page-header')
    @include('partials.layout.page-header', ['heading' => 'Videos', 'sub' => 'Edit Video'])
@endsection