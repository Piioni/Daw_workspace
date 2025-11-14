<?php
$title = 'Reloj Digital';
include VIEW_DIR.'/partials/__header.php';
?>

<div class="mb-15 w-full">
    <main>
        <div class="mx-auto mt-12 max-w-2xl">
            <div class="card">
                <div class="text-heading mb-8 text-center text-2xl font-semibold">
                    <h2>Reloj Digital</h2>
                </div>
                <div class="flex flex-col items-center justify-center gap-8">
                    <div id="reloj" class="text-heading font-monofamily text-6xl font-bold"></div>
                    <button
                        onclick="window.close()"
                        class="btn-form"
                    >
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
    /**
     * Función que actualiza la hora del reloj digital
     * Obtiene la hora actual del sistema y la muestra en formato HH:MM:SS
     */
    function actualizarReloj() {
        // Obtener la fecha y hora actual del sistema
        const ahora = new Date();

        // Extraer las horas, minutos y segundos
        let horas = ahora.getHours();
        let minutos = ahora.getMinutes();
        let segundos = ahora.getSeconds();

        // Añadir un cero delante si el valor es menor que 10 (formato 00-59)
        horas = horas < 10 ? '0' + horas : horas;
        minutos = minutos < 10 ? '0' + minutos : minutos;
        segundos = segundos < 10 ? '0' + segundos : segundos;

        // Actualizar el contenido del elemento HTML con id "reloj"
        document.getElementById('reloj').textContent = `${horas}:${minutos}:${segundos}`;
    }

    // Ejecutar la función inmediatamente al cargar la página
    actualizarReloj();

    // Actualizar el reloj cada 1000 milisegundos (1 segundo)
    setInterval(actualizarReloj, 1000);
</script>

<?php
include VIEW_DIR.'/partials/__footer.php';
?>
