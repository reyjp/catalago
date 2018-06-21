<script type="text/javascript">
            /*CLIENTES*/
            $(document).ready(function() {
                $('#catalago').dataTable( {
                    // sDom: hace un espacio entre la tabla y los controles 
                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
        
                } );
            } );
</script>

<div id="container"><br/>
	<h2 align="center">Administrador de Catalagos</h2>
	<?php
if(isset($_GET['save'])){
	echo '<div class="alert alert-success text-center">La Información  se Almaceno Correctamente</div>';
}
if(isset($_GET['delete'])){
	echo '<div class="alert alert-warning text-center">La Información  se ha Eliminado Correctamente</div>';
}
if(isset($_GET['update'])){
	echo '<div class="alert alert-success text-center">La Información  se Actualizo Correctamente</div>';
}

	
?>
<center>
<table id="catalago" border="0" cellpadding="0" cellspacing="0" class="pretty">
<thead>
<tr>
<th>ACCION</th>
<th>NOMBRE</th>
<th>ACRONIMO</th>
<th>CREADOR</th>
<th>USUARIO M</th>

<th>FECHA REGISTRO</th>
<th>FECHA MODIFICACIÓN</th>
<th>ESTATUS</th>
</tr>
</thead>
<tbody>
 <?php 
 $contador = 0;
 if(!empty($listado)){
 	foreach($listado as $catalago){
 		echo '<tr>';
		echo '<td>'
?>
		<a href="<?php echo base_url();?>index.php/catalago/agregar/<?php echo $catalago->id;?>/" class="btn btn-default">Nuevo</a>
		<a href="<?php echo base_url();?>index.php/catalago/modificar/<?php echo $catalago->id;?>/" class="btn btn-success">Editar</a>
		
		<a href="<?php echo base_url();?>index.php/catalago/eliminar/<?php echo $catalago->id; ?>" class="btn btn-danger">Eliminar</a>
<?php		
		echo '</td>';
 		echo '<td>'.$catalago->nombre.'</td>';
		echo '<td>'.$catalago->acronimo.'</td>';
		echo '<td>'.$catalago->creador.'</td>';
		echo '<td>'.$catalago->usuariom.'</td>';
		
		echo '<td>'.$catalago->fechac.'</td>';
		echo '<td>'.$catalago->fechaum.'</td>';
 			
 			/*Si es estatus mostramos en texto*/
			if($catalago->status==0){
			echo '<td>Activo</td>';
			}
			if($catalago->status==1){
			echo '<td>Inactivo</td>';
			}
 			
 	
 		echo '</tr>';
 	} 
 }

 ?>
</tbody>
</table>
</center>
</div>