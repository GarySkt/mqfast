<?php 
include '../extend/headerphp.php';
include '../extend/alertas.php';
$clave = htmlentities($_GET['clave']);

$up = $con->prepare("UPDATE compras SET estado_envio = 'ENTREGADO' WHERE clave = :clave ");
     $up->bindparam(':clave', $clave);
 	if ($up->execute()){
 		echo alerta('El producto ha sido marcado como enviado','enviados.php');
 	}else{
 		echo alerta('El producto no ha podido ser marcado','enviados.php');
 	}
 	$up = null;
 	$con = null;

 ?> 
 </body>
 </html>