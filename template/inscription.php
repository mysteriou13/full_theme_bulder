<form id = "form_inscription">
	<div>
		<div class = "d-flex justify-content-between margin_bottom_submit">
			<div>
				<label for = "pseudo"> pseudo </label>
			</div>
			<div >
				<div>
					<input  id = "pseudo" type = "text">
				</div>
				<div id = "error_pseudo">
				
				</div>
			</div>
		</div>
		<div  class = "d-flex justify-content-between margin_bottom_submit">
			<div>
				<label for = "pass"> mot de pass (8 caratere minimum)</label>
			</div>
			<div>
				<div>
					<input  id = "pass" type = "password">
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
					<input  id = "verif_pass" type = "password">
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
			<input id = "email" type = "email">
		     </div>

			 <div id = "error_mail">
			
		     </div>

			</div>
		</div>
		<div  id = "but_submit" class = "center_button">
			<div>
				<input type = "button"  id = "sub_inscription"value = "envoyer">
			</div>
		</div>
	</div>
</form>
<?php include($full_theme_hiki."/php/form_inscription.php");?>
