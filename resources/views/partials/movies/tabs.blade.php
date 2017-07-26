<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
        <li><a href="#cast" data-toggle="tab">Cast</a></li>
        <li><a href="#crew" data-toggle="tab">Crew</a></li>
        <li><a href="#photos" data-toggle="tab">Photos</a></li>
        <li><a href="#videos" data-toggle="tab">Videos</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="details">
            {!! Form::model($movie, ['class' => 'form-horizontal',
            'id' => 'update-movie-form', 'files' => true,
            'method' => 'PATCH', 'url' => route('movies.update', ['id' => $movie->id])]) !!}
                @include('partials.movies.edit-form', ['movie' => $movie])
            {!! Form::close() !!}
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="cast">
            @include('partials.movies.cast.cast-tab-content')
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="crew">
            @include('partials.movies.crew.crew-tab-content')
        </div>
        <!-- /.tab-pane -->
        <!-- /.tab-pane -->
        <div class="tab-pane" id="photos">
            @include('partials.movies.photos.show')
        </div>
        <!-- /.tab-pane -->
        <!-- /.tab-pane -->
        <div class="tab-pane" id="videos">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            It has survived not only five centuries, but also the leap into electronic typesetting,
            remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
            sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
            like Aldus PageMaker including versions of Lorem Ipsum.
        </div>
        <!-- /.tab-pane -->
    </div>
</div>