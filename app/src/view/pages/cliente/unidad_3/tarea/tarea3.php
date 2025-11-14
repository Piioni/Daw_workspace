<?php
$title = 'Reloj Digital';
include VIEW_DIR.'/partials/__header.php';
?>

<div class="mb-15 w-full">
    <div class="hero">
        <h1>Reloj digital</h1>
    </div>
    <main>
        <div class="mx-auto mt-12 max-w-2xl">
            <div class="card">
                <div class="text-heading mb-6 text-center text-2xl font-semibold">
                    <h2>Reloj digital</h2>
                </div>
                <hr class="my-4 border-border dark:border-border-dark">
                <div class="text-secondary mb-8 text-center">
                    <p>Reloj implementado por: Juan Rangel!</p>
                </div>
                <div class="flex justify-center">
                    <button
                        id="dame-hora"
                        class="btn-form"
                    >
                        Dame la hora
                    </button>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
    /**
     * Event Listener para el botón "Dame la hora"
     * Al hacer clic, abre una ventana emergente con el reloj digital
     */
    document.getElementById('dame-hora').addEventListener('click', () => {
        // Mostrar mensaje en la consola del navegador cada vez que se pulse el botón
        console.log('Botón "Dame la hora" pulsado - Abriendo ventana del reloj digital');

        /**
         * Abrir una nueva ventana emergente con el reloj digital
         * Parámetros:
         * - URL: 'tarea/reloj'
         * - Nombre: 'reloj'
         * - Características: ancho 650px, alto 550px, posición top 300px, left 200px
         */
        window.open('tarea/reloj', 'reloj', 'width=650,height=550,top=300,left=200');
    });
</script>

<?php
include VIEW_DIR.'/partials/__footer.php';
?>
