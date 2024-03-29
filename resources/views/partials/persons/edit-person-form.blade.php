{!! Form::model($person, ['class' => 'form-horizontal', 'files' => true,
            'id' => 'create-person-form', 'url' => route('person.update', ['person' => $person->id]), 'method' => 'patch']) !!}
<!-- Horizontal Form -->

<div class="box box-success">
    <div class="row" style="overflow:hidden;">
    	
    		<div class="col-md-6   btn-success active" id="id-btn-details" style="height:100%;width:45%; border:none;padding:0;position:relative;cursor:hand;cursor:pointer;margin-left:3%;">
    			<center>
    			<h3 class="box-title active">Details</h3>
    			</center>
    		</div>
    		<div class="col-md-6  btn-success"  id="id-btn-filmography" style="height:100%;width:49%; ;border:none;padding:0;position:relative;cursor:hand;cursor:pointer;">
    			
    			<center>
    			<h3 class="box-title">Filmography</h3>
    			</center>
    			
    		</div>
        
        
    </div>
    <div class="box-body details">
        <div class="form-group">
            <label for="photo" class="col-sm-2 control-label">Photo</label>

            <div class="col-sm-10">
                <input type="file" name="photo" class="form-control" id="photo">
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

    </div>
    <!-- /.box-body -->
    <div class="box-body filmography" style="display:none;">
        <div class="tab-pane" id="filmo">
            	<table class="table table-striped table-centered">
			    	<thead>
			        	<tr>
			          		<th>#</th>
			          		<th>Title</th>
			          		<th>Known For</th>
			          		<th>Year</th>
			          		
			        	</tr>
			      	</thead>
    			    <tbody data-bind="foreach: vars.filmo">
    			        @for($i = 1;$i<=1;$i++)
        			        @foreach($filmography as $film)
        			      		
        			        <tr>
        			        	<td class="col-sm-1">{{$i}}</td>
        			        	<input type="hidden" name="movie_id[{{$i}}]" class="form-control" value={{$film->movie_id}} />
        			        	<!--<input type="hidden" name="person_id" class="form-control" value={{$film->person_id}}/>-->
        			          	<td class="col-sm-4" data-bind="text: title">{{$film->title}}</td>
        			          	<td class="col-sm-3">
        			          	<!--<form method="POST" action="#" accept-charset="UTF-8">-->
        			          	<select class="form-control" name="known_for[{{$i}}]" onchange="app.viewModels.actorsCreate.knownFor(this.parentNode)">
        			          			@if($film->known_for == "0")
		    				          		<option value="0" selected="selected">No</option>
		    				          		<option value="1" >Yes</option>
		    				          	@else
		    				          		<option value="0" >No</option>
		    				          		<option value="1" selected="selected">Yes</option>
		    				          	@endif
        			          			<!-- ko if: pivot.known_for --><!-- /ko -->
        			          			<!-- ko ifnot: pivot.known_for -->
        			          			
        			          			<!-- /ko -->
        				          	</select>
        			          	<!--</form>-->			          	</td>
        			          	<td class="col-sm-2" data-bind="text: year">{{isset($film->year) ? $film->year : NULL}}</td>
        			        </tr>
        			        	@if($i++)
        			        	@endif
        			        @endforeach
    			        @endfor		        
			      
			        
			      </tbody>
			    </table>
            </div>
        

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" class="btn btn-success pull-right">Update</button>
    </div>
    <!-- /.box-footer -->
</div>
{!! Form::close() !!}
<!-- /.box -->
@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="{{asset('/lte/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('/lte/plugins/iCheck/icheck.min.js')}}"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js"></script>
    <!--<link rel="stylesheet" href="{{asset('/css/tab-style.css')}}">-->
    <script type="text/javascript">
    	$(document).ready(function(){
        
    		$('#id-btn-details').click(function(){
    			$('#id-btn-filmography').removeClass("active");
    			$(this).addClass("active");
    			$('.details').show();
    			$('.filmography').hide();
    			
    		});
    		$('#id-btn-filmography').click(function(){
    			$('#id-btn-details').removeClass("active");
    			
    			$(this).addClass("active");
    			$('.details').hide();
    			$('.filmography').show();
    		});
    	});
    </script>
@endsection
