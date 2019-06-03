<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/estiloPagina.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../EstiloRegistro.css">
    <link rel="shortcut icon" type="image/jpg" href="../iconositio.jpg"/>
    <title>Página de Inicio</title>

</head>

<body>
    <div class="navigation">
        <div class="header">
            <h1>Instituto Carlos Roberto Flores</h1>
            <h1>ISEMED</h1>
            <img src="../Logo.jpg">
        </div>
        <div class="items">
            <ul>
                <li><a href="../Formularios/RegistrarNuevoUsuario.html"
                        class="btn btn-info btn-lg btn-responsive">Registrar Usuario</a></li>
                <li><a href="MostrarRegistros.php" class="btn btn-info btn-lg btn-responsive">Ver Usuarios Registrados</a></li>
                </li>
            </ul>
        </div>
        <select id="template-select">
            <optgroup label="Footers">
                <option data-href="Formularios/RegistrarNuevoUsuario.html" class="btn btn-info btn-lg btn-responsive">
                </option>
                <option data-href="MostrarRegistros.php" class="btn btn-info btn-lg btn-responsive">Ver Usuarios Registrados
                </option>
            </optgroup>
        </select>
        </div >
        <!-- Procedinmiento para la insercion de datos -->
        
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
</body>
</html>