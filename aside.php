<?php 
namespace aside;

class aside extends \data\sql{

    function __construct(){

        $file =  dirname(__FILE__);

        $pieces = explode("wp-content", $file);
      
        include($pieces[0]."/wp-config.php");
        
        define( 'aside', $table_prefix."aside");


        $aside = "
        CREATE TABLE IF NOT EXISTS ".aside." ( 
        `id` INT NOT NULL AUTO_INCREMENT , 
        `name_link` TEXT NOT NULL , 
        `link_page` TEXT NOT NULL ,
          `link_page` TEXT NOT NULL ,
         PRIMARY KEY (`id`)) ENGINE = InnoDB; 
        ";

        $this->create_table_menu($aside);        
   

    }

      function liste_aside($section , $class = null)
      {

        global $wpdb;
      
        $header = $wpdb->prefix."aside"; 

        $mylink = $wpdb->get_results("SELECT * FROM ".$header." WHERE section = '".$section."'");
        
        $a = 0;

        $count = count($mylink)-1;


        for($a = 0;  $a <= $count; $a++){

         
           ?>
           <a class = "<?php echo $class ?>" href = "<?php  echo $mylink[$a]->link_page; ?>"> <?php echo $mylink[$a]->name_link?> </a>
           <?php

        }

      

      }

}

?>