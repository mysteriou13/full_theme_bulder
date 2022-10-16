<div id="billet" >

<?php 
	
	 $url = wp_get_attachment_url( get_post_thumbnail_id(htmlspecialchars($_GET['p'])), 'thumbnail' );
    

	
	$u = explode("uploads",$url);



     $u = site_url()."/wp-content/uploads".$u[1];



	?>

<div style = 'width:30vh; height:30vh '>

	<?php
	echo "<img  style = 'object-fit:cover; width:100%; height:100%;' src= ".$u.">"; 
  
	?>

</div>

	<?php

	echo "<h1>$title</h1><p>$contenu</p><strong>$date</strong>"; 

	?>

</div>

</div>


</div>


</div>


 
</div>


</div>




</div>
