import { url } from "./constantes.js"
const modal = document.getElementById('modal-ventas');

// input del modal
const cliente = $('#cliente');
const empleado = $('#empleado');
const cantidad = $('#cantidad');


modal.addEventListener('show.bs.modal', event => {
    const id = event.relatedTarget.dataset.id;
    if (id > 0) {
        // modal para editar
        $.ajax({
            method: 'POST',
            url: url + "resources/php/fetching.php",
            data: { controller: 'Ventas', metodo: 'getVenta', idVenta: id },
        }).done(function (response) {
            console.log(response)
            cliente.val(response.NombreCliente)
            empleado.val(response.nombreEmpleado)
            cantidad.val(response.cantidad)
        });
        // al hacer click en el boton de gaurdar los cambios
        $('#saveChanges').click(()=>{

            $.ajax({
                method: 'POST',
                url: url + "resources/php/fetching.php",
                data: { controller: 'Ventas', metodo: 'updateVenta', idVenta: id, cliente: cliente.val(), empleado: empleado.val(), cantidad: cantidad.val()},
            }).done(function (response) {
                console.log(response)
            })
        })
    }


})

$('#modal-ventas').on('hidden.bs.modal', function () {
    cliente.val('')
    empleado.val('')
    cantidad.val('')
});