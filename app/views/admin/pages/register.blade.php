@extends('admin.layouts.adminform')

@section('forms')

	<!-- BEGIN Registration FORM -->

		

		<div class="content reg-form">
		
		<h3 class="form-title">{{ $page_title }}</h3>

		{{ Form::open(array('url'=>'client/register', 'class'=>'form-vertical login-form','method'=>'post')) }}


			<div class="row">

					<div class="span4">

							<p>Enter coporate details below:</p>

							<div class="control-group">
								<label class="control-label visible-ie8 visible-ie9">Full Name</label>
								<div class="controls">
									<div class="input-icon left">
										<i class="icon-font"></i>
										<input class="m-wrap placeholder-no-fix {{ ($errors->first('fullname')) ? 'has-error'  :''}}" type="text" placeholder="...Enter Client fullname" name="fullname"/>
									</div>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label visible-ie8 visible-ie9">Phone Number</label>
								<div class="controls">
									<div class="input-icon left">
										<i class="icon-phone"></i>
										<input class="m-wrap placeholder-no-fix {{ ($errors->first('phone')) ? 'has-error'  :''}}" type="text" placeholder="...Contact Phone number" name="phone"/>
									</div>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label visible-ie8 visible-ie9">Sector/Industry</label>
								<div class="controls">
									
									<select name="catg_optn">
										<option value="">..select Industry/Sector</option>

										@foreach($categorys as $c)
											<option value="{{$c->id}}">{{$c->name}}</option>
										@endforeach

									</select>

								</div>
							</div>

							<div class="control-group">
								<label class="control-label visible-ie8 visible-ie9">Address</label>
								<div class="controls">
									<div class="input-icon left">
										<i class="icon-ok"></i>
										<input class="m-wrap placeholder-no-fix {{ ($errors->first('address')) ? 'has-error'  :''}}" type="text" placeholder="...Enter Office Address" name="address"/>
									</div>
								</div>
							</div>

							<div class="control-group">
								<div class="row-fluid">
									<label class="control-label visible-ie8 visible-ie9">Residence State</label>
									<div class="controls">
										<select name="state_optn" class="span8 select2" onChange="getLGAs(this);">
											<option value="">...select resident state</option>

											@foreach($states as $state)
												<option value="{{$state->id}}">{{$state->name}}</option>
											@endforeach

										</select>
									</div>
								</div>
							</div>

						<div class="control-group" id="lgxfield">
								
						</div>


					</div>


					<div class="span4">

						<p>Enter your account details below:</p>

						<div class="control-group">
							<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
							<label class="control-label visible-ie8 visible-ie9">Email</label>
							<div class="controls">
								<div class="input-icon left">
									<i class="icon-envelope"></i>
									<input class="m-wrap placeholder-no-fix {{ ($errors->first('email')) ? 'has-error'  :''}}" type="text" placeholder="...Valid Email Address" name="email"/>
								</div>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label visible-ie8 visible-ie9">Enter Username :: Minimum of 6 Chars)</label>
							<div class="controls">
								<div class="input-icon left">
									<i class="icon-user"></i>
									<input class="m-wrap placeholder-no-fix {{ ($errors->first('fullname')) ? 'has-error'  :''}}" type="text" autocomplete="off" placeholder="Username" name="username"/>
								</div>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label visible-ie8 visible-ie9">Password :: Minimum of 8 Chars</label>
							<div class="controls">
								<div class="input-icon left">
									<i class="icon-lock"></i>
									<input class="m-wrap placeholder-no-fix {{ ($errors->first('password')) ? 'has-error'  :''}}" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password"/>
								</div>
							</div>
						</div>


						<div class="control-group">
							<label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
							<div class="controls">
								<div class="input-icon left">
									<i class="icon-ok"></i>
									<input class="m-wrap placeholder-no-fix {{ ($errors->first('confirm_password')) ? 'has-error'  :''}}" type="password" autocomplete="off" placeholder="Re-type Your Password" name="confirm_password"/>
								</div>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label visible-ie8 visible-ie9">How did you hear about us</label>
							<div class="controls">
								<div class="input-icon left">
									
									<textarea class="m-wrap placeholder-no-fix {{ ($errors->first('hearaboutus')) ? 'has-error'  :''}}" name="hearaboutus" placeholder="how did you hear about us"/></textarea>
								</div>
							</div>
						</div>

						<div class="control-group">
							<div class="controls">
								I agree to the <a href="#">Terms of Service</a> <input type="checkbox" name="tnc"/> 
							</div>
						</div>

					</div>

				

			</div>

				<div class="create-account row objx">
					<div class="span3">
						Already has an account? {{ link_to_route('login_client', 'Login',[], ['id'=>'register-btn'])}} <br/>
					</div>

					<div class="span4">							
						<input type="submit" id="register-submit-btn" class="btn green pull-right" value="Sign Up"/>
					</div>
				</div>

		{{ Form::close() }}


		</div>

		<style type="text/css">
			.objx > div{margin-bottom:10px;}
		</style>

		<!-- END REGISTRATION FORM -->

@stop