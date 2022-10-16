<div>
    <form  method = "POST" action = "./?login=forgot_login">

    <div>
        
    <label> mot de pass oublier</label>

</div>

<div>
    <label> adress mail </label> <input type = "email" name = "email_forgot"> 
    
    <input type = "submit" value = "envoyer">
</div>


</form>

</div>

<?php 

if(isset($_POST["email_forgot"])){

    echo "post";

    $email = htmlspecialchars($_POST["email_forgot"]);

    $pass = wp_hash_password('amit');

    $execute = $wpdb->query
    ("
    UPDATE $wpdb->prefix.'users' 
    SET `user_pass` = '$pass' 
    WHERE `user_email` = '$email'
    ");
    
    $mail->sendmail($email,"test","name_send", $file."/template/mail_forgot.html");


    }


?>