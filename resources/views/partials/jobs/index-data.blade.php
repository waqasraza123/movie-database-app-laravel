<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">List of All Jobs</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @forelse($jobs as $c)
                        <tr>
                            <td>{{$c->id}}</td>
                            <td>{{$c->name}}</td>
                            <td>
                                <a href="{{ route('jobs.edit', ['id' => $c->id]) }}" class="btn btn-primary btn-xs" title="Edit Job"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                            </td>
                            <td>
                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => route('jobs.destroy', ['id' => $c->id]),
                                    'style' => 'display:inline',
                                    'class' => 'delete-jobs-form'
                                ]) !!}
                                {!! Form::button('<span class="glyphicon glyphicon-trash waves-effect" aria-hidden="true" title="Delete Job" />', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs confirm-delete',
                                        'title' => 'Delete Job',
                                )) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-danger">No Job.</div>
                    @endforelse
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
{{ $jobs->links() }}