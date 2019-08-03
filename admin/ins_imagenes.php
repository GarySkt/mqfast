<?php
include '../extend/headerphp.php';
include '../extend/alertas.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $clave_producto = htmlentities($_POST['clave']);;
    $cont = 0;

    foreach($_FILES['imagen']['tmp_name'] as $key => $value){
        $ruta = $_FILES['imagen']['tmp_name'][$key];
        $imagen = $_FILES['imagen']['name'][$key];

        $ancho = 500;
        $alto = 400;
        $info = pathinfo($imagen);
        $tamanho = getimagesize($ruta);
        $width = $tamanho[0];
        $height = $tamanho[1];
        $clave = sha1(rand(0000,9999).rand(00,99));
 
        if ($info['extension'] == 'jpg' || $info['extension'] == 'JPG' || $info['extension'] == 'jpeg' || $info['extension'] == 'JPEG') {
            $imagenvieja = imagecreatefromjpeg($ruta);
            $imagennew = imagecreatetruecolor($ancho,$alto);
            imagecopyresampled($imagennew,$imagenvieja,0,0,0,0,$ancho,$alto,$width,$height);
            $cont++; //foto diferente pero de la misma clave
            $rand = rand(000,999);
            $renombrar = $clave.$rand.$cont;
            $copia = 'fotos/'.$renombrar.'.jpg';
            imagejpeg($imagennew,$copia);
        }elseif ($info['extension'] == 'PNG' || $info['extension'] == 'png'){
            $imagenvieja = imagecreatefrompng($ruta);
            $imagennew = imagecreatetruecolor($ancho,$alto);
            imagecopyresampled($imagennew,$imagenvieja,0,0,0,0,$ancho,$alto,$width,$height);
            $cont++;
            $rand = rand(000,999);
            $renombrar = $clave.$rand.$cont;            
            $copia = 'fotos/'.$renombrar.'.png';
            imagepng($imagennew,$copia);            
        }else{
            echo alerta('El formato de la imagen no es compatible, intente con jpg o png','agregar_imagenes.php?clave='.$clave_producto.'');
            exit;
        }

        $ins = $con->prepare("INSERT INTO imagenes VALUES (DEFAULT, :clave, :clave_producto, :ruta)");
        $ins->bindparam(':clave', $clave);
        $ins->bindparam(':clave_producto', $clave_producto);
        $ins->bindparam(':ruta', $copia);
        $ins->execute();
    }//end foreach
    if ($ins) {
        echo alerta('Imagenes Guardadas Correctamente.','agregar_imagenes.php?clave='.$clave_producto.'');
    }else{
        echo alerta('Las imagenes no fueron guardadas','agregar_imagenes.php?clave='.$clave_producto.'');
    }
    $ins = null;
    $con = null;

}else {
    echo alerta('Utiliza el formulario','agregar_imagenes.php?clave='.$clave_producto.'');
}

?> 
</body>
</html>