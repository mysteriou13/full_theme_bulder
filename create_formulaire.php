<?php 

namespace form;

class create_formulaire extends \data\sql{


   function __contruct(){


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