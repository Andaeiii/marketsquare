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

            @yield('main_content')

            </div>


        </div>
    </div>
</div>


<div class="items">
                
      @include('partials.partners')

</div>

@include('partials.footer')