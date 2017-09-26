@extends('layout.master')
@section('page-title', 'Posts')
@section('page-header')
    @include('partials.layout.page-header', ['heading' => 'Blog Posts', 'sub' => 'View All Posts'])
@endsection
@section('content')
    <div class="col-sm-12">
        @include('partials.errors.error')
        @include('partials.errors.success')
        @if(count($posts) > 0)
            <div class="row">
                <div class="col-sm-12 col-md-8 col-md-offset-2">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">All Posts</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Views</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $p)
                                    <tr>
                                        <td>{{$p->id}}</td>
                                        <td>{{$p->title}}</td>
                                        <td>{{$p->is_draft}}</td>
                                        <td>{{$p->views}}</td>
                                        <td>
                                            <a href="{{route('posts.edit', ['id' => $p->id])}}" class="btn btn-xs btn-danger"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        </td>
                                        <td>
                                            {!! Form::open([
                                                    'method'=>'DELETE',
                                                    'url' => route('posts.destroy', ['id' => $p->id]),
                                                    'style' => 'display:inline',
                                                    'class' => 'delete-post-form'
                                                ]) !!}
                                            {!! Form::button('<span class="glyphicon glyphicon-trash waves-effect" aria-hidden="true" title="Delete Post" />', array(
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-xs confirm-delete',
                                                    'title' => 'Delete Post',
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
                    {{$posts->links()}}
                </div>
            </div>
        @endif
    </div>
@endsection