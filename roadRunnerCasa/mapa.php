<?php 

    if(isset($_GET['link'])){
		
?>

<div class="mapa">
    
    <iframe src="<?php echo($_GET['link']);?>" style="border:0" class="iframe" allowfullscreen>
    </iframe>
</div>

<?php
	 } 
?>