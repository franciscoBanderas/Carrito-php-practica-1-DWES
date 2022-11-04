<?php

session_start(); // iniciamos la sesión 

$bebidas = array(
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
);
// el id de producto lo introducimos en esta linea a traves del post.  isset con post se usa para validar la sesión.
if (isset($_POST['bebida']) && isset($_POST['cantidad'])) // sí existen los id bebida y cantidad cógelos de inicio.php
{
    //le damos valores a la variables.
    $bebida = $_POST['bebida'];
    $cantidad = $_POST['cantidad'];

    // verificamos si la variable cantidad es un número y mayor q cero.
    if (is_numeric($cantidad) && $cantidad > 0) 

    {
        //si no existe la variable sesión me la creas y la metes en un array
        if (!isset($_SESSION['items']))  
        {
            $_SESSION['items'] = []; //creamos un array para guardar lo que encontremos en sesión
        }
       
        

         // la nueva cantidad es la suma de cantidad + la cantidad que ya hubiese para esa bebida o 0 como valor por defecto.
        $nuevaCantidad = $cantidad + ($_SESSION['items'][$bebida] ?? 0); //?? 0 
        // la nueva cantidad se establece a la suma de cantidad + $_SESSION['items'][$bebida] si tiene valor, si no 0
        $_SESSION['items'][$bebida] = $nuevaCantidad;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Mi Tienda - Carrito</title>
</head>
<body>
    <div class="container">
        <h1 class="py-5">
            Carrito de la compra
            <svg class="bi" width="40" height="40" fill="currentColor">
                <use xlink:href="bootstrap-icons.svg#cart4"/>
            </svg>
        </h1>

        <div class="card">
            <div class="card-body">
                
                <?php if(isset($_SESSION['items'])): ?>
                    <h5 class="card-title">El carrito tiene los siguientes productos:</h5>
                    <ul class="mb-4">
                    <?php $total = 0; ?>
                    <?php foreach($_SESSION['items'] as $bebida => $cantidad): ?>
                        <?php      // precio de la bebida por la cantidad
                        $precio = $bebidas[$bebida] * $cantidad;  
                        $total = $total + $precio;
                        ?>
                        <li>
                            <span><?php echo $bebida; ?></span>
                            <span>x<?php echo $cantidad; ?><span>
                            <span>(<?php echo $precio; ?>€)<span>
                        </li>
                    <?php endforeach ?>
                    </ul>
                    <h5>Total: <strong> <?php echo $total; ?> €</strong></h5>
                <?php else: ?>
                    <h5 class="card-title">El carrito está vacío</h5>
                <?php endif ?>
                <a href="inicio.php" class="card-link">Seguir comprando</a>
                <a href="pedidos.php" class="card-link">Procesar pedido</a>
            </div>
        </div>
    </div>
</body>
</html>