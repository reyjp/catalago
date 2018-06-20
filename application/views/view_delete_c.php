<h1>Eliminar Catalago</h1>


Esta seguro de eliminar el catalago: <strong><?php echo $datos_catalago[0]->nombre ?></strong><br/>

<?php 


$input_id = array(
		'id'         => $datos_catalago[0]->id





); 


?>


<?php echo form_open() ?> <br/>


<?php echo form_hidden($input_id) ?>

<?php echo form_submit('btn_enviar', 'Si deseo eliminarlo!') ?>


<?php echo form_close() ?>