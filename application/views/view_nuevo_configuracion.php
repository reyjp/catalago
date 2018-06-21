<h2>Nueva Configuracion</h2>





<?php




$input_nombre 	  = array(
	'name'        => 'nombre_empresa',
	'id'          => 'nombre_empresa',
	'maxlenght'	  => '50',	
	'size'        => '100',
	'value'       => set_value('nombre',@$datos_configuracion[0]->nombre_empresa)
	);

$input_abreviatura 	  = array(
	'name'        => 'abreviatura',
	'id'          => 'abreviatura',
	'maxlenght'	  => '50',	
	'size'        => '100',
	'value'       => set_value('abreviatura',@$datos_configuracion[0]->abreviatura)
	);

$input_link 	  = array(
	'name'        => 'link',
	'id'          => 'link',
	'maxlenght'	  => '50',	
	'size'        => '100',
	'value'       => set_value('link',@$datos_configuracion[0]->link)
	);

$input_linkf 	  = array(
	'name'        => 'linkf',
	'id'          => 'linkf',
	'maxlenght'	  => '50',	
	'size'        => '100',
	'value'       => set_value('linkf',@$datos_configuracion[0]->linkf)
	);

$input_linkg	  = array(
	'name'        => 'linkg',
	'id'          => 'linkg',
	'maxlenght'	  => '50',	
	'size'        => '100',
	'value'       => set_value('linkg',@$datos_configuracion[0]->linkg)
	);
 
$input_linkl 	  = array(
	'name'        => 'linkl',
	'id'          => 'linkl',
	'maxlenght'	  => '50',	
	'size'        => '100',
	'value'       => set_value('linkl',@$datos_configuracion[0]->linkl)
	);

$input_linkt	  = array(
	'name'        => 'linkt',
	'id'          => 'linkt',
	'maxlenght'	  => '50',	
	'size'        => '100',
	'value'       => set_value('linkt',@$datos_configuracion[0]->linkt)
	);
 
?>







<?php echo form_open() ?> <br/>

<?php echo form_label('Nombre') ?> <br/>

<?php echo form_input($input_nombre) ?><?php echo form_error('nombre_empresa'); ?> <br/><br/>

<?php echo form_label('Abreviatura') ?> <br/>

<?php echo form_input($input_abreviatura) ?><?php echo form_error('abreviatura'); ?> <br/><br/>

<?php echo form_label('Link') ?> <br/>

<?php echo form_input($input_link) ?><?php echo form_error('link'); ?> <br/><br/>

<?php echo form_label('Link Facebook') ?> <br/>

<?php echo form_input($input_linkf) ?><?php echo form_error('linkf'); ?> <br/><br/>

<?php echo form_label('Link Google') ?> <br/>

<?php echo form_input($input_linkg) ?><?php echo form_error('linkg'); ?> <br/><br/>

<?php echo form_label('Link Linkedin') ?> <br/>

<?php echo form_input($input_linkl) ?><?php echo form_error('linkl'); ?> <br/><br/>

<?php echo form_label('Link Twitter') ?> <br/>

<?php echo form_input($input_linkt) ?><?php echo form_error('linkt'); ?> <br/><br/>




<?php echo form_submit('btn_enviar', 'Guardar!') ?>


<?php echo form_close() ?>

