<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <title><?php echo $__env->yieldContent('titulo'); ?></title>
    <script src="https://unpkg.com/alpinejs" defer></script>
</head>
<body class="min-h-screen flex flex-col">
  <div x-data="{ open: false }" class="flex flex-col flex-grow">

    <!-- HEADER -->
  <header class="flex flex-col md:flex-row items-center justify-between w-full bg-blue-500 p-4 relative z-50">
    <!-- Logo -->
    <div class="flex items-center gap-3 pl-6">
      <img src="/pictures/Index/logo-farmacia.jpg" 
           alt="Logo Farmacia VidaPlena" 
           class="h-12 w-12 object-contain rounded bg-white p-1 shadow-md">
      <span class="text-white font-bold text-2xl">Farmacia Misericordia</span>
    </div>
    <div class="hidden md:flex flex-1"></div>
     <!-- Perfil -->
    <div class="flex items-center gap-2  text-white p-2 rounded-lg mr-6 cursor-pointer hover:bg-blue-600 transition">
      <img src="/pictures/Index/perfil.png" 
           alt="Perfil Usuario" 
           class="h-8 w-8 rounded-full bg-white p-1">
      <a href="/Login"class="sm:inline font-medium text-2xl">Perfil</a>

      <!-- Botón hamburguesa -->
    <button @click="open = !open" class="md:hidden absolute right-4 top-4 bg-blue-400 p-2 rounded text-white focus:outline-none">
      <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
           viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16" />
      </svg>
      <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
           viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
  </header>

  <!-- NAV principal (centrado en escritorio) -->
  <nav class="hidden md:flex justify-center items-center w-full bg-cyan-500 p-2 space-x-4">
    <a href="/Inicio" class="bg-cyan-400 text-white px-4 py-2 rounded hover:bg-cyan-600 transition">Inicio</a>
    <a href="/Productos" class="bg-cyan-400 text-white px-4 py-2 rounded hover:bg-cyan-600 transition">Productos</a>
    <a href="/Servicios" class="bg-cyan-400 text-white px-4 py-2 rounded hover:bg-cyan-600 transition">Servicios</a>
    <a href="/Promociones" class="bg-cyan-400 text-white px-4 py-2 rounded hover:bg-cyan-600 transition">Promociones</a>

    <!-- Menú desplegable centrado -->
    <div class="relative">
      <select id="menu" name="menu"
        class="bg-cyan-400 text-white font-medium rounded px-4 py-2 hover:bg-cyan-600 focus:ring-2 focus:ring-cyan-300 cursor-pointer outline-none">
        <option selected disabled>Sobre nosotros</option>
        <option value="blog">Blog</option>
        <option value="faq">Preguntas frecuentes</option>
        <option value="contacto">Contacto</option>
        <option value="politicas">Políticas</option>
        <option value="sucursal">Sucursal</option>
      </select>
    </div>

    <a href="/Pago" class="bg-cyan-400 text-white px-4 py-2 rounded hover:bg-cyan-600 transition">Carrito</a>
  </nav>

   <!-- MENÚ LATERAL (solo móviles) -->
  <div class="fixed inset-0 bg-transparent bg-opacity-40 z-40 md:hidden" x-show="open" x-transition.opacity @click="open = false"></div>
  <div
    class="fixed top-0 left-0 w-64 h-full bg-cyan-500 text-white transform -translate-x-full transition-transform duration-300 z-50 md:hidden"
    :class="{ 'translate-x-0': open }"
    x-show="open"
    x-transition>
    <div class="flex flex-col p-4 space-y-3">
      <a href="/Inicio" class="bg-cyan-400 p-2 rounded hover:bg-cyan-600 text-center">Inicio</a>
      <a href="/Productos" class="bg-cyan-400 p-2 rounded hover:bg-cyan-600 text-center">Productos</a>
      <a href="/Servicios" class="bg-cyan-400 p-2 rounded hover:bg-cyan-600 text-center">Servicios</a>
      <a href="/Promociones" class="bg-cyan-400 p-2 rounded hover:bg-cyan-600 text-center">Promociones</a>

      <div class="bg-cyan-400 p-2 rounded">
        <label class="block text-center font-semibold mb-1">Sobre nosotros</label>
        <select id="menuMobile" name="menuMobile"
          class="w-full appearance-none bg-cyan-400 text-white font-medium rounded hover:bg-cyan-600 focus:ring-2 focus:ring-cyan-300 cursor-pointer outline-none">
          <option selected disabled>Selecciona...</option>
          <option value="blog">Blog</option>
          <option value="faq">Preguntas frecuentes</option>
          <option value="contacto">Contacto</option>
          <option value="politicas">Políticas</option>
          <option value="sucursal">Sucursal</option>
        </select>
      </div>

      <a href="/Pago" class="bg-cyan-400 p-2 rounded hover:bg-cyan-600 text-center">Carrito</a>
      <button @click="open = false" class="mt-4 bg-red-500 hover:bg-red-600 p-2 rounded">Cerrar menú</button>
    </div>
  </div>

    <div class="flex-grow">
    <?php echo $__env->yieldContent('contenido'); ?>
    </div>
 

   <!-- FOOTER -->
  <footer class="flex flex-col md:flex-row w-full bg-blue-500 text-white text-center p-4 mt-auto">
    <div class="flex-1 m-2 p-2 rounded">
      <h3 class="text-2xl font-semibold mb-2">Sobre nosotros</h3>
      <p class="text-lg">Farmacia Misericordia nació con el compromiso de brindar productos farmacéuticos y servicios médicos accesibles, siempre con un trato humano y profesional.</p>
    </div>
    <div class="flex-1 m-2 p-2 rounded">
      <h3 class="text-2xl font-semibold mb-2">Contáctanos</h3>
      <p class="text-lg"> 55 1234 5678<br> Calle Salud #45, Col. Esperanza, CDMX<br>contacto@misericordia.com.mx</p>
    </div>
  </footer>

  <script>
  document.getElementById("menu").addEventListener("change", function() {
    const value = this.value;
    if (value === "blog") window.location.href = "/Blog";
    if (value === "faq") window.location.href = "/Preguntas";
    if (value === "contacto") window.location.href = "/Contacto";
    if (value === "politicas") window.location.href = "/Politicas";
    if (value === "sucursal") window.location.href = "/Sucursales";
    });

    document.getElementById("menuMobile").addEventListener("change", function() {
    const value = this.value;
    if (value === "blog") window.location.href = "/Blog";
    if (value === "faq") window.location.href = "/Preguntas";
    if (value === "contacto") window.location.href = "/Contacto";
    if (value === "politicas") window.location.href = "/Politicas";
    if (value === "sucursal") window.location.href = "/Sucursales";
    });
    </script>

  </div>
</body>
</html> <?php /**PATH C:\xampp\htdocs\Farmacia-main\resources\views//index.blade.php ENDPATH**/ ?>