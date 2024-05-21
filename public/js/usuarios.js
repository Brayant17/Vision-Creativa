import { url } from "./constantes.js"

const buttonSave = $('#saveChangesInventario');
const buttonNewUser = $('#saveNewUser');
const myModalEmpleado = document.getElementById('modal-empleado')
const nombreUsuario = $('#nombreUsuario');
const apellido = $('#apellido');
const email = $('#email');
const numero = $('#numero');
const direccion = $('#direccion');

const nombreUsuarioNew = $('#add-nombreUsuario');
const apellidoNew = $('#add-apellido');
const emailNew = $('#add-email');
const numeroNew = $('#add-numero');
const direccionNew = $('#add-direccion');
const passwordNew = $('#add-password');


$('#modal-empleado').on('show.bs.modal', event => {
  // do something...
  const idItem = event.relatedTarget.dataset.id;

  if (idItem > 0) {
    $.ajax({
      method: 'POST',
      url: url + "resources/php/fetching.php",
      data: { controller: 'Usuarios', metodo: 'getUser', id: idItem },
      context: document.body
    }).done(function (response) {
      console.log(response)
      nombreUsuario.val(response[0].nombre)
      apellido.val(response[0].apellido)
      email.val(response[0].email)
      numero.val(response[0].numero)
      direccion.val(response[0].direccion)
    });


    buttonSave.off('click').click(() => {
      console.log(idItem)
      const data = {
        controller: 'Usuarios',
        metodo: 'updateUser',
        updateData: {
          idItem: idItem,
          nombreItem: nombreUsuario.val(),
          apellido: apellido.val(),
          email: email.val(),
          numero: numero.val(),
          direccion: direccion.val(),
        }
      }
      $.ajax({
        method: 'POST',
        url: url + "resources/php/fetching.php",
        data: data,
        context: document.body
      }).done(function (response) {
        console.log(response)
        reloadTable();
        // resetModal();
        $('#myModal').on('hidden.bs.modal', function () {
          $(this).find('input').val('');
        });
      });
    });
  }
})


$('#modal-empleado-add').on('show.bs.modal', event => {
  // do something...

  buttonNewUser.off('click').click(() => {
    const data = {
      controller: 'Usuarios',
      metodo: 'setNewUser',
      dataUser: {
        nombreUsuario: nombreUsuarioNew.val(),
        apellido: apellidoNew.val(),
        emial: emailNew.val(),
        numero: numeroNew.val(),
        direccion: direccionNew.val(),
        password: passwordNew.val()
      }
    }
    $.ajax({
      method: 'POST',
      url: url + "resources/php/fetching.php",
      data: data,
      context: document.body
    }).done(function (response) {
      console.log(response)
      reloadTable();
      $('#modal-empleado-add').modal('hide');
      // resetModal();
    });
  })
})

function reloadTable() {
  $.ajax({
    method: 'POST',
    url: url + "resources/php/fetching.php",
    data: { controller: 'Usuarios', metodo: 'getAllUsers' }
  }).done(function (response) {
    console.log(response)
    $('#tbody').html(
      response.map(element => {
        return ` <tr>
            <th scope="row">${element.id}</th>
            <td>${element.nombre}</td>
            <td>${element.apellido}</td>
            <td>${element.email}</td>
            <td>${element.numero}</td>
            <td>${element.direccion}</td>
            <td class="d-flex">
                <button type="button" class="btn btn-primary edit-btton" data-id="${element.id}"
                    data-bs-toggle="modal" data-bs-target="#exampleModal">Editar</button>
                <button type="button" class="btn btn-danger deleteItem" data-iditem="${element.id}">Eliminar</button>
            </td>
          </tr>`
      })
    )
  });
}

// function resetModal() {
//   nombreItem.val("");
//   stock.val("");
//   sku.val("");
//   descripcion.val("");
//   $('#exampleModal').modal('hide');
//   $('body').removeClass('modal-open');
//   $('.modal-backdrop').remove();
// }

$(document).on('click', '.deleteItem', function () {
  const idItem = $(this).data('iditem')
  $.ajax({
    method: 'POST',
    url: url + "resources/php/fetchusuario.php",
    data: {metodo: 'deleteItem', idItem: idItem},
    context: document.body
  }).done(function (response) {
    console.log(response)
    reloadTable();
    resetModal();
  });
});


// function resetModal() {
//   $('#modal-empleado').modal('hide');
//   $('body').removeClass('modal-open');
//   $('.modal-backdrop').remove();

// }