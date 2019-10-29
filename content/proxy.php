<?php


function proxy($component,$tabella) {

 return   "
<?php
require_once '../conf/confXML.php';
require_once ConfXml::getParams('phyPath') . '/conf/config.php';
require_once ConfXml::getParams('phyPath') . '/model/".$component.".php';
require_once 'helper.php';

class proxy".$component." extends ".$component."
    {
        const TABLE = '".$tabella."';

        function view()
            {
                helper::displayJSON( ".$component."::m_view(  SELF::TABLE ,  helper::cleanPost() ) );
            }

        function insert()
            {
                ".$component."::m_insert( SELF::TABLE , helper::cleanPost() , 1 );  
                die();
            }

        function update()
            {
                ".$component."::m_update( SELF::TABLE , helper::cleanPost() ); 
                die();
            }

        function delete()
            {
                ".$component."::m_delete( SELF::TABLE , helper::cleanPost() ); 
                die();
            }
    }
 
\$p = new proxyHelper();
\$p->route('proxy".$component."'); ";
 
}
 
 

