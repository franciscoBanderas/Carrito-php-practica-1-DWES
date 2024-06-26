
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="practica2.css" rel="stylesheet">
    <title>Mi Tienda - Inicio</title>
</head>

<?php $bebidas = array(
    "Monster" => 1.52,
    "Burn" => 1.25,
    "Rockstar " => 1.38,
    "Red Bull" => 2,
    "Blue" => 1,
    "Eneryeti" => 1,
    "Misil" => 3,
    "Reign" => 3,
    "Toro" => 1.23,
    "Vinut" => 1
);?>
<body>   
    
    <header>
        
    </header>
    <main class="mb-5">
        <div class="tamano" >
            <img src="bebida.jpg" class="d-block vw-100 img-responsive" alt="Bebidas">
        </div>
    
    <div class="container mx-40">
        <h1 class="py-5">Productos disponibles</h1>

        <form  class="form-inline" method="post" action="carrito.php">  <!-- El formulario enviará los datos a carrito a traves del método post -->
        <div class="form-group" > 
            <label> Seleccione el producto deseado: </label>
            <select id="bebida" name="bebida" class="form-control"> 
                <option selected> Bébidas energéticas </option>
                  <?php foreach ($bebidas as $bebida => $precio): ?><!-- foreach es para recorrer todo el array-->
                        <option value="<?php echo $bebida; ?>"> <!-- muestra las  opciones del desplegable -->
                             <?php echo $bebida; ?> (<?php echo $precio; ?> €/500ml)
                        </option>
                   <?php endforeach ?>
             </select>
        </div>
        <div class="form-group mx-sm-3">
            <label>Cantidad:</label>
            <input id="cantidad" type="number" name="cantidad" class="form-control" value="0">
        </div>
                  <button type="submit" class="btn btn-primary">Comprar</button>
        </form>
    </div>  <!--Cierra DIV container-->

    </main> 
        
</body>

</html>




















    

