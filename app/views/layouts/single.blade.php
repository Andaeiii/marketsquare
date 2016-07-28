@include('partials.header')

  <body>


    <div class="topstrip">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <a href="">ABOUT BUY NAIJA</a>
                    <span> :: </span>
                    <a href="">BRANDS WE REPRESENT</a>
                    <span> :: </span>
                    <a href="">COMPANY POLICY</a>
                </div>

                <div class="top-helpdsk col-md-3 col-md-offset-4">
                    HELPDESK +234809000000 | Login
                </div>
            </div>
        </div>
    </div>


@include('partials.tophead')

@include('partials.searchbar')

<div class="grid-bar">
    <div class="container">
        <div class="row">
           

        @include('partials.sidecatg')

            <?php
                $pixs = unserialize($item->images);
            ?>

            <div class="col-md-9">
                
                <div class="row">
                    <div class="col-md-12"><h1>{{$item->name}}</h1></div>
                </div>

                <div class="itemsingle row">

                    <div class="col-md-8">
                        
                        <div class="item-img"> 
                            <div id="p1"><img src="/uploads/large/{{$pixs[0]}}" width="100%" /></div>
                            <div id="p2"><img src="/uploads/large/{{$pixs[1]}}" width="100%" /></div>
                            <div id="p3"><img src="/uploads/large/{{$pixs[2]}}" width="100%" /></div>
                        </div>
                        
                        <div class="item-thmbs">
                            <a href="javascript:;" onclick="shwimg(1);"><img src="/uploads/small/{{$pixs[0]}}"/></a>
                            <a href="javascript:;" onclick="shwimg(2);"><img src="/uploads/small/{{$pixs[1]}}"/></a>
                            <a href="javascript:;" onclick="shwimg(3);"><img src="/uploads/small/{{$pixs[2]}}"/></a>   
                            <span class="clr"></span>                         
                        </div>



                        <div class="item-desc">{{html_entity_decode($item->description)}}</div>

                    </div>



                    <style type="text/css">
                       .item-img #p2, .item-img #p3{display:none;}
                    </style>



            <script type="text/javascript">
               function shwimg(vx){
                    for(v=1;v<=3;v++){
                        if(Number(vx) == v){
                            $('.item-img #p'+v).css('display','block');
                        }else{
                            $('.item-img #p'+v).css('display','none');
                        }
                    }
               }
            </script>

                    <script type="text/javascript">

                        function calcit(obj, px){
                            nx = Number(px) * $(obj).val();
                            alert(nx);
                            $('#calcprice').val(nx);
                        }

                    </script>

                    <form name="crtform" method="post" action="/items/tocart">

                    {{ Form::token() }}

                    <div class="col-md-4">

                       <div class="soptn input-group" style="width:100%">
                                
                                <input  type="text" class="tpx form-control input-sm" value="Quantity" disabled="disabled" />
                                <span class="input-group-btn" style="width:0px;"></span>

                                <select onchange="calcit(this, {{$item->quoted_price}})" class="form-control input-sm" name="item_ct" style="margin-left:-2px" >
                                 
                                   @for($i=1; $i<=$item->stock_count; $i++)
                                     <option value="{{$i}}">&nbsp;{{$i}}&nbsp;</option>  
                                   @endfor

                                </select>
                        </div>
                               <input type="hidden" name="prod_id" value="{{$item->id}}"/>
                               <input type="hidden" name="calcprice" id="calcprice" value="{{$item->quoted_price}}" />

                        <br/>
                        <div class="clr"></div>

                        <div class="pricediv">
                            <span id="xtrprc" class="val">&#8358;{{$item->quoted_price}}</span>
                            <a href="javascript:;" onclick="document.crtform.submit();" class="icon" title="add to cart"><img src="/assets/greencart.png"/></a>
                        </div>

                        </form>

                        <!-- <a class="btn btn-info">Add to Cart :: <img src="/assets/w-cartit.png"/></a> -->
                        
                        {{--pr($coy, true)--}}
                        
                        <div class="byauthor">
                            <h1>by {{$coy->name}}</h1>
                            <small>{{$coy->address}}</small>
                            <br/><br/>
                            Click to View Other Products from This Manufacturer <br/><br/> <a class="btn btn-success" href="/coy/{{ $coy->user_id }}/products">:: Go To Store</a>
                        </div>

                        <br/>


                        <div class="ads"></div>


                    </div>

                </div>

                <div class="item-related">

                     <div class="row">
                        <div class="col-md-12"><h1>Related Items</h1></div>
                    </div>

                    
                     <div class="items">

                        @foreach($otherItems as $ps):

                            <a href="/products/{{$ps->id}}" class="box">
                                <h1>{{$ps->name}}</h1>
                                <?php $thmb = unserialize($ps->images); ?>
                                <div class="img"><img src="/uploads/small/{{$thmb[0]}}" width="220" />
                                </div>
                                <div class="desc">{{shortstr($ps->short_description, 60)}}</div>
                                <div class="price">&#8358;{{$ps->quoted_price}}</div>
                                <span class="cartit"><img src="/assets/cartit.png"/></span>
                            </a>

                        @endforeach

                     </div>

                </div>

            </div>


        </div>
    </div>
</div>


<div class="items">
                
      @include('partials.partners')

</div>

@include('partials.footer')