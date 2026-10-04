<?php $__env->startSection('titulo','Productos'); ?>

<?php $__env->startSection('contenido'); ?>

<div x-data="{ open: false }" class="flex flex-col min-h-screen">

    

        <button @click="open = !open" class="md:hidden absolute right-4 top-4 bg-blue-400 p-2 rounded text-white">
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

    <main class="flex flex-col flex-grow bg-gray-100 p-8">

        <div class="flex justify-center mb-4">
            <input 
                type="text" 
                id="buscador" 
                placeholder="Buscar producto..." 
                class="border border-gray-400 rounded px-3 py-2 w-1/2 focus:outline-none focus:ring focus:ring-blue-300"
            >
        </div>
        <!-- BOTONES DE CATEGORÍAS -->
        <div class="flex flex-wrap justify-center gap-4 mb-6">
            <button class="filtrar-categoria bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded" data-cat="todos">Todos</button>
            <button class="filtrar-categoria bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded" data-cat="medicamentos">Medicamentos</button>
            <button class="filtrar-categoria bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded" data-cat="vitaminas">Vitaminas</button>
            <button class="filtrar-categoria bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded" data-cat="higiene">Higiene</button>
            <button class="filtrar-categoria bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded" data-cat="equipo">Equipo Médico</button>
        </div>

        <!-- PRODUCTOS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 place-items-center" id="productos-grid">

            <!-- MEDICAMENTOS -->
            <div class="producto medicamentos paracetamol border border-gray-400 rounded-lg w-64 p-4 flex flex-col items-center transition-transform duration-300"
                data-categoria="medicamentos"
                data-nombre="Paracetamol 500mg"
                data-precio="$100"
                data-descripcion="Analgésico y antipirético que ayuda a reducir el dolor y la fiebre."
                data-imagen="<?php echo e(asset('pictures/Productos/paracetamol.webp')); ?>">
                <img src="<?php echo e(asset('pictures/Productos/paracetamol.webp')); ?>" class="h-48 w-48 object-contain mb-2">
                <p class="text-center">Paracetamol 500mg - $100</p>
            </div>

            <div class="producto medicamentos ibuprofeno border border-gray-400 rounded-lg w-64 p-4 flex flex-col items-center transition-transform duration-300"
                data-categoria="medicamentos"
                data-nombre="Ibuprofeno 400mg"
                data-precio="$120"
                data-descripcion="Antiinflamatorio no esteroideo que ayuda a aliviar el dolor y la inflamación."
                data-imagen="<?php echo e(asset('pictures/Productos/ibuprofeno.png')); ?>">
                <img src="<?php echo e(asset('pictures/Productos/ibuprofeno.png')); ?>" class="h-48 w-48 object-contain mb-2">
                <p class="text-center">Ibuprofeno 400mg - $120</p>
            </div>

            <div class="producto medicamentos amoxilina border border-gray-400 rounded-lg w-64 p-4 flex flex-col items-center transition-transform duration-300"
                data-categoria="medicamentos"
                data-nombre="Amoxicilina 500mg"
                data-precio="$150"
                data-descripcion="Antibiótico de amplio espectro."
                data-imagen="<?php echo e(asset('pictures/Productos/amoxicilina.webp')); ?>">
                <img src="<?php echo e(asset('pictures/Productos/amoxicilina.webp')); ?>" class="h-48 w-48 object-contain mb-2">
                <p class="text-center">Amoxicilina 500mg - $150</p>
            </div>

            <div class="producto medicamentos omeprazol border border-gray-400 rounded-lg w-64 p-4 flex flex-col items-center transition-transform duration-300"
                data-categoria="medicamentos"
                data-nombre="Omeprazol 20mg"
                data-precio="$130"
                data-descripcion="Inhibidor de ácido estomacal."
                data-imagen="<?php echo e(asset('pictures/Productos/omeprazol.png')); ?>">
                <img src="<?php echo e(asset('pictures/Productos/omeprazol.png')); ?>" class="h-48 w-48 object-contain mb-2">
                <p class="text-center">Omeprazol 20mg - $130</p>
            </div>

            <div class="producto medicamentos suero-oral border border-gray-400 rounded-lg w-64 p-4 flex flex-col items-center transition-transform duration-300"
                data-categoria="medicamentos"
                data-nombre="Suero Oral Vida 4 sobres"
                data-precio="$60"
                data-descripcion="Hidratación oral para reponer electrolitos."
                data-imagen="<?php echo e(asset('pictures/Productos/suero.webp')); ?>">
                <img src="<?php echo e(asset('pictures/Productos/suero.webp')); ?>" class="h-48 w-48 object-contain mb-2">
                <p class="text-center">Suero Oral Vida 4 sobres - $60</p>
            </div>


            <!-- VITAMINAS -->
            <div class="producto vitaminas vitamina-c  border border-gray-400 rounded-lg w-64 p-4 flex flex-col items-center transition-transform duration-300"
                data-categoria="vitaminas"
                data-nombre="Vitamina C 300mg"
                data-precio="$400"
                data-descripcion="Refuerza el sistema inmunológico."
                data-imagen="<?php echo e(asset('pictures/Productos/vitaminaC.jpg')); ?>">
                <img src="<?php echo e(asset('pictures/Productos/vitaminaC.jpg')); ?>" class="h-48 w-48 object-contain mb-2">
                <p class="text-center">Vitamina C 300mg - $400</p>
            </div>

            <div class="producto vitaminas complejo-b  border border-gray-400 rounded-lg w-64 p-4 flex flex-col items-center transition-transform duration-300"
                data-categoria="vitaminas"
                data-nombre="Complejo B (30 cápsulas)"
                data-precio="$180"
                data-descripcion="Mejora salud nerviosa y energía."
                data-imagen="<?php echo e(asset('pictures/Productos/complejoB.jpg')); ?>">
                <img src="<?php echo e(asset('pictures/Productos/complejoB.jpg')); ?>" class="h-48 w-48 object-contain mb-2">
                <p class="text-center">Complejo B (30 cápsulas) - $180</p>
            </div>

            <div class="producto vitaminas magnesio border border-gray-400 rounded-lg w-64 p-4 flex flex-col items-center transition-transform duration-300"
                data-categoria="vitaminas"
                data-nombre="Magnesio"
                data-precio="$399"
                data-descripcion="Ayuda a músculos y nervios."
                data-imagen="<?php echo e(asset('pictures/Productos/magnesio.jpg')); ?>">
                <img src="<?php echo e(asset('pictures/Productos/magnesio.jpg')); ?>" class="h-48 w-48 object-contain mb-2">
                <p class="text-center">Magnesio - $399</p>
            </div>

            <div class="producto vitaminas multivitaminico border border-gray-400 rounded-lg w-64 p-4 flex flex-col items-center transition-transform duration-300"
                data-categoria="vitaminas"
                data-nombre="Multivitamínico Adulto"
                data-precio="$365"
                data-descripcion="Aporte vitamínico completo."
                data-imagen="<?php echo e(asset('pictures/Productos/multivitaminico.jpg')); ?>">
                <img src="<?php echo e(asset('pictures/Productos/multivitaminico.jpg')); ?>" class="h-48 w-48 object-contain mb-2">
                <p class="text-center">Multivitamínico Adulto - $365</p>
            </div>

            <div class="producto vitaminas calcio-vitamina-d3 border border-gray-400 rounded-lg w-64 p-4 flex flex-col items-center transition-transform duration-300"
                data-categoria="vitaminas"
                data-nombre="Calcio + Vitamina D3"
                data-precio="$250"
                data-descripcion="Fortalece huesos."
                data-imagen="<?php echo e(asset('pictures/Productos/calcioD3.jpg')); ?>">
                <img src="<?php echo e(asset('pictures/Productos/calcioD3.jpg')); ?>" class="h-48 w-48 object-contain mb-2">
                <p class="text-center">Calcio + Vitamina D3 - $250</p>
            </div>


            <!-- HIGIENE -->
            <div class="producto higiene alcohol-en-gel-250ml border border-gray-400 rounded-lg w-64 p-4 flex flex-col items-center transition-transform duration-300"
                data-categoria="higiene"
                data-nombre="Alcohol en Gel 250ml"
                data-precio="$25"
                data-descripcion="Gel antibacterial."
                data-imagen="<?php echo e(asset('pictures/Productos/alcohol-gel.jpeg')); ?>">
                <img src="<?php echo e(asset('pictures/Productos/alcohol-gel.jpeg')); ?>" class="h-48 w-48 object-contain mb-2">
                <p class="text-center">Alcohol en Gel 250ml - $25</p>
            </div>

            <div class="producto higiene jabon-antibacterial border border-gray-400 rounded-lg w-64 p-4 flex flex-col items-center transition-transform duration-300"
                data-categoria="higiene"
                data-nombre="Jabón Antibacterial"
                data-precio="$40"
                data-descripcion="Limpieza profunda."
                data-imagen="<?php echo e(asset('pictures/Productos/jabon-antibacterial.jpg')); ?>">
                <img src="<?php echo e(asset('pictures/Productos/jabon-antibacterial.jpg')); ?>" class="h-48 w-48 object-contain mb-2">
                <p class="text-center">Jabón Antibacterial - $40</p>
            </div>

            <div class="producto higiene mascarilla-facial border border-gray-400 rounded-lg w-64 p-4 flex flex-col items-center transition-transform duration-300"
                data-categoria="higiene"
                data-nombre="Mascarilla facial"
                data-precio="$260"
                data-descripcion="Protección respiratoria."
                data-imagen="<?php echo e(asset('pictures/Productos/mascarilla.png')); ?>">
                <img src="<?php echo e(asset('pictures/Productos/mascarilla.png')); ?>" class="h-48 w-48 object-contain mb-2">
                <p class="text-center">Mascarilla facial - $260</p>
            </div>

            <div class="producto higiene cepillo-dental border border-gray-400 rounded-lg w-64 p-4 flex flex-col items-center transition-transform duration-300"
                data-categoria="higiene"
                data-nombre="Cepillo Dental"
                data-precio="$35"
                data-descripcion="Cepillo de dientes suave."
                data-imagen="<?php echo e(asset('pictures/Productos/cepillo-dental.webp')); ?>">
                <img src="<?php echo e(asset('pictures/Productos/cepillo-dental.webp')); ?>" class="h-48 w-48 object-contain mb-2">
                <p class="text-center">Cepillo Dental - $35</p>
            </div>

            <div class="producto higiene pasta-dental  border border-gray-400 rounded-lg w-64 p-4 flex flex-col items-center transition-transform duration-300"
                data-categoria="higiene"
                data-nombre="Pasta Dental 150g"
                data-precio="$120"
                data-descripcion="Limpieza y protección."
                data-imagen="<?php echo e(asset('pictures/Productos/pasta-dental.webp')); ?>">
                <img src="<?php echo e(asset('pictures/Productos/pasta-dental.webp')); ?>" class="h-48 w-48 object-contain mb-2">
                <p class="text-center">Pasta Dental 150g - $120</p>
            </div>


            <!-- EQUIPO MÉDICO -->
            <div class="producto equipo termometro-digital border border-gray-400 rounded-lg w-64 p-4 flex flex-col items-center transition-transform duration-300"
                data-categoria="equipo"
                data-nombre="Termómetro Digital"
                data-precio="$220"
                data-descripcion="Medición rápida y precisa."
                data-imagen="<?php echo e(asset('pictures/Productos/termometro-digital.jpg')); ?>">
                <img src="<?php echo e(asset('pictures/Productos/termometro-digital.jpg')); ?>" class="h-48 w-48 object-contain mb-2">
                <p class="text-center">Termómetro Digital - $220</p>
            </div>

            <div class="producto equipo oximetro-de-pulso border border-gray-400 rounded-lg w-64 p-4 flex flex-col items-center transition-transform duration-300"
                data-categoria="equipo"
                data-nombre="Oxímetro de Pulso"
                data-precio="$450"
                data-descripcion="Mide oxígeno en sangre."
                data-imagen="<?php echo e(asset('pictures/Productos/oximetro.webp')); ?>">
                <img src="<?php echo e(asset('pictures/Productos/oximetro.webp')); ?>" class="h-48 w-48 object-contain mb-2">
                <p class="text-center">Oxímetro de Pulso - $450</p>
            </div>

            <div class="producto equipo tensiometro-de-brazo border border-gray-400 rounded-lg w-64 p-4 flex flex-col items-center transition-transform duration-300"
                data-categoria="equipo"
                data-nombre="Tensiómetro de Brazo"
                data-precio="$600"
                data-descripcion="Mide presión arterial."
                data-imagen="<?php echo e(asset('pictures/Productos/tensiometro.png')); ?>">
                <img src="<?php echo e(asset('pictures/Productos/tensiometro.png')); ?>" class="h-48 w-48 object-contain mb-2">
                <p class="text-center">Tensiómetro de Brazo - $600</p>
            </div>

            <div class="producto equipo curitas border border-gray-400 rounded-lg w-64 p-4 flex flex-col items-center transition-transform duration-300"
                data-categoria="equipo"
                data-nombre="Curitas (30 unidades)"
                data-precio="$50"
                data-descripcion="Protección para heridas pequeñas."
                data-imagen="<?php echo e(asset('pictures/Productos/curitas.webp')); ?>">
                <img src="<?php echo e(asset('pictures/Productos/curitas.webp')); ?>" class="h-48 w-48 object-contain mb-2">
                <p class="text-center">Curitas (30 unidades) - $50</p>
            </div>

            <div class="producto equipo guantes-de-latex border border-gray-400 rounded-lg w-64 p-4 flex flex-col items-center transition-transform duration-300"
                data-categoria="equipo"
                data-nombre="Guantes de Látex (100 pzas)"
                data-precio="$150"
                data-descripcion="Guantes desechables médicos."
                data-imagen="<?php echo e(asset('pictures/Productos/guantes-latex.jpg')); ?>">
                <img src="<?php echo e(asset('pictures/Productos/guantes-latex.jpg')); ?>" class="h-48 w-48 object-contain mb-2">
                <p class="text-center">Guantes de Látex (100 pzas) - $150</p>
            </div>

        </div>

    </main>
</div>


<?php $__env->stopSection(); ?>

<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
<?php echo $__env->make('/inicio', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Farmacia-main\resources\views/productos.blade.php ENDPATH**/ ?>