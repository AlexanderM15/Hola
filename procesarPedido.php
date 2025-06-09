<?php
include_once('Pedido.php');
$cliente= isset($_POST['cliente'])?trim($_POST['cliente']):'';
$productosSeleccionados= isset($_POST['productos'])?$_POST['productos']:'';
$productos=[];
foreach($productosSeleccionados as $producto){
    list($nombreProducto,$precio)=explode('-',$producto);
    $productos[]=[
        'nombre'=>$nombreProducto,
        'precio'=>(float)$precio
    ];

}

    $pedido = new Pedido($cliente,$productos);
    echo $pedido->mostrarPedido();