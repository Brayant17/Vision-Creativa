<?php include_once '../layouts/others/header.php' ?>
<?php include_once '../layouts/others/menu.php' ?>
<?php include_once '../../resources/php/inventario.php' ?>
<div class="container">
    <div class="d-flex justify-content-between">
        <h2>Inventario</h2>
        <button type="button" class="btn btn-info" data-metodo="nuevoItem" data-bs-toggle="modal" data-bs-target="#exampleModal">Nuevo
            Articulo</button>
    </div>

    <table class="table p-2">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Stock</th>
                <th scope="col">SKU</th>
                <th scope="col">Accion</th>
            </tr>
        </thead>
        <tbody id="tbody">
            <?php foreach (Inventario::getAllItems() as $item): ?>
                <tr>
                    <th scope="row"><?= $item['id_inventario'] ?></th>
                    <td><?= $item['nombre'] ?></td>
                    <td><?= $item['descripcion'] ?></td>
                    <td><?= $item['stock'] ?></td>
                    <td><?= $item['sku'] ?></td>
                    <td class="d-flex">
                        <button type="button" class="btn btn-primary edit-btton" data-id="<?= $item['id_inventario'] ?>"
                            data-bs-toggle="modal" data-bs-target="#exampleModal">Editar</button>
                        <button type="button" class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nombreItem" class="form-label">Nombre</label>
                        <input type="email" class="form-control" id="nombreItem" aria-describedby="emailHelp" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock">
                    </div>
                    <div class="mb-3">
                        <label for="sku" class="form-label">SKU</label>
                        <input type="text" class="form-control" id="sku" name="sku">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <textarea class="form-control" id="descripcion" rows="3" name="descripcion"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="edit-button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveChangesInventario">Save changes</button>
            </div>
        </div>
    </div>
</div>


<?php include_once '../layouts/others/footer.php' ?>