<div class="bannerbar">

  <div  class="container">
           
        <div class="row">
            <div class="lynks col-md-3">
                <!--<div class="tp">CATEGORIES</div>-->
                {{-- pr($allcats, true) --}}
                <ul>

                @foreach($allcats as $c)
                    <li><a href="/category/{{$c->id}}/products">{{$c->name}}</a></li>
                @endforeach                      
              
              </ul>
              
            </div>

            

            <div class="banner col-md-9">




                  <div id="myCarousel" class="carousel slide" data-ride="carousel">
                          <!-- Indicators -->
                          <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                          </ol>

                          <!-- Wrapper for slides -->
                          <div class="carousel-inner" role="listbox">
                            
                            <div class="item ">
                              <img src="/slides/bn1.jpg">
                            </div>

                            <div class="item">
                              <img src="/slides/bn2.jpg">
                            </div>

                            <div class="item">
                              <img src="/slides/bn3.jpg">
                            </div>

                            <div class="item active">
                              <img src="/slides/bn4.jpg">
                            </div>

                          </div>

                          <!-- Left and right controls -->
                          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>

                    </div>



            </div>



        </div>

  </div>

</div>
