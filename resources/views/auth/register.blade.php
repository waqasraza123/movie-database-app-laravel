@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register through:</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        
                        <div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<a href="{{ url('/register/auth/github') }}" class="btn btn-github"><i class="fa fa-github"></i> Github</a>
								<a href="{{ url('/register/auth/twitter') }}" class="btn btn-twitter"><i class="fa fa-twitter"></i> Twitter</a>
								<a href="{{ url('/register/auth/facebook') }}" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
							</div>
						</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
