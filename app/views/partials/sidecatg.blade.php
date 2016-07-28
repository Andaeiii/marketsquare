 <div class="lynks col-md-3">

    <H1 class="tp">Categories</H1>
    <ul class="filters">
        
        <li><!-- <a href="">:: By Vendor</a> -->
            <ul>

                @foreach($allcats as $c)
                    <li><a href="/category/{{$c->id}}/products">{{$c->name}}</a></li>
                @endforeach                      
            </ul>
        </li>

    </ul>

    <br/>
    <br/>



    <div class="ads"></div>

</div>
