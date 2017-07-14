<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">List of All Movies</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Release Date</th>
                        <th>Views</th>
                        <th>Rating</th>
                    </tr>
                    @forelse($movies as $movie)
                        <tr>
                            <td>{{$movie->id}}</td>
                            <td>{{$movie->title}}</td>
                            <td>{{$movie->release_date}}</td>
                            <td>{{$movie->views}}</td>
                            <td>{{$movie->rating}}</td>
                        </tr>
                    @empty
                        <div class="alert alert-danger">No Movies</div>
                    @endforelse
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
{{ $movies->links() }}