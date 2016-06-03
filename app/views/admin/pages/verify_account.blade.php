	@extends('admin.layouts.adminform')
	
	@section('forms')
		<!-- BEGIN LOGIN FORM -->
		
		<div class="content"><!-- BEGIN FORGOT PASSWORD FORM -->

		{{ Form::open(array('url'=>'client/verifyaccount', 'class'=>'form-vertical login-form','method'=>'post')) }}
		
			<h3 >{{$page_title}}..</h3>

			@if(!empty($msgg))
				<p>{{$msgg}}</p>
			@else
				<p>Enter the verification Code sent to your Email.</p>
			@endif

			@if($errors->any())
				{{--pr($errors)--}}
			@endif

			<div class="control-group">
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-ok"></i>
						<input class="m-wrap placeholder-no-fix {{ ($errors->first('vcode')) ? 'has-error' :''}}" type="text" placeholder="BXX-XXXX-XXXXXXXXXX" autocomplete="off" name="vcode" />
					</div>
				</div>
			</div>
			<div class="form-actions">
				<input type="submit" class="btn blue pull-left" value="submit"/>            
			</div>
		
		{{Form::close()}}

		<!-- END FORGOT PASSWORD FORM -->

	@stop