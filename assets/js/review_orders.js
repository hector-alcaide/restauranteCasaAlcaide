//mostrar reseñas de los pedidos
/*
    <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#deleteReview_<?= $key ?>" aria-expanded="false" aria-controls="deleteReview_<?= $key ?>">
        <i class="fa-solid fa-trash"></i>
    </button>
*/

// function setButtonsReview() {
//     const review_cols = document.querySelectorAll('.reviews');

//     review_cols.forEach(review_col => {
//         review_col.innerHTML = '';

//         const idValoracion = review_col.getAttribute('data-idvaloracion');

//         if (idValoracion == 'null') {
//             const idPedido = review_col.getAttribute('data-idpedido');

//             const addbutton = document.createElement('button');

//             addbutton.classList.add('btn');
//             addbutton.setAttribute('type', 'button');
//             addbutton.setAttribute('data-bs-toggle', 'modal');
//             addbutton.setAttribute('data-bs-target', '#formreview_modal');
//             addbutton.setAttribute('data-bs-idpedido', idPedido);
//             addbutton.setAttribute('data-bs-formtype', 'add');
//             addbutton.innerHTML = '<i class="fa-solid fa-plus"></i>';

//             review_col.appendChild(addbutton);
//         } else if (idValoracion != 'null') {
//             const editbutton = document.createElement('button');

//             editbutton.classList.add('btn');
//             editbutton.setAttribute('type', 'button');
//             editbutton.setAttribute('data-bs-toggle', 'modal');
//             editbutton.setAttribute('data-bs-target', '#formreview_modal');
//             editbutton.setAttribute('data-bs-formtype', 'edit');
//             editbutton.setAttribute('data-idvaloracion', idValoracion);
//             editbutton.innerHTML = '<i class="fa-solid fa-pen-to-square"></i>';

//             review_col.appendChild(editbutton);
//         }
//     });
// }

// setButtonsReview();

//formulario enviar idval
const form = document.getElementById('form_review');

//modal formulario
const modalReview = document.getElementById('formreview_modal');

modalReview.addEventListener('show.bs.modal', ev => {
    const button = ev.relatedTarget;

    const formtype = button.getAttribute('data-bs-formtype');

    const formtype_input = document.getElementById('formtype');

    formtype_input.value = formtype;

    const title = document.getElementById('titulo');

    if (formtype == 'add') {
        setValueFields();
        const idPedido = button.getAttribute('data-bs-idpedido');
        form.innerHTML += `<input type="hidden" id="idPedido" name="idPedido" value="${idPedido}">`;
        title.innerHTML = 'Añadir valoración';
    } else if (formtype == 'edit') {
        const idValoracion = button.getAttribute('data-idvaloracion');
        form.innerHTML += `<input type="hidden" id="idValoracion" name="idValoracion" value="${idValoracion}">`;
        getValoracionFields(idValoracion).then(data => { setValueFields(data), refreshLabels() });
        title.innerHTML = 'Editar valoración';
    }
    refreshLabels();
});

//rellanar o no values campos
function setValueFields(review = null) {
    const valoracion_input = document.getElementById('valoracion');
    const titulo_input = document.getElementById('titulo');
    const descripcion_input = document.getElementById('descripcion');

    if (review != null) {
        valoracion_input.value = review.valoracion;
        titulo_input.value = review.titulo;
        descripcion_input.value = review.descripcion;
    } else {
        valoracion_input.value = '';
        titulo_input.value = '';
        descripcion_input.value = '';
    }
}



form.addEventListener('submit', function (ev) {
    ev.preventDefault();

    const data = new FormData(form);

    const formtype = document.getElementById('formtype');

    let url;
    let message;
    if (formtype.value == 'add') {
        url = 'http://restaurantecasaalcaide.com/reviewsAPI/addReview';
    } else if (formtype.value == 'edit') {
        url = 'http://restaurantecasaalcaide.com/reviewsAPI/editReview';

        const idValoracion = document.getElementById('idValoracion');
        data.append('idValoracion', idValoracion.value);
    }

    fetch(url, {
        method: 'post',
        body: data
    }).then((response) => response.json())
        .then(function (response) {
            console.log(response);
            displayUserOrders();
            notie.alert({ type: 1, text: response.message, stay: true });
        });
});

function getValoracionFields(idValoracion) {
    const data = new FormData();
    data.append('idValoracion', idValoracion);

    return new Promise((resolve, reject) => {
        fetch('http://restaurantecasaalcaide.com/reviewsAPI/getReviewById', {
            method: 'post',
            body: data
        }).then((response) => response.json())
            .then(function (data) {
                resolve(data);
            });
    });
}

displayUserOrders();

function displayUserOrders() {
    fetch('http://restaurantecasaalcaide.com/reviewsAPI/getUserOrders', {
        method: 'post',
    }).then((response) => response.json())
        .then(function (data) {
            const userorders_table = document.getElementById('userorders_table');
            userorders_table.querySelector('tbody').innerHTML = '';

            data.forEach((order, key) => {
                key++;
                let fila = document.createElement("tr");

                let col1 = document.createElement("td");
                col1.setAttribute("scope", "row");
                col1.innerHTML = key;
                fila.appendChild(col1);

                let col2 = document.createElement("td");
                col2.innerHTML = order.fechaAltaPedido;
                fila.appendChild(col2);

                let col3 = document.createElement("td");
                col3.innerHTML = order.importeTotal;
                fila.appendChild(col3);

                let col4 = document.createElement("td");
                let button = document.createElement("button");
                button.setAttribute("class", "btn");
                button.setAttribute("type", "button");
                button.setAttribute("data-bs-toggle", "collapse");
                button.setAttribute("data-bs-target", `.products_${key}`);
                button.setAttribute("aria-expanded", "false");
                button.setAttribute("aria-controls", `products_${key}`);
                let i = document.createElement("i");
                i.setAttribute("class", "fa-solid fa-turn-down");
                button.appendChild(i);
                col4.appendChild(button);
                fila.appendChild(col4);

                let col5 = document.createElement("td");
                col5.setAttribute("class", "reviews");
                col5.setAttribute("data-idvaloracion", order.idValoracion || "null");
                col5.setAttribute("data-idpedido", order.idPedido);

                //setear botones
                if (!order.idValoracion) {
                    const addbutton = document.createElement('button');

                    addbutton.classList.add('btn');
                    addbutton.setAttribute('type', 'button');
                    addbutton.setAttribute('data-bs-toggle', 'modal');
                    addbutton.setAttribute('data-bs-target', '#formreview_modal');
                    addbutton.setAttribute('data-bs-idpedido', order.idPedido);
                    addbutton.setAttribute('data-bs-formtype', 'add');
                    addbutton.innerHTML = '<i class="fa-solid fa-plus"></i>';

                    col5.appendChild(addbutton);
                } else if (order.idValoracion) {
                    const editbutton = document.createElement('button');

                    editbutton.classList.add('btn');
                    editbutton.setAttribute('type', 'button');
                    editbutton.setAttribute('data-bs-toggle', 'modal');
                    editbutton.setAttribute('data-bs-target', '#formreview_modal');
                    editbutton.setAttribute('data-bs-formtype', 'edit');
                    editbutton.setAttribute('data-idvaloracion', order.idValoracion);
                    editbutton.innerHTML = '<i class="fa-solid fa-pen-to-square"></i>';

                    const removebutton = document.createElement('button');

                    removebutton.classList.add('btn');
                    removebutton.setAttribute('type', 'button');
                    removebutton.setAttribute('id', 'removeReview');
                    removebutton.setAttribute('data-idvaloracion', order.idValoracion);
                    removebutton.innerHTML = '<i class="fa-solid fa-trash"></i>';

                    col5.appendChild(editbutton);
                    col5.appendChild(removebutton);
                }
                fila.appendChild(col5);

                userorders_table.querySelector('tbody').appendChild(fila);

                let collapseFila = document.createElement("tr");
                collapseFila.setAttribute("class", `collapse products_${key}`);
                let collapseCol1 = document.createElement("th");
                collapseCol1.setAttribute("scope", "col");
                collapseCol1.innerHTML = "Nombre";
                collapseFila.appendChild(collapseCol1);
                let collapseCol2 = document.createElement("th");
                collapseCol2.setAttribute("scope", "col");
                collapseCol2.setAttribute("colspan", "3");
                collapseCol2.innerHTML = "Descripción";
                collapseFila.appendChild(collapseCol2);
                let collapseCol3 = document.createElement("th");
                collapseCol3.setAttribute("scope", "col");
                collapseCol3.innerHTML = "Precio";
                collapseFila.appendChild(collapseCol3);

                userorders_table.querySelector('tbody').appendChild(collapseFila);

                order.orderproducts.forEach((product) => {
                    let productFila = document.createElement("tr");
                    productFila.setAttribute("class", `collapse products_${key}`);
                    let productCol1 = document.createElement("td");
                    productCol1.setAttribute("scope", "row");
                    productCol1.innerHTML = product.nombre;
                    productFila.appendChild(productCol1);
                    let productCol2 = document.createElement("td");
                    productCol2.setAttribute("colspan", "3");
                    productCol2.innerHTML = product.definicion;
                    productFila.appendChild(productCol2);
                    let productCol3 = document.createElement("td");
                    productCol3.innerHTML = product.precio;
                    productFila.appendChild(productCol3);

                    userorders_table.querySelector('tbody').appendChild(productFila);
                });
            });

            const buttonsRemove = document.querySelectorAll('#removeReview');

            for (let button of buttonsRemove) {
                button.addEventListener("click", ev => {
                    let mensaje = '¿Estás seguro de que deseas eliminar la valoración?';
                    if(confirm(mensaje)){
                        const idValoracion = ev.target.parentElement.getAttribute('data-idvaloracion');
                        removeReview(idValoracion);
                    }
                });
            }
        });
}

function removeReview(idValoracion){
    const data = new FormData();
    data.append('idValoracion', idValoracion);
    
    fetch('http://restaurantecasaalcaide.com/reviewsAPI/removeReviewById', {
        method: 'post',
        body: data
    }).then((response) => response.json())
        .then(function (response) {
            displayUserOrders();
            notie.alert({ type: 1, text: response.message, stay: true });
        });
}