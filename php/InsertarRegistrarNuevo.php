<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="EstiloRegistro.css"> 
    <link rel="shortcut icon" type="image/jpg" href="iconositio.jpg" />
    <link rel="stylesheet" href="Demo.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--se invova la hoja de estilo de fontawesome-->
    <link rel="stylesheet" href="font/css/font-awesome.min.css">

    <title>Respuesta Registro</title>
</head>

<body>

<div class="navigation">

        <div class="items">
            <ul>
                <li class="category">Links de Navegación</li>
                <li><a href="Registration-form" class="active">Inicio</a></li>
                <li><a href="Log-in-form">Ver Registros</a></li>
            </ul>
        </div>

        <label for="template-select">Select a template:</label>
        <select id="template-select">
            <optgroup label="Footers">
                <option selected data-href="Registration-form">Registration Form</option>
                <option data-href="Log-in-form">Log In Form</option>
                <option data-href="Advanced-search-form">Advanced Search Form</option>
            </optgroup>
        </select>

    </div>

<div class="col-lg-6 mx-auto">
  <div class="row" style="text-align:center">
    <?php
      // require('Conexion.php');
       $Host="localhost";
       $User="root";
       $PassWord="";
       $DataBase="instituto";
       $RespuestaQuery="";      
       $nombres=$_POST['nombres'];
       $apellidos=$_POST['apellidos'];
       $tipDoc=$_POST['tipDoc'];       
       $numdoc=$_POST['numdoc'];
       $telefono=$_POST['telefono'];
       $Email=$_POST['Email'];
       $direccion=$_POST['direccion'];
       $apellidos=$_POST['apellidos'];
       $colonia=$_POST['colonia'];
       $RespuestConexion="";
       if($tipDoc=='Seleccioneunaopcion')
       {
        ?> <h3> <strong>Debe seleccionar un tipo Documento </strong></h3> <?php       
       }
       else
       {  
        $sql="INSERT INTO usuarios(ID_DOCUMENTO, ID_TIP_DOCUMENTO, NOMBRES, APELLIDOS,TELEFONO,EMAIL, DIRECCION, COLONIA) 
        VALUES ('$numdoc','$tipDoc','$nombres','$apellidos','$telefono','$Email','$direccion','$colonia')";
         
         $QueryValida="SELECT u.ID_DOCUMENTO FROM usuarios u WHERE u.ID_DOCUMENTO ='$numdoc'";

        $RespuestConexion=mysqli_connect( $Host, $User,$PassWord,$DataBase);  
          if($RespuestConexion)
          { 
            $RegistrosEjecucion=$RespuestConexion->query($QueryValida);

              if($RegistrosEjecucion)
              {
                $ExistenciaRegistro=  $RegistrosEjecucion->num_rows;
                if($ExistenciaRegistro>0)
                {?>
                <h3><strong> Ya existe un usuario registrado con el número: <?php echo($numdoc)  ?> </strong> </h3> <?php
                }
                else
                {
                    $RespuestaQuery=$RespuestConexion->query($sql);
                    if($RespuestaQuery)
                    {?><h3><strong> El registro del usuario se realizó exitosamente.. </strong> </h3>  <?php
                        $RespuestConexion->close();
                    }
                    else
                    {?>  <h3><strong> <?php echo("Error insertando registro a la base de datos : "  . $RespuestConexion->error) ?></strong> </h3><?php
        
                    }
                }
              }
              else
              { ?>  <h3><strong><?php  echo("Error Consultando Dato : "  ."\n" . mysqli_connect_error() )  ?></strong> </h3><?php

              }

         
          }
          else
          { ?> 
              <h3><strong> <?php  echo("Error conectando a base de datos : "."\n" . mysqli_connect_error()) ?> </strong> </h3>             
              <?php
          }
                   
        
       }

    ?>
    
  </div>
    <div class="col-lg-3 mx-auto">
       <a href="../Formularios/RegistrarNuevoUsuario.html" class="btn btn-info btn-lg btn-responsive"> Regresar </a>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>
</html>