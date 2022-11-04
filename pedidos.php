<?php 
session_start(); // necesitamos la información de inicio

// defino las variables de los pedidos con el valor de las cookies o de lo contrario uno por defecto que es 0 y ""
$numeroPedidos = $_COOKIE['numeroPedidos'] ?? 0;
$ultimoPedido = $_COOKIE['ultimoPedido'] ?? '';

// si el acceso a la pagina se hace por metodo post significa que se ha pulsado el boton de borrar historial
// cada vez que nos conectemos a server, el método deber ser post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numeroPedidos = 0;
    $ultimoPedido = '';
    setcookie('numeroPedidos', '');
    setcookie('ultimoPedido', '');

} else if (isset($_SESSION['items'])) { // Si hay items en la sesion
    unset($_SESSION['items']); // Se vacia, se reinicia.

    // Actualiza las cookies
    $numeroPedidos = 1+ $numeroPedidos;
    $ultimoPedido = date('d/m/Y H:i:s');
    setcookie('numeroPedidos', $numeroPedidos);//establecemos la variable y el nombre
    setcookie('ultimoPedido', $ultimoPedido);
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
    <title>Mi Tienda - Pedidos</title>
</head>
<body>
    <div class="container">
        <h1 class="py-5">
            Histórico de pedidos
            <svg class="bi" width="40" height="40" fill="currentColor">
                <use xlink:href="bootstrap-icons.svg#box-seam"/>
            </svg>
        </h1>
        <div class="card">
            <div class="card-body">
                <!-- Si estan declaradas las cookies de numeroPedidos y ultimoPedido/ empty comprueba que esta vacio -->
                <?php if (!empty($numeroPedidos) && !empty($ultimoPedido)): ?>
                    <h5 class="card-title">
                        Se han tramitado <strong><?php echo $numeroPedidos; ?></strong> pedido(s).
                    </h5>
                    <p class="card-text">
                        El último pedido se ha tramitado el <?php echo $ultimoPedido; ?>.
                    </p>
                    <form method="post" action="pedidos.php">
                        <button type="submit" class="btn btn-danger">Borrar historial</button>
                    </form>
                <?php else: ?>
                    <h5 class="card-title">No se han tramitado pedidos todavía</h5>
                    <a href="inicio.php" class="card-link">Ir a inicio</a>
                <?php endif ?>
                </h5>
            </div>
        </div>
    </div>
</body>