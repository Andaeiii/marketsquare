      <!-- PRODUCT LIST -->
        {{-- pr($most_recent) --}}

              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Recently Added Products</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->


                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                   

                  @foreach($most_recent as $item)
                    <li class="item">
                      <div class="product-img" style="width:50px;height:50px; overflow:hidden; border:solid 1px #cccccc;">
                      <?php $ar = unserialize($item->images); ?>
                        <img src="/uploads/small/{{$ar[0]}}" alt="Product Image">
                      
                      </div>
                      <div class="product-info">
                        <a href="javascript::;" class="product-title">{{$item->name}} <span class="label label-warning pull-right">{{$item->selling_price}}</span></a>
                        <span class="product-description">
                          {{$item->short_description}}
                        </span>
                      </div>
                    </li><!-- /.item -->
                  @endforeach

                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="/client/products/all" class="uppercase">View All Products</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->