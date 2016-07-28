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
                    <div class="col-md-3"><h1>SEARCH RESULTS</h1></div>
                    <div class="col-md-3 col-md-offset-6"><h1>200 Items Found</h1></div>
                </div>
                

                <div class="items">

                <?php for($i=1; $i<=18; $i++): ?>

                    <a href="/products/1" class="box">
                        <h1>Rice/fish Head</h1>
                        <div class="img"><img src="/assets/bux.jpeg" width="220" />
                        </div>
                        <div class="desc">Pre-mixed vinybase compound that may be used</div>
                        <div class="price">N2300</div>
                        <span class="cartit"><img src="/assets/cartit.png"/></span>
                    </a>

                <?php endfor; ?>

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