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

            <div class="col-md-4">



            </div>


            <div class="col-md-8">		<!--column starts here... -->

            	<div class="row">


            		<div class="col-md-6">


			                  <!-- Date dd/mm/yyyy -->
			                  <div class="form-group">
			                    <label>Name Of Product</label>
			                    <input type="text" class="form-control" style="width:100% !important;" />
			                  </div><!-- /.form group -->

			                  <div class="form-group">
			                    <label>Product Category(According to MAN)</label>
			                    <select class="form-control select2 select2-hidden-accessible" name="prod_cat" style="width: 100%;"  >
			                      <option>Alabama</option>
			                      <option>Alaska</option>
			                      <option>California</option>
			                      <option>Delaware</option>
			                      <option>Tennessee</option>
			                      <option>Texas</option>
			                      <option>Washington</option>
			                    </select>
			                  </div>

			                  

			                   <!-- IP mask -->
			                  <div class="form-group">
			                    <label>Quoted Price</label>
			                    <div class="input-group">
			                      <div class="input-group-addon">
			                       &#8358;
			                      </div>
			                      <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask>
			                    </div><!-- /.input group -->
			                  </div><!-- /.form group -->



							 <div class="form-group">
			                    <label>Minimal</label>
			                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
			                      <option>Alabama</option>
			                      <option>Alaska</option>
			                      <option>California</option>
			                      <option>Delaware</option>
			                      <option>Tennessee</option>
			                      <option>Texas</option>
			                      <option>Washington</option>
			                    </select>
			                  </div>






			                  <!-- IP mask -->
			                  <div class="form-group">
			                    <label>IP mask:</label>
			                    <div class="input-group">
			                      <div class="input-group-addon">
			                        <i class="fa fa-laptop"></i>
			                      </div>
			                      <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask>
			                    </div><!-- /.input group -->
			                  </div><!-- /.form group -->



            		</div>

            		<div class="col-md-6">



			                  <!-- Date dd/mm/yyyy -->
			                  <div class="form-group">
			                    <label>Date masks:</label>
			                    <div class="input-group">
			                      <div class="input-group-addon">
			                        <i class="fa fa-calendar"></i>
			                      </div>
			                      <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
			                    </div><!-- /.input group -->
			                  </div><!-- /.form group -->

			                  <!-- Date mm/dd/yyyy -->
			                  <div class="form-group">
			                    <div class="input-group">
			                      <div class="input-group-addon">
			                        <i class="fa fa-calendar"></i>
			                      </div>
			                      <input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask>
			                    </div><!-- /.input group -->
			                  </div><!-- /.form group -->

			                  <!-- phone mask -->
			                  <div class="form-group">
			                    <label>US phone mask:</label>
			                    <div class="input-group">
			                      <div class="input-group-addon">
			                        <i class="fa fa-phone"></i>
			                      </div>
			                      <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
			                    </div><!-- /.input group -->
			                  </div><!-- /.form group -->

			                  <!-- phone mask -->
			                  <div class="form-group">
			                    <label>Intl US phone mask:</label>
			                    <div class="input-group">
			                      <div class="input-group-addon">
			                        <i class="fa fa-phone"></i>
			                      </div>
			                      <input type="text" class="form-control" data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask>
			                    </div><!-- /.input group -->
			                  </div><!-- /.form group -->

			                  <!-- IP mask -->
			                  <div class="form-group">
			                    <label>IP mask:</label>
			                    <div class="input-group">
			                      <div class="input-group-addon">
			                        <i class="fa fa-laptop"></i>
			                      </div>
			                      <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask>
			                    </div><!-- /.input group -->
			                  </div><!-- /.form group -->



            		</div>


            	</div>

            </div><!-- /.column ends eh -->



          </div><!-- /.row -->


        </section><!-- /.content -->



@stop