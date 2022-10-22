<?php 


if(isset($_POST['pseudo']) && !empty($_POST['pseudo']) ){


    if(username_exists(htmlspecialchars($_POST['pseudo']))){
    
    
    }
}  

if(isset($_POST['mail']) && !empty($_POST['mail']) ){

    if(email_exists(htmlspecialchars($_POST['mail']))){

    

    }


}


?>