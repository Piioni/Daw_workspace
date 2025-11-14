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
                    <p>Reloj implementado por: [Tu Nombre y Apellidos]</p>
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
    document.getElementById('dame-hora').addEventListener('click', () => {
        window.open('reloj', 'reloj', 'width=550,height=450,top=300,left=200');
    });
</script>

<?php
include VIEW_DIR.'/partials/__footer.php';
?>
