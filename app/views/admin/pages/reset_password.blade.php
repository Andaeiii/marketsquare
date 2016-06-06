	@extends('admin.layouts.adminform')
	
	@section('forms')
		<!-- BEGIN LOGIN FORM -->
		
		<div class="content"><!-- BEGIN FORGOT PASSWORD FORM -->

		{{ Form::open(array('url'=>'client/set_password_value', 'class'=>'form-vertical login-form','method'=>'post')) }}
		
			<h3 >{{$page_title}}..</h3>

			@if(!empty($msgg))
				<p>{{$msgg}}</p>
			@else
				<p>Enter New Password for your Account.</p>
			@endif


			<div class="control-group">
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-ok"></i>
						<input class="m-wrap placeholder-no-fix {{ ($errors->first('vcode')) ? 'has-error' :''}}" type="password" placeholder="......enter new password" autocomplete="off" name="npval" />
					</div>
				</div>
			</div>

			<input name="xc" type="hidden" value="{{$xcode}}">

			<div class="control-group">
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-ok"></i>
						<input class="m-wrap placeholder-no-fix {{ ($errors->first('vcode')) ? 'has-error' :''}}" type="password" placeholder=".....repeat new password" autocomplete="off" name="cpval" />
					</div>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" class="btn blue pull-left" value="submit"/>            
			</div>
		
		{{Form::close()}}

		<!-- END FORGOT PASSWORD FORM -->

	@stop