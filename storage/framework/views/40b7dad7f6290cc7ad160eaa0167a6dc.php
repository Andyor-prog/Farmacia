<?php $__env->startSection('titulo','Farmacia Misericordia'); ?>

<?php $__env->startSection('contenido'); ?>

 <main class="flex flex-col w-full bg-gray-50">

    <div class="overflow-visible">
    <section class="servicio-card flex flex-col lg:flex-row bg-white  p-2 m-2 rounded-lg shadow-m">
      <div class=" flex flex-col w-full lg:w-1/2  m-2 rounded-lg p-2">
        <div class=" p-3 m-1 rounded">
          <h2 class="text-2xl font-semibold mb-2">Servicio de Entrega a Domicilio</h2>
        </div>
        <div class="p-3 m-1 rounded">
          <p class="leading-relaxed">
            El servicio de entrega a domicilio de <strong>Farmacia VidaPlena</strong> permite a nuestros clientes recibir sus productos farmacéuticos y de cuidado personal en la dirección indicada al momento de la compra.
            <ul class="list-disc pl-6 mt-2">
              <li>Entregas disponibles de 9:00 a 20:00 hrs, lunes a domingo.</li>
              <li>Pedidos confirmados antes de las 18:00 hrs se entregan el mismo día (sujeto a disponibilidad).</li>
              <li>En caso de retrasos por causas externas (tráfico, clima, imprevistos), el cliente será notificado.</li>
              <li>Los medicamentos controlados sólo podrán entregarse con receta médica válida.</li>
            </ul>
          </p>
        </div>
      </div>
      <div class="flex justify-center items-center w-full lg:w-1/2  m-2 rounded-lg p-2">
        <img src="/pictures/Servicios/entregas-a-domicilio-1080x675.jpg" class="bg-gray-200 w-full h-48 lg:h-80 flex justify-center items-center rounded">
      </img>
      </div>
    </section>
    </div>

    
    <section class="servicio-card flex flex-col lg:flex-row bg-white m-2 rounded-lg shadow-m">
      <div class="flex justify-center items-center w-full lg:w-1/2  m-2 rounded-lg p-2">
        <img src="/pictures/Servicios/doctor-main-banner.webp" class="  h-48 lg:h-80 flex justify-center items-center rounded">
      </img>
      </div>
      <div class="flex flex-col w-full lg:w-1/2 m-2 rounded-lg p-2">
        <div class=" p-3 m-1 rounded">
          <h2 class="text-2xl font-semibold mb-2">Servicio de Consultas Médicas a Domicilio</h2>
        </div>
        <div class=" p-3 m-1 rounded">
          <p class="leading-relaxed">
            Nuestro servicio de consultas médicas a domicilio tiene como finalidad brindar atención profesional en la comodidad del hogar.
            <ul class="list-disc pl-6 mt-2"><li>Las consultas son realizadas por médicos certificados y previamente verificados.</li>
              <li>Disponible únicamente en Ciudad de México y área metropolitana.</li>
              <li>Incluye valoración general, revisión de síntomas y receta médica digital (si aplica).</li>
              <li>El pago se realiza antes o al momento de la consulta, según el método seleccionado.</li>
            </ul>
          </p>
        </div>
      </div>
    </section>

    
    <section class="servicio-card flex flex-col bg-white m-2 rounded-lg p-2">
      <div class="m-2 rounded-lg p-2">
        <div class=" p-3 m-1 rounded text-center font-semibold">
          <h2 class="text-2xl font-semibold mb-2">Términos y Condiciones Generales</h2>
        </div>
      </div>
      <div class=" m-2 rounded-lg p-2">
        <div class=p-3 m-1 rounded text-justify">
          <p class="text-lg leading-relaxed">
            Al utilizar los servicios de <strong>Farmacia VidaPlena</strong>, el cliente acepta los siguientes términos:
            <ol class="list-decimal pl-6 mt-2">
              <li class="text-lg">Los precios y promociones están sujetos a cambios sin previo aviso.</li>
              <li class="text-lg">El usuario es responsable de proporcionar información veraz para la entrega y atención médica.</li>
              <li class="text-lg">Farmacia VidaPlena no se hace responsable por el uso indebido de medicamentos adquiridos.</li>
              <li class="text-lg">El servicio de consultas médicas no sustituye la atención de urgencias hospitalarias.</li>
              <li class="text-lg">Los datos personales serán tratados conforme a la ley y nuestro aviso de privacidad.</li>
            </ol>
            <p class="mt-4 text-lg">Para más información o aclaraciones, comuníquese al <strong>55 1234 5678</strong> o escriba a <strong>soporte@misericordia.com.mx</strong>.</p>
          </p>
        </div>
      </div>
    </section>

  </main>

<?php $__env->stopSection(); ?>

<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
<?php echo $__env->make('/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Farmacia-main\resources\views/servicios.blade.php ENDPATH**/ ?>