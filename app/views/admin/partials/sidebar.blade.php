<!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
  






          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">

            <li class="header">MAIN NAVIGATION</li>
            

            <li class="active ">
              <a href="/client/profile/edit">
                <i class="fa fa-user"></i> <span>Edit Profile</span></i>
              </a>
            </li>
           

            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Your Products</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/client/products/new"><i class="fa fa-circle-o"></i>Add Products</a></li>
                <li><a href="/client/products/all"><i class="fa fa-circle-o"></i>All Products</a></li>
              </ul>
            </li>



            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Your Categories</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/client/category/new"><i class="fa fa-circle-o"></i>Add Category</a></li>
                <li><a href="/client/categoty/all"><i class="fa fa-circle-o"></i>All Categories</a></li>
              </ul>
            </li>


            @if(Auth::user()->type == 'admin')

            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Registered Clients</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/client/new"><i class="fa fa-circle-o"></i> Add Clients</a></li>
                <li><a href="/client/all"><i class="fa fa-circle-o"></i> All Clients</a></li>
              </ul>
            </li>

            @endif

            <li>
              <a href="client/messages">
                <i class="fa fa-envelope"></i> <span>Messages</span>
                <small class="label pull-right bg-yellow">12</small>
              </a>
            </li>

           
            <li>
              <a href="client/reports">
                <i class="fa fa-sticky-note-o"></i> <span>Reports</span>
              </a>
            </li>

           
            <li>
              <a href="client/stats">
                <i class="fa fa-bar-chart"></i> <span>Statistics</span>
              </a>
            </li>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
