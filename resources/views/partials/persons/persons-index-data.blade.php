<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">List of All Persons</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Birth Date</th>
                        <th>Views</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @forelse($persons as $person)
                        <tr>
                            <td>{{$person->id}}</td>
                            <td>{{$person->name}}</td>
                            <td>{{$person->gender}}</td>
                            <td>{{$person->birth_date}}</td>
                            <td>{{$person->views}}</td>
                            <td>
                                <a href="{{ route('person.edit', ['id' => $person->id]) }}" class="btn btn-primary btn-xs" title="Edit Person"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                            </td>
                            <td>
                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => route('person.destroy', ['id' => $person->id]),
                                    'style' => 'display:inline',
                                    'class' => 'delete-person-form'
                                ]) !!}
                                {!! Form::button('<span class="glyphicon glyphicon-trash waves-effect" aria-hidden="true" title="Delete Person" />', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs confirm-delete',
                                        'title' => 'Delete Person',
                                )) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-danger">No Persons added Yet!</div>
                    @endforelse
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
{{ $persons->links() }}