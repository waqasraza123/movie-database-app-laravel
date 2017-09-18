@extends('layout.master')
@section('page-title', 'Videos')
@section('page-header')
    @include('partials.layout.page-header', ['heading' => 'Videos', 'sub' => 'View All Videos'])
@endsection
@section('content')
    <div class="col-sm-12">
        @include('partials.errors.error')
        @include('partials.errors.success')
        @if(count($videos) > 0)
            @foreach($videos->chunk(4) as $video)
                <div class="row">
                    @foreach($video as $p)
                        <div class="col-sm-3">
                            <a href="{{route('video.show', ['id' => $p->id])}}"><img src="{{url($p->thumb)}}" width="100%" class="photos-single"></a>
                            <br />
                            <br />
                            <a href="{{route('video.edit', ['id' => $p->id])}}" class="btn btn-xs btn-danger">Edit Video</a>
                            <a href="{{route('video.show', ['id' => $p->id])}}" class="btn btn-xs btn-primary">View Video</a>
                            {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => route('video.destroy', ['id' => $p->id]),
                                        'style' => 'display:inline',
                                        'class' => 'delete-video-form'
                                    ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash waves-effect" aria-hidden="true" title="Delete Video" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs confirm-delete',
                                    'title' => 'Delete Video',
                            )) !!}
                            {!! Form::close() !!}
                        </div>
                    @endforeach
                </div>
            @endforeach
        @endif
    </div>
@endsection