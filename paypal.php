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

echo "</td>

   </tr>";

 }

echo "</table>";

echo $total =  array_sum($prix);

$this->button_paypal($total);
        
    }


    function button_paypal($total){

echo '
        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_xclick">
              <input type="hidden" name="business" value="<?php echo $email_business?>">
              <input type="hidden" name="item_name" value="<?php echo $item_name;?>">
              <input type="hidden" name="item_number" value="<?php echo $number;?>">
              <input type="hidden" name="amount" value="<?php echo $total;?>">
              <input type="hidden" name="shipping" value="2">
              <input type="hidden" name="no_note" value="1">
              <input type="hidden" name="currency_code" value="EUR">
              <input type="hidden" name="lc" value="AU">
              <input type="hidden" name="bn" value="PP-BuyNowBF">
            <input type="hidden" name="hosted_button_id" value="6RNT8A4HBBJRE">
          
            <div>
          
            <div>
              
             </div>
          
             <div>
           
             total';
              echo $total." &nbsp;EUR";

             echo '
              </div>
          
          
            </div>
          
            <input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_buynow_107x26.png" alt="Buy Now">
            <img alt="" src="https://paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
          </form>
';


    }

}

?>