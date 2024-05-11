const myModalEl = document.getElementById('exampleModal')

myModalEl.addEventListener('show.bs.modal', event => {
  // do something...
  const idItem = event.relatedTarget.dataset.id;
  console.log(idItem)
})