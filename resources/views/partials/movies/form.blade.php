<!-- Horizontal Form -->
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Fill the Form.</h3>
    </div>

    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <div class="box-body">
        <div class="form-group">
            <label for="poster" class="col-sm-2 control-label">Poster</label>

            <div class="col-sm-10">
                <input type="file" name="poster" class="form-control" id="poster" @change="onFileChange">
                {{--display errors if field has errors using FormError component--}}
                <span class="text text-red poster" v-if="form.errors.get('poster')" v-text="form.errors.get('poster')"></span>
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
                'v-model' => 'form.title', 'placeholder' => 'movie title']) !!}
                {{--display errors if field has errors using FormError component--}}
                <span class="text text-red" v-text="form.errors.get('title')"></span>
            </div>
        </div>
        <div class="form-group">
            <label for="aka-title" class="col-sm-2 control-label">Aka Title</label>

            <div class="col-sm-10">
                <input type="text" name="aka_title" class="form-control" id="aka-title" placeholder="aka title">
            </div>
        </div>
        <div class="form-group">
            <label for="plot" class="col-sm-2 control-label">Plot</label>

            <div class="col-sm-10">
                <input type="text" name="plot" class="form-control" id="plot" placeholder="plot">
            </div>
        </div>
        <div class="form-group">
            <label for="synopsis" class="col-sm-2 control-label">Synopsis</label>

            <div class="col-sm-10">
                <textarea name="synopsis" class="form-control" id="synopsis" placeholder="synopsis"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="release-date" class="col-sm-2 control-label">Release Date</label>

            <div class="col-sm-10">
                <input type="text" name="release_date" class="form-control" id="release-date" placeholder="release date">
            </div>
        </div>
        <div class="form-group">
            <label for="language" class="col-sm-2 control-label">Language</label>

            <div class="col-sm-10">
                {!! Form::select('language[]', $languages, null, ['placeholder' => 'Select a Language',
                'id' => 'language', 'v-model' => 'form.language', 'change' => 'changeLanguage($event)', 'multiple' => true]) !!}
                {{--display errors if field has errors using FormError component--}}
                <span class="text text-red language" v-text="form.errors.get('language')"></span>
            </div>
        </div>
        <div class="form-group">
            <label for="genre" class="col-sm-2 control-label">Genre</label>

            <div class="col-sm-10">
                {!! Form::select('genre[]', $genres, null, [
                'id' => 'genre', 'multiple' => true, 'required' => false]) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="runtime" class="col-sm-2 control-label">Runtime</label>

            <div class="col-sm-10">
                <input type="number" name="runtime" class="form-control" id="runtime" placeholder="runtime in minutes">
            </div>
        </div>
        <div class="form-group">
            <label for="age_rating" class="col-sm-2 control-label">Age Rating</label>

            <div class="col-sm-10">
                <input type="text" name="age_rating" class="form-control" id="age_rating" placeholder="age rating">
            </div>
        </div>
        <div class="form-group">
            <label for="views" class="col-sm-2 control-label">Views</label>

            <div class="col-sm-10">
                <input type="number" name="views" class="form-control" id="views" placeholder="total views">
            </div>
        </div>
        <div class="form-group">
            <label for="homepage" class="col-sm-2 control-label">Homepage</label>

            <div class="col-sm-10">
                <input type="text" name="homepage" class="form-control" id="homepage" placeholder="homepage url http://example.com">
            </div>
        </div>
        <div class="form-group">
            <label for="featured" class="col-sm-2 control-label">Featured</label>

            <div class="col-sm-10">
                <input checked type="checkbox" name="featured" class="flat-green" id="featured" value="featured">
            </div>
        </div>
        <div class="form-group">
            <label for="stream_url" class="col-sm-2 control-label">Stream Url</label>

            <div class="col-sm-10">
                <input type="text" name="stream_url" class="form-control" id="stream-url" placeholder="stream url http://example.com">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Buy Url</label>

            <div class="col-sm-10">
                <input type="text" name="buy_url" class="form-control" id="buy-url" placeholder="buy url http://example.com">
            </div>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" {{--:disabled="form.errors.any()"--}} class="btn btn-success pull-right">Create</button>
    </div>
    <!-- /.box-footer -->
</div>
<!-- /.box -->
@section('footer')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="{{asset('/lte/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('/lte/plugins/iCheck/icheck.min.js')}}"></script>
@endsection