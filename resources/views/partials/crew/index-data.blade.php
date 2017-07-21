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
                        <th></th>
                        <th></th>
                    </tr>
                    @forelse($crew as $c)
                        @foreach($c->crewMovies as $m)
                            <tr>
                                <td>{{++$loop->index}}</td>
                                <td>{{$c->name}}</td>
                                <td>{{$m->title}}</td>
                                <td>
                                    <a href="{{ route('crew.edit', ['id' => \Illuminate\Support\Facades\DB::table('crew_movies')->where(['movie_id' => $m->id,
                                'person_id' => $c->id])->first()->id]) }}" class="btn btn-primary btn-xs" title="Edit Crew"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                </td>
                                <td>
                                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => route('crew.destroy', ['id' => \Illuminate\Support\Facades\DB::table('crew_movies')->where(['movie_id' => $m->id,
                                'person_id' => $c->id])->first()->id]),
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
                        @endforeach
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