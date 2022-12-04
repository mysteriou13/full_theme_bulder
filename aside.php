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

        $mylink = $wpdb->get_results("SELECT * FROM ".$header);
        
        $a = 0;

        $count = count($mylink)-1;


        for($a = 0;  $a <= $count; $a++){

         
           ?>
           <div>
           <a class = "<?php echo $class ?>" href = "<?php  echo site_url()."?p=".$mylink[$a]->link_page; ?>"> <?php echo $mylink[$a]->name_link?> </a>
           </div>
           <?php

        }

      

      }

      function insert_aside(){
        
        global $wpdb;
      
       $header = $wpdb->prefix."posts"; 

        $mylink = $wpdb->get_results("SELECT * FROM ".$header." WHERE post_status = 'publish' && post_type = 'post' ");

        $aside = $wpdb->prefix."aside"; 

        $aside1 = $wpdb->get_results("SELECT * FROM ".$aside);
        

        ?>

      <form method = "POST" action = "./?aside=insert">
      <div>

  
      <div>
  

      <div>
      ajout un lien  
    </div>
      
    <div class = "d-flex">

      <div>
      <label> nom du lien</label> 
      </div>

      <div>
      <input type = "text" name = "name_link">
      
      </div>
      
    </div>

      <div>
     
      <div>
      <label> lien vers la page </label>
      </div>
      <div>

      <select name="link_post" id="pet-select">
   
      <?php
      for($a = 0; $a <= count($mylink)-1; $a++){ 
      ?>
      <option value="<?php echo $mylink[$a]->ID?>"><?php echo $mylink[$a]->post_title;?></option>
   
      <?php 
      }
      ?>
</select>

      </div>

      <div>
        <div>
        ajouter  à la section
    </div>
    <div>

    <select name = "link_cat">
      <?php
      
      for($a1 = 0;  $a1 <= count($aside1)-1; $a1++ ){

        ?>

<option value="<?php echo $aside1[$a1]->section?>"><?php echo $aside1[$a1]->section;?></option>

        <?php

      
      }
      
      ?>
    </select>

    </div>

    </div>

      <div>
    </div>

      </div>

      </div>

      <div>
      <input type = "submit">

      </div>
      </div>

      </form>

        <?php
        
        if(isset($_GET['aside']) && !empty($_GET['aside'])){

                
          $wpdb->insert($aside, array(
            'name_link' => $_POST['name_link'],
            'link_page' => $_POST['link_post'],
            'section' => 'test', // ... and so on
        ));

      

        

        }

      }

}

?>