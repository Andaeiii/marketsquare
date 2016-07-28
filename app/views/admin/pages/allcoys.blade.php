@extends('admin.layouts.maintemp')



@section('pgtitle')

 <section class="content-header">

  <h1 style="text-transform:capitalize">
    Registered Company(s) / Clients
  </h1>

</section>

<hr/>

@stop




@section('maincontent')

	        <!-- Main content -->
        <section class="content">
        
       
          

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->

            <div class="col-md-12">

              <div class="box-header">
                  <h3 class="box-title">Companies Sorted according to Date Added :: </h3>
              </div><!-- /.box-header -->

              <div class="box">

                <div class="box-body">
                  <table id="tabular-items" class="table table-bordered table-hover">

                    <thead>
                      <tr>
                        <th>id</th>
                        <th>Company/Client</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Username</th> 
                      </tr>
                    </thead>



                    <tbody>


                    <?php 
                    	$ct = 1;
                    	foreach($coys as $c):
                    ?>


                      <tr>
                        <td>{{ $ct }}</td>
                        <td>{{ $c->name }}</td>
                        <td>{{ $c->email}}</td>
                        <td>{{ $c->phone }}</td> 
                        
                        <td>{{ $c->user()->pluck('username') }}</td>

                        <!--
                        <td>
                        	<a href="/client/products/{{-- $obj->id --}}/del" title="Delete Item Completely"><img src="/assets/deletx.png" width="15" /></a> 
                        	&nbsp;&nbsp;
                        	<a href="/client/products/{{-- $obj->id --}}/edit" title="Edit Item details"><img src="/assets/dwn.png" width="15" /></a>
                        </td>
                        -->
                      </tr>

                     <?php
                     	$ct++;
                     	endforeach;
                     ?>


                    </tbody>
                    <tfoot>
                      <tr>
                       <th>id</th>
                        <th>Company/Client</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Username</th> 
                      </tr>
                    </tfoot>
                  </table>

                </div><!-- /.box-body -->
              </div><!-- /.box -->






            </div>

           


          </div><!-- /.row -->


        </section><!-- /.content -->



@stop


