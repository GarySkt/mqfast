<?php
include '../extend/headerphp.php';
include '../extend/alertas.php';

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $clave = htmlentities($_POST['clave']);
    $producto = htmlentities($_POST['producto']);
    $cantidad = htmlentities($_POST['cantidad']);
    $precio = htmlentities($_POST['precio']);
    $categoria = htmlentities($_POST['categoria']);
    $descripcion = htmlentities($_POST['descripcion']);

    //redimensionar imagen
    $ruta = $_FILES['imagen']['tmp_name'];
    $imagen = $_FILES['imagen']['name'];

    if ($ruta != '') {
        # code...
        $ancho = 500;
        $alto = 400;
        $info = pathinfo($imagen);
        $tamanho = getimagesize($ruta);
        $width = $tamanho[0];
        $height = $tamanho[1];
 
        if ($info['extension'] == 'jpg' || $info['extension'] == 'JPG' || $info['extension'] == 'jpeg' || $info['extension'] == 'JPEG') {
            $imagenvieja = imagecreatefromjpeg($ruta);
            $imagennew = imagecreatetruecolor($ancho,$alto);
            imagecopyresampled($imagennew,$imagenvieja,0,0,0,0,$ancho,$alto,$width,$height);
            $copia = 'foto_producto/'.$clave.'.jpg';
            imagejpeg($imagennew,$copia);
        }elseif ($info['extension'] == 'PNG' || $info['extension'] == 'png'){
            $imagenvieja = imagecreatefrompng($ruta);
            $imagennew = imagecreatetruecolor($ancho,$alto);
            imagecopyresampled($imagennew,$imagenvieja,0,0,0,0,$ancho,$alto,$width,$height);
            $copia = 'foto_producto/'.$clave.'.png';
            imagepng($imagennew,$copia);            
        }else{
            echo alerta('El formato de la imagen no es compatible, intente con jpg o png','inventario.php');
            exit;
        }
    } else {
        
        $copia = htmlentities($_POST['anterior']);
    }
    $up = $con->prepare("UPDATE inventario SET producto = :producto, cantidad = :cantidad, precio = :precio, categoria = :categoria, foto = :foto, descripcion = :descripcion
    WHERE clave = :clave");
    $up->bindparam(':clave', $clave);
    $up->bindparam(':producto', $producto);
    $up->bindparam(':cantidad', $cantidad);
    $up->bindparam(':precio', $precio);
    $up->bindparam(':categoria', $categoria);
    $up->bindparam(':descripcion', $descripcion);
    $up->bindparam(':foto', $copia);    
    if ($up->execute()){
        echo alerta('Producto actualizado','editar_producto.php?clave='.$clave.'');
        $ins = null;
        $con = null;
    }else{
        echo alerta('Producto sin actualizar','editar_producto.php?clave='.$clave.'');
    }
    

}else{
    //echo "<script>alert('utiliza el formulario oe')</script>";
    echo alerta('Utiliza el formulario','editar_producto.php?clave='.$clave.'');
    
}
?> 
</body>
</html>