@extends('admin.layouts.maintemp')



@section('pgtitle')

 <section class="content-header">

  <h1 style="capitalize">
    Add New Item
  </h1>

</section>

<hr/>

@stop




@section('maincontent')

	        <!-- Main content -->
        <section class="content">
        
        @include('admin.partials.infoboxes')

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->

            <div class="col-md-3">



            </div>

            {{ Form::open(array('url' => 'client/products/add', 'files'=>true)) }}

		            <div class="col-md-9">		<!--column starts here... -->

		            	<div class="row">


		            		<div class="col-md-7">


					                  <!-- Date dd/mm/yyyy -->
					                  <div class="form-group">
					                    <label>Name Of Product</label>
					                    <input type="text" class="form-control" style="width:100% !important;" />
					                  </div><!-- /.form group -->

					                  <div class="form-group">
					                    <label>Product Category(According to MAN)</label>
					                    <select class="form-control select2 select2-hidden-accessible" name="prod_cat" style="width: 100%;"  >
					                    	<option>Select Category..... </option>
						                    @foreach($cats as $c)
						                    	<option value="{{$c->id}}">{{$c->name}}</option>
						                    @endforeach
					                    </select>
					                  </div>

					                   <!-- Date dd/mm/yyyy -->
					                  <div class="form-group">
					                    <label>Product Description</label>
					                    <textarea class="form-control" name="prod_desc" style="width:100% !important" rows="5"></textarea>
					                  </div><!-- /.form group -->
    



									


		            		</div>

		            		<div class="col-md-5">

					                   <!-- IP mask -->
					                  <div class="form-group">
					                  	<div class="row">
					                  		<div class="col-md-6">					                  			
							                    <label>Quoted Price</label>
							                    <div class="input-group">
							                      <div class="input-group-addon">&#8358;</div>
							                      <input type="text" name="qprice" class="form-control" data-inputmask="'alias': 'ip'" data-mask>
							                    </div><!-- /.input group -->
					                  		</div>
					                  		<div class="col-md-6">					                  			
							                    <label>Selling Price</label>
							                    <div class="input-group">
							                      <div class="input-group-addon">&#8358;</div>
							                      <input type="text" name="sprice" class="form-control" data-inputmask="'alias': 'ip'" data-mask>
							                    </div><!-- /.input group -->			                  			
					                  		</div>
					                  	</div>
					                  </div><!-- /.form group -->

					                  <!-- Date dd/mm/yyyy -->
					                 
					                    <div class="form-group">
					                      <label for="exampleInputFile">Select Product Images</label>
					                      
					                      {{Form::file('files[]', array('multiple'=>true)) }} <br/>
					                      {{Form::file('files[]', array('multiple'=>true)) }} <br/>
					                      {{Form::file('files[]', array('multiple'=>true)) }} <br/>
					                      
					                    </div>


					                  <!-- IP mask 
					                  <div class="form-group">
					                    <label>IP mask:</label>
					                    <div class="input-group">
					                      <div class="input-group-addon">
					                        <i class="fa fa-laptop"></i>
					                      </div>
					                      <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask>
					                    </div>
					                  </div>  -->



		            		</div>


		            	</div>

		            </div><!-- /.column ends eh -->

            {{ Form::close() }}


          </div><!-- /.row -->


        </section><!-- /.content -->



@stop