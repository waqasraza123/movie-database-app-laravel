@extends('layout.master')
@section('page-title', 'Photos')
@section('page-header')
@include('partials.layout.page-header', ['heading' => 'Photos', 'sub' => 'View All Photos'])
@endsection
@section('content')
<div class="col-sm-12">
    @include('partials.errors.error')
    @include('partials.errors.success')
    @if(count($photos) > 0)
        @foreach($photos->chunk(4) as $photo)
            <div class="row">
                @foreach($photo as $p)
                    <div class="col-sm-3">
                        <a href="{{route('photos.show', ['id' => $p->id])}}"><img src="{{$p->photo}}" width="100%" class="photos-single"></a>
                    </div>
                @endforeach
            </div>
        @endforeach
    @endif
</div>
@endsection