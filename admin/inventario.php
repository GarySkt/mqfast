<?php include '../extend/header.php'; ?>
<div class="container" style="margin-top: 1%;">
<div class="card text-white bg-secondary">
    <div class="card-header"><h4 class="card-title">Alta de Inventario</h4></div>
    <div class="card-body">
        <form action="ins_inventario.php" method="post"  required autocomplete="off" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" name="producto" required placeholder="Producto" class="form-control">
            </div> 
            <div class="form-group">
                <input type="text" name="cantidad" required placeholder="Cantidad" class="form-control"> <!--cantidad del producto-->
            </div>
            <div class="form-group">
                <input type="number" step="0.01" name="precio" required placeholder="Precio" class="form-control">
            </div>
            <div class="form-group">
               <select name="categoria" id="" required class="form-control">
                    <option value="" disabled="" selected="">Seleccione una Categoria</option>
                    <option value="moda">Moda</option>
                    <option value="electronica">Electronica</option>
                    <option value="joyeria">Joyeria</option>
                    <option value="hogar">Hogar</option>
               </select>
            </div>
            <div class="form-group">
                <input type="file" name="imagen" class="form-control">
            </div>
            <div class="form-group">
                <textarea name="descripcion" required id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <button class="submit" class="btn btn-info">Guardar</button>
        </form>
    </div>
</div>
<div class="card text-white bg-secondary" style="margin-top: 1%">
    <div class="card-header"><h4 class="card-title">&Uacute;ltimo Registro</h4></div>
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
                    $sel = $con->prepare("SELECT * FROM inventario ORDER BY id DESC limit 1");
                    $sel->execute();
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
                            ?>&pag=inventario.php';}})"><span class="material-icons">clear</span></a></td>
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