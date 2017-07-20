<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">List of All Crew</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Person</th>
                        <th>Movie</th>
                        <th>Job</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @forelse($crew as $c)
                        <tr>
                            <td>{{$c->id}}</td>
                            <td>{{$c->person->name}}</td>
                            <td>{{$c->movie->title}}</td>
                            <td>{{$c->job_id}}</td>
                            <td>
                                <a href="{{ route('crew.edit', ['id' => $c->id]) }}" class="btn btn-primary btn-xs" title="Edit Crew"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                            </td>
                            <td>
                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => route('crew.destroy', ['id' => $c->id]),
                                    'style' => 'display:inline',
                                    'class' => 'delete-crew-form'
                                ]) !!}
                                {!! Form::button('<span class="glyphicon glyphicon-trash waves-effect" aria-hidden="true" title="Delete Crew" />', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs confirm-delete',
                                        'title' => 'Delete Crew',
                                )) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-danger">No Crew.</div>
                    @endforelse
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
{{ $crew->links() }}