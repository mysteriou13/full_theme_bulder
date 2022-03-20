<?php 

namespace affiche;

class afficher extends \data\sql{


    function __construct(){

    }

    function affiche_page($id){

        $page = $this->select_page("page","post_content",$id);

         echo "<div>";

         print_r($page[0]);
       
         echo "</div>";

       
    }
   

    


}
   





?>