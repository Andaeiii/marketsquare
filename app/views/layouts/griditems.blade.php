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

            <div class="col-md-9">
                
                <div class="row">
                    @if(isset($coyinfo))
                        <div class="col-md-9"><h1>{{$pgtitle }} &nbsp; &nbsp;<img class="vlogx" src="/assets/vlog.png" align="absmiddle" /></h1></div>
                    @else
                        <div class="col-md-9"><h1>{{$pgtitle }}</h1></div>                    
                    @endif
                    <div class="col-md-2 col-md-offset-1"><h1 class="smallh1">{{count($allitems)}} Items Found</h1></div>
                </div>

                <div class="row xtradetails">
                    <div class="col-md-12">
                        @if(isset($catinfo))

                            This Category contains the following items :: <br/> 
                            <?php
                                $ar = $catinfo->description;
                                $lnks = explode(';', $ar);
                            ?>
                            @foreach($lnks as $aa)
                                @if(!empty(trim($aa)))
                                <a href="/category/{{$catinfo->id}}/filter/{{$aa}}" class="subb"> {{$aa}} </a>
                                @endif
                            @endforeach

                        @elseif(isset($coyinfo))

                            Buynaija Verified | <b>Address :: </b> {{$coyinfo->address}}, <b>Phone ::</b> {{$coyinfo->phone}}

                        @else

                            Available products in the buynaija database.....

                        @endif    
                    </div>
                </div>

                <div class="clr"></div>
                

                <div class="items">

                @foreach($allitems as $item)

                    {{--pr($item, true)--}}
                    <a href="/products/{{$item->id}}" class="box">
                        <h1>{{$item->name}}</h1>
                         <?php $thmb = unserialize($item->images); ?>
                        <div class="img"><img src="/uploads/small/{{$thmb[0]}}" width="220" />
                        </div>
                        <div class="desc">{{shortstr($item->short_description, 60)}}</div>
                        <div class="price">N{{$item->quoted_price}}</div>
                        <span class="cartit"><img src="/assets/cartit.png"/></span>
                    </a>

                @endforeach

                </div>


                 <div id="paginator" class="paginator">
                        
                        <nav>
                          <ul class="pagination">
                          
                            <li>
                              <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                              </a>
                            </li>
                            
    
                            
                            <?php 

                                for($i=1; $i<=18; $i++): 

                                if(isset($_REQUEST['q']) && $_REQUEST['q'] == $i){
                                    $class='active';
                                }else{
                                    $class='';
                                }
                            ?>

                            <li class="<?php echo $class; ?>">
                            <a href="/search.php?q=<?php echo $i; ?>">
                             <?php echo $i; ?>
                            </a>
                            </li>

                            <?php endfor; ?>

                            <li>
                              <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                              </a>
                            </li>
                            
                          </ul>
                        </nav>
                        
                    </div>

            </div>


        </div>
    </div>
</div>


<div class="items">
       @include('partials.partners')
</div>


@include('partials.footer')