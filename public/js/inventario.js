import { url } from "./constantes.js"
const buttonSave = $('#saveChangesInventario');
const myModalEl = document.getElementById('exampleModal')
const nombreItem = $('#nombreItem');
const stock = $('#stock');
const sku = $('#sku');
const descripcion = $('#descripcion');


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
      url: url + "resources/php/fetch.php",
      data: data,
      context: document.body
    }).done(function (response) {
      console.log(response)
      nombreItem.val(response.Nombre)
      stock.val(response.Stock)
      sku.val(response.sku)
      descripcion.val(response.Descripcion)
    });


    buttonSave.click(() => {
      const idItem = event.relatedTarget.dataset.id;
      let data = {
        metodo: 'setEditInventario',
        idItem: idItem,
        nombreItem: nombreItem.val(),
        stock: stock.val(),
        sku: sku.val(),
        descripcion: descripcion.val(),
      }
      $.ajax({
        method: 'POST',
        url: url + "resources/php/fetch.php",
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
        nombreItem: nombreItem.val(),
        stock: stock.val(),
        sku: sku.val(),
        descripcion: descripcion.val(),
      }
      $.ajax({
        method: 'POST',
        url: url + "resources/php/fetch.php",
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
    url: url + "resources/php/fetch.php",
    data: { metodo: 'getAllData' }
  }).done(function (response) {
    console.log(response)
    $('#tbody').html(
      response.map(element => {
        return ` <tr>
            <th scope="row">${element.id}</th>
            <td>${element.nombre}</td>
            <td>${element.descripcion}</td>
            <td>${element.stock}</td>
            <td>${element.sku}</td>
            <td class="d-flex">
                <button type="button" class="btn btn-primary edit-btton" data-id="${element.id}"
                    data-bs-toggle="modal" data-bs-target="#exampleModal">Editar</button>
                <button type="button" class="btn btn-danger" data-id="${element.id}">Eliminar</button>
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