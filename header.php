<?php 
namespace menu_header;

class menu_header extends \data\sql{

    function __construct(){

      global $wpdb;

         $header = prefix."header";

        $sql = "
      
        CREATE TABLE `$header` (
          `id` int(11) NOT NULL,
          `name` text NOT NULL,
          `link` text NOT NULL,
          `admin` int(11) NOT NULL,
          `membre` int(11) NOT NULL,
          `ligne` int(11) NOT NULL,

        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        
      
        ";

       $sql1 = "ALTER TABLE `$header`
       ADD PRIMARY KEY (`id`);";
  
  $sql2 = "ALTER TABLE `$header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;";

        $charset_collate = $wpdb->get_charset_collate();
    
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );


        $wpdb->get_results($sql1);
        $wpdb->get_results($sql2);
        

    }


}
?>