<?php include_once '../layouts/others/header.php' ?>
<?php include_once '../layouts/others/menu.php' ?>
<?php include_once '../../resources/php/inventario.php' ?>
<div class="container">
    <h2>Inventario</h2>
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
        <tbody>
            <?php foreach (Inventario::getAllItems() as $item) : ?>
                <tr>
                    <th scope="row"><?= $item['id_inventario'] ?></th>
                    <td><?= $item['nombre'] ?></td>
                    <td><?= $item['descripcion'] ?></td>
                    <td><?= $item['stock'] ?></td>
                    <td><?= $item['sku'] ?></td>
                    <td class="d-flex">
                        <button type="button" class="btn btn-primary edit-btton" data-id="<?= $item['id_inventario'] ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">Editar</button>
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
                ...
            </div>
            <div class="modal-footer">
                <button type="button" id="edit-button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


<?php include_once '../layouts/others/footer.php' ?>