@forelse($cast->chunk(4) as $cast)
    <div class="row">
        @foreach($cast as $c)
            <div class="col-sm-4">
                <div class="img-background">
                    <div class="white-background">
                        <img src="{{$c->photo_path}}" width="150px" height="150px">
                    </div>
                </div>
                <div class="content cast">
                    <p class="orgi-name"><b>{{$c->name}}</b></p>
                    <p class="character-name"> as {{$c->pivot->character_name}}</p>
                </div>
                <br>
            </div>
        @endforeach
    </div>
@empty
    <div class="alert-danger alert">No Cast.</div>
@endforelse