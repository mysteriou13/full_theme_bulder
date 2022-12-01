<?php 

namespace paypal;

class paypal{

    function __construct(){

        $file =  dirname(__FILE__);

        $pieces = explode("wp-content", $file);
      
        include($pieces[0]."/wp-config.php");
        
        $panier = $table_prefix."panier";

        define( 'panier', $table_prefix."panier");

    
    }

    function invoice($pseudo){
   
        global $wpdb;

        $r = $wpdb->get_results("SELECT * FROM  ".panier." WHERE pseudo = '$pseudo'");

        $nb = count($r)-1;

 $tab = array();

 $prix = array();


 echo "<table class = 'text-light'>";

 for($a = 0; $a <= $nb; $a++){



 $o = $r[$a]->pseudo."/".$r[$a]->item_name."/".$r[$a]->item_number."/".$r[$a]->prix;


 array_push($prix,$r[$a]->item_number*$r[$a]->prix);

echo "<tr>";

echo "<td> nom  : </td>";

echo "<td>";
echo $r[$a]->item_name;
echo "</td>

</tr>";

echo "<tr>";

echo "<td> nombre : </td> <td>
";
echo $r[$a]->item_number;

echo "</td> </tr>";

echo "<tr>  <td> prix unitaire : </td> <td>";


echo $r[$a]->prix;

echo "</td>

   </tr>";

 }

echo "</table>";

echo $total =  array_sum($prix);

        
    }

}


?>