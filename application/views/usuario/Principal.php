<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tarea 8</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style>
      body{
    background-image: url(img/user.jpg);

      }
    table{
    color: #fff;
    background: gray;
    }
    h3{
      color: #fff;
       text-shadow: 2px 2px 9px #000;
    }

    </style>

  </head>
  <body>
    <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
      <a href="<?php echo base_url('/seguridad/salir');?>" class="navbar-brand navbar-right">Salir</a>
      <a href='<?php echo base_url("/cal")?>' class='navbar-brand navbar-right'>Calculadora</a>


    </div>
  </nav>
      <div class="container">


        <h3>Datos del Usuario</h3>
        <div class="row">
        <form class="" action="<?php echo base_url('usuario/guardar')?>" method="post">
            <div class="col-md-6">
              <div class="form-group input-group">
                <span class="input-group-addon">Id:</span>
                <input class="form-control" readonly type="text" name="id" value="<?php echo $usuario->id; ?>">
              </div>
              <div class="form-group input-group">
                <span class="input-group-addon">Usuario:</span>
                <input class="form-control" type="text" name="usuario" value="<?php echo $usuario->usuario; ?>">
              </div>


            <div class="form-group input-group">
                <span class="input-group-addon">Clave:</span>
                <input class="form-control" type="text" name="clave" value="<?php echo $usuario->clave; ?>">
              </div>

              <div class="form-group input-group">
                <span class="input-group-addon">nombre:</span>
                <input class="form-control" type="text" name="nombre" value="<?php echo $usuario->nombre; ?>">
              </div>

              <div class="form-group input-group">
                <span class="input-group-addon">email:</span>
                <input class="form-control" type="text" name="email" value="<?php echo $usuario->email; ?>">
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
            <th>Nombre:</th>
            <th>Usuario:</th>
            <th>Email:</th>
          </tr>
          </thead>
          <tbody>
            <?php

              foreach ($usuarios as $usuario) {

                  $linkEdit = base_url("/usuario/?id={$usuario->id}");
                  $linkDelete = base_url("/usuario/delete/?id={$usuario->id}");
                echo "<tr>

                          <td>{$usuario->id}</td>
                          <td>{$usuario->nombre}</td>
                          <td>{$usuario->usuario}</td>
                          <td>{$usuario->email}</td>
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
