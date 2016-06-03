@extends('admin.layouts.maintemp')



@section('pgtitle')

 <section class="content-header">

  <h1 style="capitalize">
    Welcome, {{ Auth::user()->entity()->first()->name }}  ::  Dashboard
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
            <div class="col-md-8">
              <!-- MAP & BOX PANE -->
              

                @include('admin.partials.messages')
                  
                @include('admin.partials.newprods')


              </div><!-- /.row -->

              
            @include('admin.partials.latestorders')


            </div><!-- /.col -->

            <div class="col-md-4">
             

             

        @include('admin.partials.mostrecent')



            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->



@stop