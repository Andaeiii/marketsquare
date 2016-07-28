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

@include('partials.homebanner')

<!--

    <div class="aboutus">
            
            <div class="container">
                <div class="row">
                        <div class="col-md-9">
                            <h1>ABOUT US</h1>
                            <p text-align="justify">  
    BuyNaija.com…The Market Square, is a One-Stop global e-Commerce Platform of the BUY-NAIJA Project. The BUY-NAIJA Project [A Made-in-Nigeria Campaign] is a Multi-Stakeholders Public-Private-Sector Driven Platform domiciled with the Federal Ministry of Industry, Trade & Investment. BUY-NAIJA is primarily the driving platform of the Local Patronage Pillar of the National Industrial Revolution Plan [NIRP] of the Federal Government of Nigeria. 
    <br/>BuyNaija.com e-commerce platform is configured to provide a Comprehensive and Authentic Information/Data on   Made-in-Nigeria Products and Services to expand market frontiers for subscribers and making their products and services available to Buyers [Local and International]. 
    </p>
                        </div>
                        <div class="splx col-md-3">
                            <h1></h1>
                            <span><img src="/assets/coolx.jpg"></span>
                        </div>
                </div>
            </div>

    </div>

-->

<div class="items">
        
        <div class="container">
            <div class="row">


                    <h1>MOST RECENT</h1>

                    <div class="col-md-10 homeitems">
                        
                        <div class="items">
                         @foreach($otherItems as $ps)
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

                        <div class="clr clear"></div>

                        <br/>
                        <h1>OTHER RECENT</h1>
                        <div class="items">

                        <?php for($i=1; $i<=10; $i++): ?>

                            <a href="" class="box">
                                <h1>Rice/fish Head</h1>
                                <div class="img"><img src="/assets/bux.jpeg" width="220" />
                                </div>
                                <div class="desc">Pre-mixed vinybase compound that may be used</div>
                                <div class="price">N2300</div>
                                <span class="cartit"><img src="/assets/cartit.png"/></span>
                            </a>

                        <?php endfor; ?>

                        </div>




                    </div>

                    <div class="flright">

                        <div class="ads size2_10">
                        </div>

                        <div class="ads size2_10">
                        </div>

                    </div>

            </div>
        </div>
        
        @include('partials.partners')

</div>


@include('partials.footer')