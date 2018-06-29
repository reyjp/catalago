<br>
<form  autocomplete="off" class="form-inline" id="formArchivos">
  <center>
    <label>Nombre del documento: </label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="fa fa-file" aria-hidden="true"></i>
      </span>
      <input type="text" name="nombre" placeholder="Nombre del documento" class="form-control" required="required"/>
    </div>
    <button class="btn btn-light btn-sm" id="upFile"><i class="fa fa-upload" id="ico-btn-file" aria-hidden="true"></i></button>

    <input type="file" name="archivo" id="getFile" class="hidden" required="required" accept="application/pdf" />
    <input type="submit" form="formArchivos" id="smtArchivo" class="btn btn-success btn-sm" value="Agregar" /><br />
  </center>
</form>



<br>
<br>
<br>
<table id="tabla-archivos" class="table table-striped table-bordered dt-responsive nowrap table-hover table-condensed" cellspacing="0" width="100%" style="background: white!important">
  <thead>
    <tr>
      <th class="text-center bg-primary">Num</th>
      <th class="bg-primary">Descripción del archivo adjunto</th>
      <th class="text-center bg-primary">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $contador = 1;
    foreach ($archivos as $archivo) {
      ?>
      <tr>
        <td class="text-center"><?=$contador?></td>
        <td><?=$archivo['nombre'] ?></td>
        <td class="text-center">
          <a class="btn btn-primary btn-xs" href="<?=base_url()?>principal/verArchivo/<?=$archivo['id']?>" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>
          <button class="btn btn-danger btn-xs delArchivo" data-id="<?=$archivo['id']?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
        </td>
      </tr>
      <?php
      $contador++;
    }
    ?>

  </tbody>
</table>
