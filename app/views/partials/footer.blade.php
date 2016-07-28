


 
   <div class="clr"></div>
<hr/>

<div class="foot">
   <div class="container">
      <div class="row">
          
          <div class="col-md-4">
              <h1> ABOUT US </h1>
              <p align="justify">BuyNaija.com…The Market Square, is a One-Stop global e-Commerce Platform of the BUY-NAIJA Project. The BUY-NAIJA Project [A Made-in-Nigeria Campaign] is a Multi-Stakeholders Public-Private-Sector Driven Platform domiciled with the Federal Ministry of Industry, Trade & Investment.
</p>
          </div>
          
          <div class="qlinks col-md-4">
            <h1>QUICK LINKS </h1>

            <table width="100%">

              <tr>
                <td>
                  <ul>
                    <li><a href="/"> About Us</a></li>
                    <li><a href="/"> How to Register</a></li>
                    <li><a href="/"> Contact Us</a></li>
                    <li><a href="/"> Contact Us</a></li>
                  </ul>
                </td>
                <td>
                  <ul>
                    <li><a href="/"> About Us</a></li>
                    <li><a href="/"> How to Register</a></li>
                    <li><a href="/"> Contact Us</a></li>
                    <li><a href="/"> Contact Us</a></li>
                  </ul>
                </td>
              </tr>

            </table>

          </div>
          
          <div class="social col-md-4">
            <h1>Social</h1> 
            <span>Follow Us On :: </span>
            <a href="#"><i class="fa fa-facebook"></i></a> 
            <a href="#"><i class="fa fa-twitter"></i></a> 
            <a href="#"><i class="fa fa-instagram"></i></a> 

          </div>

      </div>
   </div>

</div>

<div class="copy">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                &copy; <?php echo date('Y'); ?> BuyNaija.com :: All Rights Reserved
            </div>
        </div>
    </div>
  </div>
 
    

  <script type="text/javascript" src="/js/jquery-ui.min.js"></script> 
  <script type="text/javascript" src="/js/jquery-1.11.3.js"></script>
  <script src="/js/scripts.js"></script>    
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/jquery.circle-diagram.js"></script>


    @if(isset($has_tables))
    
     <script src="/js/jquery.dataTables.min.js"></script>

     <script type="text/javascript">

      $(document).ready(function() {

          $('#cart_table').DataTable({
              scrollY:        '50vh',
              scrollCollapse: true,
              //paging:         false,
              lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]]
          });

      });

    </script>
  
    
    @endif

    <script src="/js/bjqs-1.3.min.js"></script>






      <script type="text/javascript">


      $(document).ready(function() {

        
        $('#startDate').daterangepicker({
          singleDatePicker: true,
          //startDate: moment().subtract(6, 'days')
        });

        $('#endDate').daterangepicker({
          singleDatePicker: true,
         // startDate: moment()
        });


      });



      <script class="secret-source">
      
        jQuery(document).ready(function($) {

          $('#banner-fade').bjqs({
            height      : 320,
            width       : 620,
            responsive  : true
          });

        });
      
      </script>



      </script>
    
    
  </body>
</html>