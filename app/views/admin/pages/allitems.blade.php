@extends('admin.layouts.maintemp')



@section('pgtitle')

 <section class="content-header">

  <h1 style="text-transform:capitalize">
    All {{Auth::user()->username}}'s Items :: Products
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
                  <h3 class="box-title">Items Sorted according to Date Added :: </h3>
              </div><!-- /.box-header -->

              <div class="box">

                <div class="box-body">
                  <table id="tabular-items" class="table table-bordered table-hover">

                    <thead>
                      <tr>
                        <th>id</th>
                        <th>Item</th>
                        <th>Categorys(MAN Specifications)</th>
                        <th>Stock Amount</th>
                        <th>Selling Price </th> 
                        <th>Quoted Price</th>
                        <th>Images </th>
                        <th>Date Added</th>
                        <th>Operations</th>
                      </tr>
                    </thead>



                    <tbody>


                    <?php 
                    	$ct = 1;
                    	foreach($allitems as $obj):
                    ?>


                      <tr>
                        <td>{{ $ct }}</td>
                        <td>{{ $obj->name }}</td>
                        <td>{{ $obj->category()->pluck('name') }}</td>
                        <td>{{$obj->stock_count}}</td>
                        <td>{{ $obj->selling_price }}</td> 
                        <td>{{$obj->quoted_price}}</td>
                        <td>{{count(unserialize($obj->images))}} Images</td>
                        <td>{{date_format($obj->created_at, 'dS M, Y')}}</td>
                        <td>
                        	<a href="/client/items/{{$ct}}/delete" title="Delete Item Completely"><img src="/assets/deletx.png" width="15" /></a> 
                        	&nbsp;&nbsp;
                        	<a href="/client/items/{{$ct}}/edit" title="Edit Item details"><img src="/assets/dwn.png" width="15" /></a>
                        </td>
                      </tr>

                     <?php
                     	$ct++;
                     	endforeach;
                     ?>


                    </tbody>
                    <tfoot>
                      <tr>
                        <th>id</th>
                        <th>Item</th>
                        <th>Categorys(MAN Specifications)</th>
                        <th>Stock Amount</th>
                        <th>Selling Price </th> 
                        <th>Quoted Price</th>
                        <th>Images </th>
                        <th>Date Added</th>
                        <th>Operations</th>
                      </tr>
                    </tfoot>
                  </table>

                </div><!-- /.box-body -->
              </div><!-- /.box -->






            </div>

           


          </div><!-- /.row -->


        </section><!-- /.content -->



@stop


