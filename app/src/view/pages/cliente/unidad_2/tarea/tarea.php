<?php
$title = 'Tarea de la unidad 2 - Cliente';
global $VIEW_DIR;
include $VIEW_DIR . '/partials/__header.php';
?>

<div class="mb-20 w-full">
    <div class="hero">
        <h1>Tarea de unidad 2</h1>
    </div>
    <main>
        <!-- Div principal layout grid de 1 columna.-->
        <div class="mx-auto mt-12 grid max-w-6xl gap-16">
            <div class="card grid h-full gap-6 border-accent/30 bg-accent/10 dark:bg-accent-dark/10">
                <div class="text-title mb-4 text-center text-3xl font-semibold">
                    <h2>Mostrar los elementos del array con diferentes bucles</h2>
                </div>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3">
                    <div class="card border-2 border-dashed border-accent/30">
                        <h2 class="text-heading mb-4 text-2xl font-semibold">Bucle for</h2>
                        <ul id="for"></ul>
                    </div>

                    <div class="card border-2 border-dashed border-accent/30">
                        <h2 class="text-heading mb-4 text-2xl font-semibold">Bucle while</h2>
                        <ul id="while"></ul>
                    </div>
                    <div class="card border-2 border-dashed border-accent/30">
                        <h2 class="text-heading mb-4 text-2xl font-semibold">Bucle do While</h2>
                        <ul id="do-while"></ul>
                    </div>
                </div>
            </div>

            <div class="mx-auto max-w-2xl">
                <div class="card">
                    <div class="text-title mb-6 text-center text-3xl font-semibold">
                        <h2>Conversión de Tipos</h2>
                    </div>

                    <div
                        class="rounded-lg border-2 border-dashed border-accent/30 bg-accent/10 p-6 text-center dark:border-accent-dark/30 dark:bg-accent-dark/10"
                    >
                        <p class="mb-4 text-secondary">
                            Al evaluar la expresión
                            <span
                                class="rounded bg-gray-100 px-2 py-1 font-mono text-sm text-gray-800 dark:bg-gray-800 dark:text-gray-200"
                            >
                                1 + "2"
                            </span>
                            , JavaScript realizará una conversión de tipo automáticamente.
                        </p>

                        <div class="flex items-center justify-center gap-4">
                            <span class="rounded bg-gray-100 px-3 py-2 font-mono text-lg dark:bg-gray-800">
                                1 + "2" =
                            </span>
                            <button
                                id="conversion_boton"
                                class="rounded-lg bg-accent px-4 py-2 text-white transition-all duration-200 hover:scale-105 hover:bg-accent/80 dark:bg-accent-dark dark:hover:bg-accent-dark/80"
                            >
                                Mostrar resultado
                            </button>
                            <span
                                id="conversion"
                                class="rounded bg-accent/20 px-3 py-2 font-bold text-accent dark:bg-accent-dark/20 dark:text-accent-dark"
                                style="display: none"
                            ></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card grid h-full gap-6 border-accent/30 bg-accent/10 dark:bg-accent-dark/10">
                <div class="text-title mb-6 text-center text-3xl font-semibold">
                    <h2>Valores pares del array</h2>
                </div>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-3">
                    <div class="card border-2 border-dashed border-accent/30">
                        <h2 class="text-heading mb-4 text-2xl font-semibold">Bucle for (solo pares)</h2>
                        <ul id="for-pares"></ul>
                    </div>

                    <div class="card border-2 border-dashed border-accent/30">
                        <h2 class="text-heading mb-4 text-2xl font-semibold">Bucle while (solo pares)</h2>
                        <ul id="while-pares"></ul>
                    </div>

                    <div class="card border-2 border-dashed border-accent/30">
                        <h2 class="text-heading mb-4 text-2xl font-semibold">Bucle do While (solo pares)</h2>
                        <ul id="do-while-pares"></ul>
                    </div>
                </div>
            </div>

            <div class="card ">
                <div class="text-title mb-6 text-center text-3xl font-semibold">
        </div>
    </main>
</div>

<script>
    // Datos del alumno
    const fichAlumno = ['Juan ', 'Rangel', 'Carmona', 'z0079225h', 'Desarrollo cliente', 'Daw 25/26', 'Foc'];
    const etiquetas = [
        'Nombre',
        'Apellido',
        'Apellido 2',
        'Dni',
        'Asignatura',
        'Ciclo formativo',
        'Centro de estudios',
    ];

    const ul_for = document.querySelector('#for');
    for (let i = 0; i < fichAlumno.length; i++) {
        const li = document.createElement('li');
        // Se crea un elemento li con la etiqueta en negrita y el valor correspondiente en cada pasada
        li.innerHTML = `<span class="font-bold ">${etiquetas[i]}:</span> ${fichAlumno[i]}`;
        ul_for.appendChild(li);
    }

    const ul_while = document.querySelector('#while');
    let contador = 0;
    while (contador < fichAlumno.length) {
        const li = document.createElement('li');
        li.innerHTML = `<span class="font-bold ">${etiquetas[contador]}:</span> ${fichAlumno[contador]}`;
        ul_while.appendChild(li);
        // Utilizamos un contador para controlar el bucle while y evitar un bucle infinito
        contador++;
    }

    const ul_do_while = document.querySelector('#do-while');
    let contador_do = 0;
    do {
        const li = document.createElement('li');
        li.innerHTML = `<span class="font-bold ">${etiquetas[contador_do]}:</span> ${fichAlumno[contador_do]}`;
        ul_do_while.appendChild(li);
        contador_do++;
        // Incrementamos el contador dentro del do-while para evitar un bucle infinito
    } while (contador_do < fichAlumno.length);

    const conversion = document.querySelector('#conversion');
    const boton_conversion = document.querySelector('#conversion_boton');
    // Agregamos un event listener al botón para manejar el clic y mostrar el resultado de la conversión de tipos
    boton_conversion.addEventListener('click', () => {
        let entero = 1;
        let string = '2';
        let resultado = entero + string;

        conversion.innerText = `"${resultado}" (string) `;
        conversion.style.display = 'inline-block';
        conversion.classList.add('fade-in');
        boton_conversion.style.display = 'none';
    });

    const ul_for_pares = document.querySelector('#for-pares');
    for (let i = 0; i < fichAlumno.length; i++) {
        // Verificamos si el índice es par antes de crear el elemento li
        if (i % 2 === 0) {
            const li = document.createElement('li');
            li.innerHTML = `<span class="font-bold ">${etiquetas[i]}:</span> ${fichAlumno[i]}`;
            ul_for_pares.appendChild(li);
        }
    }

    const ul_while_pares = document.querySelector('#while-pares');
    let contador_pares = 0;
    while (contador_pares < fichAlumno.length) {
        if (contador_pares % 2 === 0) {
            const li = document.createElement('li');
            li.innerHTML = `<span class="font-bold ">${etiquetas[contador_pares]}:</span> ${fichAlumno[contador_pares]}`;
            ul_while_pares.appendChild(li);
        }
        contador_pares++;
    }

    const ul_do_while_pares = document.querySelector('#do-while-pares');
    let contador_do_pares = 0;
    do {
        if (contador_do_pares % 2 === 0) {
            const li = document.createElement('li');
            li.innerHTML = `<span class="font-bold ">${etiquetas[contador_do_pares]}:</span> ${fichAlumno[contador_do_pares]}`;
            ul_do_while_pares.appendChild(li);
        }
    } while (contador_do_pares++ < fichAlumno.length);

    // Operadores en JavaScript
    let numero1 = 5;
    const numero2 = 10;
    var resultado;

    //operaciones aritméticas
   console.log(`Suma: ${numero1 + numero2}`);
   console.log(`Resta: ${numero2 - numero1}`);
   console.log(`Multiplicación: ${numero1 * numero2}`);
   console.log(`División: ${numero2 / numero1}`);

    // operadores relacionales
    console.log('¿numero1 es igual a numero2? ' + (numero1 == numero2));
    console.log('¿numero1 es diferente a numero2? ' + (numero1 != numero2));
    console.log('¿numero1 es mayor que numero2? ' + (numero1 > numero2));

    // Operadores lógicos
    console.log('¿numero1 es menor que 10 Y numero2 es mayor que 5? ' + (numero1 < 10 && numero2 > 5));

    // Demonstration de comportamientos de javascript
    let globalVar = 'I am a global variable';
    function demoScope() {
        let localVar = 'I am a local variable';
        console.log(globalVar); // Accessible
        console.log(localVar); // Accessible
    }
    demoScope();
    // console.log(localVar); // Uncaught ReferenceError: localVar is not defined
</script>

<?php include $VIEW_DIR . '/partials/__footer.php'; ?>
