import { url } from "./constantes.js"

const myModalEl = document.getElementById('exampleModal')

myModalEl.addEventListener('show.bs.modal', event => {
  // do something...
  const idItem = event.relatedTarget.dataset.id;
  if(idItem > 0){
    console.log(url)
    fetch(url+"resources/php/fetch.php")
      .then(res => res.json())
      .then(response => console.log(response))
  }
})
