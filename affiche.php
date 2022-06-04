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
   
    function affiche_liste_post(){

   $post =  $this->liste_post();

    $count = count($post)-1;

   $a = 0;

    for($a = 0; $a <= $count; $a++ ){

    echo "<div> <div> <strong>";

    echo $post[$a]->post_title."</strong>";
 
    echo "</div>";

 $rest = substr($post[$a]->post_content, 0, 550);

 echo $rest."...";

 echo "</div>";

   }

}
    

    
function liste_post_category($type){

   global $wpdb;

   $liste = $this->post_category($type);

   


}

        

}
   





?>