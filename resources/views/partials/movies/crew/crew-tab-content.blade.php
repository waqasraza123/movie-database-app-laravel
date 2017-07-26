@forelse($crew->chunk(4) as $cre)
    <div class="row">
        @foreach($cre as $c)
            <div class="col-sm-4">
                <div class="img-background">
                    <div class="white-background">
                        <img src="{{$c->photo_path}}" width="150px" height="150px">
                    </div>
                </div>
                <div class="content cast">
                    <p class="orgi-name"><b>{{$c->name}}</b></p>
                </div>
                <br>
            </div>
        @endforeach
    </div>
@empty
    <div class="alert-danger alert">No Crew.</div>
@endforelse