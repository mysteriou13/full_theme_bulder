<?php
namespace data;

class sql{

    function __construct(){

    
      $file =  dirname(__FILE__);

        $pieces = explode("wp-content", $file);
      
        include($pieces[0]."/wp-config.php");
        
        define( 'db_menu', $table_prefix."menu");

        define( 'prefix', $table_prefix);


        $sql = "
        CREATE TABLE IF NOT EXISTS ".db_menu." ( 
        `id` INT NOT NULL AUTO_INCREMENT , 
        `link` TEXT NOT NULL , 
        `name` TEXT NOT NULL ,
         PRIMARY KEY (`id`)) ENGINE = InnoDB; 
        ";

        $this->create_table_menu($sql);        
   
        }



        function is_site_admin(){
          return in_array('administrator',  wp_get_current_user()->roles);

       
        }
        
        
        
      
        function start_menu() {
        
          if ($this->is_site_admin() == 1) {
        
            $this->select_menu();
          
        }
 
         $this->affiche_menu();

        }

        
    function create_table_menu($sql){

      global $wpdb;
    
      $charset_collate = $wpdb->get_charset_collate();
    
      require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
      dbDelta( $sql );
    
    }



function add_el_menu($name_menu,$link_menu){

  global $wpdb;

 $wpdb->insert(db_menu, array(
     "link" => $name_menu,
    "name" =>  $link_menu
     
 ));
 }

function affiche_menu(){

global $wpdb;

 $logout = "/?action=logout";


  $liste_menu = $wpdb->get_results("SELECT * FROM ".db_menu);

    echo "<div class = 'd-flex justify-content-around'>";

  foreach ($liste_menu as $row) {


 echo "<div><a href ='".$row->name."'>".$row->link."</a></div>";

  }

  echo "</div>";

  if(isset($_GET['action']) == 'logout' ){

    wp_logout();

    header('Location: /');

  }

  if(is_user_logged_in()){

echo "<a href='.$logout.'>Logout</a>";


  }

  }


  function liste_page($type,$data){

    global $wpdb;
    
  
     $post =   prefix."posts";
    
     $liste_page = $wpdb->get_results("SELECT $data FROM  $post WHERE post_type = '$type' && post_status = 'publish'");
    
    $tab = [];
    
    foreach ($liste_page as $row) {
    
      
    $a = $row->$data;
    
    array_push($tab, $a);
    
    
    }
    
    return $tab;
    
    }


    function select_page($type,$data,$id){

      global $wpdb;
      
    
       $post =   prefix."posts";
      
       $liste_page = $wpdb->get_results("SELECT $data FROM  $post WHERE   id = $id ");
      
      $tab = [];
      
      foreach ($liste_page as $row) {
      
        
      $a = $row->$data;
      
      array_push($tab, $a);
      
      
      }
      
      return $tab;
      
      }


      function select_menu(){

        $listepage = $this->liste_page("page","post_title");

        $listeid = $this->liste_page("page","ID");

          $nblistepage = count($listepage)-1;

          $nblisteid = count($listeid)-1;

         
           echo "<form action = './' method = 'post'>";

          echo 'choisir la page  <SELECT name="link_menu" size="1">';

          $nb = -1;

          while($nb <= $nblistepage -1){

            $nb++;

            echo "<OPTION value ='".$listeid[$nb]."'>".$listepage[$nb];

          }

          echo '<SELECT>';

         echo 'nom du lien <input type = "text" name = "name_link"> ';    
            echo " <input type = 'submit'></form>";

            if(isset($_POST['link_menu']) && isset($_POST['name_link'])){

              $this->add_el_menu($_POST['name_link'],$_POST['link_menu']);
        
            }
      }


        function liste_category(){

          global $wpdb;

           $term = prefix."terms";

          $category = $wpdb->get_results("SELECT * FROM $term ");

           $nb =  count($category)-1;

           for($n = 0; $n <= $nb; $n ++){

            $link = 'index.php/category='.$category[$n]->term_id;

           echo "<a href =$link >".$category[$n]->name."</a></br>";

           }

        }

        function post_category($type){

           global $wpdb;

            $term = prefix."term_relationships";

          $category = $wpdb->get_results("SELECT * FROM $term  WHERE term_taxonomy_id = $type ");

          $nb =  count($category)-1;

          $tab = [];
      
           for($n = 0; $n <= $nb; $n++){

            array_push($tab, $category[$n]->object_id);

           }

           return $tab;

        }

       

        function liste_post_by_category($cat,$el_page){

          global $wpdb;

          $terme = prefix."term_relationships";

          $p = prefix."posts";

          $c = 0;

          $tab = [];

            $tab_post = [];

              $category = $wpdb->get_results("SELECT object_id FROM  $terme WHERE term_taxonomy_id ='$cat'");

              $page = array_chunk($category,5);



              
              $c = 0;

              echo "<div class = 'd-flex justify-content-around'>";

              for($c = 0; $c<=count($page)-1; $c++){

                $link = site_url()."?cat=".htmlspecialchars($_GET['cat'])."&page=".$c;

                echo "<div>";

                 echo "<a href = '$link'>"."page".$c."</a>";

                 echo "</div>";
              }

              echo "</div>";

              if(isset($_GET['page']) && !empty($_GET['page'])){

              $nbpage = htmlspecialchars($_GET['page']);

              }else{

                $nbpage = 0;

              }

              $el_page = count($page[$nbpage]);

             $count_el_page = array_chunk($page[$nbpage],4);

             $nb_page = count($count_el_page)-1;
             

             $a = 0;
            
             for($a = 0; $a <= $nb_page; $a++){

              echo "<div  class ='d-flex justify-content-between ligne_card_box' >";
            
              foreach ($count_el_page[$a] as &$value) {

                echo "<div class = 'card_post'>";
                
             echo "<div class = 'card_image_post' >";

             echo "<a href = '".get_permalink($value->object_id)."'>";
        
             $url = wp_get_attachment_url( get_post_thumbnail_id($value->object_id), 'thumbnail' );
        
        echo "<img  class = 'bordure_card img'  src= ".$url.">"; 
      
               echo "</div>"; 


               echo "<div class = 'text_card_index'>";

               echo get_the_title($value->object_id);

               echo "</div>";

              
               echo "<div class ='text_card_index'>";

              echo  get_the_excerpt($value->object_id)."...";


              ?>

<div>
<div>
  partager
              </div>
<div>
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
              </div>

              </div>


              <?php

               echo "</div>";

               echo "</a>";

          echo "</div>";
          
            
             $c1 = 0;

            
            }

            echo "</div>";

          }
              


              }
              


        function affiche_post(){


if(isset($_GET['p']) && !empty($_GET['p'])){

  $page = htmlspecialchars($_GET['p']);
 
 }
 
 if(isset($_GET['page_id']) && !empty($_GET['page_id'])){
 
     $page = htmlspecialchars($_GET['page_id']);
    
    }
 

       global $wpdb;

        $tab = prefix."posts";

        $post = $wpdb->get_results("SELECT * FROM  $tab WHERE ID = $page");

        return $post[0]->post_content;



        }

          function liste_post(){

            global $wpdb;

          $tab = prefix."posts";

            $post = $wpdb->get_results("SELECT * FROM  $tab   WHERE post_status = 'publish' && post_type= 'post'  ORDER BY  $tab.`ID` ASC   ");

              return $post;

          }

        function autor_post($id){

          global $wpdb;

         $tab = prefix."users";

        $autor = $wpdb->get_results("SELECT * FROM  $tab   WHERE ID=$id");
    
        print_r($autor[0]->user_login);
    

        }

    }




?>