<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Números Pares</title>
</head>
<body>
    <div class="container" align="center">
        <form class="border p-3 form">
            <h3>Números pares del 1 al 100</h3>
             <?php
              for ($contador=1;$contador<=100;$contador++)
              {
                  if($contador%2==0)
                  {
                      echo($contador)?><br> <?php
                  }
              
              }   
             ?>
        </form>
    </div>
</body>
</html>
