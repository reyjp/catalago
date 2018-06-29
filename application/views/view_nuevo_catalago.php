<?php


 echo '<center>';
	  echo '<table border=0 class="ventanas" width="650" cellspacing="0" cellpadding="0">';
	  echo '<tr>';
	  echo "<td height='10' class='tabla_ventanas_login' height='10' colspan='3'><legend align='center'>.: Nuevo Catalago :.</legend></td>";
	  echo '</tr>';
	  echo '<tr><td colspan=3>';
	  $attributes = array("class" => "form-horizontal", "id" => "form", "name" => "form");
	  //echo form_open("clientes/Save", $attributes);
	  echo form_open();
	  echo '<center>';
	  echo '<table border=0>';


$input_nombre 	  = array(
	'name'        => 'nombre',
	'id'          => 'nombre',
	'maxlenght'	  => '50',	
	'size'        => '100',
	'value'       => set_value('nombre',@$datos_catalago[0]->nombre)
	);


$input_imagen 	  = array(
	'name'        => 'imagen',
	'id'          => 'imagen',
	'maxlenght'	  => '50',	
	'size'        => '100',
	'type'		  => 'file',	
	'value'       => set_value('nombre',@$datos_catalago[0]->imagen)
	);

$input_pdf 	  = array(
	'name'        => 'archivo_pdf',
	'id'          => 'archivo_pdf',
	'maxlenght'	  => '50',	
	'size'        => '100',
	'type'		  => 'file',	
	'value'       => set_value('nombre',@$datos_catalago[0]->archivo_pdf)
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

<?php echo form_label('Imagen') ?> <br/>

<?php echo form_input($input_imagen) ?><?php echo form_error('imagen'); ?> <br/><br/>

<?php echo form_label('Acronimo') ?> <br/>

<?php echo form_input($input_acronimo) ?><?php echo form_error('acronimo'); ?> <br/><br/>

<?php echo form_label('Archivo PDF') ?> <br/>

<?php echo form_input($input_pdf) ?><?php echo form_error('archivo_pdf'); ?> <br/><br/>

<?php echo form_label('Creador') ?> <br/>

<?php echo form_input($input_creador) ?><?php echo form_error('creador'); ?> <br/><br/>

<?php echo form_label('Usuario') ?> <br/>

<?php echo  form_dropdown('usuariom', $CampoOpcionesTipo, set_value('usuariom',@$datos_catalago[0]->usuariom)) ?><br/><br/>

<?php echo form_label('Status') ?> <br/>

<?php echo  form_dropdown('status', $opciones, set_value('status',@$datos_catalago[0]->status)) ?><br/><br/>

<?php echo form_submit('btn_enviar', 'Guardar!') ?>


<?php echo form_close() ?>

