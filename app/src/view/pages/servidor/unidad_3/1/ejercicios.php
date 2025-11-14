<?php
$title = 'Ejercicios - Sentencias, Bucles, Arrays, Funciones, Avanzados';
$results = [];

// helper functions
function is_prime(int $n): bool
{
    if ($n <= 1) {
        return false;
    }
    if ($n <= 3) {
        return true;
    }
    if ($n % 2 === 0) {
        return false;
    }
    for ($i = 3; $i * $i <= $n; $i += 2) {
        if ($n % $i === 0) {
            return false;
        }
    }
    return true;
}

function contar_vocales(string $s): int
{
    preg_match_all('/[aeiouáéíóúü]/iu', $s, $m);
    return count($m[0]);
}

function c_to_f(float $c): float
{
    return ($c * 9) / 5 + 32;
}

function es_palindromo(string $s): bool
{
    $clean = mb_strtolower(preg_replace('/[^\\p{L}\\p{N}]/u', '', $s));
    return $clean === mb_strrev($clean);
}

// mb_strrev helper
if (! function_exists('mb_strrev')) {
    function mb_strrev($str)
    {
        $r = '';
        for ($i = mb_strlen($str) - 1; $i >= 0; $i--) {
            $r .= mb_substr($str, $i, 1);
        }
        return $r;
    }
}

function area_triangulo(float $b, float $h): float
{
    return ($b * $h) / 2;
}

function stats_array(array $nums): array
{
    if (count($nums) === 0) {
        return ['min' => null, 'max' => null, 'avg' => null];
    }
    $min = min($nums);
    $max = max($nums);
    $avg = array_sum($nums) / count($nums);
    return ['min' => $min, 'max' => $max, 'avg' => $avg];
}

function generar_password(int $len = 8): string
{
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $out = '';
    $max = strlen($chars) - 1;
    for ($i = 0; $i < $len; $i++) {
        $out .= $chars[random_int(0, $max)];
    }
    return $out;
}

// request handling
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $act = $_POST['action'];

    switch ($act) {
        // Sentencias y Condicionales
        case 'mayor_tres':
            $a = floatval($_POST['a'] ?? 0);
            $b = floatval($_POST['b'] ?? 0);
            $c = floatval($_POST['c'] ?? 0);
            $max = max($a, $b, $c);
            $results['mayor_tres'] = 'El mayor es ' . htmlspecialchars((string) $max);
            break;

        case 'puede_votar':
            $edad = intval($_POST['edad_votar'] ?? 0);
            $results['puede_votar'] = $edad >= 18 ? 'Puede votar' : 'No puede votar';
            break;

        case 'saludo_hora':
            $hora = intval($_POST['hora'] ?? -1);
            if ($hora >= 6 && $hora <= 12) {
                $msg = 'Buenos días';
            } elseif ($hora >= 13 && $hora <= 20) {
                $msg = 'Buenas tardes';
            } else {
                $msg = 'Buenas noches';
            }
            $results['saludo_hora'] = $msg;
            break;

        case 'nota':
            $nota = floatval($_POST['nota'] ?? -1);
            if ($nota < 0 || $nota > 10) {
                $res = 'Nota fuera de rango';
            } elseif ($nota < 5) {
                $res = 'Suspenso';
            } elseif ($nota < 7) {
                $res = 'Aprobado';
            } elseif ($nota < 9) {
                $res = 'Notable';
            } else {
                $res = 'Sobresaliente';
            }
            $results['nota'] = $res;
            break;

        case 'mes_dias':
            $mes = mb_strtolower(trim($_POST['mes'] ?? ''));
            switch ($mes) {
                case 'enero':
                case 'marzo':
                case 'mayo':
                case 'julio':
                case 'agosto':
                case 'octubre':
                case 'diciembre':
                    $d = 31;
                    break;
                case 'abril':
                case 'junio':
                case 'septiembre':
                case 'noviembre':
                    $d = 30;
                    break;
                case 'febrero':
                    $d = 28;
                    break;
                default:
                    $d = null;
            }
            $results['mes_dias'] = $d === null ? 'Mes desconocido' : "El mes tiene $d días";
            break;

        // Bucles
        case 'tabla_mult':
            $n = intval($_POST['tabla_n'] ?? 0);
            $out = [];
            for ($i = 1; $i <= 10; $i++) {
                $out[] = "$n x $i = " . $n * $i;
            }
            $results['tabla_mult'] = $out;
            break;

        case 'factorial':
            $f_n = intval($_POST['fact_n'] ?? 0);
            $res = 1;
            $i = $f_n;
            while ($i > 1) {
                $res *= $i;
                $i--;
            }
            $results['factorial'] = "$f_n! = $res";
            break;

        case 'password_do':
            $pwd = $_POST['pwd'] ?? '';
            $correct = 'secret123';
            $results['password_do'] = $pwd === $correct ? 'Contraseña correcta' : 'Contraseña incorrecta';
            break;

        // Arrays
        case 'productos':
            $productos_raw = $_POST['productos'] ?? '';
            // expect format: nombre:precio,nombre:precio,...
            $items = [];
            foreach (array_filter(array_map('trim', explode(',', $productos_raw))) as $p) {
                $parts = array_map('trim', explode(':', $p));
                if (count($parts) === 2 && is_numeric($parts[1])) {
                    $items[$parts[0]] = floatval($parts[1]);
                }
            }
            if (count($items) === 0) {
                $results['productos'] = 'Sin productos válidos';
            } else {
                $maxp = max($items);
                $prod = array_search($maxp, $items, true);
                $results['productos'] = 'Producto más caro: ' . htmlspecialchars($prod) . " - Precio: $maxp";
            }
            break;

        case 'aleatorios':
            $nums = [];
            for ($i = 0; $i < 20; $i++) {
                $nums[] = random_int(1, 100);
            }
            $avg = array_sum($nums) / count($nums);
            $results['aleatorios'] = ['nums' => $nums, 'avg' => $avg];
            break;

        case 'saludos_foreach':
            $names_raw = $_POST['names_foreach'] ?? '';
            $names = array_filter(array_map('trim', explode(',', $names_raw)));
            $sals = [];
            foreach ($names as $nm) {
                $sals[] = 'Hola ' . htmlspecialchars($nm) . '!';
            }
            $results['saludos_foreach'] = $sals;
            break;

        // Funciones
        case 'primo':
            $p_n = intval($_POST['primo_n'] ?? 0);
            $results['primo'] = is_prime($p_n) ? "$p_n es primo" : "$p_n no es primo";
            break;

        case 'vocales':
            $txt = $_POST['vocales_txt'] ?? '';
            $results['vocales'] = 'Vocales: ' . contar_vocales($txt);
            break;

        case 'celsius':
            $c = floatval($_POST['celsius'] ?? 0);
            $f = c_to_f($c);
            $results['celsius'] = "$c °C = " . round($f, 2) . ' °F';
            break;

        case 'palindromo':
            $word = $_POST['palabra'] ?? '';
            $results['palindromo'] = es_palindromo($word) ? 'Es palíndromo' : 'No es palíndromo';
            break;

        case 'triangulo':
            $base = floatval($_POST['base'] ?? 0);
            $altura = floatval($_POST['altura'] ?? 0);
            $results['triangulo'] = 'Área = ' . area_triangulo($base, $altura);
            break;

        // Avanzados
        case 'stats_array':
            $raw = $_POST['nums_raw'] ?? '';
            $nums = array_map('floatval', array_filter(array_map('trim', explode(',', $raw)), 'strlen'));
            $st = stats_array($nums);
            $results['stats_array'] = $st;
            break;

        case 'registrar_estudiantes':
            $raw = $_POST['students_raw'] ?? '';
            // expect name:nota,...
            $students = [];
            foreach (array_filter(array_map('trim', explode(',', $raw))) as $s) {
                $parts = array_map('trim', explode(':', $s));
                if (count($parts) === 2 && is_numeric($parts[1])) {
                    $students[] = ['name' => $parts[0], 'nota' => floatval($parts[1])];
                }
            }
            $aprobados = 0;
            foreach ($students as $st) {
                if ($st['nota'] >= 5) {
                    $aprobados++;
                }
            }
            $results['registrar_estudiantes'] = ['count' => count($students), 'aprobados' => $aprobados];
            break;

        case 'votacion':
            $v1 = intval($_POST['v1'] ?? 0);
            $v2 = intval($_POST['v2'] ?? 0);
            $v3 = intval($_POST['v3'] ?? 0);
            $tot = ['c1' => $v1, 'c2' => $v2, 'c3' => $v3];
            arsort($tot);
            $winner = array_key_first($tot);
            $results['votacion'] = ['totales' => ['c1' => $v1, 'c2' => $v2, 'c3' => $v3], 'ganador' => $winner];
            break;

        case 'gen_pass':
            $len = max(4, intval($_POST['pass_len'] ?? 8));
            $results['gen_pass'] = generar_password($len);
            break;

        case 'carrito':
            $raw = $_POST['carrito_raw'] ?? '';
            $items = [];
            foreach (array_filter(array_map('trim', explode(',', $raw))) as $p) {
                $parts = array_map('trim', explode(':', $p));
                if (count($parts) === 2 && is_numeric($parts[1])) {
                    $items[] = ['name' => $parts[0], 'price' => floatval($parts[1])];
                }
            }
            $sum = 0;
            foreach ($items as $it) {
                $sum += $it['price'];
            }
            $iva = floatval($_POST['iva'] ?? 21);
            $total = $sum * (1 + $iva / 100);
            $results['carrito'] = ['subtotal' => $sum, 'iva' => $iva, 'total' => $total];
            break;

        default:
            break;
    }
}

// view
include VIEW_DIR . '/partials/__header.php';
?>

<div class="mb-20 w-full">
    <div class="hero"><h1>Ejercicios — Sentencias, Bucles, Arrays, Funciones, Avanzados</h1></div>
    <main>
        <div class="max-x-6xl mx-auto mt-12 grid gap-12">
            <!-- SENTENCIAS Y CONDICIONALES -->
            <section class="space-y-6">
                <h2 class="text-heading text-3xl font-semibold">Sentencias y Condicionales</h2>

                <!-- keep first four cards in a 2-column grid -->
                <div class="grid gap-6 md:grid-cols-2">
                    <!-- mayor de tres -->
                    <div class="card">
                        <h3 class="mb-3 text-xl font-semibold">Mayor de tres números</h3>
                        <form method="POST" class="space-y-3">
                            <input type="hidden" name="action" value="mayor_tres" />
                            <input name="a" class="form-input" placeholder="Número A" />
                            <input name="b" class="form-input" placeholder="Número B" />
                            <input name="c" class="form-input" placeholder="Número C" />
                            <button class="btn-form" type="submit">Calcular</button>
                        </form>

                        <?php if (!empty($results['mayor_tres'])): ?>

                        <p class="mt-3 text-secondary"><?= htmlspecialchars($results['mayor_tres']) ?></p>

                        <?php endif; ?>
                    </div>

                    <!-- votar -->
                    <div class="card">
                        <h3 class="mb-3 text-xl font-semibold">¿Puede votar?</h3>
                        <form method="POST" class="space-y-3">
                            <input type="hidden" name="action" value="puede_votar" />
                            <input name="edad_votar" type="number" class="form-input" placeholder="Edad" />
                            <button class="btn-form" type="submit">Comprobar</button>
                        </form>

                        <?php if (!empty($results['puede_votar'])): ?>

                        <p class="mt-3 text-secondary"><?= htmlspecialchars($results['puede_votar']) ?></p>

                        <?php endif; ?>
                    </div>

                    <!-- saludo por hora -->
                    <div class="card">
                        <h3 class="mb-3 text-xl font-semibold">Saludo según la hora</h3>
                        <form method="POST" class="space-y-3">
                            <input type="hidden" name="action" value="saludo_hora" />
                            <input
                                name="hora"
                                type="number"
                                class="form-input"
                                placeholder="Hora (0-23)"
                                min="0"
                                max="23"
                            />
                            <button class="btn-form" type="submit">Mostrar saludo</button>
                        </form>

                        <?php if (!empty($results['saludo_hora'])): ?>

                        <p class="mt-3 text-secondary"><?= htmlspecialchars($results['saludo_hora']) ?></p>

                        <?php endif; ?>
                    </div>

                    <!-- nota -->
                    <div class="card">
                        <h3 class="mb-3 text-xl font-semibold">Calificación (0–10)</h3>
                        <form method="POST" class="space-y-3">
                            <input type="hidden" name="action" value="nota" />
                            <input
                                name="nota"
                                type="number"
                                step="0.1"
                                class="form-input"
                                placeholder="Nota"
                                min="0"
                                max="10"
                            />
                            <button class="btn-form" type="submit">Evaluar</button>
                        </form>

                        <?php if (!empty($results['nota'])): ?>

                        <p class="mt-3 text-secondary"><?= htmlspecialchars($results['nota']) ?></p>

                        <?php endif; ?>
                    </div>
                </div>

                <!-- last card (mes_dias) centered like in tarea.php -->
                <div class="flex justify-center">
                    <div class="mx-auto w-full max-w-[38rem] md:w-1/2">
                        <div class="card">
                            <!-- mes dias -->
                            <h3 class="mb-3 text-xl font-semibold">Días de un mes (switch)</h3>
                            <form method="POST" class="space-y-3">
                                <input type="hidden" name="action" value="mes_dias" />
                                <input name="mes" class="form-input" placeholder="Mes (ej. febrero)" />
                                <button class="btn-form" type="submit">Mostrar días</button>
                            </form>

                            <?php if (!empty($results['mes_dias'])): ?>

                            <p class="mt-3 text-secondary"><?= htmlspecialchars($results['mes_dias']) ?></p>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>

            <!-- BUCLES -->
            <section class="space-y-6">
                <h2 class="text-heading text-3xl font-semibold">Bucles</h2>

                <!-- first four cards -->
                <div class="grid gap-6 md:grid-cols-2">
                    <!-- FizzBuzz 1..100 (sin formulario) -->
                    <div class="card">
                        <h3 class="mb-3 text-xl font-semibold">FizzBuzz 1..100</h3>
                        <ol
                            class="max-h-48 list-inside list-decimal space-y-1 overflow-auto rounded bg-white/50 p-2 text-secondary"
                        >
                            <?php for ($i=1;$i<=100;$i++):
                                $out = ($i%3===0? 'Fizz':'' ) . ($i%5===0? 'Buzz':'');
                                $display = $out ?: $i;
                            ?>

                            <li><?= htmlspecialchars((string) $display) ?></li>

                            <?php endfor; ?>
                        </ol>
                    </div>

                    <!-- tabla multiplicar -->
                    <div class="card">
                        <h3 class="mb-3 text-xl font-semibold">Tabla de multiplicar (for)</h3>
                        <form method="POST" class="space-y-3">
                            <input type="hidden" name="action" value="tabla_mult" />
                            <input name="tabla_n" type="number" class="form-input" placeholder="Número" />
                            <button class="btn-form" type="submit">Generar</button>
                        </form>

                        <?php if (!empty($results['tabla_mult'])): ?>

                        <ul class="mt-3 list-inside list-decimal text-secondary">
                            <?php foreach ($results['tabla_mult'] as $row): ?>

                            <li><?= htmlspecialchars($row) ?></li>

                            <?php endforeach; ?>
                        </ul>

                        <?php endif; ?>
                    </div>

                    <!-- factorial -->
                    <div class="card">
                        <h3 class="mb-3 text-xl font-semibold">Factorial (while)</h3>
                        <form method="POST" class="space-y-3">
                            <input type="hidden" name="action" value="factorial" />
                            <input name="fact_n" type="number" class="form-input" placeholder="Número" min="0" />
                            <button class="btn-form" type="submit">Calcular</button>
                        </form>

                        <?php if (!empty($results['factorial'])): ?>

                        <p class="mt-3 text-secondary"><?= htmlspecialchars($results['factorial']) ?></p>

                        <?php endif; ?>
                    </div>

                    <!-- Fibonacci -->
                    <div class="card">
                        <h3 class="mb-3 text-xl font-semibold">Fibonacci — primeros 15</h3>

                        <?php
                        $fib = [0, 1];
                        for ($i = 2; $i < 15; $i++) {
                            $fib[] = $fib[$i - 1] + $fib[$i - 2];
                        }
                        ?>

                        <p class="text-secondary"><?= htmlspecialchars(implode(', ', array_slice($fib, 0, 15))) ?></p>
                    </div>
                </div>

                <!-- last card (password_do) centered -->
                <div class="flex justify-center">
                    <div class="mx-auto w-full max-w-[38rem] md:w-1/2">
                        <div class="card">
                            <h3 class="mb-3 text-xl font-semibold">Pedir contraseña (do-while simulada)</h3>
                            <form method="POST" class="space-y-3">
                                <input type="hidden" name="action" value="password_do" />
                                <input name="pwd" type="password" class="form-input" placeholder="Contraseña" />
                                <button class="btn-form" type="submit">Enviar</button>
                            </form>

                            <?php if (isset($results['password_do'])): ?>

                            <p class="mt-3 text-secondary"><?= htmlspecialchars($results['password_do']) ?></p>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ARRAYS -->
            <section class="space-y-6">
                <h2 class="text-heading text-3xl font-semibold">Arrays</h2>

                <!-- first four cards -->
                <div class="grid gap-6 md:grid-cols-2">
                    <!-- alumnos -->
                    <div class="card">
                        <h3 class="mb-3 text-xl font-semibold">10 alumnos ordenados</h3>

                        <?php
                        $alumnos = ['Lucía', 'Pedro', 'Ana', 'Javier', 'María', 'Alberto', 'Bea', 'Carlos', 'Diana', 'Fernando'];
                        sort($alumnos, SORT_STRING);
                        ?>

                        <ol class="list-inside list-decimal text-secondary">
                            <?php foreach ($alumnos as $al): ?>

                            <li><?= htmlspecialchars($al) ?></li>

                            <?php endforeach; ?>
                        </ol>
                    </div>

                    <!-- productos -->
                    <div class="card">
                        <h3 class="mb-3 text-xl font-semibold">Producto más caro (introduce lista)</h3>
                        <form method="POST" class="space-y-3">
                            <input type="hidden" name="action" value="productos" />
                            <input
                                name="productos"
                                class="form-input"
                                placeholder="Formato: prod:precio,prod2:precio2"
                            />
                            <button class="btn-form" type="submit">Calcular</button>
                        </form>

                        <?php if (!empty($results['productos'])): ?>

                        <p class="mt-3 text-secondary"><?= htmlspecialchars($results['productos']) ?></p>

                        <?php endif; ?>
                    </div>

                    <!-- matriz 3x3 diagonal -->
                    <div class="card">
                        <h3 class="mb-3 text-xl font-semibold">Matriz 3x3 — suma diagonal</h3>

                        <?php
                        $mat = [[1, 2, 3], [4, 5, 6], [7, 8, 9]];
                        $diag = $mat[0][0] + $mat[1][1] + $mat[2][2];
                        ?>

                        <p class="text-secondary">Diagonal principal: <?= $diag ?></p>
                    </div>

                    <!-- aleatorios -->
                    <div class="card">
                        <h3 class="mb-3 text-xl font-semibold">20 aleatorios — promedio</h3>
                        <form method="POST" class="space-y-3">
                            <input type="hidden" name="action" value="aleatorios" />
                            <button class="btn-form" type="submit">Generar</button>
                        </form>

                        <?php if (!empty($results['aleatorios'])): ?>

                        <p class="mt-2 text-secondary">
                            Números:
                            <?= htmlspecialchars(implode(', ', $results['aleatorios']['nums'])) ?>
                        </p>
                        <p class="mt-1 text-secondary">Promedio: <?= round($results['aleatorios']['avg'], 2) ?></p>

                        <?php endif; ?>
                    </div>
                </div>

                <!-- last card (saludos_foreach) centered -->
                <div class="flex justify-center">
                    <div class="mx-auto w-full max-w-[38rem] md:w-1/2">
                        <div class="card">
                            <h3 class="mb-3 text-xl font-semibold">Saludos con foreach</h3>
                            <form method="POST" class="space-y-3">
                                <input type="hidden" name="action" value="saludos_foreach" />
                                <input
                                    name="names_foreach"
                                    class="form-input"
                                    placeholder="Nombres separados por comas"
                                />
                                <button class="btn-form" type="submit">Saludar</button>
                            </form>

                            <?php if (!empty($results['saludos_foreach'])): ?>

                            <ul class="mt-3 list-inside text-secondary">
                                <?php foreach ($results['saludos_foreach'] as $s): ?>

                                <li><?= $s ?></li>

                                <?php endforeach; ?>
                            </ul>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>

            <!-- FUNCIONES -->
            <section class="space-y-6">
                <h2 class="text-heading text-3xl font-semibold">Funciones</h2>

                <!-- first four cards -->
                <div class="grid gap-6 md:grid-cols-2">
                    <!-- primo -->
                    <div class="card">
                        <h3 class="mb-3 text-xl font-semibold">¿Es primo?</h3>
                        <form method="POST" class="space-y-3">
                            <input type="hidden" name="action" value="primo" />
                            <input name="primo_n" type="number" class="form-input" placeholder="Número" />
                            <button class="btn-form" type="submit">Comprobar</button>
                        </form>

                        <?php if (!empty($results['primo'])): ?>

                        <p class="mt-3 text-secondary"><?= htmlspecialchars($results['primo']) ?></p>

                        <?php endif; ?>
                    </div>

                    <!-- contar vocales -->
                    <div class="card">
                        <h3 class="mb-3 text-xl font-semibold">Contar vocales</h3>
                        <form method="POST" class="space-y-3">
                            <input type="hidden" name="action" value="vocales" />
                            <input name="vocales_txt" class="form-input" placeholder="Texto" />
                            <button class="btn-form" type="submit">Contar</button>
                        </form>

                        <?php if (!empty($results['vocales'])): ?>

                        <p class="mt-3 text-secondary"><?= htmlspecialchars($results['vocales']) ?></p>

                        <?php endif; ?>
                    </div>

                    <!-- celsius -->
                    <div class="card">
                        <h3 class="mb-3 text-xl font-semibold">Celsius a Fahrenheit</h3>
                        <form method="POST" class="space-y-3">
                            <input type="hidden" name="action" value="celsius" />
                            <input name="celsius" type="number" step="0.1" class="form-input" placeholder="°C" />
                            <button class="btn-form" type="submit">Convertir</button>
                        </form>

                        <?php if (!empty($results['celsius'])): ?>

                        <p class="mt-3 text-secondary"><?= htmlspecialchars($results['celsius']) ?></p>

                        <?php endif; ?>
                    </div>

                    <!-- palindromo -->
                    <div class="card">
                        <h3 class="mb-3 text-xl font-semibold">Palíndromo</h3>
                        <form method="POST" class="space-y-3">
                            <input type="hidden" name="action" value="palindromo" />
                            <input name="palabra" class="form-input" placeholder="Palabra o frase" />
                            <button class="btn-form" type="submit">Comprobar</button>
                        </form>

                        <?php if (!empty($results['palindromo'])): ?>

                        <p class="mt-3 text-secondary"><?= htmlspecialchars($results['palindromo']) ?></p>

                        <?php endif; ?>
                    </div>
                </div>

                <!-- last card (triangulo) centered -->
                <div class="flex justify-center">
                    <div class="mx-auto w-full max-w-[38rem] md:w-1/2">
                        <div class="card">
                            <h3 class="mb-3 text-xl font-semibold">Área de un triángulo</h3>
                            <form method="POST" class="space-y-3">
                                <input type="hidden" name="action" value="triangulo" />
                                <input name="base" type="number" step="0.1" class="form-input" placeholder="Base" />
                                <input name="altura" type="number" step="0.1" class="form-input" placeholder="Altura" />
                                <button class="btn-form" type="submit">Calcular</button>
                            </form>

                            <?php if (!empty($results['triangulo'])): ?>

                            <p class="mt-3 text-secondary"><?= htmlspecialchars($results['triangulo']) ?></p>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>

            <!-- AVANZADOS -->
            <section class="space-y-6">
                <h2 class="text-heading text-3xl font-semibold">Ejercicios Avanzados</h2>

                <!-- first four cards -->
                <div class="grid gap-6 md:grid-cols-2">
                    <!-- stats array -->
                    <div class="card">
                        <h3 class="mb-3 text-xl font-semibold">Max, Min, Promedio (array)</h3>
                        <form method="POST" class="space-y-3">
                            <input type="hidden" name="action" value="stats_array" />
                            <input name="nums_raw" class="form-input" placeholder="Números: 1,2,3,4" />
                            <button class="btn-form" type="submit">Calcular</button>
                        </form>

                        <?php if (!empty($results['stats_array'])):
                            $s = $results['stats_array'];
                        ?>

                        <p class="mt-3 text-secondary">
                            Min: <?= $s['min'] ?> — Max: <?= $s['max'] ?> — Avg:
                            <?= round($s['avg'], 2) ?>
                        </p>

                        <?php endif; ?>
                    </div>

                    <!-- registrar estudiantes -->
                    <div class="card">
                        <h3 class="mb-3 text-xl font-semibold">Registrar estudiantes</h3>
                        <form method="POST" class="space-y-3">
                            <input type="hidden" name="action" value="registrar_estudiantes" />
                            <input
                                name="students_raw"
                                class="form-input"
                                placeholder="Formato: nombre:nota,nombre2:nota2"
                            />
                            <button class="btn-form" type="submit">Procesar</button>
                        </form>

                        <?php if (!empty($results['registrar_estudiantes'])):
                            $r = $results['registrar_estudiantes'];
                        ?>

                        <p class="mt-3 text-secondary">
                            Total: <?= $r['count'] ?> — Aprobados:
                            <?= $r['aprobados'] ?>
                        </p>

                        <?php endif; ?>
                    </div>

                    <!-- votacion -->
                    <div class="card">
                        <h3 class="mb-3 text-xl font-semibold">Sistema de votación (3 candidatos)</h3>
                        <form method="POST" class="space-y-3">
                            <input type="hidden" name="action" value="votacion" />
                            <input name="v1" type="number" class="form-input" placeholder="Votos candidato 1" />
                            <input name="v2" type="number" class="form-input" placeholder="Votos candidato 2" />
                            <input name="v3" type="number" class="form-input" placeholder="Votos candidato 3" />
                            <button class="btn-form" type="submit">Contabilizar</button>
                        </form>

                        <?php if (!empty($results['votacion'])):
                            $v = $results['votacion'];
                        ?>

                        <p class="mt-3 text-secondary">
                            Totales: c1=<?= $v['totales']['c1'] ?> c2=
                            <?= $v['totales']['c2'] ?>

                            c3=
                            <?= $v['totales']['c3'] ?>
                        </p>
                        <p class="text-secondary">Ganador: <?= htmlspecialchars($v['ganador']) ?></p>

                        <?php endif; ?>
                    </div>

                    <!-- generar password -->
                    <div class="card">
                        <h3 class="mb-3 text-xl font-semibold">Generar contraseña aleatoria</h3>
                        <form method="POST" class="space-y-3">
                            <input type="hidden" name="action" value="gen_pass" />
                            <input
                                name="pass_len"
                                type="number"
                                class="form-input"
                                placeholder="Longitud (mín 4)"
                                value="8"
                            />
                            <button class="btn-form" type="submit">Generar</button>
                        </form>

                        <?php if (!empty($results['gen_pass'])): ?>

                        <p class="mt-3 text-secondary">Contraseña: <?= htmlspecialchars($results['gen_pass']) ?></p>

                        <?php endif; ?>
                    </div>
                </div>

                <!-- last card (carrito) centered -->
                <div class="flex justify-center">
                    <div class="mx-auto w-full max-w-[38rem] md:w-1/2">
                        <div class="card">
                            <h3 class="mb-3 text-xl font-semibold">Carrito de compra (calcular total con IVA)</h3>
                            <form method="POST" class="space-y-3">
                                <input type="hidden" name="action" value="carrito" />
                                <input
                                    name="carrito_raw"
                                    class="form-input"
                                    placeholder="Formato: prod:precio,prod2:precio2"
                                />
                                <input name="iva" type="number" class="form-input" placeholder="IVA (%)" value="21" />
                                <button class="btn-form" type="submit">Calcular total</button>
                            </form>

                            <?php if (!empty($results['carrito'])):
                                $c = $results['carrito'];
                            ?>

                            <p class="mt-3 text-secondary">
                                Subtotal: <?= round($c['subtotal'], 2) ?> — IVA: <?= $c['iva'] ?>% — Total:
                                <?= round($c['total'], 2) ?>
                            </p>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</div>

<?php include VIEW_DIR . '/partials/__footer.php'; ?>
