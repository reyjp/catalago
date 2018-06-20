<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>Configuracion</h2>



	<?php 	if (empty($listado)) { ?>

			<h1>Sin Configuracion</h1> 
			
	<?php	}else{ ?>
		Tienes <?php echo count($listado); ?> Configuracion(s)
		<br/> <br/>

		<?php

		foreach ($listado as $configuracion) {
			echo $configuracion->nombre_empresa.'<br/>';
		}

		?>

	<?php		} ?>

	

	
</body>
</html>