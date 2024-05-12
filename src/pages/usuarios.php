<?php include_once '../layouts/others/header.php' ?>
<?php include_once '../layouts/others/menu.php' ?>
<?php include_once '../../resources/php/usuarios.php' ?>
<div class="container">
    <div class="d-flex justify-content-between">
        <h2>Usuarios</h2>
        <button type="button" class="btn btn-info" data-metodo="nuevoItem" data-bs-toggle="modal" data-bs-target="#modal-empleado">Nuevo
            Articulo</button>
    </div>

    <table class="table p-2">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Email</th>
                <th scope="col">Numero</th>
                <th scope="col">Direccion</th>
                <th scope="col">Accion</th>
            </tr>
        </thead>
        <tbody id="tbody">
            <?php foreach (Inventario::getAllItems() as $item): ?>
                <tr>
                    <th scope="row"><?= $item['id_empleado'] ?></th>
                    <td><?= $item['nombre'] ?></td>
                    <td><?= $item['apellido'] ?></td>
                    <td><?= $item['email'] ?></td>
                    <td><?= $item['direccion'] ?></td>
                    <td class="d-flex">
                        <button type="button" class="btn btn-primary edit-btton" data-id="<?= $item['id_empleado'] ?>"
                            data-bs-toggle="modal" data-bs-target="#modal-empleado">Editar</button>
                        <button type="button" class="btn btn-danger deleteItem" data-idItem="<?= $item['id_empleado'] ?>">Eliminar</button>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-empleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <input type="email" class="form-control" id="nombreUsuario" aria-describedby="emailHelp" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="numero" class="form-label">Numero</label>
                        <input type="number" class="form-control" id="numero" name="numero">
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Direccion</label>
                        <input type="text" class="form-control" id="direccion" name="direccion">
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