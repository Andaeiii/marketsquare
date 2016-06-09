<header class="main-header">

        <!-- Logo -->
        <a href="/admin" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>The</b>MarketSquare</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>



          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
          
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->

              @include('admin.partials.topmsgs')


              {{--    @include('admin.partials.notifications')  --}}



              {{--  @include('admin.partials.tasks') --}}



              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs" style="text-transform:capitalize"> {{ Auth::user()->entity()->first()->name }} </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                       {{ Auth::user()->entity()->first()->name }}

                      <small>Member since {{date_format(Auth::user()->pluck('created_at'),"d M")}}</small>
                    </p>
                  </li>


                  <!-- Menu Body -->
                  <li class="user-body">
                    @if(!Auth::user()->entity()->first()->verified)
                      <b>{{link_to('client/verify', 'Account Not Verified, Verify Account')}}</b>
                    @endif;
                  </li>


                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Edit Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{URL::Route('logout')}}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>



              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>


            </ul>
          </div>

        </nav>
      </header>