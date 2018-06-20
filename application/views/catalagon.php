<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>Listado de Catalagos </h2>



	<?php 	if (empty($listado)) { ?>

			<h1>Sin Catalagos</h1> 
			
	<?php	}else{ ?>
		Tienes <?php echo count($listado); ?> Catalago(s)
		<br/> <br/>

		<?php

		foreach ($listado as $catalago) {
			echo $catalago->nombre.'<br/>';
		}

		?>

	<?php		} ?>

	<a href="">Nuevo Catalago</a>


	
</body>
</html>