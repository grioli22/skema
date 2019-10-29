<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    include "/content/model.php";
     include "/content/proxy.php";
      include "/content/view.php";
       include "/content/service.php";
       include "/content/tmpl.php";
 

  if($_POST){
      
      
      mkdir($_POST["component"] , 0700);
      mkdir($_POST["component"] . "/model" , 0700);
      mkdir($_POST["component"] . "/proxy" , 0700);
      mkdir($_POST["component"] . "/app" , 0700);
      mkdir($_POST["component"] . "/app/service" , 0700);
      mkdir($_POST["component"] . "/view" , 0700);
      mkdir($_POST["component"] . "/view/tmpl" , 0700);
      
       
        $fp=fopen( $_POST["component"]."/model/" .$_POST["component"] .".php",'w');
        fwrite($fp, model($_POST["component"]));
        fclose($fp);
        
        
        $fp=fopen( $_POST["component"]."/proxy/" .$_POST["component"] .".php",'w');
        fwrite($fp, proxy($_POST["component"],$_POST["tabella"]));
        fclose($fp);
        
         $fp=fopen( $_POST["component"]."/view/" .$_POST["component"] .".php",'w');
        fwrite($fp, view($_POST["component"]));
        fclose($fp);
        
          $fp=fopen( $_POST["component"]."/app/service/" .$_POST["component"] .".js",'w');
        fwrite($fp, service($_POST["component"]));
        fclose($fp);
        
         $fp=fopen( $_POST["component"]."/view/tmpl/" .$_POST["component"] .".tpl",'w');
        fwrite($fp, tmpl($_POST["component"]));
        fclose($fp);
      
  }

?>

 <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
 <script>
        step= 0;
        var cerca = [];
         var risultato = [];
           var column = [];
     function table(){
         
        
     
     if(step==0) {
     jQuery.ajax({
         url: "table.php?table=" +$("#tabella").val(),
         type: "GET",
             success: function ( data ) {
                 
                 data = JSON.parse(data);
                  console.log(data);
                 
                str = '';
               for (var key in data) {
    		 				var obj = data[key] ; 
                            str +=  '<b>CAMPO :' + obj + '</b><br>cerca<input name="C'+obj+'" id="C'+obj+'" type="checkbox"><br>';
                            str +=  'risultato<input name="R'+obj+'" id="R'+obj+'" type="checkbox"><br>';
    		 				str += '<hr>';
                            column.push(obj);
    		 			}
                 
                 $("#column").val(column);
                 $("#addFiled").html(str);
                 step=1
             }
          }); 
          
          }
          if(step==1){
        
                $('#addFiled input:checked').each(function() {
                    if(this.name.substring(0, 1)=== "C"){
                        cerca.push( this.name.substring(1, this.name.length) );
                 
                    }
                    if(this.name.substring(0, 1)=== "R"){
                        risultato.push( this.name.substring(1, this.name.length) );
                 
                    }
                });
                
                $("#cerca").val(cerca);
                $("#risultato").val(risultato);
                $("#component").css("display","block")
                step=2;
                
               
          }
          
          if(step==2){
        
        
             DS = $("#datisubito").prop('checked');
         
             str = "&dati=1";
             if( DS === false) str = '&dati=0';
             
        
           jQuery.ajax({
         url: "component.php?component=" +$("#component").val() + "&tabella="+$("#tabella").val() + "&cerca="+$("#cerca").val() + "&risultato="+$("#risultato").val() + "&column="+$("#column").val() + ""+str+"",
         type: "GET",
             success: function ( data ) {
                
                
             }
          });
                
               
          }
      }
     
     
 </script>

<form method="POST" id="f">
    
    <input type="text" id="component" name="component" placeholder="Componente" style="display:none;">
    <br>
     <input type="text" id="tabella" name="tabella" placeholder="tabella DB">
     <br>
     <input type="hidden" id="column" name="column">
     <input type="hidden" id="cerca" name="cerca">
     <input type="hidden" id="risultato" name="risultato">
     <br>
     Dati esposti : <input name="datisubito" id="datisubito" type="checkbox">
     <br>
    <input type="button" value="crea" name="submit" onclick="table();">
     <div id="addFiled">
         
     </div>
    
</form>