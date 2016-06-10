@extends('admin.layouts.maintemp')



@section('pgtitle')

 <section class="content-header">

  <h1 style="capitalize">
    Edit Profile :: <b>{{Auth::user()->entity()->pluck('name')}}</b>
  </h1>

</section>

<hr/>

@stop




@section('maincontent')

	        <!-- Main content -->
        <section class="content">
        
       
          

          <!-- Main row -->
          <div class="row">
           



		{{ Form::open(array('url'=>'client/register', 'class'=>'form-vertical login-form','method'=>'post')) }}

					<div class="col-md-1">
					</div>

					<div class="col-md-4">


							<div class="control-group">
								<label class="control-label ">Full Name</label>
								<div class="controls">
									<div class="input-icon left">
										<i class="icon-font"></i>
										<input class="form-control placeholder-no-fix {{ ($errors->first('fullname')) ? 'has-error'  :''}}" type="text" placeholder="...Enter Client fullname" name="fullname"/>
									</div>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label ">Phone Number</label>
								<div class="controls">
									<div class="input-icon left">
										<i class="icon-phone"></i>
										<input class="form-control placeholder-no-fix {{ ($errors->first('phone')) ? 'has-error'  :''}}" type="text" placeholder="...Contact Phone number" name="phone"/>
									</div>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label ">Sector/Industry</label>
								<div class="controls">
									
									<select class="form-control" name="catg_optn">
										<option value="">..select Industry/Sector</option>

										@foreach($categorys as $c)
											<option value="{{$c->id}}">{{$c->name}}</option>
										@endforeach

									</select>

								</div>
							</div>

							<div class="control-group">
								<label class="control-label ">Address</label>
								<div class="controls">
									<div class="input-icon left">
										<i class="icon-ok"></i>
										<input class="form-control placeholder-no-fix {{ ($errors->first('address')) ? 'has-error'  :''}}" type="text" placeholder="...Enter Office Address" name="address"/>
									</div>
								</div>
							</div>

							<div class="control-group">
								<div class="row-fluid">
									<label class="control-label ">Residence State</label>
									<div class="controls">
										<select name="state_optn" class="form-control" onChange="getLGAs(this);">
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


<div class="col-md-1">
</div>


					<div class="col-md-4">

						<div class="control-group">
							<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
							<label class="control-label ">Email</label>
							<div class="controls">
								<div class="input-icon left">
									<i class="icon-envelope"></i>
									<input class="form-control placeholder-no-fix {{ ($errors->first('email')) ? 'has-error'  :''}}" type="text" placeholder="...Valid Email Address" name="email"/>
								</div>
							</div>
						</div>


						<div class="control-group">
							<label class="control-label ">Password :: Minimum of 8 Chars</label>
							<div class="controls">
								<div class="input-icon left">
									<i class="icon-lock"></i>
									<input class="form-control placeholder-no-fix {{ ($errors->first('password')) ? 'has-error'  :''}}" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password"/>
								</div>
							</div>
						</div>


						<div class="control-group">
							<label class="control-label ">Re-type Your Password</label>
							<div class="controls">
								<div class="input-icon left">
									<i class="icon-ok"></i>
									<input class="form-control placeholder-no-fix {{ ($errors->first('confirm_password')) ? 'has-error'  :''}}" type="password" autocomplete="off" placeholder="Re-type Your Password" name="confirm_password"/>
								</div>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label ">How did you hear about us</label>
							<div class="controls">
								<div class="input-icon left">
									
									<textarea class="form-control placeholder-no-fix {{ ($errors->first('hearaboutus')) ? 'has-error'  :''}}" name="hearaboutus" placeholder="how did you hear about us"/></textarea>
								</div>
							</div>
						</div>

					</div>

				

			</div>

				<div class="create-account row objx">

					<div class="col-md-4">							
						<input type="submit" id="register-submit-btn" class="btn green pull-right" value="update Profile"/>
					</div>
				</div>

		{{ Form::close() }}


<style type="text/css">
	.control-group{margin-bottom:10px;}
</style>



		<style type="text/css">
			.objx > div{margin-bottom:10px;}
		</style>




          </div><!-- /.row -->


        </section><!-- /.content -->



@stop




<script type="text/javascript" src="/js/admin_scripts.js"></script>