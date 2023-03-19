getReviews().then(function (reviews) {
    printReviews(reviews);

    //filtros
    const reviewfilter = document.getElementById('select-review');

    reviewfilter.addEventListener('change', () => {
        const selected = reviewfilter.value;
        if (selected === 'asc') {
            printReviews(reviews, 'asc');
        } else if (selected === 'desc') {
            printReviews(reviews, 'desc');
        }
    });
});

function printReviews(data, order = '') {
    const section_reviews = document.getElementById('reviews_section');

    if (order == 'asc') {
        data.sort((a, b) => a.valoracion - b.valoracion);
    } else if (order == 'desc') {
        data.sort((a, b) => b.valoracion - a.valoracion);
    }
    section_reviews.innerHTML = '';
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
