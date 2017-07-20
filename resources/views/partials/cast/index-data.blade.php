<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">List of All Cast</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Movie</th>
                        <th>Character Name</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @forelse($cast as $c)
                        <tr>
                            <td>{{$c->id}}</td>
                            <td>{{$c->person->name}}</td>
                            <td>{{$c->movie->title}}</td>
                            <td>
                                <a href="{{ route('cast.edit', ['id' => $c->id]) }}" class="btn btn-primary btn-xs" title="Edit Cast"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                            </td>
                            <td>
                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => route('cast.destroy', ['id' => $c->id]),
                                    'style' => 'display:inline',
                                    'class' => 'delete-cast-form'
                                ]) !!}
                                {!! Form::button('<span class="glyphicon glyphicon-trash waves-effect" aria-hidden="true" title="Delete Cast" />', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs confirm-delete',
                                        'title' => 'Delete Cast',
                                )) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-danger">No Cast.</div>
                    @endforelse
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
{{ $cast->links() }}