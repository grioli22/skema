<?php


function tmpl( $component, $cerca, $risultato, $column ) {

    
 
  $r =explode(",",$risultato);
  $CL =explode(",",$column);
  
                            $strR = '';
                            foreach($r as $value) {
                                   
                                     $strR .='<td>{{:'.$value.'}}</td>';
                            }
                            
                            
                      $strCL = '';
                            foreach( $CL as $value ) {
                                   
                                     $strCL .='<div class="col-md-4"><input class="form-control" type="text" id="'.$value.'" name="'.$value.'" placeholder="'.$value.'" value="{{:'.$value.'}}"></div>';
                            }
                            
    
    return   '  
    <script id="t_'.$component.'" type="text/x-jsrender"/>
    <tr>
       '.$strR.'
           <td><input type="button" class="btn btn-default" value="vedi" onclick='.trim($component).'.urlsingle({{:id}});></td>
    </tr>
    </script>
    
     <script id="ti_'.$component.'" type="text/x-jsrender"/>
     
       '.$strCL.'
     
    </script>
    ';
 
}
 
 

