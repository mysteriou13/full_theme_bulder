<?php 
namespace template;

class template{

    function __construct(){

        

    }

    function render($tab,$separator,$page){

         $nb = count($tab);

        $n = 0;

        for($n == 0; $n<=$nb; $n++){
       
       $t = $tab[$n];
    
       $t1 = explode($separator,$t);
  
        $l =  str_replace($t1[1],$t1[0],$page);

        $page = $l;
        
       }

    return $l;

    }

    
}

?>