@section('content')

    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
        @include('partials.errors.error')
        @include('partials.errors.success')

        {!! Form::open(['class' => 'form-horizontal', 'files' => true,
        'id' => 'add-photos-form', 'url' => route('photos.store'), 'method' => 'post']) !!}
        <!-- Horizontal Form -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Fill the Form.</h3>
                </div>

                <div class="box-body">
                    <div id="dropzone-photos" class="dropzone"></div><br>
                    <div class="form-group">
                        <label for="type" class="col-sm-2 control-label">Type</label>

                        <div class="col-sm-10">
                            {!! Form::select('type', ['Poster' => 'Poster', 'Still Frame' => 'Still Frame',
                            'Behind the Scenes' => 'Behind the Scenes'], null, ['class' => 'form-control', 'id' => 'photo-type',
                            'required' => true, 'multiple' => false]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tags" class="col-sm-2 control-label">Tags</label>

                        <div class="col-sm-10">
                            {!! Form::select('tags[]', $keywords, null, ['class' => 'form-control', 'id' => 'photo-tags',
                            'required' => true, 'multiple' => true]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tags" class="col-sm-2 control-label">Tag Movie</label>

                        <div class="col-sm-10">
                            {!! Form::select('movie_id', $movies, null, ['class' => 'form-control', 'id' => 'movie',
                            'required' => true]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tags" class="col-sm-2 control-label">Tag Actors</label>

                        <div class="col-sm-10">
                            {!! Form::select('actors[]', $actors, null, ['class' => 'form-control', 'id' => 'actors',
                            'required' => true, 'multiple' => true]) !!}
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right add-photos-button">Create</button>
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
    'Add a Photo'
@endsection
@section('page-header')
    @include('partials.layout.page-header', ['heading' => 'Photos', 'sub' => 'Add a Photo'])
@endsection