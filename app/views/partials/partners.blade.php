  <div class="container">
        <div class="row">
                <div class="col-md-12">
                    <h1 class="dotted">OTHER PARTNERS</h1>
                </div>
        </div>
        <div class="row">
                <div class="col-md-12">
                 <?php 
                     $urls = array(
                                'mannigeria.com',
                                'nipostnigeria.com',
                                'seedconcept.com',
                                'mannigeria.com',
                                'nipostnigeria.com',
                                'seedconcept.com',
                            );

                     for($i=1; $i<=6; $i++): 

                ?>
                   <a class="coy" href="http://{{$urls[$i-1]}}" target="_blank"><img src="/coys/lg{{$i}}.jpg"/></a>
                 <?php 
                     endfor; 
                 ?>
                </div>
        </div>
    </div>