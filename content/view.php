<?php


function view( $component , $cerca, $risultato, $column) {
  $c =explode(",",$cerca);
  $r =explode(",",$risultato);
  
  
                            $strR = '';
                            foreach($r as $value) {
                                   
                                     $strR .='<th>'.$value.'</th>';
                                  
                            }
                             
                            $strC = '';
                            foreach($c as $value) {
                                   
$strC .='<div class="col-md-4"><input class="form-control" type="text" id="'.$value.'" name="'.$value.'" placeholder="'.$value.'"></div>';


                            }
 $strC .='<div class="col-md-2"><input type="button" class="btn btn-default" value="cerca" onclick='.trim($component).'.search("'.$component.'");></div>';
  $strC .='<div class="col-md-2"><input type="button" class="btn btn-default" value="nuovo" onclick='.trim($component).'.insert("'.$component.'");></div>';
  
 return   ' 
<?php 
    if(isset($_GET["id"])) { ?>
        <script>
                '.$component.'.single("<?php echo $_GET["id"]?>","'.$component.'")
        </script>
<?php } ?>

<div class="content ">
    <div class="row">
        
             
             <div class="hpanel">
			 
			 
			  <div class="panel-body" >
              
            <div class="col-md-12 res"  >
                            <form id="f">
                            '.$strC.'
                            </form>

            </div>

             <div class="col-md-12 res" >
                
                 <table class="table table-striped">
                           <thead>
                            '.$strR.'
                           </thead>
                           <tbody id="r_'.$component.'">
                               
                           </tbody>
                       </table>
            
                  
				
            </div>
            
            <div class="col-md-12 item"   style="display:none;">
                <form id="fItem">
                 <div id="ri_'.$component.'" class="col-md-12">
                     
                 </div>
                 
                 <div   class="col-md-6">
                     <div class="col-md-4"><input type="button" class="btn btn-default" value="salva" onclick='.trim($component).'.update(<?php echo $_GET["id"]?>);></div> 
                 </div>
                 
<div   class="col-md-6">
                     <div class="col-md-4"><input type="button" class="btn btn-default" value="cancella" onclick='.trim($component).'.delete(<?php echo $_GET["id"]?>);></div> 
                 </div>
                </form>
            </div>
			 
			 
			 </div>
			 </div>
			 </div>
	</div>
 

 <script type="text/javascript" src="../app/lib/jquery.form.js"></script>
 
 
 <script src="../homer/vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../homer/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../homer/vendor/metisMenu/dist/metisMenu.min.js"></script>
<script src="../homer/vendor/iCheck/icheck.min.js"></script>
<script src="../homer/vendor/chartjs/Chart.min.js"></script>
<script src="../homer/vendor/sparkline/index.js"></script>
 
 
';
 
}
 
 

