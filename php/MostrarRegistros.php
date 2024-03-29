<!doctype html>
<html lang="es">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../EstiloRegistro.css">
<link rel="stylesheet" href="../demo/Demo.css">
<link rel="shortcut icon" type="image/jpg" href="../iconositio.jpg" />
<script src="js/bootstrap-table-pagination.js"></script>
<script src="js/pagination.js"></script>
<head>  
<TITLE>Usuarios Registrados</TITLE>  
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
                <li><a href="../index.html" class="btn btn-info btn-lg btn-responsive">Inicio</a></li>
                </li>
            </ul>
        </div>

        <select id="template-select">
            <optgroup label="Footers">
                <option data-href="../Formularios/RegistrarNuevoUsuario.html" class="btn btn-info btn-lg btn-responsive">
                </option>
                <option data-href="../index.html" class="btn btn-info btn-lg btn-responsive">Ver Usuarios
                    Registrados
                </option>
            </optgroup>
        </select>
    </div class="insert-post-ads1" style="margin-top:20px;">


<div class="container-fluid table-responsive" > 
  <form> 
  <table class="table table-striped  table-bordered table-hover  table-condensed table-green">  
    <tr class="table-primary">  
     <th scope="col" >FILA</th> 
      <th scope="col" >NOMBRES</th>  
      <th scope="col" >APELLIDOS</th>  
      <th scope="col" >TIPO DOCUMENTO</th> 
      <th scope="col" >NUMERO DOCUMENTO</th>  
      <th scope="col" >TELÉFONO CONTACTO</th>  
      <th scope="col" >EMAIL</th>  
      <th scope="col" >DIRECCION DE RESIDENCIA</th>  
      <th scope="col" >COLONIA</th>  
     
    </tr>  
    <?php  
    include('Conexion.php');  
   
   if($RespuestConexion=="OK")
   {
    $fila=1;
    $query = "SELECT U.ID_DOCUMENTO,U.ID_TIP_DOCUMENTO,U.NOMBRES,U.APELLIDOS,U.EMAIL,U.TELEFONO,U.DIRECCION,U.COLONIA 
    FROM usuarios U";     // Esta linea hace la consulta 
    $result =$conn -> query ($query); 
    ?><tbody id="developers"><?php
           while ($registro =$result->fetch_assoc()){  
                 
               ?> <tr  class="table-primary" > <?php  echo " 
                <th  >".$fila."</th> 
                <th  >".$registro['NOMBRES']."</th>  
                <th >".$registro['APELLIDOS']."</th>  
                <th > ".$registro['ID_TIP_DOCUMENTO']."</th>  
                <th >".$registro['ID_DOCUMENTO']."</th>  
                <th >".$registro['TELEFONO']."</th>  
                <th >".$registro['EMAIL']."</th>  
                <th >".$registro['DIRECCION']."</th>  
                <th >".$registro['COLONIA']."</th>                
               </tr>  
                ";  
                $fila=$fila+1;
   }  $conn -> close();

   }
   else
   {?>
    <h3><strong> <?php  echo($RespuestConexion) ?> </strong> </h3>   
    </tbody>          
    <?php
   } 
   ?>  
   </table>  
   <div class="col-md-12 text-center">
			<ul class="pagination pagination-lg pager" id="developer_page"></ul>
		</div>	
   <div class="col-lg-2 mx-auto">
       <a href="../index.html" class="btn btn-info btn-lg btn-responsive"> Regresar </a>
    </div>
    </form class="border p-3 form">
</div>  
<script src="js/jquery-3.2.1.min.js"></script>	
</body>  
</html> 