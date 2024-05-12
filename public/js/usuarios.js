import { url } from "./constantes.js"

const buttonSave = $('#saveChangesInventario');
const myModalEl = document.getElementById('modal-empleado')
const nombreUsuario = $('#nombreUsuario');
const apellido = $('#apellido');
const email = $('#email');
const numero = $('#numero');
const direccion = $('#direccion');


myModalEl.addEventListener('show.bs.modal', event => {
  // do something...
  const idItem = event.relatedTarget.dataset.id;
  if (idItem > 0) {
    let data = {
      metodo: 'getEditInventario',
      idItem: idItem,
    };
    $.ajax({
      method: 'POST',
      url: url + "resources/php/fetchusuario.php",
      data: data,
      context: document.body
    }).done(function (response) {
      console.log(response)
      nombreUsuario.val(response.nombre)
      apellido.val(response.apellido)
      email.val(response.email)
      numero.val(response.numero)
      direccion.val(response.direccion)
    });


    buttonSave.click(() => {
      const idItem = event.relatedTarget.dataset.id;
      let data = {
        metodo: 'setEditInventario',
        idItem: idItem,
        nombreItem: nombreUsuario.val(),
        apellido: apellido.val(),
        email: email.val(),
        numero: numero.val(),
        direccion: direccion.val(),
      }
      $.ajax({
        method: 'POST',
        url: url + "resources/php/fetchusuario.php",
        data: data,
        context: document.body
      }).done(function (response) {
        reloadTable();
        resetModal();
      });
    })
  }
  else {
    buttonSave.click(() => {
      let data = {
        metodo: 'setNewInventario',
        nombreUsuario: nombreUsuario.val(),
        apellido: apellido.val(),
        emial: email.val(),
        numero: numero.val(),
        direccion: direccion.val()
      }
      $.ajax({
        method: 'POST',
        url: url + "resources/php/fetchusuario.php",
        data: data,
        context: document.body
      }).done(function (response) {
        console.log(response)
        reloadTable();
        resetModal();
      });
    })
  }
})

function reloadTable() {
  $.ajax({
    method: 'POST',
    url: url + "resources/php/fetchusuario.php",
    data: { metodo: 'getAllData' }
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

function resetModal() {
  nombreItem.val("");
  stock.val("");
  sku.val("");
  descripcion.val("");
  $('#exampleModal').modal('hide');
  $('body').removeClass('modal-open');
  $('.modal-backdrop').remove();
}

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

$.ajax({
    method: 'POST',
    url: url + "resources/php/fetching.php",
    data: {controller: 'Ventas', metodo: 'getAllUsers'},
    context: document.body
  }).done(function (response) {
    console.log(response)
  });