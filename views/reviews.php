<div class="contenedor bg-image1 pedidos">
  <h1>VALORACIONES</h1>
  <section class="contentPage py-5 mb-5">
    <section>
      <p class="pt-2">Accede a tus pedidos para añadir valoraciones sobre éstos.</p>
      <div class="text-center py-lg-4 py-4">
        <a href="<?= base_url ?>accounts/userorders"><button class="button-1">AÑADIR</button></a>
      </div>
    </section>
    <section class="mt-4">
      <p>Ordenar valoraciones por:</p>
      <select id="select-review">
        <option value="desc">Nota descendente</option>
        <option value="asc">Nota ascendente</option>
      </select>
    </section>
    <section id="reviews_section"></section>
</div>