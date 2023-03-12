'use strict'

//Scrollear al final y principio
function scrollArriba() {
    window.scroll({
        top: 0,
        behavior: 'smooth'
    });
}
//var saber height total
function scrollAbajo() {
    var totalAlturaDocumento = document.body.offsetHeight;
    window.scrollBy({
        top: totalAlturaDocumento,
        behavior: 'smooth'
    });
}

// //Cargar eventos scroll
// var botonScrollArriba = document.querySelector("#scrollArriba");
// botonScrollArriba.addEventListener('click', function(){
//     scrollArriba();
// }); 

// var botonScrollAbajo = document.querySelector("#scrollAbajo");
// botonScrollAbajo.addEventListener('click', function(){
//     scrollAbajo();
// }); 

// botonScrollArriba.addEventListener('mouseover', function(){
//     scrollArriba();
// }); 
// botonScrollAbajo.addEventListener('mouseover', function(){
//     scrollAbajo();
// }); 

//Carta

//MODAL producto, rellenar
const addProductModal = document.getElementById('addProductModal');
if (addProductModal) {
    addProductModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget;

        const datosProducto = button.getAttribute('data-bs-whatever');

        //Array con los datos
        const datosProducto_array = datosProducto.split(";");
        console.log(datosProducto_array);

        //0 es id producto
        const idProducto = datosProducto_array[0];
        document.getElementById('idProducto_input').value = idProducto;

        //1 es nombre
        const nombreProducto = datosProducto_array[1];
        console.log(nombreProducto);
        document.getElementById('nombreProducto').textContent = nombreProducto;

        //2 es definicion
        const definicionProducto = datosProducto_array[2];
        document.getElementById('definicionProducto').textContent = definicionProducto;

        //3 es precio
        const precioProducto = datosProducto_array[3];
        // document.getElementById('precioProducto').textContent = precioProducto; 

        // //4 es categoria
        const categoriaProducto = datosProducto_array[4];
        document.getElementById('idCategoria_input').value = categoriaProducto;

    });
}


// //mostrar labels por encima de inputs en caso de que éstos esten rellenados
const inputs = document.querySelectorAll(".input-text");
const labels = document.querySelectorAll("label");

for (let i = 0; i < inputs.length; i++) {
    if (inputs[i].value.trim() !== "") {
        labels[i].classList.add("input-filled");
    }
}

//comprobar si estan rellenados o no al cambiar el valor el input
inputs.forEach((input, key) => {
    input.addEventListener('input', () => {
        if (input.value.trim() !== '') {
            labels[key].classList.add("input-filled");
        } else {
            labels[key].classList.remove("input-filled");
        }
    });
});

//comprobar si existe el item de backend en header
const itembackend = document.getElementById('backend_item');
if (itembackend) {
    const items_select = document.querySelectorAll('.item_select');
    items_select.forEach((item_select) => {
        item_select.classList.add('itemderecha');
    });
}

