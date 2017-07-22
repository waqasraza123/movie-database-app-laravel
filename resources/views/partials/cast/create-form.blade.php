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
            <label for="character_name" class="col-sm-2 control-label">Character Name</label>

            <div class="col-sm-10">
                {!! Form::text('character_name', null, ['class' => 'form-control', 'id' => 'character-name',
                'required' => true]) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="billing_position" class="col-sm-2 control-label">Billing Position</label>

            <div class="col-sm-10">
                {!! Form::number('billing_position', null, ['class' => 'form-control', 'id' => 'billing-position',
                'required' => true]) !!}
            </div>
        </div>

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" class="btn btn-success pull-right">Create</button>
        <button style="margin-right: 10px;" type="button" class="btn btn-danger pull-right cast-done">Done</button>
    </div>
    <!-- /.box-footer -->
</div>