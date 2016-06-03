	@extends('admin.layouts.adminform')
	
	@section('forms')
		<!-- BEGIN LOGIN FORM -->
		
		<div class="content login-form">

			{{ Form::open(array('url'=>'client/login', 'class'=>'form-vertical login-form','method'=>'post')) }}

				<h3 class="form-title">{{ $page_title }}</h3>
				<div class="alert alert-error hide">
					<button class="close" data-dismiss="alert"></button>
					<span>Enter any username and password.</span>
				</div>
				<div class="control-group">
					<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
					<label class="control-label visible-ie8 visible-ie9">Username</label>
					<div class="controls">
						<div class="input-icon left">
							<i class="icon-user"></i>
							<input class="m-wrap placeholder-no-fix {{ (!empty('$lgerr')) ? 'has-error'  :''}}" type="text" autocomplete="off" placeholder="Username" name="username"/>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label visible-ie8 visible-ie9">Password</label>
					<div class="controls">
						<div class="input-icon left">
							<i class="icon-lock"></i>
							<input class="m-wrap placeholder-no-fix {{ (!empty('$lgerr')) ? 'has-error'  :''}}" type="password" autocomplete="off" placeholder="Password" name="password"/>
						</div>
					</div>
				</div>
				<div class="form-actions">
					<label class="checkbox">
					<input type="checkbox" name="remember" value="1"/> Remember me
					</label>
					<button type="submit" class="btn blue pull-right">
					Login <i class="m-icon-swapright m-icon-white"></i>
					</button>            
				</div>
				<div class="forget-password">
					<h4>Forgot your password ?</h4>
					<p>
						click <a href="{{URL::route('forgot_password')}}"  id="forget-password">here</a> to reset your password.
					</p>
				</div>
				<div class="create-account">
					<p>
						Don't have an account yet? &nbsp; {{ link_to_route('register_client', 'Create an account',[], ['id'=>'register-btn'])}}
					</p>
				</div>
			{{ Form::close() }}
			
		</div>
	
	@stop

		<!-- END LOGIN FORM -->     

