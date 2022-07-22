<?php 
namespace menu_header{

class menu_header extends \data\sql{

    function __construct(){
      global $wpdb;

 
    

      $header = $wpdb->prefix."menu_header";
  
      $menu_ligne = $wpdb->prefix."menu_ligne";
      $sql = "
      
      CREATE TABLE  IF NOT EXISTS $header (
        id int NOT NULL AUTO_INCREMENT,
        `name` text NOT NULL,
  `link` text NOT NULL,
  `admin` text NOT NULL,
  `membre` text NOT NULL,

        PRIMARY KEY (id)
    ); 

      ";
    
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);




        $sql1 = "
      
      CREATE TABLE  IF NOT EXISTS $menu_ligne (
        id int NOT NULL AUTO_INCREMENT,
        `el_ligne` text NOT NULL,
  `ligne` text NOT NULL,
  
        PRIMARY KEY (id)
    ); 

      ";
    
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql1);

  
  

    }

    function add_el_header($name,$link,$admin,$membre){

      global $wpdb;

     $wpdb->insert($wpdb->prefix."menu_header", array(
        'name' => $name,
        'link' => $link,
        'admin' => $admin, 
        'membre'=> $membre,
    ));


    }
  }

}
?>