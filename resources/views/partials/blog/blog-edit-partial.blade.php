<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Fill the Form.</h3>
    </div>

    <div class="box-body">
        <div class="form-group">
            <label for="image" class="col-sm-2 control-label">Image</label>

            <div class="col-sm-10">
                {!! Form::file('image', ['class' => 'form-control', 'id' => 'post-image']) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Title</label>

            <div class="col-sm-10">
                {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'post-title',
                'required' => true]) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="status" class="col-sm-2 control-label">Post Status</label>

            <div class="col-sm-10">
                {!! Form::select('status', [0 => 'Draft', 1 => 'Published'], 0, ['class' => 'form-control', 'id' => 'post-status']) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="summary" class="col-sm-2 control-label">Summary</label>

            <div class="col-sm-10">
                {!! Form::textarea('summary', null, ['class' => 'form-control', 'id' => 'post-summary']) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="body" class="col-sm-2 control-label">Body</label>

            <div class="col-sm-10">
                {!! Form::textarea('body', null, ['class' => 'form-control', 'id' => 'post-body']) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="tags" class="col-sm-2 control-label">Tags</label>

            <div class="col-sm-10">
                {!! Form::select('tags[]', $tags, $tagsSelected, ['class' => 'form-control', 'id' => 'photo-tags',
                'required' => false, 'multiple' => true]) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="keywords" class="col-sm-2 control-label">Categories</label>

            <div class="col-sm-10">
                {!! Form::select('categories[]', $categories, $keywordsSelected, ['class' => 'form-control', 'id' => 'keywords',
                'required' => false, 'multiple' => true]) !!}
            </div>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" class="btn btn-success pull-right add-post-button">Update</button>
    </div>
    <!-- /.box-footer -->
</div>