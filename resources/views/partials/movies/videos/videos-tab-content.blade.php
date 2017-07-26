@forelse($videos as $video)
    <b>{{$video->title}}</b>
    <p>{{$video->video_url or $video->video_embed}}</p>
@empty
    <div class="alert alert-danger">
        No Videos.
    </div>
@endforelse