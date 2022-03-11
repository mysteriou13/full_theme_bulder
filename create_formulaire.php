<?php 

namespace form;

class create_formulaire extends \data\sql{


   function __construct(){

    $form = prefix."form";
    $sql = "
    CREATE TABLE IF NOT EXISTS ".$form." ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `name_form` TEXT NOT NULL , 
    `name_input` TEXT NOT NULL ,
    `type_input` TEXT NOT NULL ,
    `class` TEXT NOT NULL ,
    `obligatoire` TEXT NOT NULL ,
     PRIMARY KEY (`id`)) ENGINE = InnoDB; 
    ";

    $this->create_table_menu($sql); 

   }

   function add_form(){

    echo "<form action = './?type=newform' method = 'post' >
    
    <p>  ajout un formulaire</p>
 
    <label>nom du formulaire </label> <input name = 'name_form' type = 'text'>
    <input type = 'submit' value = 'envoyer'>
    ";
    echo "</form>";


    global $wpdb;

     if(isset($_POST) && isset($_GET['type']) && ($_GET['type']) == 'newform' ){

    $wpdb->insert(prefix."form", array(

        "name_form" => $_POST['name_form'],
        
    ));

    $charset_collate = $wpdb->get_charset_collate();
    
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
  
  }

   }

   function liste_form(){

    global $wpdb;
      
    
    $form = "wp_form";
   
    $liste_form = $wpdb->get_results("SELECT * FROM  $form ");
   
     $nb_form = count($liste_form)-1; 
 
     echo "<div class ='d-flex justify-content-evenly'>";

     for($nb = 0; $nb <= $nb_form; $nb++){

      $link = "./?menu=".$liste_form[$nb]->id;

    echo "<div>";
    
    echo "<a href = '$link' >".$liste_form[$nb]->name_form."</a>";

    echo "</div>";  

    }
    echo "</div>";


   }


    function new_input(){

        $input = ['text','password','radio', 'checkbox', 'file','hidden','reset','button',"textarea",'submit'];

         $nbinput = count($input)-1;
   
         $hote = $_SERVER['HTTP_HOST']; 

         echo "

         <p> creer un  formulaire </p>
      
         <form action ='' method = 'POST'>
         

         <label> type de de champ </label>
         
         <SELECT name = 'type_input' >";

         $nb = -1;

          while($nb <= $nbinput-1){

            $nb++;

            echo "<OPTION value = '".$nb."'>"; echo $input[$nb]; echo "</OPTION>";

          }  


         echo "</SELECT>
             <label> nom du champs <input name = 'name_champs' type = 'text'> 
             <label> champs obligatoire </label> 
             <input type = 'radio' name = 'olichamp' value = 'oui'>
             <label>oui </label>
             <input type = 'radio' name = 'olichamp' value = 'non'>
             <label> non</label>
             
             <input type = 'submit' value = 'ajouter au  formulaire'>

             
         ";

    }




}



?>