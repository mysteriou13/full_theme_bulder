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

  function create_table(){

    
}


    function new_input(){

        $input = ['text','password','radio', 'checkbox', 'file','hidden','reset','button',"textarea",'submit'];

         $nbinput = count($input)-1;

         echo "<form method = 'post' action = './'>

         <label> type de de champ </label>
         
         <SELECT>";

         $nb = -1;

          while($nb <= $nbinput-1){

            $nb++;

            echo "<OPTION value = '".$nb."'>"; echo $input[$nb]; echo "</OPTION>";

          }  


         echo "</SELECT>
             <label> nom du champs <input type = 'text'> 
             <input type = 'radio' name = 'olichamp' value = 'oui'>  
             <label>oui </label>
             <input type = 'radio' name = 'olichamp' value = 'non'>
             <label> non</label>
             
             <input type = 'submit' value = 'ajouter au  formulaire'>

             </form>
         ";

    }

}



?>