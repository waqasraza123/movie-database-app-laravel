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
                    <img src="" id="image-src">
                    <div class="form-group">
                        <label for="movie_id" class="col-sm-2 control-label">Photo</label>

                        <div class="col-sm-10">
                            {!! Form::file('photo', ['class' => 'form-control', 'id' => 'photo',
                            'required' => true, 'onchange' => 'showImage()']) !!}
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
                    <button type="submit" class="btn btn-success pull-right">Create</button>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
            {!! Form::close() !!}
        </div>
    </div>

@endsection
@section('footer')
<script>
    //show image if selected
    function showImage() {
        var src = document.getElementById("photo");
        var target = document.getElementById("image-target");
        var fr=new FileReader();
        // when image is loaded, set the src of the image where you want to display it
        fr.onload = function(e) { target.src = this.result; };
        src.addEventListener("change",function() {
            // fill fr with image data
            fr.readAsDataURL(src.files[0]);
        });
    }
</script>
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