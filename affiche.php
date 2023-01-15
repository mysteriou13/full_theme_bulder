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

    /*menu categeroy*/

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

  
   /*affchage des card post  dans la page d'acceuil*/

    function affiche_liste_post(){

      /*recuperation des post*/
   $post =  $this->liste_post();

    $count = count($post)-1;

    $c = 0;

    /*nombre d 'element par ligje*/
    $el = 4;

    /*   nombre de card par page*/
    $el_page = 20;

    $tab = [];

    /* ajout des post id dans dan le tab*/

    for($c = 0; $c <= $count; $c++){

      array_push($tab, $c);

    }

   /*element par par page*/

   $tab_page = array_chunk($tab,$el_page);

   $t = 0;

   $cout_page  = count($tab_page)-1;

   $c = 0;

   /*parcourir les page*/

   echo "<div class = 'divpage'>";

   for($c = 0; $c  <= $cout_page; $c++){

      $page = $c+1;

      $link_page = site_url()."/?nbpage=".$c;

      echo "<div>";

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

   /*ligne des page*/

  $tab_ligne = array_chunk($tab_page[$nbpage],$el);


  $i = 0;

  $keys = array_keys($tab_ligne); 

  /*boucle affichage des post dans la page d'acceuil*/
  for($i = 0; $i < count($tab_ligne); $i++) { 
   echo "<div class = ' ligne_card_box'>";
   
   
   foreach($tab_ligne[$keys[$i]] as $key => $value) { 

       $link  =  get_permalink($post[$value]->ID);

      echo "<a href  = '$link'> ";
      
      echo "<div class = 'card_post'>";

      echo "<div class = 'card_image_post'>";
        
     $url = wp_get_attachment_url( get_post_thumbnail_id($post[$value]), 'thumbnail' );

echo "<img   class = 'bordure_card img ' src= ".$url.">"; 

       echo "</div>"; 

       echo "<div class = 'text_card_index'>";

       echo $post[$value]->post_excerpt."...";


        ?>


        <?php

    



       echo "<div> poste le &nbsp;";

       
       $date = $post[$value]->post_date_gmt;

       $date = explode(" ", $date);

       echo $date[0];

       echo "</div>";

       echo "<div> par &nbsp;";

      echo $this->autor_post($post[$value]->post_author);

       echo "</div>";

       

       ?>

<div class="bloc-partage">
<div class = "text-light">
   Partager
   </div>
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<a href="http://twitter.com/share" target="blank" data-url="<?php the_permalink() ?>" data-via="<?php bloginfo('name'); ?>" data-text="<?php the_title(); ?>" data-count="horizontal">
 <img alt="Partager sur Twitter" src="<?php bloginfo('template_url'); ?>/image/partager-twitter.png" />
</a>
<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" target="blank">
 <img alt="Partager sur Facebook" src="<?php bloginfo('template_url'); ?>/image/partager-facebook.png" />
</a>
<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank">
 <img alt="Partager sur Linkedin" src="<?php bloginfo('template_url'); ?>/image/partager-linkedin.png" />
</a>
<a href="https://www.scoop.it/bookmarklet?url=<?php the_permalink();?>" target="_blank">
 <img alt="Partager sur Scoopit!" src="<?php bloginfo('template_url'); ?>/image/partager-scoopit.png" />
</a>
<a href="https://plus.google.com/share?url=<?php the_permalink();?>" target="_blank">
 <img alt="Partager sur Google+" src="<?php bloginfo('template_url'); ?>/image/partager-googleplus.png" />
</a>
<div class="clear"></div>
</div>


     <?php

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


   $this->liste_post_by_category($cat,2);

}


function menu_liste_post(){

$post =  $this->liste_post();

$count = count($post)-1;

$c = 0;

echo "<select name = 'select_link'>";

for($c == 0; $c <=  $count; $c++ ){
 
   echo "<option value = ";echo $post[$c]->ID; echo ">";

echo ($post[$c]->post_title);

   echo "</option>";
}

echo "</select>";



}     

function afficher_el_header(){

global $wpdb;

$header = $wpdb->prefix."menu_header"; 


   $results = $wpdb->get_results( "SELECT * FROM $header" );


}

}
   





?>