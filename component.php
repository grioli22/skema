<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 include "/content/model.php";
     include "/content/proxy.php";
      include "/content/view.php";
       include "/content/service.php";
       include "/content/tmpl.php";

       $path = $_GET["component"];
        if (!file_exists($path)) {
            mkdir($_GET["component"] , 0700);
        }
        if (!file_exists($path. "/model")) {
             mkdir($_GET["component"] . "/model" , 0700);
        }
        
        if (!file_exists($path. "/proxy")) {
             mkdir($_GET["component"] . "/proxy" , 0700);
        }
        
        if (!file_exists($path. "/app")) {
             mkdir($_GET["component"] . "/app" , 0700);
        }
        
        if (!file_exists($path. "/app/service")) {
             mkdir($_GET["component"] . "/app/service" , 0700);
        }
        
        
        if (!file_exists($path. "/view")) {
             mkdir($_GET["component"] . "/view" , 0700);
        }
        
        if (!file_exists($path. "/view/tmpl")) {
             mkdir($_GET["component"] . "/view/tmpl" , 0700);
        }
       
        
      
       
        $fp=fopen( $_GET["component"]."/model/" .$_GET["component"] .".php",'w');
        fwrite($fp, model($_GET["component"]));
        fclose($fp);
        
        
        $fp=fopen( $_GET["component"]."/proxy/" .$_GET["component"] .".php",'w');
        fwrite($fp, proxy($_GET["component"],$_GET["tabella"]));
        fclose($fp);
        
         $fp=fopen( $_GET["component"]."/view/" .$_GET["component"] .".php",'w');
        fwrite($fp, view($_GET["component"],$_GET["cerca"],$_GET["risultato"],$_GET["column"]));
        fclose($fp);
        
          $fp=fopen( $_GET["component"]."/app/service/" .$_GET["component"] .".js",'w');
        fwrite($fp, service($_GET["component"],$_GET["dati"]));
        fclose($fp);
        
         $fp=fopen( $_GET["component"]."/view/tmpl/" .$_GET["component"] .".tpl",'w');
        fwrite($fp, tmpl($_GET["component"],$_GET["cerca"],$_GET["risultato"],$_GET["column"]));
        fclose($fp);

