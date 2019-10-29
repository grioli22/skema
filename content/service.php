<?php


function service( $component, $dati ) {

    
     $str =  ' this.view("'.$component.'")';
     if($dati==0) $str = '';
    
 return   '
 

 var '.$component.' = {
     
     component : "'.$component.'",
     init : function(){
            '.$str.'
     },
      
     view : function( label ){ // mesi
       jQuery.ajax({
        url: common.url + "c="+  this.component  +"&task=view" ,
        type: "GET",
            success: function (  data  ) {                 
                 data = helper.retdata(data);
                 helper.bindingDataRender( "t_" + label , data , "r_" + label ) ; 
            }
         });  
     },
     
     search : function( label ){ // mesi
       jQuery.ajax({
        url: common.url + "c="+  this.component  +"&task=view" ,
        type: "GET",
        data: $("#f").serialize(),
            success: function (  data  ) {                 
                 data = helper.retdata(data);
                 helper.bindingDataRender( "t_" + label , data , "r_" + label ) ; 
            }
         });  
     },
     
     urlsingle : function( id ){
        window.open(""+utils.url+"/"+utils.page+"/?'.$component.'&id=" + id + "");
   
     },
     
    

    single : function( id, label )
     { 
        common.loadgif("block");
        jQuery.ajax({
         url: common.url + "c="+  this.component  +"&task=view&id=" + id,
         type: "GET",
             success: function ( data ) {
                 data = helper.retdata(data);
                 $(".res").css("display","none");
                 $(".item").css("display","block");
                 helper.bindingDataRender( "ti_" + label , data , "ri_" + label ) ; 
                 common.loadgif("none");
             }
          });  
     },
     
     update : function( id )
     { 
      
                swal({
                        title: "Salvataggio",
                        text: "Sicuro/a di modificare i dati?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Si",
                        cancelButtonText: "No, Ho cambiato idea !",
                        closeOnConfirm: false,
                        closeOnCancel: false },
                        function (isConfirm) {
                        if (isConfirm) {
                            
                              common.loadgif("block");
                                jQuery.ajax({
                                 url: common.url + "c='.$component.'&task=update",
                                 type: "GET",
                                 data : $("#fItem").serialize(),
                                     success: function () {
                                         common.loadgif("none");
                                         swal("Bene!", "Operazione Andata a buon fine.", "success");
                                     }
                                  }); 
                            
                            
                           
                        } else {
                            swal("Operazione Cancellata", "", "error");
                        }
                    });

 
         
     },
     
      insert : function(){  
        common.loadgif("block");
        jQuery.ajax({
        url: common.url + "c="+  this.component  +"&task=insert",
        data: $("#form").serialize(),
        type: "GET",
            success: function ( data ) {
                  '.$component.'.urlsingle( $.trim(data) )
                  common.loadgif("none");
            }
         });  
     },
     
      delete : function(id){  
      

        swal({
                        title: "Salvataggio",
                        text: "Sicuro/a di cancellare i dati?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Si",
                        cancelButtonText: "No, Ho cambiato idea !",
                        closeOnConfirm: false,
                        closeOnCancel: false },
                        function (isConfirm) {
                        if (isConfirm) {
                            
                               common.loadgif("block");
                                jQuery.ajax({
                                 url: common.url + "c='.$component.'&task=delete&id=" + id,
                                 type: "GET",
                                     success: function () {
                                           common.loadgif("none");
                                           swal("Bene!", "Operazione Andata a buon fine.", "success");
                                           window.opener.location.href = window.opener.location.href;
                                           setTimeout(function(){ common.closeWin(); }, 1500);
                                     }
                                  });  
                                                       
                        } else {
                            swal("Operazione Cancellata", "", "error");
                        }
                    });




      





	   
     },
        
 };
 
';
 
}
 
 

