const reviews = getReviews();

reviews.then(data => console.log(data));
reviews.then(data => printReviews(data));

function printReviews(data, order = '') {
    const section_reviews = document.getElementById('reviews_section');

    if (order == 'asc') {
        data.sort((a, b) => a.valoracion - b.valoracion);
    } else if (order == 'asc') {
        data.sort((a, b) => b.valoracion - a.valoracion);
    }

    data.forEach(review => {
        const html = `
        <div class="bg-color3 mx-auto mt-5 review-bloque">
        <div class="row py-2 bg-color2">
            <div class="col-lg-4">
            <h3 class="text-left">${review.titulo}</h3>
            </div>
            <div class="col-lg-2">
            ${review.valoracion}
            </div>
            <div class="col-lg-6">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 pt-2 bg-color3">
            <p class="text-justify pt-1">${review.descripcion}</p>
            </div>
        </div>
        </div>
        `;

        section_reviews.innerHTML += html;
    });
}

function getReviews() {

    return fetch('http://restaurantecasaalcaide.com/reviewsAPI/getReviews', {
        method: 'post'
    }).then((response) => response.json())
        .then(function (data) {
            return data;
        });
}

// form.addEventListener('submit', function (ev) {
//     ev.preventDefault();

//     const data = new FormData(form);

//     const formtype = document.getElementById('formtype');

//     let url;

//     if (formtype == 'add') {
//         url = 'http://restaurantecasaalcaide.com/reviewsAPI/addReview';
//     } else if (formtype == 'edit') {
//         url = 'http://restaurantecasaalcaide.com/reviewsAPI/editReview';

//         const idValoracion = document.getElementById('idValoracion');
//         data.append('idValoracion', idValoracion.value);
//     }

//     fetch(url, {
//         method: 'post',
//         body: data
//     }).then((response) => response.text())
//         .then(function (response) {
//             console.log(response);
//         });


//     if (formtype == 'add') {

//     }
// });

// function getValoracionFields(idValoracion) {
//     const data = new FormData();
//     data.append('idValoracion', idValoracion);

//     return new Promise((resolve, reject) => {
//         fetch('http://restaurantecasaalcaide.com/reviewsAPI/getReviewById', {
//             method: 'post',
//             body: data
//         }).then((response) => response.json())
//             .then(function (data) {
//                 resolve(data);
//             });
//     });
// }

