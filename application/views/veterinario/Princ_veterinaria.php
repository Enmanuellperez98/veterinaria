<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tarea 6</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>
      <div class="container">
        <div class="text-right">
          <a href="<?php echo base_url('/usuario');?>" class="btn btn-info">User Manager</a>

          <a href="<?php echo base_url('/seguridad/salir');?>" class="btn btn-warning">Salir</a>
        </div>
        <h3>Datos Mascota</h3>
        <div class="row">
        <form class="" action="<?php echo base_url('Cal/guardarMascota')?>" method="post">
            <div class="col-md-6">
              <div class="form-group input-group">
                <span class="input-group-addon">Id:</span>
                <input class="form-control" readonly type="text" name="id" value="<?php echo $mascota->id; ?>">
              </div>

              <div class="form-group input-group">
                <span class="input-group-addon">Nombre:</span>
                <input class="form-control" type="text" name="nombre" value="<?php echo $mascota->nombre; ?>">
              </div>

              <div class="form-group input-group">
                <span class="input-group-addon">Fecha de Nacimiento:</span>
                <input class="form-control" type="date" name="fecha_nacimiento" value="<?php echo $mascota->fecha_nacimiento; ?>">
              </div>
              <div class="form-group input-group">
                <span class="input-group-addon">Tipo:</span>
                <select class="input-group">
                <option value="mamiferos">Gato</option>
                <option value="aves">Perro</option>
                <option value="peces">Ave</option>
                <option value="anfibios">Anfibios</option>
                <option value="reptiles">Reptiles</option>
                <option value="gasteropodos">Gasteropodos</option>
                <option value="bivalvos">Bivalvos</option>
                <option value="cefalopodos">Cefalopodos</option>
                <option value="insectos">Insectos</option>
                <option value="aracnidos">Aracnidos</option>
                <option value="crustaceos">Crustaceos</option>
                <option value="miriapodos">Miriapodos</option>
              </select>


              </div>

              <div class="form-group input-group">
                <span class="input-group-addon">Raza:</span>
                <input class="form-control" type="text" name="raza" value="<?php echo $mascota->raza; ?>">
              </div>

              <div class="form-group input-group">
                <span class="input-group-addon">Peso:</span>
                <input class="form-control" type="number" name="peso" value="<?php echo $mascota->peso; ?>">
              </div>
              <div class="form-group input-group">
                <span class="input-group-addon">Color:</span>
                <input class="form-control" type="text" name="color" value="<?php echo $mascota->color; ?>">
              </div>

              <div class="form-group input-group">
                <span class="input-group-addon">Foto:</span>
                <input class="" type="file" name="nombre" value="<?php //echo $mascota->nombre; ?>">
              </div>

              <div class="form-group input-group">
                <span class="input-group-addon">Comentario:</span>
                <input class="form-control" type="text" name="comentario" value="<?php echo $mascota->comentario; ?>">
              </div>





              <div class="text-left">
                <button class="btn btn-primary" type="sumit">Guardar</button>
              </div>
            </div>
        </form>
          </div>
        <h3>Registros</h3>
        <table class="table">
          <thead>
          <tr>
            <th>ID:</th>
            <th>Nombre</th>
            <th>fecha Nacimiento</th>
            <th>Tipo</th>
            <th>Raza</th>
            <th>Peso</th>
            <th>Color</th>
            <th>Foto</th>
            <th>Comentario</th>
          </tr>
          </thead>
          <tbody>
            <?php
            foreach ($mascotas as $mascota) {

                  $linkEdit = base_url("/Cal/index/?id={$mascota->id}");
                  $linkDelete = base_url("/Cal/deleteMascota/?id={$mascota->id}");
                echo "<tr>
                          <td>{$mascota->id}</td>
                          <td>{$mascota->nombre}</td>
                          <td>{$mascota->fecha_nacimiento}</td>
                          <td>{$mascota->tipo}</td>
                          <td>{$mascota->raza}</td>
                          <td>{$mascota->peso}</td>
                          <td>{$mascota->color}</td>
                          <td>{$mascota->foto}</td>
                          <td>{$mascota->comentario}</td>
                      <td>
                            <a href='{$linkEdit}' class='btn btn-info btn-sm'>Edit</a>
                            <a href='{$linkDelete}' onclick='return validarBorrar();'class='btn btn-danger btn-sm'>Delete</a>
                          </td>
                </tr>";
              }

            ?>
          </tbody>
        </table>
        </div>
        <script>
          function validarBorrar() {
            return confirm("Seguro desea BORRAR esta fila");
          }
        </script>
  </body>
</html>
