const ensaladas_section = document.getElementById('ensaladas');
const carnes_section = document.getElementById('carnes');
const pescados_section = document.getElementById('pescados');
const cervezas_section = document.getElementById('cervezas');
const vinos_section = document.getElementById('vinos');
const postres_section = document.getElementById('postres');

//inputs
const ensaladas_input = document.getElementById('ensaladas_input');
const carnes_input = document.getElementById('carnes_input');
const pescados_input = document.getElementById('pescados_input');
const cervezas_input = document.getElementById('cervezas_input');
const vinos_input = document.getElementById('vinos_input');
const postres_input = document.getElementById('postres_input');
const todos_input = document.getElementById('todos_input');

ensaladas_input.addEventListener('change', () => {
    displaySection(ensaladas_section, ensaladas_input);
});

carnes_input.addEventListener('change', () => {
    displaySection(carnes_section, carnes_input);
});

pescados_input.addEventListener('change', () => {
    displaySection(pescados_section, pescados_input);
});

cervezas_input.addEventListener('change', () => {
    displaySection(cervezas_section, cervezas_input);
});

vinos_input.addEventListener('change', () => {
    displaySection(vinos_section, vinos_input);
});

postres_input.addEventListener('change', () => {
    displaySection(postres_section, postres_input);
});

todos_input.addEventListener('change', () => {
    toggleDisplayAll(todos_input.checked);
});

function displaySection(section, input) {
    let status = input.checked == true ? 'block' : 'none';
    section.style.display = status;

    todos_input.checked = false;
}

function toggleDisplayAll(checked) {
    let status = checked == true ? 'block' : 'none';

    ensaladas_section.style.display = status;
    carnes_section.style.display = status;
    pescados_section.style.display = status;
    cervezas_section.style.display = status;
    vinos_section.style.display = status;
    postres_section.style.display = status;

    ensaladas_input.checked = checked;
    carnes_input.checked = checked;
    pescados_input.checked = checked;
    cervezas_input.checked = checked;
    vinos_input.checked = checked;
    postres_input.checked = checked;
}

