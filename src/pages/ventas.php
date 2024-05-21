<?php include_once '../layouts/others/header.php' ?>
<?php include_once '../layouts/others/menu.php' ?>
<?php include_once '../../resources/php/controllers/Ventas.php' ?>
<?php include_once '../../resources/php/controllers/Usuarios.php' ?>
<div class="container">
    <div class="d-flex justify-content-between">
        <h2>Ventas</h2>
        <button type="button" class="btn btn-info" data-metodo="nuevoItem" data-bs-toggle="modal" data-bs-target="#modal-ventas">Nueva Venta</button>
    </div>

    <table class="table p-2">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Cliente</th>
                <th scope="col">Empleado</th>
                <th scope="col">cantidad</th>
                <th scope="col">precio</th>
                <th scope="col">Accion</th>
            </tr>
        </thead>
        <tbody id="tbody">
            <?php if (!is_null(Ventas::getAllVentas())) : ?>
                <?php foreach (Ventas::getAllVentas() as $venta) : ?>
                    <tr>
                        <th scope="row"><?= $venta['id'] ?></th>
                        <td><?= $venta['cliente'] ?></td>
                        <td><?= $venta['empleado'] ?></td>
                        <td><?= $venta['cantidad'] ?></td>
                        <td><?= $venta['precio'] ?></td>
                        <td class="d-flex">
                            <button type="button" class="btn btn-primary edit-btton" data-id="<?= $venta['id'] ?>" data-bs-toggle="modal" data-bs-target="#modal-ventas">Editar</button>
                            <button type="button" class="btn btn-danger deleteItem" data-id="<?= $venta['id'] ?>">Eliminar</button>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-ventas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="cliente" class="form-label">Cliente</label>
                        <input type="text" class="form-control" id="cliente" aria-describedby="emailHelp" name="cliente">
                    </div>
                    <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" id="empleado">
                            <?php foreach (Usuarios::getAllUsers() as $user) : ?>
                                    <option value="<?= $user['id'] ?>"><?= $user['nombre'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input type="text" class="form-control" id="cantidad" name="cantidad">
                    </div>
                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Precio</label>
                        <input type="number" class="form-control" id="precio" name="precio">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="edit-button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
            </div>
        </div>
    </div>
</div>


<?php include_once '../layouts/others/footer.php' ?>