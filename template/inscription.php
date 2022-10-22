
<form id = "form_inscription"   action = "<?php $_SERVER['PHP_SELF']?>" method = "POST" >
	<div  id = "form_inscription">
		<div class = "d-flex justify-content-between margin_bottom_submit">
			<div>
				<label for = "pseudo"> pseudo </label>
			</div>
			<div >
				<div>
					<input  id = "pseudo" name = "login" type = "text" value = "<?php 
					
					if(isset($_POST['login']) && !empty($_POST['login'])){

						echo $_POST['login'];

					}

					?>">
				</div>
				<div id = "error_pseudo">
					
				<?php

      			if(isset($_POST['login']) && !empty($_POST['login']) ){


					if(username_exists(htmlspecialchars($_POST['login']))){
					
						echo "pseudo pris";
						
					
					}
				}  

				?>

				</div>
			</div>
		</div>
		<div  class = "d-flex justify-content-between margin_bottom_submit">
			<div>
				<label for = "pass"> mot de pass (8 caratere minimum)</label>
			</div>
			<div>
				<div>
					<input  id = "pass"  name = "password" type = "password">
				</div>
				<div id = "taill_password"></div>
			</div>
		</div>
		<div  class = "d-flex justify-content-between margin_bottom_submit">
			<div>
				<label for = "verif_pass">  repeter mot de pass </label>
			</div>
			<div>
				<div>
					<input  id = "verif_pass" name = "verif_pass" type = "password">
				</div>
				<div id = "error_verif_pass"></div>
			</div>
		</div>
		<div  class = "d-flex justify-content-between margin_bottom_submit">
			<div>
				<label for = "mail"> email </label>
			</div>
			<div>
			
			<div>
			<input id = "email"  name = "mail" type = "email" value = "<?php 
			
			if(isset($_POST['mail']) && !empty($_POST['mail']) ){

				echo $_POST['mail'];
			}
			
			?>">
		     </div>
			 
			 <div>
			 <?php 
			 
			 if(isset($_POST['mail']) && !empty($_POST['mail']) ){

            if(email_exists(htmlspecialchars($_POST['mail']))){


				echo "mail pris";

           }


           }

    ?>

		     </div>

			</div>
		</div>
		<div  id = "but_submit" class = "center_button">
			<div>
				<input type = "button"  id = "sub_inscription" value = "envoyer">
			</div>
		</div>
	</div>
</form>
<?php 



if( isset($_POST['login']) && !empty($_POST['login'])  && isset($_POST['mail']) && !empty($_POST['mail']) ){

if(!username_exists(htmlspecialchars($_POST['login']))){

	if(!email_exists(htmlspecialchars($_POST['mail']))){


	wp_create_user(htmlspecialchars($_POST['login']),htmlspecialchars($_POST['verif_pass"']), htmlspecialchars($_POST['mail']));


	echo "<meta http-equiv='refresh' content='0;URL=".site_url()."?login=inscriptionvalide'>";


	}

}
}



?>
