    <div class="searchbox">
        <div class="container">
            <div class="row">
                <form method="post" action="/products/search">
                      <div class="col-md-12">
                              {{ Form::token() }}

                              <div class="searchinpts input-group" style="width:100%">
                                
                                <input name="q" id="item" type="text" class="form-control input-sm" placeholder="Search For Made-In-Nigeria Items...." />
                              
                                
                                <span class="submitbtn input-group-btn">
                                
                                <button onclick="this.form.submit()" class="btn btn-default" >SEARCH</button>
                                
                                </span>
                              </div>
                      </div>
                  </form>
            </div>
        </div>
    </div>
