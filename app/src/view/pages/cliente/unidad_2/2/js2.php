<?php
$title = "Ejercicio 2 - Java Script";
global $VIEW_DIR;
require $VIEW_DIR.'/partials/__header.php';
?>

<div class="w-full mb-15">
  <div class="flex flex-col text-heading text-4xl font-semibold mt-10 py-2">
    <div class="text-center text-primary">
      <h1>Ejercicio 2 - Javascript</h1>
    </div>
  </div>
  <main class="flex flex-col gap-6 max-w-md w-full mx-auto mt-12">
    <div
        class="bg-secondary border-border dark:bg-secondary-dark border dark:border-border-dark rounded-lg shadow-lg p-6 space-y-10">
      <div>
        <p class="text-2xl"> > Clasificación de personas por edad:</p>
        <form id="form_clasificacion_edad" class="mt-6">
          <div class="space-y-2 max-w-xs">
            <label for="edad_persona" class="form-label">
              Edad <span class="text-red-500">*</span>
            </label>
            <input type="number" id="edad_persona" name="edad_persona" required class="form-input" min="0">
          </div>
          <div class="mt-4 flex justify-center">
            <button type="submit" class="btn-form">
              Clasificar
            </button>
          </div>
        </form>
        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg mt-3" style="display: none;"
             id="container_clasificacion_edad">
          <h4 class="font-semibold mb-3">Resultado:</h4>
          <p class="text-lg text-secondary" id="resultado_clasificacion"></p>
        </div>
      </div>
      <div>
        <p class="text-2xl"> > Listado de características de un monitor Dell (while):</p>
        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg mt-3">
          <h4 class="font-semibold mb-3">Características:</h4>
          <ul class="list-disc pl-6 text-lg text-secondary" id="caracteristicas_monitor"></ul>
        </div>
      </div>
    </div>
  </main>
</div>

<script>
    const formClasificacion = document.getElementById('form_clasificacion_edad');
    const containerResultado = document.getElementById('container_clasificacion_edad');
    const resultadoClasificacion = document.getElementById('resultado_clasificacion');

    formClasificacion.addEventListener('submit', function (event) {
        event.preventDefault();
        const edad = parseInt(document.getElementById('edad_persona').value);

        let clasificacion = '';
        if (edad < 30) {
            clasificacion = 'Joven';
        } else if (edad >= 30 && edad <= 59) {
            clasificacion = 'Persona de mediana edad';
        } else if (edad >= 60) {
            clasificacion = 'Persona vieja';
        } else {
            clasificacion = 'Edad no válida';
        }

        resultadoClasificacion.textContent = `La persona es: ${clasificacion}`;
        containerResultado.style.display = 'block';
    });

    // Listar características del monitor Dell usando while
    const caracteristicas = [
        "Marca: Dell",
        "Tamaño: 19 pulgadas",
        "Resolución: 1920x1080 píxeles"
    ];
    const ulCaracteristicas = document.getElementById('caracteristicas_monitor');
    let i = 0;
    while (i < caracteristicas.length) {
        const li = document.createElement('li');
        li.textContent = caracteristicas[i];
        ulCaracteristicas.appendChild(li);
        i++;
    }
</script>

<?php
global $VIEW_DIR;
require $VIEW_DIR.'/partials/__footer.php';
?>
