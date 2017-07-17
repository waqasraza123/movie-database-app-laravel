{!! Form::open(['class' => 'form-horizontal', 'files' => true,
            'id' => 'create-person-form', 'url' => route('person.store'), 'method' => 'post']) !!}
<!-- Horizontal Form -->
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Fill the Form.</h3>
    </div>

    <div class="box-body">
        <div class="form-group">
            <label for="photo" class="col-sm-2 control-label">Photo</label>

            <div class="col-sm-10">
                <input type="file" name="photo" class="form-control" id="photo" required>
            </div>
        </div>

        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name</label>

            <div class="col-sm-10">
                {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name',
                'placeholder' => 'name', 'required' => true]) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="nickname" class="col-sm-2 control-label">Nick Name</label>

            <div class="col-sm-10">
                {!! Form::text('nickname', null, ['class' => 'form-control', 'id' => 'nickname', 'placeholder' => 'nickname']) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="birth-place" class="col-sm-2 control-label">Birth Place</label>

            <div class="col-sm-10">
                {!! Form::text('birth_place', null, ['class' => 'form-control', 'id' => 'birth-place',
                'placeholder' => 'birth place']) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="gender" class="col-sm-2 control-label">Gender</label>

            <div class="col-sm-10">
                {!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other'], null,
                ['class' => 'form-control', 'id' => 'gender']) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="birth-date" class="col-sm-2 control-label">Birth Date</label>

            <div class="col-sm-10">
                {!! Form::text('birth_date', null, ['class' => 'form-control', 'id' => 'birth-date']) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="biography" class="col-sm-2 control-label">Biography</label>

            <div class="col-sm-10">
                {!! Form::textarea('biography', null, ['class' => 'form-control', 'id' => 'biography']) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="official_site" class="col-sm-2 control-label">Official Site</label>

            <div class="col-sm-10">
                {!! Form::text('official_site', null, ['class' => 'form-control', 'id' => 'official-site', 'placeholder' => 'official site url']) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="facebook" class="col-sm-2 control-label">Facebook</label>

            <div class="col-sm-10">
                {!! Form::text('facebook', null, ['class' => 'form-control', 'id' => 'facebook', 'placeholder' => 'facebook url']) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="twitter" class="col-sm-2 control-label">Twitter</label>

            <div class="col-sm-10">
                {!! Form::text('twitter', null, ['class' => 'form-control', 'id' => 'twitter', 'placeholder' => 'twitter url']) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="instagram" class="col-sm-2 control-label">Instagram</label>

            <div class="col-sm-10">
                {!! Form::text('instagram', null, ['class' => 'form-control', 'id' => 'instagram', 'placeholder' => 'instagram url']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="views" class="col-sm-2 control-label">Views</label>

            <div class="col-sm-10">
                {!! Form::number('views', null, ['class' => 'form-control', 'id' => 'views']) !!}
            </div>
        </div>

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" {{--:disabled="form.errors.any()"--}} class="btn btn-success pull-right">Create</button>
    </div>
    <!-- /.box-footer -->
</div>
{!! Form::close() !!}
<!-- /.box -->
@section('footer'){{--
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet">--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="{{asset('/lte/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('/lte/plugins/iCheck/icheck.min.js')}}"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js"></script>
@endsection