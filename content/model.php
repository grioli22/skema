<?php


function model( $component ) {

 return   "
<?php require_once ConfXml::getParams('phyPath') . '/model/Custom.php';
require_once ConfXml::getParams('phyPath') . '/model/helper.php';
 
class ".$component." extends Custom
{
 
    public static function m_view(\$table , \$args = array())
    {
		return connection::exeq(
                    Custom::viewGeneric( \$table, \$args, null,null,null, null,null )
                ,1);          
    }
    
    public static function m_insert(\$table , \$args = array(), \$last=NULL)
    {
       echo connection::exeq(
               Custom::insGeneric( \$table , \$args )
               ,''
               ,\$last
               );
    } 

    public static function m_update(\$table , \$args = array())
    {
        connection::exeq(
                Custom::modifyGeneric( \$table , \$args, 'id' )
                );
    }
    
     public static function m_delete(\$table , \$args = array())
    {
          connection::exeq(
                Custom::delGeneric(\$table , \$args ,'id')
                );
    }
      
} ";
 
}
 
 

