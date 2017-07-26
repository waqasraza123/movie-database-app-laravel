@forelse($photos->chunk(4) as $photo)
    <div class="row">
        @foreach($photo as $p)
            <div class="col-sm-4">
                <div class="img-background">
                    <div class="white-background">
                        <img src="{{$p->photo_path}}" width="150px" height="150px">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@empty
    <div class="alert-danger alert">No Photos.</div>
@endforelse