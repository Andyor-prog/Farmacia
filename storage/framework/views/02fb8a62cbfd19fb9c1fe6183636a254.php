<?php $__env->startSection('titulo','Farmacia Misericordia'); ?>

<?php $__env->startSection('contenido'); ?>

  <!-- CONTENIDO PRINCIPAL -->
  <main class="flex flex-col w-full bg-gray-50 ">

    <section class="relative w-full h-64 md:h-96">

  <!-- Fondo borroso de la imagen -->
  <div class="absolute inset-0 bg-cover bg-center blur-sm"
       style="background-image: url('/pictures/Inicio/farmacias-pjpg.webp');">
  </div>

  <!-- Imagen principal -->
  <img src="/pictures/Inicio/farmacias-pjpg.webp"
       class="relative mx-auto h-full object-contain">

</section>

    <!-- Párrafo central -->
    <section class="flex flex-col  rounded-lg ">
      <div class="bg-white p-4 rounded text-justify rounded-lg   ">
        <p class="text-lg leading-relaxed">
          En <strong>Farmacia Misericordia</strong>, cuidamos tu salud con productos de calidad y atención personalizada. 
          Contamos con medicamentos, productos naturales, artículos de higiene y servicio de entrega a domicilio para que nunca te falte lo esencial. 
          Nuestra misión es ofrecer bienestar accesible y confiable, siempre cerca de ti.
        </p>
      </div>
    </section>

    <!-- Imagen + texto lado a lado -->
    <section class="flex flex-col lg:flex-row rounded-lg bg-white  p-2 m-2 rounded-lg shadow-m ">
      <div class=" flex justify-center items-center w-full lg:w-1/2  p-1 rounded-lg">
        <img src="/pictures/Inicio/farmacias-del-pueblo-4.jpg" class="w-full h-48 lg:h-80 flex justify-center items-center rounded">   
      </img>
      </div>
      <div class="  flex flex-col w-full lg:w-1/2  rounded-lg p-1 rounded-lg">
        <div class=" p-3 m-1 rounded text-center font-semibold">
          <h2 class="text-2xl font-semibold mb-2">Promociones</h2>
        </div>
        <div class=" p-3 m-1 rounded text-justify">
          <p class="text-lg">
            Ahorra en grande con nuestras ofertas:
            <ul class="list-disc pl-6 mt-2">
              <li class="text-lg">20% de descuento en medicamentos genéricos seleccionados.</li>
              <li class="text-lg">Envíos gratis en compras mayores a $300 MXN.</li>
              <li class="text-lg">Consultas médicas a domicilio con tarifa preferencial para clientes frecuentes.</li>
            </ul>
            <p class="mt-4 font-medium text-lg">¡Cuidar tu salud nunca fue tan sencillo!</p>
          </p>
        </div>
      </div>
    </section>

  </main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Farmacia-main\resources\views//inicio.blade.php ENDPATH**/ ?>