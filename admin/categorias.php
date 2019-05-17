<?php include '../extend/header.php';
$opc = htmlentities($_GET['opc']);
?>

<div class="container" style="margin-top: 1%;">
<div class="card text-white bg-secondary" style="margin-top: 1%">
    <div class="card-header"><h4 class="card-title">Iventario <?php echo $opc?> </h4></div>
    <div class="card-body">
        <table class="table">
            <thead>
                <th>Foto</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Categoria</th>
                <th>Descripcion</th>
                <th></th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                <?php
                if ($opc == 'General') {
                    $sel = $con->prepare("SELECT * FROM inventario ORDER BY id");
                    $sel->execute();
                }else{
                    $sel = $con->prepare("SELECT * FROM inventario WHERE categoria = ? ORDER BY id");
                    $sel->execute(array($opc));
                }
                    
                    while ($f = $sel->fetch()) { ?>
                    <tr>
                        <td><img src="<?php echo $f['foto']?>" alt="foto" width="50" height="50"></td>
                        <td><?php echo $f['producto']?></td>
                        <td><?php echo $f['cantidad']?></td>
                        <td><?php echo "S/.".number_format($f['precio'],2)?></td>
                        <td><?php echo $f['categoria']?></td>
                        <td><?php echo substr($f['descripcion'],0,100)?>...</td>
                        <td><a href="agregar_imagenes.php?clave=<?php echo $f['clave']?>" class="btn 
                        btn-outline-success btn-sm"><span class="material-icons">add</span></a></td>
                        <td><a href="editar_producto.php?clave=<?php echo $f['clave']?>" class="btn 
                        btn-outline-primary btn-sm"><span class="material-icons">edit</span></a></td>
                        <td> <a href="#" class="btn btn-outline-danger btn-sm" onclick="bootbox.confirm('Seguro que desea eliminar?', function(
                            result){if (result == true){location.href='eliminar_producto.php?clave=<?php echo $f['clave']?>&foto=<? echo $f['foto']
                            ?> &pag=categorias.php&opc=<?php echo $opc?>';}})"><span class="material-icons">clear</span></a></td>
                    </tr>
                    <?php
                    }
                    $sel = null;
                    $con = null;
                    ?>
            </tbody>
        </table>
    </div>
</div>

</div>
<?php include '../extend/footer.php'; ?>
</body>
</html>