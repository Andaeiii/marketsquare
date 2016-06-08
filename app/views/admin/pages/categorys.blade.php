@extends('admin.layouts.maintemp')



@section('pgtitle')

 <section class="content-header">

  <h1 style="capitalize">
    Manage Categories
  </h1>

</section>

<hr/>

@stop




@section('maincontent')

	        <!-- Main content -->
        <section class="content">
        
        {{-- @include('admin.partials.infoboxes') --}}

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            

            <div class="col-md-12">		<!--column starts here... -->

            	<div class="row">
            		<div class="col-md-3">
            			
            				{{Form::open(array('url'=>'client/category/add'))}}

			                  <!-- Date dd/mm/yyyy -->
			                  <div class="form-group">
			                    <label>Name of Category</label>
			                    <input type="text" class="form-control {{ ($errors->first('cat_name')) ? 'has-error'  :''}}" name="cat_name" style="width:100% !important;" />
			                  </div><!-- /.form group -->

			                   <!-- Date dd/mm/yyyy -->
			                  <div class="form-group">
			                    <label>Description</label>
			                    <textarea class="form-control {{ ($errors->first('cat_desc')) ? 'has-error'  :''}}" name="cat_desc" style="width:100% !important" rows="5"></textarea>
			                  </div><!-- /.form group -->

			                   <!-- Date dd/mm/yyyy -->
			                  <div class="form-group">
			                    <label>Enter Tags Seperated in Commas (,)</label>
			                    <textarea class="form-control" name="cat_tags" style="width:100% !important" rows="2"></textarea>
			                  </div><!-- /.form group -->

			                  <button type="submit" class="btn btn-primary">Submit</button>

			               {{Form::close()}}

            		</div>

            		<div class="col-md-5 prvcats">
            				Available Categories Based On MAN Nigeria
            				<hr/>
            				<ul>
            				@foreach($cats as $c)
            				<li><a href="javascript:;" onclick="getCatgs({{$c->id}})"> {{$c->name}} </a> :: <a href="/client/category/{{$c->id}}/del">[ X ]</a></li>
            				@endforeach
            				</ul>
            		</div>

            		<div id="cdsc" class="col-md-3 br_lft">
                            
            		</div>


            	</div>

            </div><!-- /.column ends eh -->





          </div><!-- /.row -->


        </section><!-- /.content -->



@stop



<style type="text/css">
.br_lft{background-color:#ffffff; padding:10px;}
.prvcats li a{text-transform: capitalize;}
.prvcats ul{margin-left:10px !important; padding-left:0px !important;}
</style>

