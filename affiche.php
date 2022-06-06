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


    $c = 0;

    $tab = [];

    for($c = 0; $c <= $count; $c++){

      array_push($tab, $c);

    }


   $tab_page = array_chunk($tab,20);

   $t = 0;

   $cout_page  = count($tab_page)-1;

   $c = 0;


   $el = 4;

   echo "<div class = 'd-flex'>";

   for($c = 0; $c  <= $cout_page; $c++){

      echo "<div>";

      echo $c;

      echo "</div>";

   }

   echo '</div>';

  $tab_ligne = array_chunk($tab_page[0],$el);

  $i = 0;

  $keys = array_keys($tab_ligne); 


  for($i = 0; $i < count($tab_ligne); $i++) { 
   echo "<div class = 'd-flex'  style = 'width:100vh; '>";
   
   
   foreach($tab_ligne[$keys[$i]] as $key => $value) { 

       $link  =  site_url()."/?post=".$post[$value]->ID;

      echo "<a href  = '$link' style = 'text-decoration: none'> ";
      
      echo "<div>";

      echo "<div style = 'width:30vh; height:30vh'>";
        
     $url = wp_get_attachment_url( get_post_thumbnail_id($post[$value]), 'thumbnail' );

echo "<img  style = 'width:100%; height:100%;' src= ".$url.">"; 

       echo "</div>"; 

       echo "<div>";

       echo $post[$value]->post_excerpt."...";

       echo "</div>";



       echo "<div> poste le &nbsp;";

       
       $date = $post[$value]->post_date_gmt;

       $date = explode(" ", $date);

       echo $date[0];

       echo "</div>";

       echo "<div> par &nbsp;";

      echo $this->autor_post($post[$value]->post_author);

       echo "</div>";


       echo "</div>";

       echo "</a>";

   
      } 

   

   echo "</div>"; 
} 


   $a = 0;

   
   /*
    for($a == 0; $a <= $count; $a++ ){

    echo "<div> <div> <strong>";

    echo $post[$a]->ID."</strong>";
 
    echo "</div>";

 $rest = substr($post[$a]->post_content, 0, 550);


 echo "</div>";

   }
  
   */

}
  

    
function liste_post_category($type){

   global $wpdb;

   $liste = $this->post_category($type);

   


}

        

}
   





?>