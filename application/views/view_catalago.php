
<script type="text/javascript">
            /*CLIENTES*/
            $(document).ready(function() {
                $('#catalagos').dataTable( {
                    // sDom: hace un espacio entre la tabla y los controles 
                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
        
                } );
            } );
</script>

<div id="container">
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
if(isset($_GET['permisos'])){
		echo '<div class="alert alert-success text-center">Los Permisos fueron Asignados Correctamente</div>';
	}
	if(isset($_GET['password'])){
		echo '<div class="alert alert-success text-center">La Contraseña fue actualizado Correctamente</div>';
	}
?>
<center>
<table id="catalagos" border="0" cellpadding="0" cellspacing="0" class="pretty">
<thead>
<tr>
<th>ACCION</th>
<th>NOMBRE</th>
<th>IMAGEN</th>
<th>ACRONIMO</th>
<th>FECHA REGISTRO</th>
<th>FECHA MODIFICACION</th>
<th>CREADOR</th>
<th>ESTATUS</th>

</tr>
</thead>
<tbody>
 <?php 
 $contador = 0;
 if(!empty($usuarios)){
 	foreach($usuarios as $usuario){
 		echo '<tr>';
		echo '<td>'
?>
		<a href="<?php echo base_url();?>index.php/usuarios/editar/<?php echo $usuario->ID;?>/" class="btn btn-success">Editar</a>
		
<?php		
		echo '</td>';
 		echo '<td>'.$usuario->NOMBRE.'</td>';
		echo '<td>'.$usuario->IMAGEN.'</td>';
		echo '<td>'.$usuario->ACRONIMO.'</td>';
		echo '<td>'.$usuario->FECHA_REGISTRO.'</td>';
		echo '<td>'.$usuario->FECHA_REGISTRO.'</td>';
		echo '<td>'.$usuario->CREADOR.'</td>';

 			
 			/*Si es estatus mostramos en texto*/
			if($usuario->TIPO==0){
			echo '<td>Activo</td>';
			}
			if($usuario->TIPO==1){
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