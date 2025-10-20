<?php
$title = 'Objetos predefinidos en JavaScript';
global $VIEW_DIR;
include $VIEW_DIR . '/partials/__header.php';
?>

<div class="mb-15 w-full">
    <div class="hero">
        <h1>Objetos predefinidos en Javascript</h1>
    </div>
    <main>
        <div class="mx-auto mt-12 grid gap-16">
            <div class="card mx-auto grid h-full w-fit gap-6 border-accent/30 bg-accent/10 p-14 dark:bg-accent-dark/10">
                <div class="text-title mb-4 text-center text-3xl font-semibold">
                    <h2>Objeto number</h2>
                </div>
                <div class="grid w-5xl grid-cols-1 gap-12 sm:grid-cols-1 md:grid-cols-2">
                    <div class="card border-2 border-dashed border-accent/30">
                        <h2 class="text-heading mb-4 text-2xl font-semibold">Conversion a numero</h2>
                        <ul id="conversiones"></ul>
                        <script>
                            const numeroString = '12345';
                            const numeroNumber = Number(numeroString);
                            const numeroParse = parseFloat(numeroString);
                            const listaConversiones = document.getElementById('conversiones');
                            listaConversiones.innerHTML +=
                                `<li><strong>String:</strong> "${numeroString}" - Tipo: ${typeof numeroString}</li>` +
                                `<li><strong>Number():</strong> ${numeroNumber} - Tipo: ${typeof numeroNumber}</li>` +
                                `<li><strong>parseFloat():</strong> ${numeroParse} - Tipo: ${typeof numeroParse}</li>`;
                        </script>
                    </div>

                    <div class="card justify-start border-2 border-dashed border-accent/30">
                        <h2 class="text-heading mb-4 text-2xl font-semibold">Propiedades y métodos</h2>
                        <ul id="metodos_number"></ul>
                        <script>
                            const num = 45.6789;
                            const listaMetodos = document.getElementById('metodos_number');
                            listaMetodos.innerHTML +=
                                `<li><strong>toFixed(2):</strong> ${num.toFixed(2)}</li>` +
                                `<li><strong>toPrecision(3):</strong> ${num.toPrecision(3)}</li>`;
                        </script>
                    </div>

                    <div class="card border-2 border-dashed border-accent/30">
                        <h2 class="text-heading mb-4 text-2xl font-semibold">Comprobacion de NaN's</h2>
                        <ul id="comprobacion_valores"></ul>
                        <script>
                            const listaComprobacion = document.getElementById('comprobacion_valores');
                            const valor1 = Number('hola');
                            const valor2 = parseInt('12px');
                            const valor3 = parseFloat('5.3kg');

                            listaComprobacion.innerHTML +=
                                `<li><strong>Number("hola"):</strong> ${valor1} - isNaN: ${isNaN(valor1)}</li>` +
                                `<li><strong>parseInt("12px"):</strong> ${valor2} - isNaN: ${isNaN(valor2)}</li>` +
                                `<li><strong>parseFloat("5.3kg"):</strong> ${valor3} - isNaN: ${isNaN(valor3)}</li>`;
                        </script>
                    </div>

                    <div class="card border-2 border-dashed border-accent/30">
                        <h2 class="text-heading mb-4 text-2xl font-semibold">Ejercicio mixto</h2>
                        <ul id="ejercicio_mixto" style="display: none" class="space-y-2"></ul>
                        <form id="ejercicio_form" class="space-y-4">
                            <div class="space-y-2">
                                <label for="input_ej1" class="form-label">Ingrese el primer número</label>
                                <input id="input_ej1" type="number" value="0" class="form-input" />
                            </div>
                            <div class="space-y-2">
                                <label for="input_ej2" class="form-label">Ingrese el segundo número</label>
                                <input id="input_ej2" type="number" value="0" class="form-input" />
                            </div>
                            <div class="mt-4">
                                <button type="button" id="btn_calcular" class="btn-form">Calcular</button>
                            </div>
                        </form>

                        <script>
                            const listaEjercicio = document.getElementById('ejercicio_mixto');
                            const formulario = document.getElementById('ejercicio_form');
                            const input1El = document.getElementById('input_ej1');
                            const input2El = document.getElementById('input_ej2');
                            const btnCalcular = document.getElementById('btn_calcular');

                            function calcularYMostrar() {
                                const a = Number(input1El.value);
                                const b = Number(input2El.value);

                                if (isNaN(a) || isNaN(b)) {
                                    listaEjercicio.innerHTML = `<li class="text-red-600 dark:text-red-400">Error: alguno de los valores no es un número válido.</li>`;
                                } else {
                                    listaEjercicio.innerHTML =
                                        `<li><strong>Suma (${a} + ${b}):</strong> ${a + b}</li>` +
                                        `<li><strong>Resta (${a} - ${b}):</strong> ${a - b}</li>` +
                                        `<li><strong>Multiplicación (${a} × ${b}):</strong> ${a * b}</li>`;
                                }

                                // Mostrar resultados y ocultar formulario
                                listaEjercicio.style.display = 'block';
                                listaEjercicio.classList.add('fade-in');
                                formulario.style.display = 'none';
                            }

                            btnCalcular.addEventListener('click', calcularYMostrar);
                        </script>
                    </div>
                </div>
            </div>
            <div class="card mx-auto grid h-full w-fit gap-6 border-accent/30 bg-accent/10 p-14 dark:bg-accent-dark/10">
                <div class="text-title mb-4 text-center text-3xl font-semibold">
                    <h2>Objeto String</h2>
                </div>
                <div class="grid w-5xl grid-cols-1 gap-12 sm:grid-cols-3">
                    <div class="card border-2 border-dashed border-accent/30">
                        <h2 class="text-heading mb-4 text-2xl font-semibold">Propiedades básicas</h2>
                        <ul id="propiedades_string"></ul>
                        <script>
                            const texto = 'Javascript es genial';
                            const listaPropiedades = document.getElementById('propiedades_string');
                            listaPropiedades.innerHTML +=
                                `<li><strong>Texto:</strong> ${texto}</li>` +
                                `<li><strong>Longitud:</strong> ${texto.length}</li>` +
                                `<li><strong>Mayusculas: </strong> ${texto.toUpperCase()}</li>` +
                                `<li><strong>Minusculas: </strong> ${texto.toLowerCase()}</li>` +
                                `<li><strong>"Genial": </strong> ${texto.slice(14, 20)}</li>`;
                        </script>
                    </div>
                    <div class="card border-2 border-dashed border-accent/30">
                        <h2 class="text-heading mb-4 text-2xl font-semibold">Búsqueda y remplazo</h2>
                        <ul id="busqueda_remplazo"></ul>
                        <script>

                        </script>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<?php
include $VIEW_DIR . '/partials/__footer.php';
?>
