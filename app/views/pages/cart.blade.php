@extends('layouts.static')

@section('main_content')


	<h1>Shopping Cart :: All Items.. </h1>


	<hr/>

	 <table id="cart_table" class="display" cellspacing="0" width="100%">
       
        <thead>
            <tr>
                <th>s/no</th>
                <th>Name Of Item</th>
                <th>Description</th>
                <th>Quantity (Qty)</th>
                <th>Price</th>
                <th>Total (Qty x Price)</th>
                <th>Action</th>
            </tr>
        </thead>

        <tfoot>
            <tr>
                <th>Id</th>
                <th>Name Of Item</th>
                <th>Description</th>
                <th>Quantity (Qty)</th>
                <th>Price</th>
                <th>Total (Qty x Price)</th>
                <th>Action</th>
            </tr>
        </tfoot>

        <tbody>
        <?php $ctx = 1; $sumtotal = 0?>

        @foreach($all_items as $t)
        	{{-- pr($t['product'], true) --}}
            <tr>
                <td>{{$ctx}}</td>
                <td>{{ $t['product']['name'] }}</td>
                <td>{{ shortstr($t['product']['short_description'], 30) }}</td>
                <td>{{ $t['count'] }}</td>
                <td>&#8358;{{ $t['product']['quoted_price'] }}</td>
                <td>&#8358;{{ intval($t['product']['quoted_price']) * intval($t['count']) }}</td>
                <td>
                	<a href="/cart/del/{{intval($ctx)-1}}" class="btn" href="javascript:;" title="Delete Item">[ x ] </a>
                </td>

            </tr>
            
            <?php 
            	//do the sumtotal... 
          		$sumtotal += intval($t['product']['quoted_price']) * intval($t['count']);
            	//do the increment..
            	$ctx++;
            ?>

        @endforeach

          </tbody>
         </table>

<h1 style="text-transform:capitalize !important; font-size:17px;">Price Total ({{ --$ctx }} Items) :: &#8358;{{$sumtotal}} </h1>

<hr/>
	<span class="notify_msg">Verify Items and confirm details of what you want before checking out to the payment service of Buynaija.com </span>
<br/><br/>
<a href="/shop/checkout" class="btn btn-success">Proceed To CheckOut</a>


@stop