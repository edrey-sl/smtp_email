<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="spinner.css">
    <title>Email - alerts</title>
</head>
<body>
    <div class="container text-center">
        <div class="pt-5">
          <form id="formulario">
             <h3>Datos que seran enviados al correo</h3>
            <input type="text" name="nombre" id="" class="mt-3" placeholder="Nombre"><br>
            <input type="email" name="correo" id="" class="mt-3"  placeholder="Correo"><br>
            <input type="text" name="folio" id="" class="mt-3"  placeholder="Folio"><br>
            <input type="file" name="adjunto" class="mt-3" id="">
            <br>
            <div id="spinner_load" class="m-5"></div>
            <input type="submit" class="btn btn-primary mt-3" value="Enviar">
          </form>
        </div>
    </div>
    

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="app.js"></script>
</body>
</html>