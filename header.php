<?php 
namespace menu_header;

class menu_header extends \data\sql{

    function __construct(){

        $header = prefix."table";

        $sql = "
        CREATE TABLE IF NOT EXISTS ".$header." ( 
        `id` INT NOT NULL AUTO_INCREMENT , 
        `link` TEXT NOT NULL , 
        `name` TEXT NOT NULL ,
        `admin` TEXT NOT NULL ,
        `membre` TEXT NOT NULL ,

         PRIMARY KEY (`id`)) ENGINE = InnoDB; 
        ";
        

        global $wpdb;
      $sql	= $wpdb->prepare($sql);
        $r	= $wpdb->get_results($sql);


    }


}
?>