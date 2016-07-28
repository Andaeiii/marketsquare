

   <div class="tophead">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <a href="/"><img src="/assets/logo.jpg"/></a>
                    <br/><br/>
                    <span class="patnerx"><img src="/assets/partnr.png"/></span>
                </div>

                <div class="col-md-3 col-md-offset-4">
                    <img src="/assets/registr.jpg"/>
                    <img src="/assets/intrs.jpg"/>
                </div>
                <div class="cart col-md-2 col-md-offset-1">
                    <a href="/items/cart">
                        <img src="/assets/cart.png" align="absmiddle" />
                        @if(Session::has('shopn_cart'))
                           <span>{{count($_SESSION['shopn_cart'])}} Items in cart</span>
                        @else
                            <span>..start shopping</span>
                        @endif
                    </a>
                    <br/><br/>
                    <img src="/assets/fmi.jpg"/>

                </div>
            </div>
        </div>
    </div> 