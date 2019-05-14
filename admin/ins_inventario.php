<?php
include '../extend/headerphp.php';
include '../extend/alertas.php';

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $clave = sha1(rand(0000,9999).rand(00,99));
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
        }
    } else {
        # code...
        $copia = 'foto_producto/producto_placeholder.png'; //copia de la imagen redimensionada
    }

}else{
    //echo "<script>alert('utiliza el formulario oe')</script>";
    echo alerta('Utiliza el formulario','inventario.php');
    
}
?> 
</body>
</html>