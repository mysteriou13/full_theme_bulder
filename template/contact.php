<div>

<form  method = "POST" action = "./?login=contact&send=true">

<fieldset>

<legend>
<h1> Formulaire de contact</h1>

</legend>

<div class = "d-flex justify-content-between mb-3">

<label> *Titre </label>   <input  name = "titre" type = "text">

</div>


<div>

<div class = "d-flex justify-content-between mb-3">

<div>
<label> * nom </label>
</div>

<div>
<input type = "text" name = "nom">
</div>

</div>

<div   class = "d-flex justify-content-between mb-3">

<div>
<label> * prenom</label> 
</div>

<div>
<input type = "text" name = "prenom">
</div>

</div>

<div class = "d-flex justify-content-between mb-3">
<div>
<label> * email </label> 
</div>

<div>
<input type = "email" name = "mail">
</div>
</div>


<div class = "d-flex justify-content-between mb-3">

<div>
<label> * message</label>

</div>

<div>

<textarea type="textarea" name ="message">

   
</textarea>

</div>

</div>

<div>
  
 <input type = "submit">

</div>

</div>

</fieldset>

</form>


</div>

<?php 






if(isset($_GET['send']) && !empty($_GET['send']) && ($_GET['send'] == true ) ){

    $name = htmlspecialchars($_POST['nom']);

    $titre = htmlspecialchars($_POST['titre']);

    $prenom = htmlspecialchars($_POST['prenom']);

    $email = htmlspecialchars($_POST['mail']);

   echo $message = htmlspecialchars($_POST['message']);

    $tab = array($titre."§"."%titre%",$name."§"."%name%",$prenom."§"."%prenom%",$email."§"."%mail%",$message."§"."%text%");

    echo $page = file_get_contents($file."/template/contact.html");

  $t = $template->render($tab,"§",$page);

   $mail->sendmail(mail,$titre,$name,$t);


}


?>