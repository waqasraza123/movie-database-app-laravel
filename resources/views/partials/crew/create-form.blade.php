<!-- Horizontal Form -->
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Fill the Form.</h3>
    </div>

    <div class="box-body">

        <div class="form-group">
            <label for="movie_id" class="col-sm-2 control-label">Person</label>

            <div class="col-sm-10">
                {!! Form::select('person_id', $persons, null, ['class' => 'form-control', 'id' => 'person-id',
                'required' => true]) !!}
            </div>
        </div>
        <input type="hidden" name="movie_id" value="{{$movie->id}}">
        <div class="form-group">
            <label for="character_name" class="col-sm-2 control-label">Job</label>

            <div class="col-sm-10">
                {!! Form::select('job_id[]', $jobs, null, ['class' => 'form-control', 'id' => 'job-id',
                'required' => true, 'multiple' => true]) !!}
            </div>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" class="btn btn-success pull-right">Create</button>
        <button style="margin-right: 10px;" type="button" class="btn btn-danger pull-right crew-done">Done</button>
    </div>
    <!-- /.box-footer -->
</div>
<!-- /.box -->
@section('footer'){{--
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet">--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="{{asset('/lte/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('/lte/plugins/iCheck/icheck.min.js')}}"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js"></script>
@endsection