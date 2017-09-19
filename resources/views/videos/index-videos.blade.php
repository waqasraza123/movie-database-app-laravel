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
            <div class="row">
                <div class="col-sm-12 col-md-8 col-md-offset-2">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Striped Full Width Table</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Type</th>
                                    <th>Video Title</th>
                                    <th style="width: 40px">Movie Title</th>
                                    <th>Quality</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($videos as $p)
                                        <tr>
                                            <td>{{$p->id}}</td>
                                            <td>{{$p->type}}</td>
                                            <td>{{$p->title}}</td>
                                            <td>{{$p->movie()->first()->title}}</td>
                                            <td>{{$p->quality}}</td>
                                            <td>
                                                <a href="{{route('video.edit', ['id' => $p->id])}}" class="btn btn-xs btn-danger"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            </td>
                                            <td>
                                                <a href="{{route('video.show', ['id' => $p->id])}}" class="btn btn-xs btn-primary"> <i class="fa fa-eye" aria-hidden="true"></i></a>
                                            </td>
                                            <td>
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
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection