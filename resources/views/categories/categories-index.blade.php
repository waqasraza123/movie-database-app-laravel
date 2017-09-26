@extends('layout.master')
@section('page-title', 'categories')
@section('page-header')
    @include('partials.layout.page-header', ['heading' => 'Blog categories', 'sub' => 'View All categories'])
@endsection
@section('content')
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                @include('partials.errors.error')
                @include('partials.errors.success')

                {!! Form::open(['class' => 'form-horizontal', 'files' => true,
                'id' => 'create-categories-form', 'url' => isset($edit) ? route('categories.update', ['id' => $cat->id]) : route('categories.store'), 'method' => isset($edit) ? 'PUT' : 'POST']) !!}

                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Fill the Form.</h3>
                        </div>

                        <div class="box-body">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>

                                <div class="col-sm-10">
                                    {!! Form::text('name', isset($cat) ? $cat->name : null, ['class' => 'form-control', 'id' => 'category-name',
                                    'required' => true]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">Description</label>

                                <div class="col-sm-10">
                                    {!! Form::text('description', isset($cat) ? $cat->description : null, ['class' => 'form-control', 'id' => 'category-description',
                                    'required' => false]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success pull-right add-category-button">{{isset($edit) ? 'Update' : 'Create'}}</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
        <br>
        @if(count($categories) > 0)
            <h3 class="text-center">All Categories</h3>
            <div class="row">
                <div class="col-sm-12 col-md-8 col-md-offset-2">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">All categories</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Description</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $p)
                                    <tr>
                                        <td>{{$p->id}}</td>
                                        <td>{{$p->name}}</td>
                                        <td>{{$p->slug}}</td>
                                        <td>{{$p->description}}</td>
                                        <td>
                                            <a href="{{route('categories.edit', ['id' => $p->id])}}" class="btn btn-xs btn-danger"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        </td>
                                        <td>
                                            {!! Form::open([
                                                    'method'=>'DELETE',
                                                    'url' => route('categories.destroy', ['id' => $p->id]),
                                                    'style' => 'display:inline',
                                                    'class' => 'delete-category-form'
                                                ]) !!}
                                            {!! Form::button('<span class="glyphicon glyphicon-trash waves-effect" aria-hidden="true" title="Delete Category" />', array(
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-xs confirm-delete',
                                                    'title' => 'Delete Category',
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