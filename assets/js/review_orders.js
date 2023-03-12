//mostrar reseñas de los pedidos
/*
    <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#deleteReview_<?= $key ?>" aria-expanded="false" aria-controls="deleteReview_<?= $key ?>">
        <i class="fa-solid fa-trash"></i>
    </button>
*/

function setButtonsReview() {
    const review_cols = document.querySelectorAll('.reviews');

    review_cols.forEach(review_col => {
        review_col.innerHTML = '';

        const idValoracion = review_col.getAttribute('data-idvaloracion');

        if (idValoracion == 'null') {
            const idPedido = review_col.getAttribute('data-idpedido');

            const addbutton = document.createElement('button');

            addbutton.classList.add('btn');
            addbutton.setAttribute('type', 'button');
            addbutton.setAttribute('data-bs-toggle', 'modal');
            addbutton.setAttribute('data-bs-target', '#formreview_modal');
            addbutton.setAttribute('data-bs-idpedido', idPedido);
            addbutton.setAttribute('data-bs-formtype', 'add');
            addbutton.innerHTML = '<i class="fa-solid fa-plus"></i>';

            review_col.appendChild(addbutton);
        } else if (idValoracion != 'null') {
            const editbutton = document.createElement('button');

            editbutton.classList.add('btn');
            editbutton.setAttribute('type', 'button');
            editbutton.setAttribute('data-bs-toggle', 'modal');
            editbutton.setAttribute('data-bs-target', '#formreview_modal');
            editbutton.setAttribute('data-bs-formtype', 'edit');
            editbutton.setAttribute('data-idvaloracion', idValoracion);
            editbutton.innerHTML = '<i class="fa-solid fa-pen-to-square"></i>';

            review_col.appendChild(editbutton);
        }
    });
}

setButtonsReview();

//formulario enviar idval
const form = document.getElementById('form_review');

//modal formulario
const modalReview = document.getElementById('formreview_modal');

modalReview.addEventListener('show.bs.modal', ev => {
    const button = ev.relatedTarget;

    // const idPedido = button.getAttribute('data-bs-idpedido');
    const formtype = button.getAttribute('data-bs-formtype');
console.log(formtype);

    const formtype_input = document.getElementById('formtype');
    
console.log(formtype_input);
    formtype_input.value = formtype;

    if (formtype == 'add') {
        // setValueFields(idPedido);
        setValueFields();
        const idPedido = button.getAttribute('data-bs-idpedido');
        form.innerHTML = `<input type="hidden" id="${idPedido}" name="idPedido">`;
    } else if (formtype == 'edit') {
        const idValoracion = button.getAttribute('data-idvaloracion');

        getValoracionFields(idValoracion).then(data => { setValueFields(data), refreshLabels() });
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

    if (formtype == 'add') {
        url = 'http://restaurantecasaalcaide.com/reviewsAPI/addReview';
    } else if (formtype == 'edit') {
        url = 'http://restaurantecasaalcaide.com/reviewsAPI/editReview';

        const idValoracion = document.getElementById('idValoracion');
        data.append('idValoracion', idValoracion.value);
    }

    fetch(url, {
        method: 'post',
        body: data
    }).then((response) => response.text())
        .then(function (response) {
            console.log(response);
        });


    if (formtype == 'add') {

    }
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

