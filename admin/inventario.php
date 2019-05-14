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
</div>
<?php include '../extend/footer.php'; ?>
</body>
</html>