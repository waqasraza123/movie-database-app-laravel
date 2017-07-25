<div class="modal fade" id="photos-modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Photos</h4>
            </div>
            <div class="modal-body" id="dropzone-photos">
                {!! Form::open(['class' => 'dropzone',
        'id' => 'add-photos-form', 'url' => route('movies.photos.add')]) !!}
                    <div class="fallback">
                        <input type="file" name="file" multiple/>
                    </div>
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" id="photos-done">Done</button>
            </div>
        </div>

    </div>
</div>