<h2>Nuevo catalago</h2>






<?php




$input_nombre 	  = array(
	'name'        => 'nombre',
	'id'          => 'nombre',
	'maxlenght'	  => '50',	
	'size'        => '100',
	'value'       => set_value('nombre',@$datos_catalago[0]->nombre)
	);

$input_acronimo 	  = array(
	'name'        => 'acronimo',
	'id'          => 'acronimo',
	'maxlenght'	  => '50',	
	'size'        => '100',
	'value'       => set_value('acronimo',@$datos_catalago[0]->acronimo)
	);

$input_creador 	  = array(
	'name'        => 'creador',
	'id'          => 'creador',
	'maxlenght'	  => '50',	
	'size'        => '100',
	'value'       => set_value('creador',@$datos_catalago[0]->creador)
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

<?php echo form_input($input_nombre) ?><?php echo form_error('nombre'); ?> <br/><br/>

<?php echo form_label('Acronimo') ?> <br/>

<?php echo form_input($input_acronimo) ?><?php echo form_error('acronimo'); ?> <br/><br/>

<?php echo form_label('Creador') ?> <br/>

<?php echo form_input($input_creador) ?><?php echo form_error('creador'); ?> <br/><br/>

<?php echo form_label('Usuario') ?> <br/>

<?php echo  form_dropdown('usuariom', $CampoOpcionesTipo, set_value('usuariom',@$datos_catalago[0]->usuariom)) ?><br/><br/>

<?php echo form_label('Status') ?> <br/>

<?php echo  form_dropdown('status', $opciones, set_value('status',@$datos_catalago[0]->status)) ?><br/><br/>

<?php echo form_submit('btn_enviar', 'Guardar!') ?>


<?php echo form_close() ?>

