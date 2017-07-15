<!-- Horizontal Form -->
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Fill the Form.</h3>
    </div>

    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" value="{{$movie->id}}" id="movie-id">

    <div class="box-body">
        <img src="{{$movie->poster_path}}" width="100%" height="auto" style="margin-bottom: 30px"/>
        <div class="form-group">
            <label for="poster" class="col-sm-2 control-label">Poster</label>

            <div class="col-sm-10">
                <input type="file" name="poster" class="form-control" id="poster">
            </div>
        </div>
        <div class="form-group">
            <label for="background" class="col-sm-2 control-label">Background</label>

            <div class="col-sm-10">
                <input type="file" name="background" class="form-control" id="background">
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Title</label>

            <div class="col-sm-10">
                {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title',
                'required' => true]) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="aka-title" class="col-sm-2 control-label">Aka Title</label>

            <div class="col-sm-10">
                {!! Form::text('aka_title', null, ['class' => 'form-control', 'id' => 'aka-title']) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="plot" class="col-sm-2 control-label">Plot</label>

            <div class="col-sm-10">
                {!! Form::text('plot', null, ['class' => 'form-control', 'id' => 'plot']) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="synopsis" class="col-sm-2 control-label">Synopsis</label>

            <div class="col-sm-10">
                {!! Form::textarea('synopsis', null, ['class' => 'form-control', 'id' => 'synopsis']) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="release-date" class="col-sm-2 control-label">Release Date</label>

            <div class="col-sm-10">
                {!! Form::text('release_date', null, ['class' => 'form-control', 'id' => 'release-date']) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="language" class="col-sm-2 control-label">Language</label>

            <div class="col-sm-10">
                {!! Form::select('language[]', $languages, $langSelect, [
                'id' => 'language', 'multiple' => true, 'required' => true]) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="genre" class="col-sm-2 control-label">Genre</label>

            <div class="col-sm-10">
                {!! Form::select('genre[]', $genres, $genreSelect, [
                'id' => 'genre', 'multiple' => true, 'required' => false]) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="runtime" class="col-sm-2 control-label">Runtime</label>

            <div class="col-sm-10">
                {!! Form::number('runtime', null, ['class' => 'form-control', 'id' => 'runtime']) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="age_rating" class="col-sm-2 control-label">Age Rating</label>

            <div class="col-sm-10">
                {!! Form::number('age_rating', null, ['class' => 'form-control', 'id' => 'age-rating']) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="views" class="col-sm-2 control-label">Views</label>

            <div class="col-sm-10">
                {!! Form::number('views', null, ['class' => 'form-control', 'id' => 'views']) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="homepage" class="col-sm-2 control-label">Homepage</label>

            <div class="col-sm-10">
                {!! Form::text('homepage', null, ['class' => 'form-control', 'id' => 'homepage']) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="featured" class="col-sm-2 control-label">Featured</label>

            <div class="col-sm-10">
                {!! Form::checkbox('featured', 'featured', $movie->featured == 1 ? true: false, ['class' => 'flat-green', 'id' => 'featured']) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="stream_url" class="col-sm-2 control-label">Stream Url</label>

            <div class="col-sm-10">
                {!! Form::text('stream_url', null, ['class' => 'form-control', 'id' => 'stream-url']) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Buy Url</label>

            <div class="col-sm-10">
                {!! Form::text('buy_url', null, ['class' => 'form-control', 'id' => 'buy-url']) !!}
            </div>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" {{--:disabled="form.errors.any()"--}} class="btn btn-success pull-right">Update</button>
    </div>
    <!-- /.box-footer -->
</div>
<!-- /.box -->