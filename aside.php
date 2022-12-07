<?php 
namespace aside;

class aside extends \data\sql{

    function __construct(){

        $file =  dirname(__FILE__);

        $pieces = explode("wp-content", $file);
      
        include($pieces[0]."/wp-config.php");
        
        define( 'aside', $table_prefix."aside");

        define( 'section', $table_prefix."section");

        $aside = "
        CREATE TABLE IF NOT EXISTS ".aside." ( 
        `id` INT NOT NULL AUTO_INCREMENT , 
        `name_link` TEXT NOT NULL , 
        `link_page` TEXT NOT NULL ,
        `type_link` TEXT NOT NULL ,
         PRIMARY KEY (`id`)) ENGINE = InnoDB; 
        ";

        $table_section = "
        CREATE TABLE IF NOT EXISTS ".section." ( 
        `id` INT NOT NULL AUTO_INCREMENT , 
        `name_section` TEXT NOT NULL , 
         PRIMARY KEY (`id`)) ENGINE = InnoDB; 
        ";

        $this->create_table_menu($aside);        
   
        $this->create_table_menu($table_section);  

    }

    function affiche_aside(){

      $tab_section = $this->liste_section();
      
    $a = 0;

    for($a == 0; $a <= count($tab_section); $a++){

        echo $tab_section[$a];

     $this->liste_aside($tab_section[$a],'link_aside');
     
    }

    }

    function liste_section(){

      global $wpdb;
      
      $header = $wpdb->prefix."section"; 

      
       $section = $wpdb->get_results("SELECT name_section FROM ".$header);

       $table_section = array();

       $a = 0;

       for($a == 0; $a !== count($section); $a++){
        
        array_push($table_section,$section[$a]->name_section);

       }
       
       return $table_section;       

    }

      function liste_aside($section,$class = null)
      {

        global $wpdb;
      
       $header = $wpdb->prefix."aside"; 

       
        $mylink = $wpdb->get_results("SELECT * FROM ".$header." WHERE `section`='$section'");

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

        $section = $wpdb->prefix."section"; 

        $mysection = $wpdb->get_results("SELECT * FROM ".$section);
        
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

      <div>

      page_interne <input type = "radio" id = "page_interne" name = "lienpage" value = "1" checked="checked" onclick = "insert_aside()">

      page_externe <input type = "radio" id = "page_externe" name = "lienpage" value = "2" onclick = "insert_aside()">
 
      </div>

      <div id = "pet-select">

      <select name = "pet-select" id="pet-select">
   
      <?php
      for($a = 0; $a <= count($mylink)-1; $a++){ 
      ?>
      <option value="<?php echo $mylink[$a]->ID?>"><?php echo $mylink[$a]->post_title;?></option>
   
      <?php 
      }
      ?>
</select>
    </div>

    <div id = "link_externe">
     lien externe
     <input type = "text" name = "link_cat">
    </div>

      </div>

      <div>
        <div>
        ajouter  à la section
    </div>
    <div>

    <select name = "link_section">
      <?php
      
      for($a1 = 0;  $a1 <= count($mysection)-1; $a1++ ){

        ?>

<option value="<?php echo $mysection[$a1]->name_section?>"><?php echo $mysection[$a1]->name_section;?></option>

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

     
          if(isset($_POST['lienpage']) && !empty($_POST['lienpage'])){

            $link_page = null;
      
            if($_POST['lienpage'] == 1){
             
                $link = $_POST['pet-select'];
            
             }
             if($_POST['lienpage'] == 2){

            $link = $_POST['link_cat'];
             
          }
       
          
            
          }

      
          $wpdb->insert($aside, array(
            'name_link' => $_POST['name_link'],
            'link_page' => $link,
            'section' => $_POST['link_section'],
             'type_link'=> $_POST['lienpage'],
            
        
        ));
      

      

        }

      }

}

?>