<h2>Nuevo catalago</h2>


<br/> <br/>



<?php


$input_nombre 	  = array(
	'name'        => 'nombre',
	'id'          => 'nombre',
	'maxlenght'	  => '50',	
	'size'        => '100',
	
	);

$input_acronimo 	  = array(
	'name'        => 'aronimo',
	'id'          => 'acronimo',
	'maxlenght'	  => '50',	
	'size'        => '100',
	
	);

$input_creador 	  = array(
	'name'        => 'creador',
	'id'          => 'creador',
	'maxlenght'	  => '50',	
	'size'        => '100',
	
	);

$input_usuariom 	  = array(
	'name'        => 'usuariom',
	'id'          => 'usuariom',
	'maxlenght'	  => '50',	
	'size'        => '100',
	
	);

$CampoOpcionesTipo = array(
	'0'               	=> '---SELECCIONE TIPO DE USUARIO---',
	'Administrador'		=> 'Administrador',
	'Invitado'	    	=> 'Invitado',
	);

$opciones =  array(
	'NONE'   => '---SELECCIONE ESTATUS---',
	'0'	     => 'Activo',
	'1'      => 'Inactivo',
	);
 
?>

<?php echo form_open() ?> <br/>

<?php echo form_label('Nombre') ?> <br/>

<?php echo form_input($input_nombre) ?> <br/><br/>

<?php echo form_label('Acronimo') ?> <br/>

<?php echo form_input($input_acronimo) ?> <br/><br/>

<?php echo form_label('Creador') ?> <br/>

<?php echo form_input($input_creador) ?> <br/><br/>

<?php echo form_label('Usuario') ?> <br/>

<?php echo  form_dropdown('usuariom', $CampoOpcionesTipo) ?><br/><br/>

<?php echo form_label('Status') ?> <br/>

<?php echo  form_dropdown('status', $opciones) ?><br/><br/>

<?php echo form_submit('btn_enviar', 'Guardar!') ?>


<?php echo form_close() ?>

