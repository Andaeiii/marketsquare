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
            	//the items are being added.... 
            </div>

            <div class="col-md-8">
             

            </div><!-- /.col -->

          </div><!-- /.row -->


        </section><!-- /.content -->



@stop