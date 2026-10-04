<?php $__env->startSection('titulo','Promociones'); ?>

<?php $__env->startSection('contenido'); ?>

<main class="flex flex-col flex-grow p-6">
    <h2 class="text-2xl md:text-3xl font-bold text-center text-blue-600 mb-8">🌟 Promociones Especiales 🌟</h2>

    <div id="promociones" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 place-items-center"></div>
</main>

<script>
// Las rutas estáticas definidas en Blade se mantienen, aunque no se usan directamente en el script principal
window.RUTAS_PROMOCIONES = {
    vitaminaC: "<?php echo e(asset('assets/img/productos/vitaminaC.jpg')); ?>",
    termometro: "<?php echo e(asset('assets/img/productos/termometro-digital.jpg')); ?>",
    omeprazol: "<?php echo e(asset('assets/img/productos/omeprazol.png')); ?>"
};
</script>

  <script>
  // Redirección de menú (sin cambios)
  function redirigir(valor) {
    if (valor) window.location.href = valor;
  }
  document.getElementById("menu").addEventListener("change", e => redirigir(e.target.value));
  document.getElementById("menuMobile").addEventListener("change", e => redirigir(e.target.value));

  // Datos de promociones (sin cambios)
  const promociones = [
    {
      nombre: "Vitamina C 300mg",
      precioNormal: 400,
      precioPromo: 299,
      descuento: "-25% Descuento",
      imagen: "<?php echo e(asset('pictures/Productos/vitaminaC.jpg')); ?>",
      descripcion: "Fortalece tu sistema inmunológico con Vitamina C pura de alta absorción. Ideal para aumentar defensas naturales."
    },
    {
      nombre: "Termómetro Digital",
      precioNormal: 220,
      precioPromo: 160,
      descuento: "Ahorra $60",
      imagen: "<?php echo e(asset('pictures/Productos/termometro-digital.jpg')); ?>",
      descripcion: "Termómetro digital preciso con pantalla LCD. Ideal para medir temperatura en segundos."
    },
    {
      nombre: "Omeprazol 20mg",
      precioNormal: 130,
      precioPromo: 99,
      descuento: "Descuento especial",
      imagen: "<?php echo e(asset('pictures/Productos/omeprazol.png')); ?>",
      descripcion: "Omeprazol 20mg para el alivio del reflujo y acidez estomacal. Eficaz y confiable."
    }
  ];

  // Mostrar tarjetas de promociones
  const contenedor = document.getElementById("promociones");
  promociones.forEach((p, i) => {
    const card = document.createElement("div");
    card.className = "bg-white shadow-lg rounded-lg p-4 flex flex-col items-center text-center hover:scale-105 transition transform cursor-pointer w-72";
    card.innerHTML = `
      <img src="${p.imagen}" alt="${p.nombre}" class="w-48 h-48 object-contain mb-3 rounded">
      <h3 class="font-semibold text-lg text-blue-600">${p.nombre}</h3>
      <p class="text-gray-600 line-through">$${p.precioNormal}</p>
      <p class="text-green-600 text-xl font-bold mb-2">$${p.precioPromo}</p>
      <span class="bg-yellow-400 text-white px-3 py-1 rounded-full font-semibold">${p.descuento}</span>
    `;
    
    // ⭐ CÓDIGO CORREGIDO PARA USAR PARÁMETROS DE URL ⭐
    card.addEventListener("click", () => {
        
        // Paso 1: Limpiar localStorage para forzar que la vista de detalle 
        // use los parámetros de URL (la lógica Blade que ya funciona)
        localStorage.removeItem("productoSeleccionado");
        
        // Paso 2: Construir los parámetros de URL (query string)
        const params = new URLSearchParams();
        
        // Nota: Enviamos el precio de promoción y el normal en la variable 'precio'
        // para que la vista de detalle lo muestre.
        params.set('nombre', p.nombre);
        params.set('precio', `$${p.precioPromo} (Precio normal: $${p.precioNormal})`); 
        params.set('descripcion', `${p.descripcion} (¡${p.descuento}!)`); 
        params.set('imagen', p.imagen);

        // Paso 3: Redirigir a la URL completa
        window.location.href = `/producto?${params.toString()}`;
    });
    
    contenedor.appendChild(card);
  });
  </script>

<?php $__env->stopSection(); ?>

<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

<?php echo $__env->make('/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Farmacia-main\resources\views/promociones.blade.php ENDPATH**/ ?>