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
    function actualizarReloj() {
        const ahora = new Date();
        let horas = ahora.getHours();
        let minutos = ahora.getMinutes();
        let segundos = ahora.getSeconds();

        horas = horas < 10 ? '0' + horas : horas;
        minutos = minutos < 10 ? '0' + minutos : minutos;
        segundos = segundos < 10 ? '0' + segundos : segundos;

        document.getElementById('reloj').textContent = `${horas}:${minutos}:${segundos}`;
    }

    actualizarReloj();
    setInterval(actualizarReloj, 1000);
</script>

<?php
include VIEW_DIR.'/partials/__footer.php';
?>
