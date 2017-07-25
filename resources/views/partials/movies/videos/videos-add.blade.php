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
            <label for="type" class="col-sm-2 control-label">Type</label>

            <div class="col-sm-10">
                {!! Form::select('type', ['Trailer' => 'Trailer', 'Clip' => 'Clip', 'Behind the Scenes' => 'Behind the Scenes'], null, ['class' => 'form-control', 'id' => 'video-type',
                'required' => true]) !!}
            </div>
        </div>
        <input type="hidden" name="movie_id" value="{{$movie->id}}">
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
        <button type="submit" class="btn btn-success pull-right store-video-button">Create</button>
        <button style="margin-right: 10px;" type="button" class="btn btn-danger pull-right videos-done">Done</button>
    </div>
    <!-- /.box-footer -->
</div>
<!-- /.box -->
@section('footer'){{--
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet">--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="{{asset('/lte/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('/lte/plugins/iCheck/icheck.min.js')}}"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js"></script>
@endsection