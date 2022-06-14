<?php 

namespace affiche;

class afficher extends \data\sql{


    function __construct(){

    }

    function affiche_page($id){

        $page = $this->select_page("page","post_content",$id);

         echo "<div>";

      
       
         echo "</div>";

       
    }

    function affiche_liste_category(){

      $categories = get_categories( array(
         'orderby' => 'name',
         'order'   => 'ASC'
     ) );

     $count_categorie = count($categories)-1;

     $c = 0;

     for($c == 0; $c <= $count_categorie; $c++){

      $link = "/?cat=".$c;

      echo "<div class = 'text-light'>"; 
      
      echo "<a href = '.$link.'>";

      echo $categories[$c]->name; 
      
      echo "</div>";

     }

    }

  
   
    function affiche_liste_post(){

   $post =  $this->liste_post();

    $count = count($post)-1;

    $c = 0;

    $el = 4;

    $el_page = 20;

    $tab = [];

    for($c = 0; $c <= $count; $c++){

      array_push($tab, $c);

    }


   $tab_page = array_chunk($tab,$el_page);

   $t = 0;

   $cout_page  = count($tab_page)-1;

   $c = 0;


   echo "<div class = 'd-flex justify-content-around'>";

   for($c = 0; $c  <= $cout_page; $c++){

      $page = $c+1;

      $link_page = site_url()."/?nbpage=".$c;

      echo "<div class= ''>";

      echo "<a href = '".$link_page."'>";

      echo "page".$page;

      echo "</a>";

      echo "</div>";

   }


   echo '</div>';

   if(!isset($_GET['nbpage'])){

   $nbpage = 0;

   }else{

      $nbpage = htmlspecialchars($_GET['nbpage']);

   }

  $tab_ligne = array_chunk($tab_page[$nbpage],$el);


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

   

}
  

    
function liste_post_category($type){

   global $wpdb;

   $liste = $this->post_category($type);

}

function category_post($cat){

$cat =  htmlspecialchars($cat);


   $this->liste_post_by_category($cat,3);

}

        

}
   





?>