@include('admin.partials.header')

  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      
    @include('admin.partials.tophead')

    @include('admin.partials.sidebar')


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       
        @yield('pgtitle')


        @yield('maincontent')



      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; {{date('Y')}} BuyNaija MarketSquare</a>.</strong> All rights reserved.
      </footer>


      {{--  control side bar settings.... --}}


      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>

    </div><!-- ./wrapper -->


@include('admin.partials.footer')