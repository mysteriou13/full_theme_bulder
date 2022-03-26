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
   
    function affiche_liste_post($el_ligne){

   $count_post = count(get_posts());

   $tab = [];

   $c = 0;

    for($c == 0; $c < $count_post; $c++){

       array_push($tab,get_posts()[$c]->post_content);

    }

    $l = array_chunk($tab, $el_ligne);

     $n = 0;

     for($n == 0; $n <= count($l)-1; $n++){

      $n1 = 0;

     $c =  count($l[0]);

     echo "<div class = 'd-flex justify-content-between text-light' >";
     for($n1 == 0; $n1 <= $c; $n1++){

  echo "<div>".$l[$n][$n1]."</div>";

     }

     echo "</div>";
 
     }
    

}
    

    



        

}
   





?>