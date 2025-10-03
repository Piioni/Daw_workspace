<?php
$title = 'Ejercicio 1 - Javascript';
global $VIEW_DIR;
include $VIEW_DIR . '/partials/__header.php';
?>

    <div class="w-full mb-15">
        <div class="flex flex-col text-heading text-4xl font-semibold mt-10 py-2">
            <div class="text-center text-primary">
                <h1>Ejercicio 1 - Javascript</h1>
            </div>
        </div>
        <main class="flex flex-col mt-12 mx-8 gap-2">
            <div class="bg-secondary border-border dark:bg-secondary-dark border dark:border-border-dark rounded-lg shadow-lg p-6 px-10 space-y-10">
                <div>
                    <p class="text-2xl"> > Uso de instrucción brake para salir de un bucle:</p>
                    <p id="array_numeros" class="text-lg text-secondary mt-3"></p>
                </div>
                <div>
                    <p class="text-2xl"> > Imprimir los numeros impares de el 1 al 200:</p>
                    <p id="numeros_impares" class="text-lg text-secondary mt-3"></p>
                </div>
                <div>
                    <p class="text-2xl"> > Uso de instrucción labeled </p>
                    <p id="labeled" class="text-lg text-secondary mt-3"></p>
                </div>
                <div>
                    <p class="text-2xl"> > Operadores de comparación </p>
                    <form id="form_comparacion" class="mt-6">
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <div class="space-y-2">
                                <label for="num1_comparacion" class="form-label">
                                    Número 1 <span class="text-red-500">*</span>
                                </label>
                                <input type="number" id="num1_comparacion" name="num1_comparacion" required
                                       class="form-input">
                            </div>

                            <div class="space-y-2">
                                <label for="num2_comparacion" class="form-label">
                                    Número 2 <span class="text-red-500">*</span>
                                </label>
                                <input type="number" id="num2_comparacion" name="num2_comparacion" required
                                       class="form-input">
                            </div>
                        </div>
                        <div class="mt-4 flex justify-center">
                            <button type="submit" class="btn-form">
                                Comparar
                            </button>
                        </div>
                    </form>
                    <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg mt-3" style="display: none;" id="container_comparacion">
                        <h4 class="font-semibold mb-3">Resultados de Comparación:</h4>
                        <div class="space-y-2 text-sm">
                            <p><strong>Número 1:</strong> <span id="num1_comp_display"></span></p>
                            <p><strong>Número 2:</strong> <span id="num2_comp_display"></span></p>
                            <p><strong>Mayor que (>):</strong> <span id="mayor_que_result"></span></p>
                            <p><strong>Menor que (<):</strong> <span id="menor_que_result"></span></p>
                            <p><strong>Igual que (==):</strong> <span id="igual_que_result"></span></p>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="text-2xl"> > Operadores aritméticos:</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-12">
                        <div>
                            <form id="form_operaciones" class="mt-6">
                                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                    <div class="space-y-2">
                                        <label for="num1_operaciones" class="form-label">
                                            Número 1 <span class="text-red-500">*</span>
                                        </label>
                                        <input type="number" id="num1_operaciones" name="num1_operaciones" required
                                               class="form-input">
                                    </div>

                                    <div class="space-y-2">
                                        <label for="num2_operaciones" class="form-label">
                                            Número 2 <span class="text-red-500">*</span>
                                        </label>
                                        <input type="number" id="num2_operaciones" name="num2_operaciones" required
                                               class="form-input">
                                    </div>
                                </div>
                                <div class="mt-4 flex justify-center">
                                    <button type="submit" class="btn-form">
                                        Calcular
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div>
                            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg mt-6" style="display: none;" id="container_operaciones">
                                <h4 class="font-semibold mb-3">Resultados Aritméticos:</h4>
                                <div class="space-y-2 text-sm">
                                    <p><strong>Suma (+):</strong> <span id="suma_result"></span></p>
                                    <p><strong>Resta (-):</strong> <span id="resta_result"></span></p>
                                    <p><strong>Multiplicación (×):</strong> <span id="multiplicacion_result"></span></p>
                                    <p><strong>División (÷):</strong> <span id="division_result"></span></p>
                                    <p><strong>Módulo (%):</strong> <span id="modulo_result"></span></p>
                                    <p><strong>Potencia (**):</strong> <span id="potencia_result"></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="text-2xl"> > Operadores de asignación:</p>
                    <p class="text-lg text-secondary mt-3"> El valor inicial de la variable sera: <span
                                id="valor_inicial" class="text-lg text-secondary mt-3"> </span></p>
                    <p class="text-lg text-secondary mt-3"> Al utilizar += 10: <span id="valor_suma"
                                                                                     class="text-lg text-secondary mt-3"> </span>
                    </p>
                    <p class="text-lg text-secondary mt-3"> Al utilizar -= 5: <span id="valor_resta"
                                                                                    class="text-lg text-secondary mt-3"> </span>
                    </p>
                    <p class="text-lg text-secondary mt-3"> Al utilizar *= 3: <span id="valor_multiplicacion"
                                                                                    class="text-lg text-secondary mt-3"> </span>
                    </p>
                    <p class="text-lg text-secondary mt-3"> Al utilizar /= 2: <span id="valor_division"
                                                                                    class="text-lg text-secondary mt-3"> </span>
                    </p>
                </div>

                <div>
                    <p class="text-2xl"> > Operadores Booleanos:</p>
                    <form id="form_logicos" class="mt-6">
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <div class="space-y-2">
                                <label for="edad_logica" class="form-label">
                                    Edad <span class="text-red-500">*</span>
                                </label>
                                <input type="number" id="edad_logica" name="edad_logica" required class="form-input">
                                <p class="text-xs text-secondary">Debe estar entre 18 y 65 años</p>
                            </div>

                            <div class="space-y-2">
                                <label for="password_logica" class="form-label">
                                    Contraseña <span class="text-red-500">*</span>
                                </label>
                                <input type="password" id="password_logica" name="password_logica" required class="form-input">
                                <p class="text-xs text-secondary">Mínimo 8 caracteres</p>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-center">
                            <button type="submit" class="btn-form">
                                Validar
                            </button>
                        </div>
                    </form>
                    <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg mt-3" style="display: none;" id="container_logicos">
                        <p>Edad válida (18-65): <span id="edad_valida_result"></span></p>
                        <p>Contraseña válida (≥8 chars): <span id="password_valida_result"></span></p>
                    </div>
                </div>

                <div>
                    <p class="text-2xl"> > Operadores Bit a Bit:</p>
                    <form id="form_bitwise" class="mt-6">
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <div class="space-y-2">
                                <label for="num1_bit" class="form-label">
                                    Número 1 <span class="text-red-500">*</span>
                                </label>
                                <input type="number" id="num1_bit" name="num1_bit" required class="form-input" min="0" max="255">
                            </div>

                            <div class="space-y-2">
                                <label for="num2_bit" class="form-label">
                                    Número 2 <span class="text-red-500">*</span>
                                </label>
                                <input type="number" id="num2_bit" name="num2_bit" required class="form-input" min="0" max="255">
                            </div>
                        </div>
                        <div class="mt-4 flex justify-center">
                            <button type="submit" class="btn-form">
                                Calcular Operaciones Bit a Bit
                            </button>
                        </div>
                    </form>
                    <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg mt-3" style="display: none;" id="container_bitwise">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p>Número 1: <span id="num1_display"></span> (<span id="num1_binary"></span>)</p>
                                <p>Número 2: <span id="num2_display"></span> (<span id="num2_binary"></span>)</p>
                            </div>
                            <div>
                                <p>AND (&): <span id="and_result"></span> (<span id="and_binary"></span>) - 1 solo si ambos bits son 1</p>
                                <p>OR (|): <span id="or_result"></span> (<span id="or_binary"></span>) - 1 si al menos un bit es 1</p>
                                <p>XOR (^): <span id="xor_result"></span> (<span id="xor_binary"></span>) - 1 si los bits son diferentes</p>
                                <p>NOT (~) <span id="not_num"></span>): <span id="not_result"></span> (<span id="not_binary"></span>) - Invierte todos los bits</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <p class="text-2xl"> > Operadores de Objetos:</p>
                    <form id="form_objetos" class="mt-6">
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-3">
                            <div class="space-y-2">
                                <label for="nombre_obj" class="form-label">
                                    Nombre <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="nombre_obj" name="nombre_obj" required class="form-input">
                            </div>

                            <div class="space-y-2">
                                <label for="edad_obj" class="form-label">
                                    Edad <span class="text-red-500">*</span>
                                </label>
                                <input type="number" id="edad_obj" name="edad_obj" required class="form-input">
                            </div>

                            <div class="space-y-2">
                                <label for="ocupacion_obj" class="form-label">
                                    Ocupación <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="ocupacion_obj" name="ocupacion_obj" required class="form-input">
                            </div>
                        </div>
                        <div class="mt-4 space-y-2">
                            <label for="propiedad_eliminar" class="form-label">
                                Propiedad a Eliminar <span class="text-red-500">*</span>
                            </label>
                            <select id="propiedad_eliminar" name="propiedad_eliminar" required class="form-input">
                                <option value="">Seleccionar propiedad...</option>
                                <option value="nombre">nombre</option>
                                <option value="edad">edad</option>
                                <option value="ocupacion">ocupacion</option>
                            </select>
                        </div>
                        <div class="mt-4 flex justify-center">
                            <button type="submit" class="btn-form">
                                Crear Objeto y Eliminar Propiedad
                            </button>
                        </div>
                    </form>
                    <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg mt-3" style="display: none;" id="container_objetos">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <h4 class="font-semibold mb-2">Objeto ANTES de delete:</h4>
                                <pre class="bg-white dark:bg-gray-600 p-2 rounded text-sm" id="objeto_antes"></pre>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-2">Objeto DESPUÉS de delete:</h4>
                                <pre class="bg-white dark:bg-gray-600 p-2 rounded text-sm" id="objeto_despues"></pre>
                            </div>
                        </div>
                        <p class="mt-3">Operación: delete persona['<span id="propiedad_eliminada"></span>']</p>
                    </div>
                </div>

                <div>
                    <p class="text-2xl"> > Precedencia de Operadores:</p>
                    <form id="form_precedencia" class="mt-6">
                        <div class="grid grid-cols-2 gap-6 sm:grid-cols-4">
                            <div class="space-y-2">
                                <label for="a_prec" class="form-label">
                                    Valor A <span class="text-red-500">*</span>
                                </label>
                                <input type="number" step="0.1" id="a_prec" name="a_prec" required class="form-input">
                            </div>

                            <div class="space-y-2">
                                <label for="b_prec" class="form-label">
                                    Valor B <span class="text-red-500">*</span>
                                </label>
                                <input type="number" step="0.1" id="b_prec" name="b_prec" required class="form-input">
                            </div>

                            <div class="space-y-2">
                                <label for="c_prec" class="form-label">
                                    Valor C <span class="text-red-500">*</span>
                                </label>
                                <input type="number" step="0.1" id="c_prec" name="c_prec" required class="form-input">
                            </div>

                            <div class="space-y-2">
                                <label for="d_prec" class="form-label">
                                    Valor D <span class="text-red-500">*</span>
                                </label>
                                <input type="number" step="0.1" id="d_prec" name="d_prec" required class="form-input">
                            </div>
                        </div>
                        <div class="mt-4 flex justify-center">
                            <button type="submit" class="btn-form">
                                Calcular Precedencia
                            </button>
                        </div>
                    </form>
                    <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg mt-3" style="display: none;" id="container_precedencia">
                        <h4 class="font-semibold mb-3">Operaciones Aritméticas:</h4>
                        <div class="space-y-2 text-sm">
                            <p>Sin paréntesis:< <span id="formula_sin_parentesis"></span> = <span id="resultado_sin_parentesis"></span></p>
                            <p>Con paréntesis:< <span id="formula_parentesis1"></span> = <span id="resultado_parentesis1"></span></p>
                            <p>Con paréntesis:< <span id="formula_parentesis2"></span> = <span id="resultado_parentesis2"></span></p>
                            <p>Con paréntesis:< <span id="formula_parentesis3"></span> = <span id="resultado_parentesis3"></span></p>
                        </div>
                        <h4 class="font-semibold mb-3 mt-4">Operaciones Booleanas:</h4>
                        <div class="space-y-2 text-sm">
                            <p>Sin paréntesis:< <span id="formula_bool_sin"></span> = <span id="resultado_bool_sin"></span></p>
                            <p>Con paréntesis:< <span id="formula_bool_con"></span> = <span id="resultado_bool_con"></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        let nums = [1, 7, 11, 17, 22, 27, 33, 36, 44, 55];
        const p_array_numeros = document.querySelector('#array_numeros');
        for (let numero of nums) {
            if (numero > 50) {
                break;
            } else {
                p_array_numeros.innerText += `${numero}, `;
            }
        }

        const p_numeros_impares = document.querySelector('#numeros_impares');
        for (let i = 1; i <= 20; i++) {
            if (i % 2 === 0) {
                continue;
            } else {
                p_numeros_impares.innerText += `${i}, `;
            }
        }

        const p_labeled = document.querySelector('#labeled');
        outerLoop: for (let i = 1; i <= 15; i++) {
            for (let j = 1; j <= 14; j++) {
                if (j > 10) {
                    p_labeled.innerText += `Se ha interrumpido el bucle i=${i}, cuando j ha encontrado el valor j=${j}`;
                    break outerLoop;
                }
            }
        }

        const form_comparacion = document.querySelector('#form_comparacion');
        const container_comparacion = document.querySelector('#container_comparacion');
        form_comparacion.addEventListener('submit', (event) => {
            event.preventDefault();
            const num1 = parseFloat(document.querySelector('#num1_comparacion').value);
            const num2 = parseFloat(document.querySelector('#num2_comparacion').value);

            if (isNaN(num1) || isNaN(num2)) {
                alert('Por favor, introduce dos números válidos.');
                return;
            }

            document.querySelector('#num1_comp_display').textContent = num1;
            document.querySelector('#num2_comp_display').textContent = num2;

            document.querySelector('#mayor_que_result').textContent = num1 > num2 ? 'Verdadero' : 'Falso';
            document.querySelector('#menor_que_result').textContent = num1 < num2 ? 'Verdadero' : 'Falso';
            document.querySelector('#igual_que_result').textContent = num1 === num2 ? 'Verdadero' : 'Falso';


            container_comparacion.style.display = 'block';
        });

        const form_operaciones = document.querySelector('#form_operaciones');
        const container_operaciones = document.querySelector('#container_operaciones');
        form_operaciones.addEventListener('submit', (event) => {
            event.preventDefault();
            const num1 = parseFloat(document.querySelector('#num1_operaciones').value);
            const num2 = parseFloat(document.querySelector('#num2_operaciones').value);

            if (isNaN(num1) || isNaN(num2)) {
                alert('Por favor, introduce dos números válidos.');
                return;
            }

            const suma = num1 + num2;
            const resta = num1 - num2;
            const multiplicacion = num1 * num2;
            const division = num2 !== 0 ? (num1 / num2).toFixed(2) : 'Error: División por cero';
            const modulo = num2 !== 0 ? (num1 % num2).toFixed(2) : 'Error: División por cero';
            const potencia = Math.pow(num1, num2).toFixed(2);

            document.querySelector('#suma_result').textContent = suma;
            document.querySelector('#resta_result').textContent = resta;
            document.querySelector('#multiplicacion_result').textContent = multiplicacion;
            document.querySelector('#division_result').textContent = division;
            document.querySelector('#modulo_result').textContent = modulo;
            document.querySelector('#potencia_result').textContent = potencia;

            container_operaciones.style.display = 'block';
        });

        let valor = 20;
        document.getElementById('valor_inicial').innerText = valor;
        valor += 10;
        document.getElementById('valor_suma').innerText = valor;
        valor -= 5;
        document.getElementById('valor_resta').innerText = valor;
        valor *= 3;
        document.getElementById('valor_multiplicacion').innerText = valor;
        valor /= 2;
        document.getElementById('valor_division').innerText = valor;

        // Operadores Lógicos
        const form_logicos = document.querySelector('#form_logicos');
        const container_logicos = document.querySelector('#container_logicos');
        form_logicos.addEventListener('submit', (event) => {
            event.preventDefault();
            const edad = parseInt(document.querySelector('#edad_logica').value);
            const password = document.querySelector('#password_logica').value;

            const edadValida = edad >= 18 && edad <= 65;
            const passwordValida = password.length >= 8;

            document.querySelector('#edad_valida_result').textContent = edadValida ? '✓ Verdadero' : '✗ Falso';
            document.querySelector('#password_valida_result').textContent = passwordValida ? '✓ Verdadero' : '✗ Falso';

            container_logicos.style.display = 'block';
        });

        // Operadores Bit a Bit
        const form_bitwise = document.querySelector('#form_bitwise');
        const container_bitwise = document.querySelector('#container_bitwise');
        form_bitwise.addEventListener('submit', (event) => {
            event.preventDefault();
            const num1 = parseInt(document.querySelector('#num1_bit').value);
            const num2 = parseInt(document.querySelector('#num2_bit').value);

            const and = num1 && num2;
            const or = num1 || num2;
            const xor = num1 ^ num2;
            const not1 = ~num1 & 0xFF;

            document.querySelector('#num1_display').textContent = num1;
            document.querySelector('#num1_binary').textContent = num1.toString(2).padStart(8, '0');
            document.querySelector('#num2_display').textContent = num2;
            document.querySelector('#num2_binary').textContent = num2.toString(2).padStart(8, '0');

            document.querySelector('#and_result').textContent = and;
            document.querySelector('#and_binary').textContent = and.toString(2).padStart(8, '0');
            document.querySelector('#or_result').textContent = or;
            document.querySelector('#or_binary').textContent = or.toString(2).padStart(8, '0');
            document.querySelector('#xor_result').textContent = xor;
            document.querySelector('#xor_binary').textContent = xor.toString(2).padStart(8, '0');
            document.querySelector('#not_num').textContent = num1;
            document.querySelector('#not_result').textContent = not1;
            document.querySelector('#not_binary').textContent = not1.toString(2).padStart(8, '0');

            container_bitwise.style.display = 'block';
        });

        // Operadores de Objetos
        const form_objetos = document.querySelector('#form_objetos');
        const container_objetos = document.querySelector('#container_objetos');
        form_objetos.addEventListener('submit', (event) => {
            event.preventDefault();
            const nombre = document.querySelector('#nombre_obj').value;
            const edad = parseInt(document.querySelector('#edad_obj').value);
            const ocupacion = document.querySelector('#ocupacion_obj').value;
            const propiedadEliminar = document.querySelector('#propiedad_eliminar').value;

            const persona = { nombre, edad, ocupacion };
            const personaAntes = JSON.stringify(persona, null, 2);

            delete persona[propiedadEliminar];
            const personaDespues = JSON.stringify(persona, null, 2);

            document.querySelector('#objeto_antes').textContent = personaAntes;
            document.querySelector('#objeto_despues').textContent = personaDespues;
            document.querySelector('#propiedad_eliminada').textContent = propiedadEliminar;

            container_objetos.style.display = 'block';
        });

        // Precedencia de Operadores
        const form_precedencia = document.querySelector('#form_precedencia');
        const container_precedencia = document.querySelector('#container_precedencia');
        form_precedencia.addEventListener('submit', (event) => {
            event.preventDefault();
            const a = parseFloat(document.querySelector('#a_prec').value);
            const b = parseFloat(document.querySelector('#b_prec').value);
            const c = parseFloat(document.querySelector('#c_prec').value);
            const d = parseFloat(document.querySelector('#d_prec').value);

            const sinParentesis = a + b * c - d / 2;
            const conParentesis1 = (a + b) * c - d / 2;
            const conParentesis2 = a + b * (c - d) / 2;
            const conParentesis3 = (a + b) * (c - d) / 2;

            const booleana = a > b && c < d || a == b;
            const boolParentesis = a > b && (c < d || a == b);

            document.querySelector('#formula_sin_parentesis').textContent = `${a} + ${b} * ${c} - ${d} / 2`;
            document.querySelector('#resultado_sin_parentesis').textContent = sinParentesis;
            document.querySelector('#formula_parentesis1').textContent = `(${a} + ${b}) * ${c} - ${d} / 2`;
            document.querySelector('#resultado_parentesis1').textContent = conParentesis1;
            document.querySelector('#formula_parentesis2').textContent = `${a} + ${b} * (${c} - ${d}) / 2`;
            document.querySelector('#resultado_parentesis2').textContent = conParentesis2;
            document.querySelector('#formula_parentesis3').textContent = `(${a} + ${b}) * (${c} - ${d}) / 2`;
            document.querySelector('#resultado_parentesis3').textContent = conParentesis3;

            document.querySelector('#formula_bool_sin').textContent = `${a} > ${b} && ${c} < ${d} || ${a} == ${b}`;
            document.querySelector('#resultado_bool_sin').textContent = booleana;
            document.querySelector('#formula_bool_con').textContent = `${a} > ${b} && (${c} < ${d} || ${a} == ${b})`;
            document.querySelector('#resultado_bool_con').textContent = boolParentesis;

            container_precedencia.style.display = 'block';
        });
    </script>

<?php
include $VIEW_DIR . '/partials/__footer.php';
?>