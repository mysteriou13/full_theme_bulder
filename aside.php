<?php 
namespace aside;

class aside extends \data\sql{

    function __construct(){

        $file =  dirname(__FILE__);

        $pieces = explode("wp-content", $file);
      
        include($pieces[0]."/wp-config.php");
        
        define( 'db_aside', $table_prefix."aside");


        $aside = "
        CREATE TABLE IF NOT EXISTS ".aside." ( 
        `id` INT NOT NULL AUTO_INCREMENT , 
        `name_link` TEXT NOT NULL , 
        `link_page` TEXT NOT NULL ,
         PRIMARY KEY (`id`)) ENGINE = InnoDB; 
        ";

        $this->create_table_menu($aside);        
   


    }

}

?>