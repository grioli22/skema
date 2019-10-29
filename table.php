<?php
 
	require_once  "../connection.php";
    
    
     $db = new connection ();
		$conn = $db->connect ();
        
        $statement = $conn->query('DESCRIBE ' . $_GET["table"] );
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
       
        $Tarr = array();
    
        foreach( $result as $column){
            $Tarr[ $column['Field'] ]= $column['Field'] ; 
        }
        
        echo( json_encode($Tarr) );
        
       
         
 

